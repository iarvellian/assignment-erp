<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clients')->insert([
            [
                'id_client' => Str::uuid(),
                'client_name' => 'PT Maju Jaya',
                'client_address' => 'Jl. Maju Jaya',
                'contract_start_date' => Carbon::create('2025', '01', '01'),
                'contract_end_date' => Carbon::create('2026', '01', '01'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_client' => Str::uuid(),
                'client_name' => 'PT Berkah Selalu',
                'client_address' => 'Jl. Berkah Selalu',
                'contract_start_date' => Carbon::create('2025', '02', '01'),
                'contract_end_date' => Carbon::create('2026', '02', '01'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_client' => Str::uuid(),
                'client_name' => 'PT Sukses Terus',
                'client_address' => 'Jl. Sukses Terus',
                'contract_start_date' => Carbon::create('2025', '03', '01'),
                'contract_end_date' => Carbon::create('2026', '03', '01'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_client' => Str::uuid(),
                'client_name' => 'PT Tidak Bankrut',
                'client_address' => 'Jl. Tidak Bankrut',
                'contract_start_date' => Carbon::create('2025', '04', '01'),
                'contract_end_date' => Carbon::create('2026', '04', '01'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
