<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    use HasFactory;

    // اسم الجدول (اختياري لو Laravel قدر يتعرف عليه)
    protected $table = 'opportunities';

    // منع الـ Mass Assignment على كل الحقول ما عدا المحدد
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $casts = [
    'assumptions' => 'array',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }

    // costs relationship
    public function costs()
    {
        return $this->hasMany(Cost::class);
    }

    // investments relationship
    public function investments()
    {
        return $this->hasMany(Investment::class);
    }

    // handle created_at
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }

}
