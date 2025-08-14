<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    use HasFactory;

    // اسم الجدول (اختياري لو Laravel قدر يتعرف عليه)
    protected $table = 'referrals';

    // منع الـ Mass Assignment على كل الحقول ما عدا المحدد
    protected $guarded = ['id', 'created_at', 'updated_at'];

}
