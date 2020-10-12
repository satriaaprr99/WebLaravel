<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Siswa;
use Faker\Generator as Faker;

$factory->define(Siswa::class, function (Faker $faker) {
    return [
        'nis' => $faker->numberBetween($min = 1819117100, $max = 1819117900),
        'nama' => $faker->name,
        'id_kelas' => $faker->numberBetween($min = 1, $max = 15),
        'id_angkatan' => 1,
        'nohp' => $faker->tollFreePhoneNumber,
        'alamat' => $faker->address,
    ];
});
