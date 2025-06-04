<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDebitsTable extends Migration
{
    public function up()
    {
        Schema::create('debits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // links to users table
            $table->string('description')->nullable();
            $table->decimal('amount', 10, 2);
            $table->tinyInteger('status')->default(0); // 0 = pending, 1 = approved
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('debits');
    }
}
