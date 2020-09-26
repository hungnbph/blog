<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class SeederStudents extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('students')->count() === 0) {
            DB::table('students')->insert([
                [
                    'name' => 'Nguyen Van A',
                    'phone' => 0123123123,
                    'age' => 20,
                    'gender' => 1,
                    'adress' => 'HN',
                    'is_active' => true,
                ],
                [
                    'name' => 'Nguyen Van B',
                    'phone' => 0123123564,
                    'age' => 22,
                    'gender' => 0,
                    'adress' => 'BN',
                    'is_active' => false,
                ],
            ]);
        } else {
            echo 'Bang students da co du lieu' . PHP_EOL;
        }
    }
}
