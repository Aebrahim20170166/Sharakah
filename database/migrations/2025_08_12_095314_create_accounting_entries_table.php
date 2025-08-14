<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('accounting_entries', function (Blueprint $table) {
            $table->id(); // المعرّف — أساسي
            $table->unsignedBigInteger('branch_id'); // الفرع — مصدر القيد
            $table->enum('entry_type',['sale', 'purchase', 'expense']); // نوع القيد — تصنيف
            $table->string('reference',191)->nullable(); // المرجع — فاتورة/شراء
            $table->string('description',191)->nullable(); // الوصف — بيان مختصر
            $table->unsignedBigInteger('amount'); // المبلغ — موجب/سالب حسب السياسة
            $table->dateTime('entry_at'); // وقت القيد — تاريخ العملية
            $table->enum('state',['open', 'closed', 'paid']); // الحالة — دورة القيد
            $table->timestamps(); // أختام زمنية
        });
    }
    public function down(): void { Schema::dropIfExists('accounting_entries'); }
};
