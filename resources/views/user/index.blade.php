@extends('layouts.frontend')

@section('content')

@foreach ($news as $val )
    <div class="container">
        <div class="col">
            <div class="card shadow-sm">
                <img src="{{asset("storage/news/{$val->media}")}}" alt="">
                <div class="card-body">
                <p class="card-text">{{ $val->title}}</p>
                <p class="card-text">{{ $val->text}}</p>
                </div>
            </div>
        </div>
    </div>
@endforeach

@endsection
