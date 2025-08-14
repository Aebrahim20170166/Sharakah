<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    use HasFactory;

    // اسم الجدول (اختياري لو Laravel قدر يتعرف عليه)
    protected $table = 'investments';

    // منع الـ Mass Assignment على كل الحقول ما عدا المحدد
    protected $guarded = ['id', 'created_at', 'updated_at'];

    
    // handle created_at
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    // علاقة الاستثمار بالفرصة
    public function opportunity()
    {
        return $this->belongsTo(Opportunity::class, 'opportunity_id');
    }

}
