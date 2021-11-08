<!doctype html>
<html lang="id">
<head>
    <title>Login | PERPUSTAKAAN SD</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('dist/login/css/style.css') }}">
</head>

<body class="img js-fullheight"
      style="background-image: url(https://unsplash.com/photos/mmWqrsjZ4Lw/download?ixid=MnwxMjA3fDB8MXx0b3BpY3x8MjFhcGMzVFVFVm98fHx8fDJ8fDE2MzYzMjI3MTk&force=true&w=2400);">
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">Login Perpustakaan</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="login-wrap p-0">
                    <h3 class="mb-4 text-center">Masuk</h3>
                    <form action="{{ route('auth.post.login') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" name="username"
                                   class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}"
                                   placeholder="Username" required>
                        </div>
                        @if($errors->has('username'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('username') }}</strong>
                            </div>
                        @endif
                        <div class="form-group">
                            <input id="password-field" name="password" type="password"
                                   class="form-control  {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                   placeholder="Password"
                                   required>
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        </div>
                        @if($errors->has('password'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </div>
                        @endif
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
                        </div>
                        <div class="form-group d-md-flex">
                            <div class="w-50">
                                <label class="checkbox-wrap checkbox-primary">Ingat Saya
                                    <input name="remember" id="remember" type="checkbox" checked>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="{{ asset('dist/login/js/jquery.min.js') }}"></script>
<script src="{{ asset('dist/login/js/popper.js') }}"></script>
<script src="{{ asset('dist/login/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('dist/login/js/main.js') }}"></script>
</body>
</html>

