<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyUrlColumnInMenusTable extends Migration
{
    public function up()
    {
        Schema::table('menus', function (Blueprint $table) {
            $table->string('url')->nullable()->change(); // Mengizinkan NULL untuk kolom URL
        });
    }

    public function down()
    {
        Schema::table('menus', function (Blueprint $table) {
            $table->string('url')->nullable(false)->change(); // Mengembalikan ke tidak NULL
        });
    }
}

