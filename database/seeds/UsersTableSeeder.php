<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new App\User;
        $user->name = "Juan Dela Cruz";
        $user->email = "juan@expensemanager.com";
        $user->role = "administrator";
        $user->password = Hash::make('superadmin');
        $user->save();
    }
}
