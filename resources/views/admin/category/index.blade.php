@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-right card">
                <a href="{{ route("admin.category.create") }}" class="btn btn-success">Создать</a>
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
                                <td>{{ $val->Name }}</td>
                                <td>{{ $val->Description }}</td>
                                <th>
                                    <a href="{{route('admin.category.edit', $val->id)}}"><i class="fas fa-edit"></i></a>
                                    <a href="{{route('admin.category.destroy', $val->id)}}"><i class="fas fa-trash-alt"></i></a>
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
