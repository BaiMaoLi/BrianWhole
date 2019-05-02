<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRemittanceTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remittance_transactions', function (Blueprint $table) {
            $table->increments('transaction_id');
            $table->integer('sender_id');
            $table->integer('receiver_id');
            $table->string('amount');
            $table->string('payment_method');
            $table->string('payout_method');
            $table->string('currency');
            $table->string('mobile_money_account')->nullable();
            $table->string('transaction_fee')->default('0');
            $table->string('transaction_time')->useCurrent();
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('remittance_transactions');
    }
}
