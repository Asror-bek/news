@extends('layouts.admin')

@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
        <div class="alert alert-danger">{{$error}}</div>
        @endforeach
    @endif

    <form action="{{ route("aboutUs.store") }}" method="POST" enctype="multipart/form-data" autocomplete="off">
        @csrf
        <div class="form-group">
            <label for="image" class="control-label"> </label>
                <input type="file" name="media" id="media" class="dropify"
                       data-allowed-file-extensions="jpg jpeg png mp4"/>
        </div>
        <div class="form-group">
            <label for="name" class="control-label">{{__('Описание текст')}}</label>
            <div class="input-group input-ground-prepend">
                <span class="input-group-text border-right-0 rounded-0">
                    <i class="fa fa-fw fa-file-text-o"></i>
                </span>
                <textarea type="text"  name="text" id="text" value="{{old("text")}}" style="width:300px; height:200px" placeholder="{{__("Описание текст")}}"></textarea>
            </div>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-success">
        </div>



@endsection
