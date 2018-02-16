<?php

use Carbon\Carbon;

class Obra extends Eloquent{

	protected $fillable = [
		'id',
		'nome',
		'local',
		'orgao',
		'data_contrato',
		'situacao',
		'data_inicio',
		'data_aditado',
		'data_total',
		'valor',
	];

	public static $situacao = [
		''	=> 'todos',
		'1' => 'em andamento',
		'2' => 'concluída',
		'3' => 'atrasada',
		'4' => 'cancelada',
		'5' => 'suspensa'
	];

	/*
	|---------------------------------------------------------------------
	| Relationship
	|---------------------------------------------------------------------
	*/

	public function estado() {
		return $this->belongsTo('Estado', 'estadoId');
	}
}