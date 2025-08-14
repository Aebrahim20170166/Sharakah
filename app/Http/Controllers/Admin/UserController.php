<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // index page
    public function index()
    {
        $users = User::where('role', 'investor')->latest()->get();
        return view('dashboard.users.index', compact('users'));
    }

    // add user page
    public function create()
    {
        return view('dashboard.users.add');
    }

    // edit user page
    public function edit($id)
    {
        return view('dashboard.users.edit', compact('id'));
    }
}
