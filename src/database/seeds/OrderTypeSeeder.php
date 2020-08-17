<?php

use App\Models\OrderType;
use Illuminate\Database\Seeder;

class OrderTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderType::create([
            'id' => 1,
            'code' => 'study',
            'name' => 'Навчання'
        ]);
        OrderType::create([
            'id' => 2,
            'code' => 'income',
            'name' => 'Доходи'
        ]);
        OrderType::create([
            'id' => 3,
            'code' => 'debt',
            'name' => 'Заборгованість'
        ]);
    }
}
