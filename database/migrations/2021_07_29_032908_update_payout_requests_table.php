<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePayoutRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('payout_requests', function (Blueprint $table) {
            $table->string('account_number')->nullable()->change();
            $table->string('account_name')->nullable()->change();
            $table->string('bank_name')->nullable()->change();
            $table->string('paypal')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payout_requests', function (Blueprint $table) {
            //$table->dropColumn(['account_number', 'account_name', 'bank_name'])->change();;
        });
    }
}
