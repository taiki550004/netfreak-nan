
@extends('layouts.app')

@section('content')

@include('partials.navbar')
<div class="container mt-5">
<h1 class="py-5">{{$episode->title}}</h1>


@include($playerTemplate)


<a class="btn btn-info" href="{{url('/series/' .$episode->serie_id)}}">กลับ</a>
</div>
@endsection