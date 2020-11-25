<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\BaseMenus;
use Faker\Generator as Faker;

$factory->define(BaseMenus::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['main', 'phone menu', 'Liste de téléphones']),
        'menu' => '{"0":{"deleted":0,"new":0,"slug":"https:\/\/o-bazaar.com\/","name":"عنصر جديد 2","id":688},
                    "1":{"deleted":0,"new":0,"slug":"https:\/\/o-bazaar.com\/","name":"عنصر جديد خ","id":3235},
                    "2":{"deleted":0,"new":0,"slug":"https:\/\/o-bazaar.com\/","name":"عنصر جديد 4","id":1394},
                    "4":{"deleted":0,"new":0,"slug":"لبلب","name":"بيليل","id":263}
                    }',
        'area' => $faker->randomElement(['main', 'phone']),
        'lang' => $faker->randomElement(['en', 'fr', 'ar'])
    ];
});
