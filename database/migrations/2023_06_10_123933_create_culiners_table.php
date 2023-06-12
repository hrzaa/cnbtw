<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCulinersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('culiners', function (Blueprint $table) {
            $table->id();

            $table->foreignId('users_id');
            $table->foreignId('categories_id');
            $table->string('culiner_name');

            // table indo
            $table->longText('culiner_desc_id');
            $table->longText('culiner_history_id');

            // table eng
            $table->longText('culiner_desc_en');
            $table->longText('culiner_history_en');

            $table->string('slug');

            $table->softDeletes();

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
        Schema::dropIfExists('culiners');
    }
}
