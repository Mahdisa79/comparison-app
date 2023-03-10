<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::create([            
            'id' => 1,
            'persian_name' => 'بنز',
            'original_name' => 'benz',          
            'logo' => [
                "indexArray" =>["large"=>"images\\brand\\2023\\03\\06\\1678054688\\1678054688_large.png","medium"=>"images\\brand\\2023\\03\\06\\1678054688\\1678054688_medium.png","small"=>"images\\brand\\2023\\03\\06\\1678054688\\1678054688_small.png"],"directory"=>"images\\brand\\2023\\03\\06\\1678054688","currentImage"=>"medium",
            ], 
            'status' => '1',

        ]);

        Brand::create([            
            'id' => 2,
            'persian_name' => 'پورشه',
            'original_name' => 'porsche',   
                        
            'logo' => [
                "indexArray" =>["large"=>"images\\brand\\2023\\03\\06\\1678056393\\1678056393_large.jpg","medium"=>"images\\brand\\2023\\03\\06\\1678056393\\1678056393_medium.jpg","small"=>"images\\brand\\2023\\03\\06\\1678056393\\1678056393_small.jpg"],"directory"=>"images\\brand\\2023\\03\\06\\1678056393","currentImage"=>"medium",
            ], 
            'status' => '1',

        ]);
    }
}
