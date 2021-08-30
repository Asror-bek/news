@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="pull-right card">
                <a href="{{ route("comment.create") }}" class="btn btn-success">Создать</a>
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
                                <th>Text</th>
                                <th>News</th>
                                <th></th>
                            </tr>
                            @foreach ($comment as $val)
                            <tr>
                                <td>{{ $val->id }}</td>
                                <td>{{ $val->text }}</td>
                                <td>{{ $val->news->title }}</td>
                                <th>
                                    <a href="{{route('comment.edit', $val->id)}}">update</a>
                                    <a href="{{route('comment.destroy', $val->id)}}">delete</a>
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
