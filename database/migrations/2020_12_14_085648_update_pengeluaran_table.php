<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePengeluaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengeluaran', function (Blueprint $table){
            $table->dropColumn('type');
            $table->unsignedBigInteger('type_financial_id')->nullable()->default(NULL);
            
        });

        Schema::table('pengeluaran', function (Blueprint $table){

            $table->foreign('type_financial_id')->references('id')->on('type_financial')->onDelete('set null');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
