@extends('layouts.frontend')

@section('content')
    <div class="container">
        <div class="col">
            <div class="card shadow-sm">
                <img src="{{asset("storage/news/{$news->Media}")}}" alt="">
                <div class="card-body">
                    <p class="card-text">{{ $news->Title}}</p>
                    <p class="card-text">{{ $news->Text}}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-user">
                    <div class="card-header">
                        <h5 class="card-title">Comment</h5>
                    </div>
                    <div class="card-body">
                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif

                        <form method="post" action="{{ route('admin.comment.store', $news->id)}}">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> Text </label>
                                        <input type="text" class="form-control @error('Text') is-invalid @enderror" placeholder="Text" name="Text">
                                        @error('Text')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="update ml-auto mr-auto">
                                        <button type="submit" class="btn btn-primary btn-round">Send</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($news->comments as $val )
                <h1>{{ $val->Text}}</h1>
            @endforeach
        </div>
    </div>


@endsection
