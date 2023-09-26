<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 30 ; $i++) { 
            # code...
            DB::table('company_user')->insert([
                'user_id' => rand(1,12),
                'company_id' => rand(10,21)
            ]);
        }
    }
}
