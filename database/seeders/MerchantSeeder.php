<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Merchant\Entities\Merchant;

class MerchantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Merchant::create([
            'country_code'  => 70,
            'merchant_name' => 'Sonata Bagus Adji Pamukti'
        ]);

        Merchant::create([
            'country_code'  => 33,
            'merchant_name' => 'Dicka Aringga'
        ]);

        Merchant::create([
            'country_code'  => 20,
            'merchant_name' => 'Yosi Saputra'
        ]);

        Merchant::create([
            'country_code'  => 66,
            'merchant_name' => 'Rega Aji Prayogo'
        ]);

        Merchant::create([
            'country_code'  => 50,
            'merchant_name' => 'Arif Adrianto'
        ]);
    }
}
