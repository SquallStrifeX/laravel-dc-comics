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
        Schema::create('comics', function (Blueprint $table) {
            $table->id();
            $table->string('title', );
            $table->text('description',);
            $table->text('thumb',);
            $table->string('price',);
            $table->string('series');
            $table->date('sale_date');
            $table->string('type');
            $table->json('artists'); // Presumo che gli artisti possano essere più di uno, quindi uso il tipo json
            $table->json('writers'); // Anche qui presumo che gli scrittori possano essere più di uno
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
        Schema::dropIfExists('comics');
    }
};
