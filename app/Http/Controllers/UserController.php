<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use App\Models\User;


use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function insertRecord(){
        $phone = new Phone();
        $phone->phone='1234567890';
        $user = new User();
        $user->name = "Thiha Aung";
        $user->email = "thihaaung@gmail.com";
        $user->password = encrypt('secret');
        $user->save();
        $user->phone()->save($phone);
        return "record has been success fully added";

    }
    public function fetchPhoneByuser($id)
    {
        $phone = User::find($id)->phone;
        return $phone; 
    }
}
