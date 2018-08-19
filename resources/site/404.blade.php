@extends('site.layout')
	@section('content')
	<section class="content-wrapper">
    <div class="container">
      <div class="std">
        <div class="page-not-found">
          <h2>404</h2>
          <h3><img src="{{ asset('source/bower_components/library/site/version4/images/signal.png') }}">Oops! The Page you requested was not found!</h3>
          <div><a href="{{ route('site.home.index') }}" type="button" class="btn-home"><span>Back To Home</span></a></div>
        </div>
      </div>
    </div>
  	</section>
	@endsection