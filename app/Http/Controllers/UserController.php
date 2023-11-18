<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;

class UserController extends Controller
{
    public function getUsers(){

        $user = User::latest('points')->get();
        return response()->json($user);
    }
}
