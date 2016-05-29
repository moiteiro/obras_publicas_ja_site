@extends('layouts.application')

@section('content')

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 title-style text-center">
                <h2>{{$obra->nome}}</h2>
            </div>
        </div>
        <div id="disqus_thread"></div>
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