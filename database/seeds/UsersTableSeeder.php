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
        //
        $user = \App\User::create(
        [
          'name' => 'abdellah',
          'username' => 'abdellah18',
          'email' => 'abdelah-18@hotmail.com',
          'password' => bcrypt('abdellah')
        ]

        );
        $user2 = \App\User::create(
            [
                'name' => 'asmma',
                'username' => 'asmma18',
                'email' => 'asmma-18@hotmail.com',
                'password' => bcrypt('abdellah')
            ]

        );

        $user->attachRole('super_admin ');
        $user->syncPermissions(['create-users','read-users','delete-users','update-users']);
        $user2->attachRole('admin');


    }
}
