<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachement extends Model
{
    use HasFactory;
    // اسم الجدول (اختياري لو Laravel قدر يتعرف عليه)
    protected $table = 'attachments';

    protected $guarded = ['id', 'created_at', 'updated_at'];
    // العلاقة مع جدول الفروع
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
    
}
