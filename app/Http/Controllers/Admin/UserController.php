<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // index page
    public function index()
    {
        return view('dashboard.users.index');
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
