<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Cart;
use Faker\Generator as Faker;
$factory->define(Cart::class, function (Faker $faker) {
  $files = File::files(public_path('img/products'));
  $images_list = [];
  foreach ($files as $file)
  {
      $images_list[] = './img/products/' . pathinfo($file)['basename'];
  }

    return [
      'name'            => $faker->sentence(3),
      'short_desc'      => $faker->sentence(5),
      'long_desc'       => $faker->sentence(8),
      'price'           => $faker->randomFloat(2, 300, 4000),
      'thumbnail'       => $faker->randomElement($images_list),
      'cant'            => $faker->numberBetween($min = 0, $max = 1000),
      'discount'        => $faker->randomFloat(2, 10, 40),
      'cart_number'     => $faker->numberBetween($min = 1000, $max = 15000),
      'status'          => $faker->randomElement([0,1]),
      'user_id'         => \App\User::inRandomOrder()->first()->id,
      'color_id'        => \App\Color::inRandomOrder()->first()->id,
      'size_id'         => \App\Size::inRandomOrder()->first()->id,
      'subcategory_id'  => \App\Subcategory::inRandomOrder()->first()->id,
    ];
});
