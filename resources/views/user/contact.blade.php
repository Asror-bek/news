@extends('layouts.frontend')

@section('content')
    {{-- <div class="container">
        @foreach ($contact as $val)
            <p>{{ $val->phone }}</p>
            <p>{{ $val->address }}</p>
            <p>{{ $val->email }}</p>
        @endforeach
    </div> --}}
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<div class="container">
    <h2 class="text-center">Contact Form</h2>
	<div class="row justify-content-center">
		<div class="col-12 col-md-8 col-lg-6 pb-5">


                    <!--Form with header-->

                    <form action="mail.php" method="post">
                        <div class="card border-primary rounded-0">
                            <div class="card-header p-0">
                                <div class="bg-info text-white text-center py-2">
                                    <h3><i class="fa fa-envelope"></i> Contact</h3>
                                </div>
                            </div>
                            <div class="card-body p-3">

                                <!--Body-->
                                @foreach ($contact as $val)
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-address-card"></i></div>
                                        </div>
                                        <input type="text" class="form-control" value="{{ $val->address }}"  >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-envelope-square"></i></div>
                                        </div>
                                        <input type="email" class="form-control" value="{{ $val->email }}" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-phone"></i></div>
                                        </div>
                                        <input  class="form-control" value="{{ $val->phone }}" >
                                    </div>
                                </div>
                                @endforeach

                            </div>

                        </div>
                    </form>
                    <!--Form with header-->


                </div>
	</div>
</div>
@endsection


