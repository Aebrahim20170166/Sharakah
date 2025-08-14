<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('api_sync_logs', function (Blueprint $table) {
            $table->id(); // المعرّف — أساسي
            $table->string('provider',191); // المزوّد — اسم النظام
            $table->timestamp('synced_at')->useCurrent(); // وقت المزامنة — آخر مزامنة
            $table->unsignedInteger('new_entries'); // قيود جديدة — عدد القيود
            $table->text('notes')->nullable(); // ملاحظات — تفاصيل/أخطاء
            $table->timestamps(); // أختام زمنية
        });
    }
    public function down(): void { Schema::dropIfExists('api_sync_logs'); }
};
