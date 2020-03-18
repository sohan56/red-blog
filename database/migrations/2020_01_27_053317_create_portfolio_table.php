<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfolioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_portfolio', function (Blueprint $table) {
            $table->bigIncrements('portfolio_id');
            $table->string('portfolio_title');
            $table->string('img');
            $table->tinyInteger('publication_status');
            $table->integer('hit_counter');
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
        Schema::dropIfExists('tbl_portfolio');
    }
}
