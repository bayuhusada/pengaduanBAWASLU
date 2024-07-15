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
        Schema::table('tanggapan', function (Blueprint $table) {
            $table->after('tanggapan', function ($table) {
                $table->string('images')->nullable();
            });

            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tanggapan', function (Blueprint $table) {
            $table->dropColumn('images');

        });
    }
};
