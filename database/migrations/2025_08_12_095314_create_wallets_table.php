<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('wallets', function (Blueprint $table) {
            $table->id(); // المعرّف — أساسي
            $table->unsignedBigInteger('user_id'); // UNIQUE // المستخدم — مالك المحفظة
            $table->unsignedBigInteger('balance'); // الرصيد — بالهللة
            $table->char('currency',36); // العملة — رمز العملة
            $table->timestamps(); // أختام زمنية
        });
    }
    public function down(): void { Schema::dropIfExists('wallets'); }
};
