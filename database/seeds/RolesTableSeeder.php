<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new App\Roles;
        $user->name = "Administrator";
        $user->description = "This is an Administrator";
        $user->save();
    }
}
