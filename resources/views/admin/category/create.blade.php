@extends('layouts.admin')

@section('content')

    <form action="{{ route("admin.category.store") }}" method="POST" >
        @csrf
        <div class="form-group">
            <label for="name" class="control-label">{{__('Название категории')}}</label>
            <div class="input-group input-ground-prepend">
                <span class="input-group-text border-right-0 rounded-0">
                    <i class="fa fa-fw fa-file-text-o"></i>
                </span>
                <input type="text" class="form-control" name="Name" id="Name" value="{{old("Name")}}" placeholder="{{__("Название категории")}}">
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="control-label">{{__('Описание категории')}}</label>
            <div class="input-group input-ground-prepend">
                <span class="input-group-text border-right-0 rounded-0">
                    <i class="fa fa-fw fa-file-text-o"></i>
                </span>
                <input type="text" class="form-control" name="Description" id="Description" value="{{old("Description")}}" placeholder="{{__("Описание категории")}}">
            </div>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-success">
        </div>



@endsection
