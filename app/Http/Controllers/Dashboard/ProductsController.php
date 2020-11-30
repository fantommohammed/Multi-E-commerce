<?php

namespace App\Http\Controllers\Dashboard;

use DB;
use App\Models\Tag;
use App\Models\Brand;
use App\Models\Image;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use App\Http\Enumerations\CategoryType;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\GeneralProductRequest;

class ProductsController extends Controller
{
    public function index()
    {
        $data = [];
        $data['products'] = Product::with('brand', 'tags', 'categories')->orderBy('id', 'DESC')->paginate(PAGINATION_COUNT);
        $data['brands'] = Brand::active()->select('id')->get();
        $data['tags'] = Tag::select('id')->get();
        $data['categories'] = Category::active()->select('id')->get();
        $data['images'] = Image::select('id')->get();

        return view('dashboard.products.index', $data);
    }

    public function create()

    {
        $data = [];
        $data['brands'] = Brand::active()->select('id')->get();
        $data['tags'] = Tag::select('id')->get();
        $data['categories'] = Category::active()->select('id')->get();

        return view('dashboard.products.create', $data);
    }

    //to save images to folder only
    public function saveProductImages(Request $request)
    {
        $path = public_path('assets/images/products/');
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }


        $file = $request->file('dzfile');

        $filename = uploadImage('products', $file);

        return response()->json([
            'name' => $filename,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }

    public function deleteProductImages(Request $request)
    {
        echo $_POST['id'] . ' deleted';
        $file = $request->file('dzfile');
        $or = $file->getClientOriginalName();
        $path = public_path('assets/images/products/') . $or;

        if (file_exists($path)) {
            unlink($path);
        }
    }

    public function store(GeneralProductRequest $request)
    {
        try {

//        dd($request);
            DB::beginTransaction();


            if (!$request->has('is_active'))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);


            $product = Product::create([
                'slug' => $request->slug,
                'brand_id' => $request->brand_id,
                'is_active' => $request->is_active,
                'type' => $request->type,
                'price' => $request->price,
                'special_price' => $request->special_price,
                'special_price_type' => $request->special_price_type,
                'special_price_start' => $request->special_price_start,
                'special_price_end' => $request->special_price_end,
                'sku' => $request->sku,
                'manage_stock' => $request->manage_stock,
                'in_stock' => $request->in_stock,
                'qty' => $request->qty,


            ]);
            //save translations
            $product->name = $request->name;
            $product->description = $request->description;
            $product->short_description = $request->short_description;
            $product->save();
            $productCount = $product->id;

            if ($request->has('document') && count($request->document) > 0) {
                foreach ($request->document as $image) {
                    Image::create([
                        'product_id' => $productCount,
                        'imageable_id' => $productCount,
                        'imageable_type' => 'App\Models\Image',
                        'photo' => $image,
                    ]);
                }
            }
            //save product categories
            $product->categories()->attach($request->category_id);
            $product->tags()->attach($request->tags);

            //save product tags
            DB::commit();

            return redirect()->route('admin.products')->with(['success' => 'تم الاضافة بنجاح']);
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('admin.products')->with(['error' => 'حدث خطاء ما برجاء المحاولة لاحقا']);

        }
    }

    public function edit($id)
    {

        //get specific categories and its translations

        $data = [];
        $data['product'] = Product::orderBy('id', 'DESC')->find($id);
        $data['brands'] = Brand::active()->select('id')->get();
        $data['tags'] = Tag::select('id')->get();
        $data['categories'] = Category::active()->select('id')->get();
        $data['images'] = Image::select('id')->get();

        if (!$data['product'])
            return redirect()->route('admin.products')->with(['error' => 'هذا القسم غير موجود ']);


        return view('dashboard.products.edit',compact('data'));
    }

    public function update($id, GeneralProductRequest $request)
    {
        try {
            //validation

            //update DB


            $product = Product::find($id);

            if (!$product)
                return redirect()->route('dashboard.products')->with(['error' => 'هذا القسم غير موجود']);

            if (!$request->has('is_active'))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);

            $product->update($request->all());

            //save translations
            $product->name = $request->name;

            $product->description = $request->description;
            $product->short_description = $request->short_description;
            $product->save();

            //save product categories

            $product->categories()->attach($request->category_id);
            $product->tags()->attach($request->tags);


            return redirect()->route('admin.products')->with(['success' => 'تم ألتحديث بنجاح']);
        } catch (\Exception $ex) {

            return redirect()->route('admin.products')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public function destroy($id)
    {


            //get specific categories and its translations
            $products = Product::orderBy('id', 'DESC')->find($id);

            if (!$products)
                return redirect()->route('admin.products')->with(['error' => 'هذا القسم غير موجود ']);
            $image = Str::after($products->photo, '/assets');
            $image = base_path('public/assets/'.$image);
            return $products;
            unlink($image);
            $products->delete();
    }

    public function createSlug($title, $id = 0)
    {
        $slug = str_replace(' ', '-', $title);
        $allSlugs = $this->getRelatedSlugs($slug, $id);
        if (!$allSlugs->contains('slug', $slug)) {
            return $slug;
        }

        $i = 1;
        $is_contain = true;
        do {
            $newSlug = $slug . '-' . $i;
            if (!$allSlugs->contains('slug', $newSlug)) {
                $is_contain = false;
                return $newSlug;
            }
            $i++;
        } while ($is_contain);
    }

    protected function getRelatedSlugs($slug, $id = 0)
    {
        return Category::select('slug')->where('slug', 'like', $slug . '%')
            ->where('id', '<>', $id)
            ->get();
    }

    /** End slug functions */
}
