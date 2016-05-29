<?php

use Carbon\Carbon;

class Obra extends Eloquent{

	// Changing defaut table
	protected $table = 'Obra';

	protected $fillable = [
		'nome',
		'estadoId',
		'local',
		'orgao',
		'dataInicio',
		'dataPrevisao',
		'dataConclusao',
		'tipo',
		'situacao',
		'valor'
	];

	/*
	|---------------------------------------------------------------------
	| Relationship
	|---------------------------------------------------------------------
	*/
}