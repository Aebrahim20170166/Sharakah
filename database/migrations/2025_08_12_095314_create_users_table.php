<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // المعرّف — مفتاح أساسي
            $table->string('name',191); // الاسم الكامل — اسم المستخدم
            $table->string('email',191); // UNIQUE // البريد الإلكتروني — للدخول والتواصل
            $table->string('phone',191); // رقم الجوال — تواصل/توثيق
            $table->string('password',191); // كلمة المرور — مشفّرة
            $table->enum('role',['investor', 'admin', 'operator']); // الدور — صلاحيات
            $table->enum('status',['active', 'suspended']); // حالة الحساب — تمكين/تعليق
            $table->timestamp('email_verified_at')->nullable(); // تاريخ توثيق البريد — امتثال
            $table->timestamp('last_login_at')->nullable(); // آخر دخول — تتبّع
            $table->string('remember_token',191); // رمز التذكّر — جلسات
            $table->timestamps(); // أختام زمنية
            $table->softDeletes(); // حذف منطقي
        });
    }
    public function down(): void { Schema::dropIfExists('users'); }
};
