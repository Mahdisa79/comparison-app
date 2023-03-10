<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Image\ImageService;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Category;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::all();
        return view('admin.car.index',compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        
        return view('admin.car.create',compact('categories','brands'));
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
            'name' => 'required|string|min:2|max:255',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'image' => 'required|image|mimes:png,jpg,jpeg,gif',
            'status' => 'required|numeric|in:0,1',   


            'color' => 'required|string|min:2|max:255',
            'power' => 'required|string|min:2|max:255',
            'price_us' => 'required|string|min:2|max:255',
            'country' => 'required|string|min:2|max:255',
            'maxspeed' => 'required|string|min:2|max:255',
            'safety_class' => 'required|string|min:2|max:255',
            'fuel_consumption' => 'required|string|min:2|max:255',
            'acceleration' => 'required|string|min:2|max:255',

        ]);

        // dd($inputs); 

        $imageService = new ImageService;

        if ($request->hasFile('image')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'cars');
            $result = $imageService->createIndexAndSave($request->file('image'));
            if ($result === false) {
                return redirect()->back()->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        }

        
        Car::create($inputs);       


        return redirect()->route('admin.cars.index')->with('swal-success', 'ماشین شما با موفقیت ثبت شد');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car) 
    {
        $categories = Category::all();
        $brands = Brand::all();

        return view('admin.car.edit', compact('car','categories','brands'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Car $car)
    {      
        $data = $request->validate([
            'name' => 'required|string|min:2|max:255',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'image' => 'sometimes|image|mimes:png,jpg,jpeg,gif',
            'status' => 'required|numeric|in:0,1',   


            'color' => 'required|string|min:2|max:255',
            'power' => 'required|string|min:2|max:255',
            'price_us' => 'required|string|min:2|max:255',
            'country' => 'required|string|min:2|max:255',
            'maxspeed' => 'required|string|min:2|max:255',
            'safety_class' => 'required|string|min:2|max:255',
            'fuel_consumption' => 'required|string|min:2|max:255',
            'acceleration' => 'required|string|min:2|max:255',

        ]);


        if(isset($data['image'])){
            $imageService = new ImageService;

            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'car');
            $result = $imageService->createIndexAndSave($request->file('image'));
            if ($result === false) {
                return redirect()->back()->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $data['image'] = $result;
        }
        else{
            $data['image'] = $car->image;
        }


        $car->update($data);

        return redirect()->route('admin.cars.index')->with('swal-success', 'خودرو شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
       $car->delete();
       return redirect()->route('admin.cars.index')->with('swal-success', 'خودرو با موفقیت حذف شد');
    }
}
