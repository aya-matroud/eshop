<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {

    return[
        'cate_id'=>rand(1,100),
        'name'=>$this->faker->text(30),
        'description'=>$this->faker->text(200),
       'original_price'=>rand(1,100),
        'small_description'=>$this->faker->text(100),
        'selling_price'=>rand(1,100),
        'status'=>false,
        'trending'=>true,
        'qty'=>rand(1,1000),
        'tax'=>rand(1,1000),
        'meta_title'=>$this->faker->text(300),
       'meta_keywords'=>$this->faker->text(300),
        'meta_description'=>$this->faker->text(300)
        //
    ];
});
