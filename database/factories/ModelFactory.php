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

$factory->define(App\SupplierType::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
    ];
});

$factory->define(App\Supplier::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'address' => $faker->address,
        'telephone' => $faker->numberBetween(6620000000, 6629999999),
        'email' => $faker->email,
        'supplier_type_id' => function () {
            return factory(App\SupplierType::class)->create()->id;
        }
    ];
});

$factory->define(App\Unity::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
    ];
});

$factory->define(App\ProductType::class, function (Faker\Generator $faker) {
    $date = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
    return [
        'name' => $faker->word,
        'quantity' => 1,
        'configurable' => false,
        'customizable' => false,
        'created_at' => $date,
        'updated_at' => $date
    ];
});

$factory->define(App\Product::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'quantity' => 1,
        'price' => $faker->randomNumber(5),
        'iva' => false,
        'supplier_id' => function () {
            return factory(App\Supplier::class)->create()->id;
        },
        'product_type_id' => function () {
            factory(App\ProductType::class)->create()->id;
        },
        'unity_id' => function () {
            factory(App\Unity::class)->create()->id;
        },
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