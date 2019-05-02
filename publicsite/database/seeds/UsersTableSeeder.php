<?php


use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        Model::unguard();
        DB::table('users')->delete();

        $users = [
			[
               'firstname' => 'Brian',
			   'lastname' => 'Zifac',
			   'country' => 'USA',
			   'avatar' => 'default.png',
			   'phonenum' => '15204063923',
               'email' => 'remittyinc@yahoo.com',
			   'user_role' => 'admin',
               'password' => bcrypt('123123'),
			   'email_verified_at' => '2019-03-05 00:00:00',
			   'wallet' => '0',
               'remember_token' => str_random(10),
           ],
           [
               'firstname' => 'Jong',
			   'lastname' => 'Zhe',
			   'country' => 'CN',
			   'avatar' => 'default.png',
			   'phonenum' => '15668848656',
               'email' => 'fedde198212@gmail.com',
			   'user_role' => 'admin',
               'password' => bcrypt('123123'),
			   'wallet' => '0',
			   'email_verified_at' => '2019-03-05 00:00:00',
               'remember_token' => str_random(10),
           ],
        ];

        foreach ($users as $user) {
           User::create($user);
        }

        Model::reguard();
    }

}
