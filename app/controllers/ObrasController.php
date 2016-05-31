<?php 

use Carbon\Carbon;

class ObrasController extends BaseController {

	public function __construct() 
	{
	}

	public function index() {

		$input = Input::all();

		$obras = [];

		if (isset($input['estado'])) {
			$estado = Estado::where('nome', '=', $input['estado'])->get()->first();

			if ($estado != NULL)
				$obras = $estado->obras()->paginate(10);

		} else {
			$obras = Obra::paginate(10);
		}

		return View::make('obras.index', compact('input', 'obras'));
	}

	public function show($id) {
		$obra = Obra::findOrFail($id);

		$start_date = Carbon::createFromFormat('Y-m-d', $obra->dataInicio);
		$estimate_date = Carbon::createFromFormat('Y-m-d', $obra->dataPrevisao);
		$today = Carbon::today();

		if ($obra->dataConclusao != NULL && $obra->dataConclusao != "0000-00-00")
			$finished_date = Carbon::createFromFormat('Y-m-d', $obra->dataConclusao);

		$barra_de_progresso = [
			'status' => "",
			'blue_bar' => "0",
			'red_bar' => "0",
		];

		// melhorar esse checagem
		// utilizar enum
		if ($obra->situacao == "concluída") {
			if ($estimate_date >= $finished_date) {
				// concluida em tempo
				$totalInDays = $start_date->diff($finished_date)->days;
				$estimated = $start_date->diff($estimate_date)->days;
				
				$barra_de_progresso['status'] = "Concluída dentro do tempo previsto";
				$barra_de_progresso['blue_bar'] = round($totalInDays / $estimated * 100);

			} else {

				$totalInDays = $start_date->diff($finished_date)->days;
				$estimated = $start_date->diff($estimate_date)->days;

				$barra_de_progresso['status'] = "Concluída com atrasos";
				$barra_de_progresso['blue_bar'] = round($estimated / $totalInDays * 100);
				$barra_de_progresso['red_bar'] = 100 - $barra_de_progresso['blue_bar'];

			}
		} else {
			if ($estimate_date > $today) {

				$totalInDays = $start_date->diff($today)->days;
				$estimated = $start_date->diff($estimate_date)->days;
				
				$barra_de_progresso['status'] = "Em andamento";
				$barra_de_progresso['blue_bar'] = round($totalInDays / $estimated * 100);
			} else {

				$totalInDays = $start_date->diff($today)->days;
				$estimated = $start_date->diff($estimate_date)->days;

				$barra_de_progresso['status'] = "Concluída com atrasos";
				$barra_de_progresso['blue_bar'] = round($estimated / $totalInDays * 100);
				$barra_de_progresso['red_bar'] = 100 - $barra_de_progresso['blue_bar'];
			}
		}

		return View::make('obras.show', compact('obra', 'barra_de_progresso'));
	}

}

 ?>