@extends('layouts.admin')

@section('content')
   @if($errors->any())
        @foreach($errors->all() as $error)
        <div class="alert alert-danger">{{$error}}</div>
        @endforeach
    @endif

<div class="row">
        <div class="col-lg-12">
            <div class="card border-primary filterable">
                <div class="card-header bg-success text-white">
                    <div class="card-title d-inline pull-left">
                        <i class="fa fa-fw fa-file-text-o"></i> <b>{{__('Редактировать новости')}}</b>
                    </div>
                </div>
                <br>
                <form action="{{ route("news.update", $news->id) }}" method="POST" >
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-lg-2 col-md-12 col-form-label  text-lg-right text-left">
                            {{__("Название новости")}}
                        </label>
                        <div class="col-lg-10 col-md-12">
                            <div class="input-group input-ground-prepend">
                                <span class="input-group-text border-right-0 rounded-0">
                                    <i class="fa fa-fw fa-file-text-o"></i>
                                </span>
                                <input type="text" class="form-control" name="title" id="title"  value="{{$news->title}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-lg-2 col-md-12 col-form-label  text-lg-right text-left">
                            {{__("Описание текст")}}
                        </label>
                        <div class="col-lg-10 col-md-12">
                            <div class="input-group input-ground-prepend">
                                <span class="input-group-text border-right-0 rounded-0">
                                    <i class="fa fa-fw fa-file-text-o"></i>
                                </span>
                                <input type="text" class="form-control" name="text" id="text"  value="{{$news->text}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="CategoryId" class="col-lg-2 col-md-12 col-form-label text-lg-right text-left">
                            {{__("Категория")}}
                        </label>
                        <div class="col-lg-10 col-md-12">
                            <select id="CategoryId" name="CategoryId" class="form-control select2" style="width:100%">
                                @foreach($category as $categories)
                                    <option value="{{$categories->id}}" {{$categories->id !== $news->CategoryId ?: "selected"}}>{{$categories->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="TagId" class="col-lg-2 col-md-12 col-form-label text-lg-right text-left">
                            {{__("Теги")}}
                        </label>
                        <div class="col-lg-10 col-md-12">
                            <select class="select2" name="TagId[]" class="form-control" multiple="multiple" style="width: 100%;">
                                @foreach ($tags as $tag )
                                    <option value="{{ $tag->id}}"  >{{ $tag->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="offset-lg-2 pull-right">
                            <button type="submit" class="btn btn-primary">{{__("Сохранить")}}</button>
                        </div>
                    </div>
            </div>
        </div>
    </div>

@endsection
