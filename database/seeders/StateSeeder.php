<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $governorates = [
            ['name' => ' حضرموت','is_active'=>1],
            ['name' => ' المهره','is_active'=>1],
            ['name' => ' عدن','is_active'=>1],
            ['name' => ' ذمار','is_active'=>1],
            ['name' => ' مأرب','is_active'=>1],
            ['name' => ' إب ','is_active'=>1],
            ['name' => ' صنعاء','is_active'=>1],
            ['name' => ' تعز','is_active'=>1],
            ['name' => ' شبوة','is_active'=>1],
            ['name' => ' صعدة','is_active'=>1],
            ['name' => ' الحديدة','is_active'=>1],
            ['name' => ' أمانة العاصمة','is_active'=>1],
            ['name' => ' البيضاء','is_active'=>1],
            
            
        ];
        State::insert($governorates);
    }
}
