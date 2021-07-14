<?php

// for many to many


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

use App\Models\User;

class RoleController extends Controller
{
    //
    public function addRoles()
    {
        $roles = [
            ["name"=>"Administrator"],
            ["name"=>"Editor"],
            ["name"=>"Author"],
            ["name"=>"Contributor"],
            ["name"=>"Subscriber"]
        ];

        Role::insert($roles);
        return "roles added successfully";
    }

    public function addUser()
    {
        $user = new User();
        $user->name = "Thiha Aung";
        $user->email = "tha@gmail.com";
        $user->password = encrypt('secret');
        $user->save();

        $roleids = [3,4,5];
        $user->roles()->attach($roleids);
        return "Record has benn created successfully";
    }

    public function getAllRoleByUser($id)
    {
        $user = User::find($id);
        $roles = $user->roles;
        return $roles; 
    }

    public function getAllUserByRole($id)
    {
        $role = Role::find($id);
        $users = $role->users;
        return $users;
    }
}
