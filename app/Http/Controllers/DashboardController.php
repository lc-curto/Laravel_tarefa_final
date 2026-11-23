<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;


class DashboardController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::id());

        return view('bo.dashboard', compact('user'));
    }
}
