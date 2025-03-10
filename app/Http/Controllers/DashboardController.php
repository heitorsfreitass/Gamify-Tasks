<?php

namespace App\Http\Controllers;

use App\Models\User;

class DashboardController extends Controller 
{
    public function scoreboard() 
    {
        $users = User::orderBy('points', 'desc')->get();
        return view('scoreboard', compact('users'));
    }
}