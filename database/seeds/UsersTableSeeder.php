<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Profile;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //creating admin
        $user = new User();
        $user->name = 'admin';
        $user->email = 'admin@gmail.com';
        $user->password = bcrypt('12345678');
        $user->position= 'admin';
        $user->save();
        //creating profile part
        $profile = new Profile;
        $profile->user_id = $user->id;
        /*$profile->position= 'admin';*/
        $profile->save();

        //creating admin
        $user2 = new User();
        $user2->name = 'User';
        $user2->email = 'user@gmail.com';
        $user2->password = bcrypt('12345678');
        $user2->position= 'cashier';
        $user2->save();
        //creating profile part
        $profile2 = new Profile;
        $profile2->user_id = $user2->id;
        /*$profile2->position= 'cashier';*/
        $profile2->save();


    }
}
