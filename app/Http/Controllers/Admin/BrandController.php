<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Image\ImageService;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brand.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd('hi');
        
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->validate([
            'persian_name' => 'required|string|min:2|max:255',
            'original_name' => 'required|string|min:2|max:255',
            'logo' => 'required|image|mimes:png,jpg,jpeg,gif',
            'status' => 'required|numeric|in:0,1',   
        ]);

        $imageService = new ImageService;

        if ($request->hasFile('logo')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'brand');
            $result = $imageService->createIndexAndSave($request->file('logo'));
            if ($result === false) {
                return redirect()->back()->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['logo'] = $result;
        }

        
        Brand::create($inputs);       


        return redirect()->route('admin.brands.index')->with('swal-success', 'برند شما با موفقیت ثبت شد');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand) 
    {

        return view('admin.brand.edit', compact('brand'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Brand $brand)
    {
      
        $data = $request->validate([
            'persian_name' => 'required|string|min:2|max:255',
            'original_name' => 'required|string|min:2|max:255',
            'logo' => 'sometimes|image|mimes:png,jpg,jpeg,gif',
            'status' => 'required|numeric|in:0,1',   
        ]);


        if(isset($data['logo'])){
            $imageService = new ImageService;

            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'brand');
            $result = $imageService->createIndexAndSave($request->file('logo'));
            if ($result === false) {
                return redirect()->back()->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $data['logo'] = $result;
        }
        else{
            $data['logo'] = $brand->logo;
        }


        $brand->update($data);

        return redirect()->route('admin.brands.index')->with('swal-success', 'برند شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
       $category->delete();
       return redirect()->route('admin.categories.index')->with('swal-success', 'دسته بندی شما با موفقیت حذف شد');
    }
}
