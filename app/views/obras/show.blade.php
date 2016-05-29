@extends('layouts.application')

@section('content')

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 title-style text-center">
                <h2>{{$obra->nome}}</h2>
            </div>
        </div>
    </div>
    {{$obra}}
</section>
@stop