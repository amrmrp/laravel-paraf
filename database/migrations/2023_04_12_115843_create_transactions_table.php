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
            $table->string('name',255)->nullable();
            $table->string('company',255)->nullable();
            $table->string('quantity',255)->nullable();
            $table->string('volume',255)->nullable();
            $table->string('value',255)->nullable();
            $table->string('yesterday',255)->nullable();
            $table->string('first',255)->nullable();
            $table->string('last_transaction_amount',255)->nullable();
            $table->string('the_last_deal_change',255)->nullable();
            $table->string('last_transaction_percentage',255)->nullable();
            $table->string('final_price_quantity',255)->nullable();
            $table->string('final_price_change',255)->nullable();
            $table->string('final_price_percent',255)->nullable();
            $table->string('the_least',255)->nullable();
            $table->string('the_most',255)->nullable();
            $table->string('date',255)->nullable();
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
