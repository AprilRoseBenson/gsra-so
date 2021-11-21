@extends('layouts.app')

@section('content')



    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">


    <body style="background-color: cornsilk">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">

                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Forgot Password</h1>
                                </div>

                                <form method="POST" action="{{ route('forgotpassword') }}" aria-label="{{ __('Forgot Password') }}" class="user" >

                                    @csrf
                                        @if(session('success'))
                                         <div class="alert alert-success" role="alert">
                                         {{session('success')}}
                                         </div>
                                    @endif

                                @csrf

                                    <div class="form-group">

                                        <input id="email" type="email" class="form-control form-control-user{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                            name="email" value="{{ old('email') }}" required autofocus
                                             aria-describedby="emailHelp"
                                            placeholder="Enter Email Address...">

                                            @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                                    </div>

                                    <div class="form-group">
                                        <input id="password"  type="password" class="form-control form-control-user{{ $errors->has('password') ? ' is-invalid' : '' }}" name="newpassword" required
                                            placeholder="Enter your new Password">

                                            @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                                    </div>





                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                    {{ __('Reset Password') }}
                                     </button>





                                </form>
                                <hr>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

</body>

@endsection