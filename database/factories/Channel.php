<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Laratube\Channel;
use Laratube\User;
use Faker\Generator as Faker;

$factory->define(Channel::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(3),
        'user_id' => function() {
            return factory(User::class)->create()->id;
        },
        'description' => $faker->sentence(30)
    ];
});
