<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\PostController;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accountlists', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->string('name', 30);
            $table->string('surname', 30);
            $table->string('username', 60)->nullable();
            $table->string('password', 30);
            $table->char('idnumber', 11);
            $table->bigInteger('balance')->unsigned()->default(0);
            $table->string('email', 40);
            $table->char('accountid', 24);
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
        Schema::dropIfExists('accountlists');
    }
};
