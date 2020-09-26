<?php

namespace Database\Seeders;
use DB;
use App\models\Students;
use App\models\Subject;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Students::factory(10)->create();
        Subject::factory(20)->create();
        // \App\Models\User::factory(10)->create();
        // $this->call([
        //       SeederStudents::class,
        //       SeederSubject::class,
        // ]);
    }
}
