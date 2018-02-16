<?php 

use Carbon\Carbon;

class ObrasController extends BaseController {

	public function __construct() 
	{
	}

	public function index() {

		$input = Input::except('page');
		$estados = Estado::all();

		$obras = [];

		$obras = Obra::whereRaw("1");

		if (isset($input['estado']) && $input['estado'] != 'todos') {
			$estado = Estado::where('nome', '=', $input['estado'])->get()->first();

			if ($estado != NULL)
				$obras = $obras->where("estadoId", '=', $estado->id);
		}

		if (isset($input['nome']) && trim($input['nome']) != '') {
			$obras = $obras->where("nome", 'like', "%$input[nome]%");
		}

		if (isset($input['situacao']) && $input['situacao'] != 'todos') {
			$obras = $obras->where('situacao', 'like', $input['situacao']);
		}

		$obras = $obras->paginate(10);

		$obras->appends($input);

		return View::make('obras.index', compact('input', 'obras', 'estados'));
	}

	public function show($id) {
		$obra = Obra::find($id);

		if ($obra == NULL) {
			return View::make('pages.not_found');
		}


		$inicio = Carbon::parse($obra->data_contrato);
		$hoje = Carbon::now();
		echo $inicio;
		echo "<br>";
		echo $hoje;
		echo "<br>";
		$total = $obra->data_total;
		$previsto = $obra->data_inicio;

		if ($previsto - $hoje->diffInDays($inicio) > 0) {
			$barra_de_progresso['status'] ="Dentro do prazo";
			$barra_de_progresso['blue_bar'] = $inicio->diffInDays($hoje) * 100 / $previsto;
			$barra_de_progresso['red_bar'] = 0;
		} else if ($obra->situacao == 2) {
			$atraso = $obra->aditada;
			$barra_de_progresso['blue_bar'] = $previsto * 100 / $total;
			$barra_de_progresso['red_bar'] = $atraso * 100 / $total;
			$barra_de_progresso['status'] ="Concluida";
		} else {
			$atraso = $previsto - $hoje->diffInDays($inicio);
			$barra_de_progresso['blue_bar'] = abs($previsto * 100 / $inicio->diffInDays($hoje));
			$barra_de_progresso['red_bar'] = abs($atraso * 100 / $inicio->diffInDays($hoje));
			$barra_de_progresso['status'] ="Atrasada";
		}
		// dd($barra_de_progresso);
		return View::make('obras.show', compact('obra', 'barra_de_progresso'));
	}
}

 ?>