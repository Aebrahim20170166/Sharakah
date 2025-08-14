<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('payout_items', function (Blueprint $table) {
            $table->id(); // المعرّف — أساسي
            $table->unsignedBigInteger('payout_id'); // السحب — ربط
            $table->string('source_type',191); // نوع المصدر — كيان المصدر
            $table->unsignedBigInteger('source_id'); // معرّف المصدر — الكيان المرتبط
            $table->unsignedBigInteger('amount'); // مبلغ البند — جزء من السحب
            $table->timestamps(); // أختام زمنية
        });
    }
    public function down(): void { Schema::dropIfExists('payout_items'); }
};
