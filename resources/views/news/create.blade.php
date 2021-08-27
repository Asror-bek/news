@extends('layouts.admin')

@section('content')

@if($errors->any())
        @foreach($errors->all() as $error)
        <div class="alert alert-danger">{{$error}}</div>
        @endforeach
    @endif

    <form action="{{ route("news.store") }}" method="POST" enctype="multipart/form-data" autocomplete="off">
        @csrf
        <div class="form-group">
            <label for="name" class="control-label">{{__('Название новости')}}</label>
            <div class="input-group input-ground-prepend">
                <span class="input-group-text border-right-0 rounded-0">
                    <i class="fa fa-fw fa-file-text-o"></i>
                </span>
                <input type="text" class="form-control"  name="title" id="title" value="{{old("title")}}" placeholder="{{__("Название новости")}}">
            </div>
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
            <label for="CategoryId" class="control-label">{{__("Категория")}}</label>
            <select id="CategoryId" name="CategoryId" class="form-control select2" style="width:100%">
                <option selected disabled>{{__("Выберите категория")}}...</option>
                @foreach($category as $categories)
                    <option value="{{$categories->id}}">{{$categories->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Теги</label>
            <select class="select2" name="TagId[]" multiple="multiple" data-placeholder="Выбирите теги" style="width: 100%;">
                @foreach ($tags as $tag )
                    <option value="{{ $tag->id}}">{{ $tag->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="image" class="control-label"> </label>
                <input type="file" name="media" id="media" class="dropify"
                       data-allowed-file-extensions="jpg jpeg png mp4"/>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-success">
        </div>


@endsection
