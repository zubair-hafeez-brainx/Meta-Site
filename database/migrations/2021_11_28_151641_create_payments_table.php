<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('charge_id')->index('charge_id');
            $table->string('type');
            $table->string('card_id');
            $table->text('card_crypt');
            $table->float('amount')->index('amount');
            $table->string('balance_transaction');
            $table->boolean('captured');
            $table->string('currency');
            $table->string('description');
            $table->boolean('disputed');
            $table->string('seller_message');
            $table->boolean('paid');
            $table->string('status');
            $table->string('receipt_url');
            $table->longText('log');
            $table->timestamp('timestamp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
