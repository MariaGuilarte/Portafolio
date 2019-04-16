<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttachmentsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('attachments', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->timestamps();
      $table->unsignedBigInteger('project_id');
      $table->string('name');
      $table->string('filename');
      $table->string('type');
      $table->string('url');
      $table->json('meta');
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('attachments');
  }
}
