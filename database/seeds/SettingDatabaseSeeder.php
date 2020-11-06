<?php

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::setMany([
            'default_locale'=>'en',
            'default_timezone'=>'Africa/Cairo',
            'reviews_enabled'=>true,
            'auto_approve_reviews'=>true,
            'supported_currency'=>['USD','LE'],
            'default_currency'=>'USD',
            'store_email'=>'admin@ecommerce.test',
            'search_engine'=>'mysql',
            'local_pickup_cost'=>0,
            'flat_rate_cost'=>0,
            'translatable'=>[
                'store_name'=>'FleetCart',
                'free_shipping_label'=>'Free Shipping',
                'local_label'=>'local shipping',
                'outer_label'=>'outer_shipping',
            ],
        ]);
    }
}
