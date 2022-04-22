<?php

namespace Database\Seeders;

use App\Models\Features;
use App\Models\Location;
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
        Location::factory(3)->create();

        WorkSpace::factory(20)->create()->each(function ($workSpace) use($ids) {
            shuffle($ids);
            $workSpace->usersAppartenir()->attach(array_slice($ids, 0, rand(1, 2)));
            $workSpace->usersLocation()->attach(array_slice($ids, 0, rand(1, 2)));
//            $workSpace->features()->saveMany(Features::factory(rand(1, 3))->make());
        });

        // Add a userLocation to random workSpace with a start and end date for random users


//        Features::factory()
//            ->count(10)
//            ->create(['workSpaceId' => random_int(1, 20)]);

//        WorkSpace::factory(20)->create()->each(function ($workSpace) use($ids) {
//            shuffle($ids);
//            $workSpace->features()->associate(array_slice($ids, 0, rand(1, 2)));
//        });
    }
}
