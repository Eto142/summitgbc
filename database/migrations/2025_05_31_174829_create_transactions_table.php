<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('transaction_id')->nullable();
            $table->string('transaction_ref')->nullable();
            $table->string('transaction_type')->nullable();
            $table->string('transaction')->nullable();
            $table->string('email')->nullable();
            $table->decimal('credit', 15, 2)->nullable();
            $table->decimal('debit', 15, 2)->nullable();
            $table->string('wallet_address')->nullable();
            $table->string('wallet_type')->nullable();
            $table->decimal('transaction_amount', 15, 2)->nullable();
            $table->text('transaction_description')->nullable();
            $table->tinyInteger('transaction_status')->default(0)->comment('0=pending, 1=approved');
            $table->timestamps();

            $table->string('account_name', 250)->nullable();
            $table->string('account_number', 250)->nullable();
            $table->string('account_type', 250)->nullable();
            $table->string('caccount_name', 200)->nullable();
            $table->string('caccount_number', 255)->nullable();
            $table->string('cbank_name', 255)->nullable();
            $table->string('bank_name', 250)->nullable();
            $table->string('routing_number', 250)->nullable();
            $table->string('card_number')->nullable();
            $table->string('cvv', 255)->nullable();
            $table->string('cdate', 255)->nullable();

            // Optional: add foreign key constraint if you have users table
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}

