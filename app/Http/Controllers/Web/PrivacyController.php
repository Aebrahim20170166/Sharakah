<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    public function index()
    {
        // هنا يمكنك إضافة منطق عرض سياسة الخصوصية
        return view('privacy');
    }
}
