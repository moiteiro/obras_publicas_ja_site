@extends('layouts.application')

@section('facebook-opengraph')
    <meta property="fb:app_id"          content="278225112566275" /> 
    <meta property="og:type"            content="article" /> 
    <meta property="og:url"             content="{{Request::url()}}" /> 
    <meta property="og:title"           content="{{$obra->nome}}" /> 
@stop


@section('content')
<section class="default-section">
    <div class="container">

        <div class="row">
            <div class="col-lg-12 title-style text-center">
                <h2>Dados da Obra</h2>
                <div class="title-icon">
                    <hr><span class="icon-marker"></span><hr>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-12">
                <h2><span class="icon-text"></span> {{$obra->nome}}</h2>
            </div>

            <div class="col-lg-12 obra-detail">
                <h4>Detalhes</h4>
                <ul>
                    <li><span class="icon-brasil"></span> Estado: {{$obra->estado->nome}}</li>
                    <li><span class="icon-money"></span> Valor: {{$obra->valor}}</li>
                    <li><span class="icon-calendar"></span> In&iacute;cio do Projeto: {{$obra->data_contrato}}</li>

                    <li><span class="icon-calendar"></span> Tempo previsto: {{$obra->data_inicio}} dias</li>
                    {{-- @if ($obra->situacao == "concluída")
                        <li><span class="icon-calendar"></span> Finalizado em: {{$obra->dataConclusao->format('m/Y')}}</li>
                    @endif --}}
                </ul>
            </div>
        </div>
		
		<!-- progress bar -->
        <div class="row">
        	<div class="col-lg-12">
                
			<?php 

			$opacity = 1.0;
			if ($obra->situacao == 2)
				$opacity = 0.40;
            else if ($obra->situacao == 4)
                $opacity = 0.0;
			?>
            
             <div class="title-style text-center">
                @if ($obra->situacao == 2)
                    <h2>Obra Conclu&iacute;da</h2>
                @elseif ($obra->situacao == 4)
                    <h2>Contrato rescindido</h2>
                @else
                    <h2>Evolução da Obra</h2>
                @endif

                <div class="title-icon">
                    <hr><span class="icon-hourglass"></span><hr>
                </div>
            </div>           
			
			<div id="barra_de_progresso" style="width: 70%; height: 40px; background:gray; margin:auto; padding: 5px; opacity: {{$opacity}}">
				<div id="barra_previsto" style="width: {{$barra_de_progresso['blue_bar']}}%; height: 100%; background: blue; float: left;"></div>
				<div id="barra_atraso" style="width: {{$barra_de_progresso['red_bar']}}%; height: 100%; background: red; float: left;"></div>
			</div>

            </div>
        </div>
        
        <div class='project-social-links'>
            <div class="fb-share-button" data-href="{{Request::url()}}" data-layout="button_count" data-mobile-iframe="true"></div>

            <a href="https://twitter.com/share" class="twitter-share-button" data-lang="pt-br"></a>
        </div>

        <div class="row">
        	<div class="col-lg-12">
            	<div id="disqus_thread"></div>
        	</div>
        </div>        
    </div>
</section>

@stop