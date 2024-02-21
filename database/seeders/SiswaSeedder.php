<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\support\Facades\DB;

class SiswaSeedder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('siswa')->insert([
            'nama'=>'akmal',
            'nomor_induk'=>'1001',
            'alamat'=>'jl.ruddal',
            'created_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('siswa')->insert([
            'nama'=>'agung',
            'nomor_induk'=>'1002',
            'alamat'=>'jl.bokuml',
            'created_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('siswa')->insert([
            'nama'=>'akmal',
            'nomor_induk'=>'1003',
            'alamat'=>'jl.opl',
            'created_at'=>date('Y-m-d H:i:s')
        ]);
    }
}
