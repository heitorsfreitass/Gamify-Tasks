<?php

namespace App\Http\Controllers;

use App\Models\UserReward;
use App\Models\User;
use Illuminate\Http\Request;

class UserRewardController extends Controller
{
    //adicionar pontos do user
    public function addPoints(Request $request, $userId)
    {
        $request->validate([
            'points' => 'required|integer|min:1',
        ]);

        $user = User::findOrFail($userId);

        $userReward = UserReward::firstOrCreate(
            ['user_id' => $user->id],
            ['points' => 0]
        );

        $userReward->addPoints($request->points);

        $totalPoints = UserReward::where('user_id', $user->id)->sum('points');

        \Log::info('Total points to update: ' . $totalPoints);

        $updateResult = $user->update([
            'points' => $totalPoints
        ]);

        $user->refresh();

        \Log::info('User points updated: ' . ($updateResult ? 'Success' : 'Failure'));

        return response()->json([
            'userReward' =>$userReward,
            'user' => $user
        ], 200);
    }

    public function show($userId)
    {
        $userReward = UserReward::where('user_id', $userId)->first();
        if ($userReward) {
            return view('user_rewards.show', compact('userReward'));
        } else {
            return view('user_rewards.show', ['message' => 'No rewards found for this user']);
        }
    }

    public function showForm($userId) 
    {
        $user = User::find($userId);
        return view('user_rewards.add_points', compact('user'));
    }
}
