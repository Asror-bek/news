@extends('layouts.admin')

@section('header_styles')

<link rel="stylesheet" href="{{asset('css/insignia.css')}}">
<link rel="stylesheet" href="{{asset('css/insignia_custom.css')}}">

@endsection

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
                <form action="{{ route("admin.news.update", $news->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="Name" class="col-lg-2 col-md-12 col-form-label  text-lg-right text-left">
                            {{__("Название новости")}}
                        </label>
                        <div class="col-lg-10 col-md-12">
                            <div class="input-group input-ground-prepend">
                                <span class="input-group-text border-right-0 rounded-0">
                                    <i class="fa fa-fw fa-file-text-o"></i>
                                </span>
                                <input type="text" class="form-control" name="Title" id="Title"  value="{{$news->Title}}">
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
                                <input type="text" class="form-control" name="Text" id="Text"  value="{{$news->Text}}">
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
                                    <option value="{{$categories->id}}" {{$categories->id !== $news->CategoryId ?: "selected"}}>{{$categories->Name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for='ty' class="col-lg-2 col-md-12 col-form-label  text-lg-right text-left">
                            {{__("Теги")}}
                        </label>
                        <div class="col-lg-10 col-md-12">
                            <div class='input tags-input-block'>
                                <input type="text" id="tags-input" name="TagId">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Media" class="col-lg-2 col-md-12 col-form-label text-lg-right text-left">
                            {{__("Медиа")}}
                        </label>
                        <div class="col-lg-10 col-md-12">
                            <div class="input-group input-ground-prepend">
                                <span class="input-group-text border-right-0 rounded-0">
                                    <i class="fa fa-fw fa-file-text-o"></i>
                                </span>
                                <input type="file" class="form-control" name="Media" id="Media">
                            </div>
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

@section('footer-scripts')

<script src="{{asset('js/insignia.js')}}"></script>
<script src="{{asset('js/insignia_custom.js')}}"></script>
<script type="text/javascript">
    'use strict';
    void function () {
        let input = document.querySelector("#tags-input");
        let tagInput = insignia(input);
        let tags = '{!!json_encode($news->tags->pluck("Name")->toArray())!!}';
        tags = JSON.parse(tags);
        for(let i=0; i<tags.length; i++) {
            tagInput.addItem(tags[i]);
        }
    }();
</script>
<script>
    var custom = "";
    $(function() {
        $("form").submit(function(e) {
            let thisElem = $(this);
            let tagsBlock = $(".tags-input-block");
            tagsBlock.children("span:first-child").children().each(function() {
                thisElem.append(`<input name="TagId[]" type="hidden" value="${$(this).text()}">`);
            });
        });
    });
</script>

@endsection
