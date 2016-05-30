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

				<select name="status" id="">
					@foreach(Obra::$status as $index => $value)
						<option value="{{$index}}" 
							<?php if(isset($input['status']) && $input['status'] == $index) echo 'selected="selected"' ?>
							>
							{{$value}}
						</option>
					@endforeach
				</select>

				<?php if(isset($input['status'])) unset($input['status']) ?>
				
				@foreach($input as $index => $value)
					<input type="hidden" name="{{$index}}" value="{{$value}}">
				@endforeach

				<input type="submit">
			</form>

			@if(count($obras) > 0)
	            @foreach($obras as $obra)
	            	<h4><a href="/obras/{{$obra->id}}">{{$obra->nome}}</a></h4>
	            @endforeach
            @else
            	<p>N&atilde;o h&aacute; obras cadastradas para o seu estado</p>
            @endif
			
			<!-- Paginacao -->
			<!-- apenas alguns dados caso queira usar -->

			@if(count($obras) > 0)
	            <ul>
	            	<li>total: {{ $obras->count() }}</li>
	            	<li>total por pagina: {{ $obras->getPerPage() }} </li>
	            	<li>pagina atual: {{ $obras->getCurrentPage() }} </li>
	            	<li>ultima pagina: {{ $obras->getLastPage() }} </li>
	            </ul>
            @endif
        </div>
    </div>
</section>
@stop