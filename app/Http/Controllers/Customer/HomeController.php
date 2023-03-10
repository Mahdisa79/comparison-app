<?php

namespace App\Http\Controllers\Customer;

use App\Models\Car;
use App\Models\Brand;
use App\Models\Slider;
use App\Models\Category;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{


    public function home()
    {
        // $user = auth()->user();

        // $user->compare()->attach(2);
        // $userCompareList = $user->compare;
        // dd($userCompareList->count());
        
        $homeSlider = Slider::where('title','اسلایدر صفحه ی اصلی')->first();
        $homeSlides = $homeSlider->slides;
        // dd($homeSlides->image);

        $brands = Brand::all();
        $categories = Category::all();

        $cars = Car::all();




        return view('customer.home',compact('homeSlides','brands','categories','cars'));

    }


}
