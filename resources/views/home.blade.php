
<html>
<head><meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://kit.fontawesome.com/fe2a9bc1c0.js" crossorigin="anonymous"></script>
</head>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card-body">
            <div id="app">
                <mainapp></mainapp>
            </div>
        </div>
  </div>   
</div>
@endsection
</html>