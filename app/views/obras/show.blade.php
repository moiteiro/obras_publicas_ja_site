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
            <div class="fb-like" data-href="{{Request::url()}}" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>

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
    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=278225112566275&version=v2.0";
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
@stop