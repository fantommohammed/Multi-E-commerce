<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainCategoryRequest;
use App\Models\Category;
use DB;
use Illuminate\Http\Request;


class MainCategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::parent()->orderBy('id','DESC')->paginate(PAGINATION_COUNT);
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
            $category = Category::orderBy('id','DESC')->find($id);
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
        return view('dashboard.categories.create');
    }

    public function store(MainCategoriesController $request)
    {
        try
        {
            DB::beginTransaction();
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

            return redirect()->route('admin.maincategories')->with(['success'=>'تم الاضافة بنجاح']);
        }catch(\Exception $ex)
        {
            DB::rollback();
            return redirect()->route('admin.maincategories')->with(['error'=>'حدث خطاء ما برجاء المحاولة لاحقا']);

        }
    }

}
