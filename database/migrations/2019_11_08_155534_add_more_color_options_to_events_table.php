<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMoreColorOptionsToEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->string('text_color')->after('bg_color')->default('#FFFFFF');
            $table->string('section_color')->after('text_color')->nullable();
            
            $table->string('bg_color', 20)->default('#3d3d3d')->change();
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
        Schema::table('events', function (Blueprint $table) {
            $table->drop_column(['bg_color','section_color','bg_image_path']);
            //
        });
    }
}
