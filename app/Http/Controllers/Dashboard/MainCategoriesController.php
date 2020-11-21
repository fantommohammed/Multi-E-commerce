<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Enumerations\CategoryType;
use App\Http\Requests\MainCategoryRequest;
use App\Models\Category;
use DB;
use Illuminate\Http\Request;


class MainCategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::with('_parent')->orderBy('id','DESC')->paginate(PAGINATION_COUNT);
        return view ('dashboard.categories.index',compact('categories'));
    }

    public function edit($id)
    {
        //get specific categories and its translations
         $category = Category::orderBy('id','DESC')->find($id);
        if (!$category)
            return redirect()->route('dashboard.maincategories')->with(['error' => 'هذا القسم غير موجود ']);

        return view('dashboard.categories.edit', compact('category'));
    }

    public function update($id,MainCategoryRequest $request)
    {
        try
        {
            //validation

            //update db
            if(!$request->has('is_active'))
                $request->request->add(['is_active'=>0]);
            else
                $request->request->add(['is_active'=>1]);
            $category =Category::find($id);

            //save translations
            $category -> name= $request-> name ;
            $category -> save();

            if(!$category)
                return redirect()->route('admin.maincategories')->with(['error'=>'هذا القسم غير موجود']);
            else
                $category->update($request->all());



            return redirect()->route('admin.maincategories')->with(['success'=>'تم التحديث بنجاح']);
        }catch(\Exception $ex)
        {
            return redirect()->route('admin.maincategories')->with(['error'=>'حدث خطاء ما برجاء المحاولة لاحقا']);
        }
    }

    public function destroy($id)
    {
        try
        {
            $category = Category::find($id);
            if (!$category)
                return redirect()->route('admin.maincategories')->with(['error' => 'هذا القسم غير موجود ']);
            $category->delete();
            return redirect()->route('admin.maincategories')->with(['success' => 'تم الحذف بنجاح']);

        }catch(\Exception $ex)
        {
            return redirect()->route('admin.maincategories')->with(['error'=>'حدث خطاء ما برجاء المحاولة لاحقا']);
        }
    }

    public function create()
    {
        $categories = Category::select('id','parent_id')->get();
        return view('dashboard.categories.create',compact('categories'));
    }

    public function store(MainCategoryRequest $request)
    {

            //validation

            //store
            if(!$request->has('is_active'))
                $request->request->add(['is_active'=>0]);
            else
                $request->request->add(['is_active'=>1]);

            //if user choose main category then we must remove parent_id from the request

            if($request->type ==CategoryType::mainCategory)//main category
            {
                $request->request->add(['parent_id'=>null]);
            }

            //if user choose child category we must add parent_id

            $category =Category::create($request->except('_token'));

            //save translations
            $category -> name= $request-> name ;
            $category -> save();

            DB::commit();

            return redirect()->route('admin.maincategories')->with(['success'=>'تم الاضافة بنجاح']);

    }
}
