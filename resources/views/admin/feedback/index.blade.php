@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card border-primary filterable">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" >
                            <tr>
                                <th>Title</th>
                                <th>Email</th>
                                <th>Text</th>
                            </tr>
                            @foreach ($feedback as $val)
                            <tr>
                                <td>{{ $val->Title }}</td>
                                <td>{{ $val->Email }}</td>
                                <td>{{ $val->Text }}</td>
                            </tr>

                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
