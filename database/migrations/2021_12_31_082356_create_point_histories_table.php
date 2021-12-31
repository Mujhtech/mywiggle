<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('point_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('video_content')->nullable();
            $table->string('video_name')->nullable();
            $table->string('video_number')->nullable();
            $table->string('duration')->nullable();
            $table->string('purchase')->nullable();
            $table->string('point')->nullable();
            $table->string('total_likes')->nullable();
            $table->string('total_comments')->nullable();
            $table->double('amount', 2)->nullable();
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
        Schema::dropIfExists('point_histories');
    }
}
