<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\BaseModel;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('Phone')->nullable();
            $table->string('Address')->nullable();
            $table->string('Email')->nullable();
            $table->string('Media')->nullable();
            $table->longText('Text')->nullable();
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
        Schema::dropIfExists('contacts');
    }
}
