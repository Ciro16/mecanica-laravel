<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Permiso;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(User::class, 10)->create();
        factory(Role::class, 10)->create();
        factory(Permiso::class, 10)->create();
    }
}
