<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use DB;
class SubCategoriesController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::child()->orderBy('id','DESC')->paginate(PAGINATION_COUNT);
        return view ('dashboard.subcategories.index',compact('categories'));
    }

    public function edit($id)
    {
        //get specific categories and its translations
         $category = Category::orderBy('id','DESC')->find($id);
        if (!$category)
            return redirect()->route('dashboard.subcategories')->with(['error' => 'هذا القسم غير موجود ']);

        $categories = Category::parent()->orderBy('id','DESC')->get();

        return view('dashboard.subcategories.edit', compact('category','categories'));
    }

    public function update($id,SubCategoryRequest $request)
    {
        try
        {
            //validation

            //update db
            $category =Category::find($id);

            if(!$category)
                return redirect()->route('admin.subcategories')->with(['error'=>'هذا القسم الفرعى غير موجود']);

            if(!$request->has('is_active'))
                $request->request->add(['is_active'=>0]);
            else
                $request->request->add(['is_active'=>1]);

            $category ->update($request->all());

            //save translations
            $category -> name= $request-> name ;
            $category -> save();

            return redirect()->route('admin.subcategories')->with(['success'=>'تم التحديث بنجاح']);
        }catch(\Exception $ex)
        {
            return redirect()->route('admin.subcategories')->with(['error'=>'حدث خطاء ما برجاء المحاولة لاحقا']);
        }
    }

    public function destroy($id)
    {
        try
        {
            $category = Category::child()->orderBy('id','DESC')->find($id);
            if (!$category)
                return redirect()->route('admin.subcategories')->with(['error' => 'هذا القسم غير موجود ']);
            $category->delete();
            return redirect()->route('admin.subcategories')->with(['success' => 'تم الحذف بنجاح']);

        }catch(\Exception $ex)
        {
            return redirect()->route('admin.subcategories')->with(['error'=>'حدث خطاء ما برجاء المحاولة لاحقا']);
        }
    }

    public function create()
    {
        $categories = Category::parent()->orderBy('id','DESC')->get();
        return view('dashboard.subcategories.create',compact('categories'));
    }

    public function store(SubCategoryRequest $request)
    {
        try
        {
              //validation

              //store
           if(!$request->has('is_active'))
                $request->request->add(['is_active'=>0]);
            else
                $request->request->add(['is_active'=>1]);

           $category =Category::create($request->except('_token'));

           //save translations
            $category -> name= $request-> name ;
            $category -> save();

            DB::commit();

            return redirect()->route('admin.subcategories')->with(['success'=>'تم الاضافة بنجاح']);
        }catch(\Exception $ex)
        {
            DB::rollback();
            return redirect()->route('admin.subcategories')->with(['error'=>'حدث خطاء ما برجاء المحاولة لاحقا']);

        }
    }

}
