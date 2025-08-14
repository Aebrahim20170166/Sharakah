<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('wallet_transactions', function (Blueprint $table) {
            $table->id(); // المعرّف — أساسي
            $table->unsignedBigInteger('wallet_id'); // المحفظة — ربط
            $table->enum('type',['deposit', 'withdrawal', 'distribution', 'fee', 'adjustment']); // النوع — تصنيف
            $table->string('reference',191)->nullable(); // المرجع — مرجع بوابة/داخلي
            $table->unsignedBigInteger('amount'); // المبلغ — بالهللة
            $table->enum('status',['pending', 'completed', 'failed']); // الحالة — معالجة
            $table->json('meta')->nullable(); // بيانات إضافية — تفاصيل
            $table->timestamp('processed_at')->nullable(); // تاريخ المعالجة — اعتماد 
            $table->timestamps(); // أختام زمنية
        });
    }
    public function down(): void { Schema::dropIfExists('wallet_transactions'); }
};
