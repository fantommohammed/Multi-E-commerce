<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class BrandsController extends Controller
{
    public function index()
    {
        $brands = Brand::orderBy('id', 'DESC')->paginate(PAGINATION_COUNT);
        return view('dashboard.brands.index', compact('brands'));
    }

    public function edit($id)
    {
        //get specific categories and its translations
        $brand = Brand::find($id);
        if (!$brand)
            return redirect()->route('dashboard.brands')->with(['error' => 'هذه المركة غير موجوده ']);

        return view('dashboard.brands.edit', compact('brand'));
    }

    public function update($id, BrandRequest $request)
    {
        try {
            //validation

            //update db

            $brand = Brand::find($id);
            if (!$brand)
                return redirect()->route('admin.brands')->with(['error' => 'هذه المركة غير موجوده ']);

            DB::beginTransaction();
            if ($request->has('photo')) {
                $fileName = uploadImage('brands', $request->photo);
                Brand::where('id', $id)->update(['photo' => $fileName]);
            }

            if (!$request->has('is_active'))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);

            $brand->update($request->except('_token', 'id', 'photo'));

            //save translations
            $brand->name = $request->name;
            $brand->save();

            DB::commit();

            return redirect()->route('admin.brands')->with(['success' => 'تم التحديث بنجاح']);
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('admin.brands')->with(['error' => 'حدث خطاء ما برجاء المحاولة لاحقا']);
        }
    }

    public function destroy($id)
    {
        try {
            $brand = Brand::find($id);

            if (!$brand)
                return redirect()->route('admin.brands')->with(['error' => 'هذه المركة التجارية غير موجوده ']);

            $image = Str::after($brand->photo, 'assets/');
            $image = base_path('public/assets/' . $image);
            unlink($image);
            $brand->delete();

            return redirect()->route('admin.brands')->with(['success' => 'تم الحذف بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->route('admin.brands')->with(['error' => 'حدث خطاء ما برجاء المحاولة لاحقا']);
        }


    }

    public function create()
    {
        return view('dashboard.brands.create');
    }

    public function store(BrandRequest $request)
    {
        try {
            DB::beginTransaction();
            //validation

            //store
            if (!$request->has('is_active'))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);

            $fileName = "";
            if ($request->has('photo')) {
                $fileName = uploadImage('brands', $request->photo);
            }

            $brand = Brand::create($request->except('_token', 'photo'));

            //save translations
            $brand->name = $request->name;
            $brand->photo = $fileName;
            $brand->save();

            DB::commit();

            return redirect()->route('admin.brands')->with(['success' => 'تم الاضافة بنجاح']);
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('admin.brands')->with(['error' => 'حدث خطاء ما برجاء المحاولة لاحقا']);

        }
    }

}
