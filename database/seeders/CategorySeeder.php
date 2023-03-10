<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(
            [
            'id' => 1,
            'persian_name' => 'ون',
            'original_name' => 'van',
            'status' => '1',
        ],[

            'id' => 2,
            'persian_name' => 'کلاسیک',
            'original_name' => 'classic',
            'status' => '1',

        ]);
    }
}
