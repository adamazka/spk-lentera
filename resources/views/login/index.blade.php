@extends('login.main')
@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="/auth/images/res-logo.webp" alt="Image" class="img-fluid" style="width: 450px; height: 450px">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h3 class="mt-5">Login</h3>
                                <p class="mb-4">Login dengan username dan password.</p>
                            </div>
                            @error('loginError')
                                <div class="alert alert-danger alert-bordered"><button class="close" data-dismiss="alert"
                                        aria-label="Close">×</button><strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            <form action="/login" method="post">
                                @csrf
                                <div class="form-group first">
                                    <label for="username">username</label>
                                    <input name="username" type="text" class="form-control" id="username"
                                        value="{{ old('username') }}">
                                </div>
                                <div class="form-group
                                        last mb-2">
                                    <label for="password">Password</label>
                                    <input name="password" type="password" class="form-control" id="password"
                                        value="{{ old('password') }}">
                                </div>
                                <div style="margin: 5px 0px;">
                                    <input type="checkbox" onclick="showPassword()">
                                    <span class="text-secondary">Lihat Password</span>
                                </div>
                                <input type="submit" value="Login" class="btn btn-block btn-login">
                            </form>
                            {{-- <div class="mt-3 align-items-center">
                                <span class="ml-auto"><a href="#" class="forgot-pass">Lupa Password</a></span>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .btn-login {
            color: white;
            background-color: #F39C12;
        }

        .btn-login:hover {
            color: white;
            background-color: #E67E22;
        }
    </style>
@endsection
@push('scripts')
    {{-- @include('sweetalert') --}}
    @include('template.sweetalert')
    <script>
        $().alert('close');
    </script>
    <script>
        function showPassword() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
@endpush
