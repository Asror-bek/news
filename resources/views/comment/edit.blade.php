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
                        <i class="fa fa-fw fa-file-text-o"></i> <b>{{__('Редактировать комментарий')}}</b>
                    </div>
                </div>
                <br>
                <form action="{{ route("comment.update", $comment->id) }}" method="POST" >
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-lg-2 col-md-12 col-form-label  text-lg-right text-left">
                            {{__("Описание текст")}}
                        </label>
                        <div class="col-lg-10 col-md-12">
                            <div class="input-group input-ground-prepend">
                                <span class="input-group-text border-right-0 rounded-0">
                                    <i class="fa fa-fw fa-file-text-o"></i>
                                </span>
                                <input type="text" class="form-control" name="text" id="text"  value="{{$comment->text}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="NewsId" class="col-lg-2 col-md-12 col-form-label text-lg-right text-left">
                            {{__("Категория")}}
                        </label>
                        <div class="col-lg-10 col-md-12">
                            <select id="NewsId" name="NewsId" class="form-control select2" style="width:100%">
                                @foreach($news as $new)
                                    <option value="{{$new->id}}" {{$new->id !== $comment->NewsId ?: "selected"}}>{{$new->title}}</option>
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
