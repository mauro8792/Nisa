<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurrentAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('current_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->unsigned();
            $table->integer('account_id')->unsigned();
            $table->integer('sale_id')->unsigned()->nullable();
            $table->integer('payment_id')->unsigned()->nullable();
            $table->float('debit', 8, 2)->nullable();
            $table->float('assets', 8, 2)->nullable();
            $table->float('total',8,2)->nullable()->unsigned();
            $table->date('date');
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('account_id')->references('id')->on('accounts');
            $table->foreign('sale_id')->references('id')->on('sales');
            $table->foreign('payment_id')->references('id')->on('payments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('current_accounts');
    }
}
