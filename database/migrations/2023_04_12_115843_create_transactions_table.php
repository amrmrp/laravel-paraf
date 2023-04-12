<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('symbol_id');
            $table->foreign('symbol_id')->references('id')->on('symbols');
            $table->string('quantity',255);
            $table->string('Volume',255);
            $table->string('Value',255);
            $table->string('yesterday',255);
            $table->string('first',255);
            $table->string('last_transaction_amount',255);
            $table->string('the_last_deal_change',255);
            $table->string('last_transaction_percentage',255);
            $table->string('final_price_quantity',255);
            $table->string('final_price_change',255);
            $table->string('final_price_percent',255);
            $table->string('the_least',255);
            $table->string('the_most',255);
            $table->date('date');
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
        Schema::dropIfExists('transactions');
    }
};
