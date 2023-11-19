<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;

class UserController extends Controller
{
    public function getUsers(){

        $user = User::latest('points', 'desc')->get();
        return response()->json($user);
    }

    public function postUsers(Request $request ){

        $validateData = $request->validate([
            'name'=> 'required'
        ]);

        User::insert([
            'name' => $request->name,
            'age' => $request->age,
            'points' => $request->points,
            'address'=> $request->address
        ]);
        return response(['message' => 'User successfully added.']);

    }

    public function editUsers(Request $request, $id){
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'age' => 'required|integer',
        //     'points' => 'required|integer',
        //     'address' => 'required|string|max:255',
        // ]);

        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        $user->name = $request->input('name');
        $user->age = $request->input('age');
        $user->points = $request->input('points');
        $user->address = $request->input('address');

        $user->save();
        return response()->json(['message' => 'User updated successfully']);

    }

    public function deleteUsers(Request $request, $id ){

        $user= User::find($id);
        if (!$user){
            return response()->json(['message' => 'User not found'], 404);
        }
        $user->delete($id);
        return response()->json(['message' => 'User Deleted successfully']);
    }


}
