<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\BaseModel;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('Title')->nullable();
            $table->text('Text')->nullable();
            $table->string('Media')->nullable();
            $table->integer('UserId')->nullable();
            $table->integer('CategoryId')->nullable();
            $table->timestamp(BaseModel::CREATED_AT)->nullable();
            $table->timestamp(BaseModel::UPDATED_AT)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
