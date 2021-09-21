@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="pull-right card">
                <a href="{{ route("admin.news.create") }}" class="btn btn-success">Создать</a>
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
                                <th>Title</th>
                                <th>Text</th>
                                <th>Category</th>
                                <th></th>
                            </tr>
                            @foreach ($news as $val)
                            <tr>
                                <td>{{ $val->id }}</td>
                                <td>{{ $val->Title }}</td>
                                <td>{{ $val->Text }}</td>
                                <td>{{ $val->category->Name }}</td>
                                <th>
                                    <a href="{{route('admin.news.edit', $val->id)}}"><i class="fas fa-edit"></i></a>
                                    <a href="{{route('admin.news.destroy', $val->id)}}"><i class="fas fa-trash-alt"></i></a>
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
