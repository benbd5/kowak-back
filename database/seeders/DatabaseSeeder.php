<?php

namespace Database\Seeders;

use App\Models\Features;
use App\Models\Users;
use App\Models\WorkSpace;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     * @throws \Exception
     */
    public function run()
    {
        Users::factory()
            ->count(10)
            ->create();

        $ids = range(1, 10);

        WorkSpace::factory(20)->create()->each(function ($workSpace) use($ids) {
            shuffle($ids);
            $workSpace->usersAppartenir()->attach(array_slice($ids, 0, rand(1, 2)));
        });

        Features::factory()
            ->count(10)
            ->create(['workSpaceId' => random_int(1, 20)]); //@todo: changer le random_int

//        WorkSpace::factory(20)->create()->each(function ($workSpace) use($ids) {
//            shuffle($ids);
//            $workSpace->features()->associate(array_slice($ids, 0, rand(1, 2)));
//        });
    }
}
