<?php

use App\Models\OrderState;
use Illuminate\Database\Seeder;

class OrderStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        OrderState::create([
            'id' => 1,
            'code' => 'in-queue',
            'name' => 'В черзі',
            'description' => 'Замовлення очікує на обробку'
        ]);
        OrderState::create([
            'id' => 2,
            'code' => 'wait-for-issue',
            'name' => 'Готове до видачі',
            'description' => 'Замовлення готове до видачі'
        ]);
        OrderState::create([
            'id' => 3,
            'code' => 'issued',
            'name' => 'Видане',
            'description' => 'Замовлення видане'
        ]);
        OrderState::create([
            'id' => 4,
            'code' => 'canceled-by-manager',
            'name' => 'Відмінене бухгалтером',
            'description' => 'Замовлення було відмінене бухгалтером'
        ]);
    }
}
