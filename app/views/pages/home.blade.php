@extends('layouts.application')

@section('content')

<!-- Header -->
<header>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            	{{ HTML::image("/assets/img/logo.png", "Obras Públicas Já", ['class' => "img-responsive"]) }}
                <p>Acompanhe, comente, cobre<br>as obras públicas de seu estado</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-6 header-form">
                <form action="/obras" method="get">
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon icon-brasil"></span>
                        <input type="text" class="form-control" name="estado" placeholder="Um estado" aria-describedby="estado">
                    </div>
                </form>
            </div>
        </div>
    </div>
</header>

<!-- Mais Vistas Grid Section -->
<section class="obra-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 title-style text-center">
                <h2>Mais Vistas</h2>
                <div class="title-icon">
                    <hr><span class="icon-star"></span><hr>
                </div>
            </div>
        </div>
        <?php $index=0; ?>
        @foreach($obras_mais_vistas as $obra)
            @if ($index % 2 == 0)
                <div class="row">
            @endif
            <a href="/obras/{{$obra->id}}" class="obra-container">
                <div class="col-sm-6">
                    <div class="obra-uf">
                        <span class="icon-uf-{{strtolower($obra->estado->sigla)}}"></span>
                    </div>
                    <div class="obra-info">
                        <h4>{{$obra->nome}}</h4>
                        <p><span class="icon-brasil"></span> {{ $obra->estado->nome }}</p>
                        <p class="obra-value numeric"><span class="icon-money"></span>{{$obra->valor}}</p>
                        <div class="obra-social-counter">
                            <span><span class="icon-twitter"></span> {{$obra->twitterTotal}}</span>
                            <span><span class="icon-comment"></span> {{$obra->disqusTotal}}</span>                               
                        </div>
                    </div>
                </div>
            </a>
            @if ($index % 2 == 1)
                </div>
            @endif
            <?php $index++; ?>
        @endforeach
    </div>
</section>

@stop