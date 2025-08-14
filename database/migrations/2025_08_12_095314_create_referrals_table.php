<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('referrals', function (Blueprint $table) {
            $table->id(); // المعرّف — أساسي
            $table->unsignedBigInteger('referrer_user_id'); // المحيل — صاحب الكود
            $table->string('code',191); // UNIQUE // رمز الإحالة — فريد
            $table->unsignedBigInteger('referred_user_id'); // المحال — يملأ بعد التسجيل
            $table->unsignedBigInteger('reward_amount'); // مكافأة الإحالة — بالهللة
            $table->enum('status',['pending', 'rewarded', 'expired']); // الحالة — دورة الإحالة
            $table->json('meta')->nullable(); // بيانات — تفاصيل
            $table->timestamps(); // أختام زمنية
        });
    }
    public function down(): void { Schema::dropIfExists('referrals'); }
};
