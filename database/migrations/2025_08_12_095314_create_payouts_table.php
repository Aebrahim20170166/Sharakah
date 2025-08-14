<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('payouts', function (Blueprint $table) {
            $table->id(); // المعرّف — أساسي
            $table->unsignedBigInteger('user_id'); // مقدم الطلب — المستثمر
            $table->unsignedBigInteger('amount'); // المبلغ المطلوب — بالهللة
            $table->enum('method',['bank', 'wallet_gateway']); // طريقة السحب — قناة الدفع
            $table->string('iban',191)->nullable(); // الآيبان — للتحويل البنكي
            $table->enum('status',['requested', 'approved', 'rejected', 'paid']); // الحالة — دورة الطلب
            $table->timestamp('requested_at')->useCurrent(); // تاريخ الطلب — بداية العملية
            $table->timestamp('processed_at')->nullable(); // تاريخ المعالجة — الإتمام
            $table->text('notes')->nullable(); // ملاحظات — سبب الرفض/الموافقة
            $table->timestamps(); // أختام زمنية
        });
    }
    public function down(): void { Schema::dropIfExists('payouts'); }
};
