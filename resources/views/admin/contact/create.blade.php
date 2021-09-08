@extends('layouts.admin')

@section('content')
    @if($errors->any())
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
    @endif

    <form action="{{ route("admin.contact.store") }}" method="POST" >
        @csrf
        <div class="form-group">
            <label for="name" class="control-label">{{__('Номер телефона')}}</label>
            <div class="input-group input-ground-prepend">
                <span class="input-group-text border-right-0 rounded-0">
                    <i class="fa fa-fw fa-file-text-o"></i>
                </span>
                <input type="text" class="form-control" name="phone" id="phone" value="{{old("phone")}}" placeholder="{{__("Номер телефона")}}">
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="control-label">{{__('Адрес')}}</label>
            <div class="input-group input-ground-prepend">
                <span class="input-group-text border-right-0 rounded-0">
                    <i class="fa fa-fw fa-file-text-o"></i>
                </span>
                <input type="text" class="form-control" name="address" id="address" value="{{old("address")}}" placeholder="{{__("Адрес")}}">
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="control-label">{{__('Адрес электронной почты')}}</label>
            <div class="input-group input-ground-prepend">
                <span class="input-group-text border-right-0 rounded-0">
                    <i class="fa fa-fw fa-file-text-o"></i>
                </span>
                <input type="email" class="form-control" name="email" id="email" value="{{old("email")}}" placeholder="{{__("Адрес электронной почты")}}">
            </div>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-success">
        </div>



@endsection
