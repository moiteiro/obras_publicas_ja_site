<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObrasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('obras', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nome');
			$table->integer('estadoId');
			$table->string('local');
			$table->string('orgao');
			$table->date('data_contrato');
			$table->integer('situacao');
			$table->integer('data_inicio');
			$table->integer('data_aditado');
			$table->integer('data_total');
			$table->string('valor');
			# References
			$table->foreign('estadoId')->references('id')->on('Estado')->onDelete('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('obras');
	}

}
