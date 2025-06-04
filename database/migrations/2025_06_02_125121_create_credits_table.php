<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditsTable extends Migration
{
    public function up()
    {
        Schema::create('credits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // FK to users table
            $table->string('description')->nullable();
            $table->decimal('amount', 10, 2); // Adjust precision if needed
            $table->tinyInteger('status')->default(0); // 0 = pending, 1 = approved
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('credits');
    }
}
