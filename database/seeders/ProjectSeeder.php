<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 15; $i++) {
            $project = new Project;
            $project->title = $faker->sentence(4);
            $project->description = $faker->sentence(100);
            $project->creation_date = $faker->dateTimeInInterval();
            $project->completion_date = $faker->dateTimeInInterval();
            $project->client = $faker->name();
            $project->category = $faker->word();
            $project->slug = Str::slug($project->title, '-');

            $project->save();
        }
    }
}