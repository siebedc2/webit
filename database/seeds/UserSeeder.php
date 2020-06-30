<?php

use Illuminate\Database\Seeder;
use App\Models\User as UserModel;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new UserModel();
        $user->name = "Siebe De Celle";
        $user->email = "siebe.decelle@hotmail.be";
        $user->password = bcrypt('123456789');
        $user->role = "user";
        $user->save();

        $admin = new UserModel();
        $admin->name = "Veilinghuis Admin";
        $admin->email = "veilinghuis@hotmail.be";
        $admin->password = bcrypt('123456789');
        $admin->role = "admin";
        $admin->save();
    }
}
