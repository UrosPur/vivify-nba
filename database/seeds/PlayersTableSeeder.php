<?php

use Illuminate\Database\Seeder;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        App\Team::all()->each(function (App\Team $p) {

            $p->player()->saveMany(

                factory(App\Player::class,6)->make()
            );

        });
    }
}
