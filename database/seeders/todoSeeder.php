<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class todoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('todo')->insert([
            'task'=>'huiswerk',
        ]);
        DB::table('todo')->insert([
            'task'=>'huiswerk2',
        ]);
        DB::table('todo')->insert([
            'task'=>'huiswerk3',
        ]);
        DB::table('todo')->insert([
            'task'=>'huiswerk4',
        ]);
        DB::table('todo')->insert([
            'task'=>'huiswerk5',
        ]);
        DB::table('todo')->insert([
            'task'=>'huiswerk6',
        ]);
        DB::table('todo')->insert([
            'task'=>'huiswerk7',
        ]);

    }
}
