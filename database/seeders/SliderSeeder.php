<?php

namespace Database\Seeders;

use App\Models\Slide;
use App\Models\Slider;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Slider::create([
            'title' => 'اسلایدر صفحه ی اصلی',
        ]);


        Slide::create([
            'id' => 1,
            'slider_id' => 1,
            'image' => [
                "indexArray" =>["userHome" =>"images\\slide\\2023\\03\\05\\1677980389\\1677980389_userHome.jpg","small"=>"images\\slide\\2023\\03\\05\\1677980389\\1677980389_small.jpg"],"directory"=>"images\\slide\\2023\\03\\05\\1677980389","currentImage"=>"medium",
            ],
            'title' => 'اسلایدر صفحه اصلی 1',
            'url' => '#',
            'status' => 1,
        ]);

        Slide::create([
            'id' => 2,
            'slider_id' => 1,
            'image' => [
                // "indexArray" =>["userHome" =>"images\\slide\\2023\\03\\05\\1677980389\\1677980389_userHome.jpg","small"=>"images\\slide\\2023\\03\\05\\1677980389\\1677980389_small.jpg"],"directory"=>"images\\slide\\2023\\03\\05\\1677980389","currentImage"=>"medium",
                "indexArray" =>["userHome" =>"images\\slide\\2023\\03\\05\\1677980551\\1677980551_userHome.jpg","small"=>"images\\slide\\2023\\03\\05\\1677980551\\1677980551_small.jpg"],"directory"=>"images\\slide\\2023\\03\\05\\1677980551","currentImage"=>"medium",

            ],            
            'title' => 'اسلایدر صفحه اصلی 2',
            'url' => '#',
            'status' => '1',

        ]);





    }
}
