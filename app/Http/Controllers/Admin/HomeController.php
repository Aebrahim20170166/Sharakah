<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Investment;
use App\Models\Opportunity;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // home page
    public function index()
    {
        $opportunties = Opportunity::count();
        $users = User::where('role', 'investor')->count();
        $invistiments = Investment::count();
        return view('dashboard.index', compact('opportunties', 'users', 'invistiments'));
    }
}
