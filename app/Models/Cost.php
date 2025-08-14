<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    use HasFactory;

    // اسم الجدول (اختياري لو Laravel قدر يتعرف عليه)
    protected $table = 'costs';

    // منع الـ Mass Assignment على كل الحقول ما عدا المحدد
    protected $guarded = ['id', 'created_at', 'updated_at'];

    // opportunity relationship
    public function opportunity()
    {
        return $this->belongsTo(Opportunity::class);
    }

    // handle created_at
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }
}
