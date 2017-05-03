<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Supplier::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'address' => $faker->address,
        'telephone' => $faker->numberBetween(6620000000, 6629999999),
        'email' => $faker->email,
        'supplier_type_id' => $faker->numberBetween(1, 2),
    ];
});

$factory->define(App\Unity::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
    ];
});

$factory->define(App\ProductType::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
    ];
});

$factory->define(App\Product::class, function (Faker\Generator $faker) {
    return [
        'supplier_id' => 1,
        'name' => $faker->name,
        'quantity' => 0,
        'unity_id' => 1,
        'price' => $faker->randomFloat(2, 10, 1000),
        'iva' => 0.00,
        'product_type_id' => 1,
    ];
});

$factory->define(App\Extra::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'price' => $faker->randomFloat(2, 10, 1000),
    ];
});

$factory->define(App\Combo::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'price' => $faker->randomFloat(2, 10, 1000),
    ];
});

$factory->define(App\Client::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'address' => $faker->address,
        'telephone' => $faker->numberBetween(6620000000, 6629999999),
        'email' => $faker->email
    ];
});

$factory->define(App\Kid::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'sex' => $faker->numberBetween(1, 2),
        'birthday_at' => $faker->date()
    ];
});