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

			<form action="">
				<label for="estado_form">Estado</label>
				<select name="estado" id="estado_form">
					<option value="todos">Todos</option>
					@foreach($estados as $estado)
						<option value="{{$estado->nome}}" 
							<?php if(isset($input['estado']) && $input['estado'] == $estado->nome) echo 'selected="selected"' ?>
							>
							{{$estado->nome}}
						</option>
					@endforeach
				</select>
				<?php if(isset($input['estado'])) unset($input['estado']) ?>

				<label for="situacao">Situa&ccedil;&atilde;o</label>
				<select name="situacao" id="situacao_form">
					@foreach(Obra::$situacao as $index => $value)
						<option value="{{$index}}" 
							<?php if(isset($input['situacao']) && $input['situacao'] == $index) echo 'selected="selected"' ?>
							>
							{{$value}}
						</option>
					@endforeach
				</select>
				<?php if(isset($input['situacao'])) unset($input['situacao']) ?>
				
				@foreach($input as $index => $value)
					<input type="hidden" name="{{$index}}" value="{{$value}}">
				@endforeach

				<input type="submit" value="Filtrar">
			</form>

			@if(count($obras) > 0)
	            @foreach($obras as $obra)
	            	<h4><a href="/obras/{{$obra->id}}">{{$obra->nome}}</a></h4>
	            	<span>{{$obra->estado->nome}}</span>
	            	<br><br>
	            @endforeach
            @else
            	<p>N&atilde;o h&aacute; obras cadastradas para o seu estado</p>
            @endif
			
			<!-- Paginacao -->
			<!-- apenas alguns dados caso queira usar -->

			<div class="pagination"> {{ $obras->links() }} </div>
        </div>
    </div>
</section>
@stop