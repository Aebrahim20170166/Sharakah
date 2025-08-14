<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id(); // المعرّف — أساسي
            $table->unsignedBigInteger('user_id'); // المستلم — المستخدم
            $table->string('type',191); // نوع الإشعار — تصنيف/قناة
            $table->string('title',191); // العنوان — مختصر
            $table->text('body'); // المحتوى — نص الإشعار
            $table->timestamp('read_at')->nullable(); // وقت القراءة — متابعة القراءة
            $table->json('channels')->nullable(); // القنوات — بريد/Push/SMS
            $table->json('meta')->nullable(); // بيانات — تفاصيل إضافية
            $table->timestamps(); // أختام زمنية
        });
    }
    public function down(): void { Schema::dropIfExists('notifications'); }
};
