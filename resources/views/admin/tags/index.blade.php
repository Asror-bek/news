@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-right card">
                <a href="{{ route("admin.tags.create") }}" class="btn btn-success">Создать</a>
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
                                <th></th>
                            </tr>
                            @foreach ($tags as $val)
                            <tr>
                                <td>{{ $val->id }}</td>
                                <td>{{ $val->name }}</td>
                                <th>
                                    <a href="{{route('admin.tags.edit', $val->id)}}"><i class="fas fa-edit"></i></a>
                                    <a href="{{route('admin.tags.destroy', $val->id)}}"><i class="fas fa-trash-alt"></i></a>
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
