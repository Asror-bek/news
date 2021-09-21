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

    <form action="{{ route("admin.news.store") }}" method="POST" enctype="multipart/form-data" autocomplete="off">
        @csrf
        <div class="form-group">
            <label for="name" class="control-label">{{__('Название новости')}}</label>
            <div class="input-group input-ground-prepend">
                <span class="input-group-text border-right-0 rounded-0">
                    <i class="fa fa-fw fa-file-text-o"></i>
                </span>
                <input type="text" class="form-control"  name="Title" id="Title" value="{{old("Title")}}" placeholder="{{__("Название новости")}}">
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="control-label">{{__('Описание текст')}}</label>
            <div class="input-group input-ground-prepend">
                <span class="input-group-text border-right-0 rounded-0">
                    <i class="fa fa-fw fa-file-text-o"></i>
                </span>
                <textarea type="text"  name="Text" id="Text" value="{{old("Text")}}" style="width:300px; height:200px" placeholder="{{__("Описание текст")}}"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="CategoryId" class="control-label">{{__("Категория")}}</label>
            <select id="CategoryId" name="CategoryId" class="form-control select2" style="width:100%">
                <option selected disabled>{{__("Выберите категория")}}...</option>
                @foreach($category as $categories)
                    <option value="{{$categories->id}}">{{$categories->Name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tags">Теги</label>
            <div class='input tags-input-block'>
                <input type="text" id='ty' name="TagId">
            </div>

        </div>
        <div class="form-group">
            <label for="image" class="control-label"> </label>
                <input type="file" name="Media" id="Media" class="dropify"
                       data-allowed-file-extensions="jpg jpeg png mp4"/>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-success">
        </div>
    </form>

@endsection

@section('footer-scripts')

<script src="{{asset('js/insignia.js')}}"></script>
<script src="{{asset('js/insignia_custom.js')}}"></script>
<script type="text/javascript">
        'use strict';

        void function () {

            insignia(ty);

            function events (el, type, fn) {
                if (el.addEventListener) {
                    el.addEventListener(type, fn);
                } else if (el.attachEvent) {
                    el.attachEvent('on' + type, wrap(fn));
                } else {
                    el['on' + type] = wrap(fn);
                }
                function wrap (originalEvent) {
                    var e = originalEvent || global.event;
                    e.target = e.target || e.srcElement;
                    e.preventDefault  = e.preventDefault  || function preventDefault () { e.returnValue = false; };
                    e.stopPropagation = e.stopPropagation || function stopPropagation () { e.cancelBubble = true; };
                    fn.call(el, e);
                }
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
