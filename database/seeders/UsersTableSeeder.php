<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'is_admin' => 1,
                'education_floor_id' => 1,
                'prefix_id' => 1,
                'name' => 'npc',
                'lastname' => 'solution',
                'email' => '11111111@localhost',
                'password' => bcrypt('11111111')
            ],
            [
                'is_admin' => 0,
                'education_floor_id' => 3,
                'prefix_id' => 3,
                'name' => 'ณัชภฤดา',
                'lastname' => 'ช่างจักร',
                'email' => '22222222@localhost',
                'password' => bcrypt('11111111')
            ],
            [
                'is_admin' => 0,
                'education_floor_id' => 2,
                'prefix_id' => 1,
                'name' => 'อภิรักษ์',
                'lastname' => 'สกุลไทย',
                'email' => '33333333@localhost',
                'password' => bcrypt('11111111')
            ],
            [
                'is_admin' => 0,
                'education_floor_id' => 1,
                'prefix_id' => 3,
                'name' => 'กันต์ฤทัย',
                'lastname' => 'อัญชลี',
                'email' => '44444444@localhost',
                'password' => bcrypt('11111111')
            ],
            [
                'is_admin' => 0,
                'education_floor_id' => 1,
                'prefix_id' => 3,
                'name' => 'กุลธิดา',
                'lastname' => 'ใจสดสวยสวัสดิ์',
                'email' => '55555555@localhost',
                'password' => bcrypt('11111111')
            ],
            [
                'is_admin' => 0,
                'education_floor_id' => 2,
                'prefix_id' => 3,
                'name' => 'เกษรินทร์',
                'lastname' => 'รัตนนท์',
                'email' => '66666666@localhost',
                'password' => bcrypt('11111111')
            ],
            [
                'is_admin' => 0,
                'education_floor_id' => 1,
                'prefix_id' => 3,
                'name' => 'จันจิรา',
                'lastname' => 'วิระบุตร',
                'email' => '77777777@localhost',
                'password' => bcrypt('11111111')
            ],
            [
                'is_admin' => 0,
                'education_floor_id' => 2,
                'prefix_id' => 1,
                'name' => 'มงคล',
                'lastname' => 'ชาวตะการ',
                'email' => '11111111@gmail.com',
                'password' => bcrypt('11111111')
            ],
            [
                'is_admin' => 0,
                'education_floor_id' => 1,
                'prefix_id' => 1,
                'name' => 'ธีรภัทร',
                'lastname' => 'แก้วกงพาน',
                'email' => '88888888@localhost',
                'password' => bcrypt('11111111')
            ],
            [
                'is_admin' => 0,
                'education_floor_id' => 2,
                'prefix_id' => 1,
                'name' => 'พิชิตชัย',
                'lastname' => 'สำราญสุข',
                'email' => '99999999@localhost',
                'password' => bcrypt('11111111')
            ]
        ]);


    }
}
