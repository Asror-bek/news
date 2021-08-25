@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-right card">
                <a href="{{ route("contact.create") }}" class="btn btn-success">Создать</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card border-primary filterable">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" >
                            <tr>
                                <th>#</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th></th>
                            </tr>
                            @foreach ($contact as $val)
                            <tr>
                                <td>{{ $val->id }}</td>
                                <td>{{ $val->phone }}</td>
                                <td>{{ $val->address }}</td>
                                <td>{{ $val->email }}</td>
                                <th>
                                    <a href="{{route('contact.edit', $val->id)}}">update</a>
                                    <a href="{{route('contact.destroy', $val->id)}}">delete</a>
                                </th>
                            </tr>

                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
