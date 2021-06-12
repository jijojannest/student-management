<?php

namespace Database\Seeders;

use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Subject::truncate();
        \App\Models\User::factory(10)->create();
        $subjects = [
            'Maths',
            'Science',
            'History'
        ];
        foreach($subjects as $subject) {
            $sub = [
                'name' => $subject
			];
            Subject::create($sub);
        }
        Schema::enableForeignKeyConstraints();
    }
}
