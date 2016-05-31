@extends('layouts.application')

@section('content')

<section>
    <div class="container">
        <div class="row">
        	<!-- Conserta isso ai, Caju!!! -->
        	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

            <div class="col-lg-12 title-style text-center">
                <h2>Lista de Obras</h2>
            </div>
		
		</div>
		<div class="row">
			<div class="col-lg-12">
				<form class="form-inline">
					<div class="form-group">
						<label for="estado_form">Estado</label>
						<select name="estado" class="form-control" id="estado_form">
							<option value="todos">todos</option>
							@foreach($estados as $estado)
								<option value="{{$estado->nome}}" 
									<?php if(isset($input['estado']) && $input['estado'] == $estado->nome) echo 'selected="selected"' ?>
									>
									{{$estado->nome}}
								</option>
							@endforeach
						</select>
						<?php if(isset($input['estado'])) unset($input['estado']) ?>
					</div>

					<div class="form-group">
						<label for="situacao">Situa&ccedil;&atilde;o</label>
						<select name="situacao" class="form-control" id="situacao_form">
							@foreach(Obra::$situacao as $index => $value)
								<option value="{{$value}}" 
									<?php if(isset($input['situacao']) && $input['situacao'] == $value) echo 'selected="selected"' ?>
									>
									{{$value}}
								</option>
							@endforeach
						</select>

						<?php if(isset($input['situacao'])) unset($input['situacao']) ?>
					</div>

					@foreach($input as $index => $value)
						<input type="hidden" name="{{$index}}" value="{{$value}}">
					@endforeach

					<input type="submit" class="btn btn-default" value="Filtrar">
				</form>
			<div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				@if(count($obras) > 0)
		            @foreach($obras as $obra)
		            	<h4><a href="/obras/{{$obra->id}}">{{$obra->nome}}</a></h4>
		            	<span>{{$obra->estado->nome}}</span>
		            	<br><br>
		            @endforeach
	            @else
	            	<p>N&atilde;o h&aacute; obras cadastradas para o seu estado</p>
	            @endif
				
				<div class="pagination"> {{ $obras->links() }} </div>
			</div>
        </div>
    </div>
</section>
@stop