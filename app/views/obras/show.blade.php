@extends('layouts.application')

@section('facebook-opengraph')
    <meta property="fb:app_id"          content="278225112566275" /> 
    <meta property="og:type"            content="article" /> 
    <meta property="og:url"             content="{{Request::url()}}" /> 
    <meta property="og:title"           content="{{$obra->nome}}" /> 
@stop


@section('content')
<section>
    <div class="container">
        <div class="row">
        	<!-- Conserta isso ai, Caju!!! -->
        	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

            <div class="col-lg-12">
                <h2>{{$obra->nome}}</h2>
            </div>

            <div class="col-lg-12">
                <h4>Detalhes</h4>
                <ul>
                    <li>Estado: {{$obra->estado->nome}}</li>
                    <li>Valor: {{$obra->valor}}</li>
                    <li>In&iacute;cio do Projeto: {{$obra->dataInicio->format('m/Y')}}</li>
                    <li>T&eacute;rmino previsto: {{$obra->dataPrevisao->format('m/Y')}}</li>
                    @if ($obra->situacao == "concluída")
                        <li>Finalizado em: {{$obra->dataConclusao->format('m/Y')}}</li>
                    @endif
                </ul>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur volutpat, nunc luctus ultricies ullamcorper, mi dolor malesuada enim, nec vehicula augue lorem id lorem. Curabitur consectetur magna vel dolor cursus, vitae sodales ligula congue. Praesent ac diam leo. Nulla facilisi. Etiam rutrum ac eros eu blandit. Sed vel arcu leo. Phasellus in tellus ut nibh porttitor varius. Aliquam nulla ipsum, semper a gravida et, imperdiet non magna.
                </p>
                <p>
                    Fusce ultrices nisi vitae est tincidunt, quis tempor tortor feugiat. Sed a ornare mauris, vitae placerat mauris. Etiam tincidunt dapibus mi, non congue mi. Sed sagittis ullamcorper ligula a feugiat. Nunc sit amet risus ante. Morbi lacinia nibh mollis diam eleifend, eget interdum nulla consectetur. Nam ullamcorper cursus turpis vel luctus. Suspendisse efficitur ultricies metus, et pellentesque turpis porttitor id. Nullam bibendum magna hendrerit augue posuere tristique. Donec nulla mauris, luctus id tristique ut, rhoncus nec quam. Cras sed risus eget metus venenatis vehicula quis eget massa. Donec aliquam convallis eleifend. Morbi convallis pretium sapien finibus vestibulum. Sed ultricies aliquet risus, at porttitor orci egestas at. Aenean ullamcorper enim risus, a malesuada mauris consectetur eu. In ornare felis nibh, in dapibus nulla pellentesque sed.
                </p>
            </div>
        </div>
		
		<!-- progress bar -->
        <div class="row">
        	<div class="col-lg-12">
                
			<?php 

			$opacity = 1.0;
			if ($obra->situacao == 'concluída')
				$opacity = 0.40;
			?>

			<!-- Conserta isso ai, Caju!!! -->
        	<br><br><br><br><br>
			
			<div id="barra_de_progresso" style="width: 100%; height: 50px; background:gray; padding: 5px; opacity: {{$opacity}}">
				<div id="barra_previsto" style="width: {{$barra_de_progresso['blue_bar']}}%; height: 100%; background: blue; float: left;"></div>
				<div id="barra_atraso" style="width: {{$barra_de_progresso['red_bar']}}%; height: 100%; background: red; float: left;"></div>
			</div>
			<p>{{$barra_de_progresso['status']}}</p>

            </div>
        </div>
        
        <div class='project-social-links'>
            <div class="fb-share-button" data-href="{{Request::url()}}" data-layout="button_count" data-mobile-iframe="true"></div>

            <a href="https://twitter.com/share" class="twitter-share-button" data-lang="pt-br"></a>
        </div>

        <!-- Conserta isso ai, Caju!!! -->
        <br><br><br><br><br>

        <div class="row">
        	<div class="col-lg-12">
            	<div id="disqus_thread"></div>
        	</div>
        </div>        
    </div>
</section>

<!-- Facebook -->
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '278225112566275',
      xfbml      : true,
      version    : 'v2.6'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<!-- Twitter -->

<script>
    !function(d,s,id){
        var js,fjs=d.getElementsByTagName(s)[0];
        p=/^http:/.test(d.location)?'http':'https';
        if(!d.getElementById(id)){
            js=d.createElement(s);
            js.id=id;
            js.src=p+'://platform.twitter.com/widgets.js';
            fjs.parentNode.insertBefore(js,fjs);
        }
    }(document, 'script', 'twitter-wjs');
</script>

<!-- Disqus -->
<script>
var disqus_config = function () {
this.page.url = '<?php echo url() . "/obras/". $obra->id; ?>';
this.page.identifier = '<?php echo $obra->id; ?>';
};

(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');

s.src = '//obraspblicasj.disqus.com/embed.js';

s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
@stop