<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolemodelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rolemodels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('role');
            $table->timestamps();
        });
        // Insert some stuff
        DB::table('rolemodels')
        ->insert([
            ['role'=>'User'],
            ['role'=>'Admin'],
            ['role'=>'Super Admin'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rolemodels');
    }
}
