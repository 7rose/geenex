@extends('nav')

@section('content')

<div class="row top-pad"></div>
<div class="row top-pad"></div>
<section>
    <div class="container">
        <div class="col-sm-5 cent">
          <div class="alert alert-info">
              <h1><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></h1>
            {{ $text }}
          </div>
        </div>
    </div>
</section>
<div class="row top-pad"></div>
<div class="row top-pad"></div>
@endsection