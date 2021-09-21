@extends('layouts.frontend')


@section('navbar')

<ul>
    <li><a href="{{route('frontend.news.index')}}">All </a></li>
    @foreach ($categories as $category )
        <li><a href="{{route('frontend.news.index', ['filter' => $category->id])}}">{{ $category->Name}}</a></li>
    @endforeach
</ul>

@endsection

@section('content')

@foreach ($news as $val )
    <a href="{{ route('admin.news.show', $val->id)}} ">
        <div class="container">
            <div class="col">
                <div class="card shadow-sm">
                    <img src="{{asset("storage/news/{$val->Media}")}}" alt="">
                    <div class="card-body">
                    <p class="card-text">{{ $val->Title}}</p>
                    <p class="card-text">{{ $val->Text}}</p>
                    </div>
                </div>
            </div>
        </div>
    </a>
@endforeach

@endsection
