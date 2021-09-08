@extends('layouts.frontend')

@section('content')

@foreach ($aboutUs as $val)
    <div class="row">
        <div class="col-lg-5">
            <img class="img-fluid rounded z-depth-2" src="{{asset("storage/about-us/{$val->media}")}}">
        </div>
        <div class="col-lg-7">
            <p class="mt-4 mt-lg-0">{{ $val->text }}</p>
        </div>
    </div>
@endforeach

{{-- <div class="content">
    <div class="row">
    <div class="col-md-12">
        <div class="card card-user">
        <div class="card-header">
            <h5 class="card-title">FeedBack</h5>
        </div>
        <div class="card-body">
            @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
            @endif

        <form method="post" action="{{ route('user.aboutUs.saveFeedBack')}}">
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-12">
                <div class="form-group">
                    <label> Text </label>
                    <input type="text" class="form-control @error('text') is-invalid @enderror" placeholder="Text" name="text">
                    @error('text')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label> Email </label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label> Title </label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Title" name="title">
                    @error('subject')
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
            </form>
        </div>
        </div>
    </div>
    </div>
</div> --}}

@endsection
