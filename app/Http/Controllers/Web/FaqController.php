<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        // هنا يمكنك إضافة منطق عرض الأسئلة الشائعة
        return view('faq');
    }
}
