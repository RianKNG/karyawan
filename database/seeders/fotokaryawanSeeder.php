<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('karyawans')->insert([
            'nama' => 'Ai Nurmillah',
            'alamat' => 'Cigintung',
            'jeniskelamin' => 'perempuan',
            'notlp' => '08294979955',
        ]);
    }
}
