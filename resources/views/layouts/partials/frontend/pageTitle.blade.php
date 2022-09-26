<!-- page title -->
<div class="row bg-dark-cu page-title">
    <div class="col-md-12 page-titles">
        @php
            $current = explode('/',$_SERVER['REQUEST_URI']);
            if (is_numeric($current[count($current)-1])){
               $cuName = $current[ count($current)-2];
               $uri = $current[ count($current)-2].'/'.$current[count($current)-1];
            }else{
               $cuName = $current[count($current)-1];
               $uri = $current[ count($current)-1];
            }
        @endphp
        <a href="{{url('/')}}">home</a>
        <a href="{{url('/'.$uri)}}">{{$cuName}}</a>
    </div>
</div> <!-- page title end -->
