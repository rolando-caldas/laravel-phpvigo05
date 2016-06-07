<?php

use Illuminate\Database\Seeder;
use App\User as User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
  
        User::create( [
            'email' => 'phpvigo05@example.com' ,
            'password' => Hash::make( 'phpvigo' ) ,
            'name' => 'phpvigo' ,
        ] );
        
    }
}
