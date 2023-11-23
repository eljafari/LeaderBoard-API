<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use App\Jobs\GenerateQRCode;
use \Illuminate\Support\Facades\Log;


class UserController extends Controller
{
    public function getUsers()
    {
        $user = User::latest('points', 'desc')->get();
        return response()->json($user);
    }

    public function postUsers(Request $request )
    {
        $validateData = $request->validate([
            'name'=> 'required'
        ]);

        $user = new User([
            'name' => $request->input('name'),
            'age' => $request->input('age'),
            'points' => $request->input('points'),
            'address' => $request->input('address'),
        ]);

        $user->save();
        $userId = $user->id;

        Log::info('User with Id \''.$userId.'\' Created!');

        $qrData = ['address' => $request->address,'id' => $userId];
        GenerateQRCode::dispatch($qrData);
        Log::info('QR code for User with Id \''.$userId.'\' Generated!');

        return response(['message' => 'User successfully added.', 'id'=> $userId],201);
    }

    public function editUsers(Request $request, $id)
    {
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

    public function deleteUsers(Request $request, $id )
    {
        $user= User::find($id);
        if (!$user){
            return response()->json(['message' => 'User not found'], 404);
        }
        $user->delete($id);
        return response()->json(['message' => 'User Deleted successfully']);
    }

    public function updatePoints(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Update the user's points
        $user->points = $request->input('points');
        $user->save();

        return response()->json(['message' => 'User points updated successfully']);
    }

    //group users by scores and avg. ages
    public function groupUsersByScorev2()
    {
        $users = User::selectRaw('ROUND(AVG(age)) as average_age, points')
            ->groupBy('points')
            ->orderBy('points', 'desc')
            ->get();

        $groupedUsers = [];

        foreach ($users as $user) {
            $groupedUsers[$user->points] = [
                'names' => User::where('points', $user->points)->pluck('name')->toArray(),
                'average_age' => $user->average_age,
            ];
        }

        return response()->json($groupedUsers);
    }

    public function groupUsersByScore()
    {
        $users = User::selectRaw('points, ROUND(AVG(age)) as average_age,   GROUP_CONCAT(name) as names')
            ->groupBy('points')
            ->orderBy('points', 'desc')
            ->get()
            ->map(function ($item) {
                $item->names = explode(',', $item->names);
                return $item;
            });

        return response()->json($users);
    }

}
