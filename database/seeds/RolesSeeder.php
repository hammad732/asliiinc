<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use App\User;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // create permissions
        Permission::create(['name' => 'edit articles']);
        Permission::create(['name' => 'delete articles']);
        Permission::create(['name' => 'publish articles']);
        Permission::create(['name' => 'unpublish articles']);

        // create roles and assign created permissions
        $role = Role::create(['name' => 'Super Admin']);
        $role->givePermissionTo([Permission::all()]);

        $role = Role::create(['name' => 'Admin']);
        $role->givePermissionTo([Permission::all()]);

        $role = Role::create(['name' => 'Distributor']);
        $role->givePermissionTo(Permission::all());

        $role = Role::create(['name' => 'Retailer']);
        $role->givePermissionTo(Permission::all());

        $role = Role::create(['name' => 'User']);
        $role->givePermissionTo(Permission::all());

        $user1 = new User;
        $user1->fname = 'Super';
        $user1->lname = 'Admin';
        $user1->company = 'Aslimall';
        $user1->address = 'st.25, los angeles';
        $user1->city = 'los angeles';
        $user1->country = '166';
        $user1->state = '2724';
        $user1->zip_code = '90001';
        $user1->phone_no = '3335648712';
        $user1->email = 'superadmin@gmail.com';
        $user1->decrypt = 'asdf1234';
        $user1->password = Hash::make('asdf1234');
        $user1->save();
        $user1->assignRole('Super Admin');

        $user2 = new User;
        $user2->fname = 'Admin';
        $user2->lname = 'User';
        $user2->company = 'edenspell';
        $user2->address = 'midcity mall';
        $user2->city = 'rawalpindi';
        $user2->country = '166';
        $user2->state = '2724';
        $user2->zip_code = '44000';
        $user2->phone_no = '3335648712';
        $user2->email = 'admin@gmail.com';
        $user2->decrypt = 'asdf1234';
        $user2->password = Hash::make('asdf1234');
        $user2->save();
        $user2->assignRole('Admin');

        // $user3 = new User;
        // $user3->fname = 'Distributor';
        // $user3->lname = 'User';
        // $user3->company = 'edenspell';
        // $user3->address = 'midcity mall';
        // $user3->city = 'rawalpindi';
        // $user3->country = '166';
        // $user3->state = '2724';
        // $user3->zip_code = '44000';
        // $user3->phone_no = '3335648712';
        // $user3->email = 'distributor@gmail.com';
        // $user3->decrypt = 'asdf1234';
        // $user3->password = Hash::make('asdf1234');
        // $user3->save();
        // $user3->assignRole('Distributor');

        $user4 = new User;
        $user4->fname = 'Retailer';
        $user4->lname = 'User';
        $user4->company = 'Retailer comapny';
        $user4->address = 'Retailer mall';
        $user4->city = 'Retailer politon';
        $user4->country = '166';
        $user4->state = '2724';
        $user4->zip_code = '90001';
        $user4->phone_no = '456645456';
        $user4->email = 'retailer@gmail.com';
        $user4->decrypt = 'asdf1234';
        $user4->password = Hash::make('asdf1234');
        $user4->save();
        $user4->assignRole('Retailer');

        $user5 = new User;
        $user5->fname = 'User';
        $user5->lname = 'Role';
        $user5->company = 'User comapny';
        $user5->address = 'User mall';
        $user5->city = 'User city';
        $user5->country = '166';
        $user5->state = '2724';
        $user5->zip_code = '90001';
        $user5->phone_no = '456645456';
        $user5->email = 'userr@gmail.com';
        $user5->decrypt = 'asdf1234';
        $user5->password = Hash::make('asdf1234');
        $user5->save();
        $user5->assignRole('User');
    }
}
