<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAutorTableUsers extends Migration
{
   
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('autor', ['N','S'])->default('N');
        });
    }

   
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('autor');
        });
    }
}
