@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card border-primary filterable">
                <div class="card-header bg-success text-white">
                    <div class="card-title d-inline pull-left">
                        <i class="fa fa-fw fa-file-text-o"></i> <b>{{__('Редактировать контакты')}}</b>
                    </div>
                </div>
                <br>
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">
                            {{$error}}
                        </div>
                    @endforeach
                @endif
                <form action="{{ route("contact.update", $contact->id) }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-lg-2 col-md-12 col-form-label  text-lg-right text-left">
                            {{__("Номер телефона")}}
                        </label>
                        <div class="col-lg-10 col-md-12">
                            <div class="input-group input-ground-prepend">
                                <span class="input-group-text border-right-0 rounded-0">
                                    <i class="fa fa-fw fa-file-text-o"></i>
                                </span>
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="{{__("Номер телефона")}}" value="{{$contact->phone}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-lg-2 col-md-12 col-form-label  text-lg-right text-left">
                            {{__("Адрес")}}
                        </label>
                        <div class="col-lg-10 col-md-12">
                            <div class="input-group input-ground-prepend">
                                <span class="input-group-text border-right-0 rounded-0">
                                    <i class="fa fa-fw fa-file-text-o"></i>
                                </span>
                                <input type="text" class="form-control" name="address" id="address" placeholder="{{__("Адрес")}}" value="{{$contact->address}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-lg-2 col-md-12 col-form-label  text-lg-right text-left">
                            {{__("Адрес электронной почты")}}
                        </label>
                        <div class="col-lg-10 col-md-12">
                            <div class="input-group input-ground-prepend">
                                <span class="input-group-text border-right-0 rounded-0">
                                    <i class="fa fa-fw fa-file-text-o"></i>
                                </span>
                                <input type="email" class="form-control" name="email" id="email" placeholder="{{__("Адрес электронной почты")}}" value="{{$contact->email}}">
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
