@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-right card">
                <a href="{{ route("category.create") }}" class="btn btn-success">Создать</a>
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
                                <th>Name</th>
                                <th>Description</th>
                                <th></th>
                            </tr>
                            @foreach ($category as $val)
                            <tr>
                                <td>{{ $val->id }}</td>
                                <td>{{ $val->name }}</td>
                                <td>{{ $val->description }}</td>
                                <th>
                                    <a href="{{route('category.edit', $val->id)}}">update</a>
                                    <a href="{{route('category.destroy', $val->id)}}">delete</a>
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
