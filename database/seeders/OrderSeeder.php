<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $majuJayaId = DB::table('clients')->where('client_name', 'PT Maju Jaya')->value('id_client');
        $berkahSelaluId = DB::table('clients')->where('client_name', 'PT Berkah Selalu')->value('id_client');
        $suksesTerusId = DB::table('clients')->where('client_name', 'PT Sukses Terus')->value('id_client');
        $tidakBankrutId = DB::table('clients')->where('client_name', 'PT Tidak Bankrut')->value('id_client');

        DB::table('orders')->insert([
            [
                'id_order' => Str::uuid(),
                'client_id' => $majuJayaId,
                'item_name' => 'Web Service',
                'item_price' => number_format(100000, 2, '.', ''),
                'order_date' => Carbon::create('2025', '01', '01'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_order' => Str::uuid(),
                'client_id' => $berkahSelaluId,
                'item_name' => 'App Service',
                'item_price' => number_format(200000, 2, '.', ''),
                'order_date' => Carbon::create('2025', '02', '01'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_order' => Str::uuid(),
                'client_id' => $suksesTerusId,
                'item_name' => 'Network Service',
                'item_price' => number_format(300000, 2, '.', ''),
                'order_date' => Carbon::create('2025', '03', '01'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_order' => Str::uuid(),
                'client_id' => $tidakBankrutId,
                'item_name' => 'PC Setup',
                'item_price' => number_format(400000, 2, '.', ''),
                'order_date' => Carbon::create('2025', '04', '01'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
