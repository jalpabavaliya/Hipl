<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class CasualLeaveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('casual_leave_master')->truncate();
        DB::table('casual_leave_master')->insert([
            'number_of_leave' => 15,
        ]);
    }
}
