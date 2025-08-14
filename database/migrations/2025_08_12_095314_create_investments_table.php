<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('investments', function (Blueprint $table) {
            $table->id(); // المعرّف — أساسي
            $table->unsignedBigInteger('user_id'); // المستثمر — صاحب الاستثمار
            $table->unsignedBigInteger('opportunity_id'); // الفرصة — وجهة الاستثمار
            $table->unsignedBigInteger('amount'); // المبلغ المستثمر — بالهللة
            $table->unsignedBigInteger('received_amount'); // المتحصلات — بالهللة
            $table->enum('status',['active', 'exited', 'refunded']); // الحالة — دورة الاستثمار
            $table->timestamps(); // أختام زمنية
            $table->softDeletes(); // حذف منطقي
        });
    }
    public function down(): void { Schema::dropIfExists('investments'); }
};
