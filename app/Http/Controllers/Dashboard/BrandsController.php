<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use DB;
use Illuminate\Http\Request;


class BrandsController extends Controller
{
    public function index()
    {
        $brands = Brand::orderBy('id','DESC')->paginate(PAGINATION_COUNT);
        return view ('dashboard.brands.index',compact('brands'));
    }

    public function edit($id)
    {
        //get specific categories and its translations
        $brands = Brand::orderBy('id','DESC')->find($id);
        if (!$brands)
            return redirect()->route('dashboard.brands')->with(['error' => 'هذا القسم غير موجود ']);

        return view('dashboard.brands.edit', compact('brands'));
    }
//
//    public function update($id,MainCategoryRequest $request)
//    {
//        try
//        {
//            //validation
//
//            //update db
//            if(!$request->has('is_active'))
//                $request->request->add(['is_active'=>0]);
//            else
//                $request->request->add(['is_active'=>1]);
//            $category =Category::find($id);
//
//            //save translations
//            $category -> name= $request-> name ;
//            $category -> save();
//
//            if(!$category)
//                return redirect()->route('admin.brands')->with(['error'=>'هذا القسم غير موجود']);
//            else
//                $category->update($request->all());
//
//
//
//            return redirect()->route('admin.brands')->with(['success'=>'تم التحديث بنجاح']);
//        }catch(\Exception $ex)
//        {
//            return redirect()->route('admin.brands')->with(['error'=>'حدث خطاء ما برجاء المحاولة لاحقا']);
//        }
//    }
//
//    public function destroy($id)
//    {
//        try
//        {
//            $category = Brand::orderBy('id','DESC')->find($id);
//            if (!$category)
//                return redirect()->route('admin.brands')->with(['error' => 'هذا القسم غير موجود ']);
//            $category->delete();
//            return redirect()->route('admin.brands')->with(['success' => 'تم الحذف بنجاح']);
//
//        }catch(\Exception $ex)
//        {
//            return redirect()->route('admin.brands')->with(['error'=>'حدث خطاء ما برجاء المحاولة لاحقا']);
//        }
//    }
//
    public function create()
    {
        return view('dashboard.brands.create');
    }

    public function store(BrandRequest $request)
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

            $fileName = "";
            if($request->has('photo'))
            {
                $fileName = uploadImage('brands', $request->photo);
            }

            $brand =Brand::create($request->except('_token','photo'));

            //save translations
            $brand -> name= $request-> name ;
            $brand->photo = $fileName;
            $brand -> save();

            DB::commit();

            return redirect()->route('admin.brands')->with(['success'=>'تم الاضافة بنجاح']);
        }catch(\Exception $ex)
        {
            DB::rollback();
            return redirect()->route('admin.brands')->with(['error'=>'حدث خطاء ما برجاء المحاولة لاحقا']);

        }
    }

}
