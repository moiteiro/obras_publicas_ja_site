@extends('layouts.application')

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

        <!-- Conserta isso ai, Caju!!! -->
        <br><br><br><br><br>

        <div class="row">
        	<div class="col-lg-12">
            	<div id="disqus_thread"></div>
        	</div>
        </div>        
    </div>
</section>
<script>

var disqus_config = function () {
this.page.url = '<?php echo url() . "/obras"; ?>';
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