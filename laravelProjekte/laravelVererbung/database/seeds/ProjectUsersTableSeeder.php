<?php

use Illuminate\Database\Seeder;
use App\ProjectUser;

class ProjectUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 10; $i++)
        {
            $ProjectUser = new ProjectUser();
            $ProjectUser->name='TestUser';
            $ProjectUser->password='TestPassword';
            $ProjectUser->email='lol';
            $ProjectUser->age='11';
            $ProjectUser->save();
        }
    }
}
