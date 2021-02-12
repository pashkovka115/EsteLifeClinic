<?php

namespace Database\Seeders;

use App\Models\PriceDirection;
use App\Models\PriceService;
use Illuminate\Database\Seeder;



class DirectionPricesTableSeeder extends Seeder
{
    public function run()
    {
        $dir_ids = array_keys(PriceService::where('parent_id', 0)->get()->keyBy('id')->toArray());

        $dirs = PriceDirection::with('services')->first();
        $dirs->services()->attach($dir_ids);

        $piv = \DB::table('direction_prices')
            ->where('pricedirection_id', 1)
            ->where('priceservice_id', 1)
            ->get();

        if ($piv->count() === 0){
            \DB::table('direction_prices')->insert([
                'pricedirection_id' => 1,
                'priceservice_id' => 1,
            ]);
        }

        PriceService::where('id', 1)->update(['parent_id' => 0]);
    }
}
