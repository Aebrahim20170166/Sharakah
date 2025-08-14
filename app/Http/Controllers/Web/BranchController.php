<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Resources\Web\BranchResource;
use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index()
    {
        $branches = Branch::latest()->get(); // هنا يمكنك استرجاع الفروع من قاعدة البيانات أو أي مصدر آخر
        // هنا يمكنك إضافة منطق عرض الفروع
        $branches = BranchResource::collection($branches);
        return view('branches.index', compact('branches'));
    }
}
