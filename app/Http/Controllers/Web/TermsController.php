<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TermsController extends Controller
{
    public function index()
    {
        // هنا يمكنك إضافة منطق عرض الشروط والأحكام
        return view('terms');
    }

    public function about()
    {
        // هنا يمكنك إضافة منطق عرض شروط وأحكام محددة بناءً على معرف
        return view('about');
    }
}
