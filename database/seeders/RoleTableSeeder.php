<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon as SupportCarbon;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $facker = Factory::create();

        $adminRole = Role::create(['name'=>'admin','display_name'=>'Adminstrator','description'=>'System Adminstrator','allowed_route'=>'admin']);
        $editorRole = Role::create(['name'=>'editor','display_name'=>'Supervisor','description'=>'System Supervisor','allowed_route'=>'admin']);
        $userRole = Role::create(['name'=>'user','display_name'=>'User','description'=>'Normal User','allowed_route'=>null]);

        $admin = User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@test.com',
            'mobile' => $facker->phoneNumber,
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('123123123'),
            'status' => 1 
        ]);
        $admin->attachRole($adminRole);

        $editor = User::create([
            'name' => 'Editor',
            'username' => 'editor',
            'email' => 'editor@test.com',
            'mobile' => $facker->phoneNumber,
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('123123123'),
            'status' => 1
        ]);
        $editor->attachRole($editorRole);



    for( $i = 0 ; $i<10 ; $i++){
        $user = User::create([
            'name' => $facker->name,
            'username' => $facker->userName,
            'email' => $facker->email,
            'mobile' => $facker->phoneNumber,
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('123123123'),
            'status' => 1
        ]);
        $user->attachRole($userRole);
    }
    }
}
