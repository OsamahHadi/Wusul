<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            [
                'name' => ' المكلا',
                'state_id' => 1
                ,'is_active'=>1
            ],
            [
                'name' => ' الشحر',
                'state_id' => 1
                ,'is_active'=>1
            ],
            [
                'name' => ' الغيظه',
                'state_id' => 2
                ,'is_active'=>1
            ],
            [
                'name' => ' خور مكسر',
                'state_id' => 3
                ,'is_active'=>1
            ],
            [
                'name' => 'سيئون',
                'state_id' => 1
                ,'is_active'=>1
            ],[
                'name' => ' غيل باوزير ',
                'state_id' => 1
                ,'is_active'=>1
            ],[
                'name' => ' كريتر ',
                'state_id' => 3
                ,'is_active'=>1
            ],[
                'name' => ' تريم ',
                'state_id' => 1
                ,'is_active'=>1
            ],[
                'name' => ' حوف ',
                'state_id' => 2
                ,'is_active'=>1
            ],
        ];
        City::insert($cities);
    }
}
