<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [

        'name'=>$this->faker->text(30),
        'status'=>true,
        'popular'=>true,
        'description'=>$this->faker->text(30),
        'meta_title'=>$this->faker->text(30),
        'meta_desc'=>$this->faker->text(30),
        'meta_keywords'=>$this->faker->text(30)
    ];
});
