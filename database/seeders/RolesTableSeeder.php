<?php

namespace Database\Seeders;

use App\Models\htmlColor;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Role::create([
            'name' => 'แอดมิน',
            'color' => 'bg-info'
        ]);
        Role::create([
            'name' => 'เจ้าหน้าที่',
            'color' => 'bg-success'
        ]);
        Role::create([
            'name' => 'อาจารย์ที่ปรึกษา',
            'color' => 'bg-primary'
        ]);
        Role::create([
            'name' => 'นักเรียนทุน',
            'color' => 'bg-warning'
        ]);
    }
}
