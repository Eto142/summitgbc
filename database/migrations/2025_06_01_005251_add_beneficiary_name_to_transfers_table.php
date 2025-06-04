<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void
{
    Schema::table('transfers', function (Blueprint $table) {
        $table->string('beneficiary_name')->nullable()->after('amount');
    });
}

public function down(): void
{
    Schema::table('transfers', function (Blueprint $table) {
        $table->dropColumn('beneficiary_name');
    });
}

};
