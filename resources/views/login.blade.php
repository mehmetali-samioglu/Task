<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Limonist Task</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.css"/>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>

<body>
    <div class="text-center login-panel">
        <main class="login">
            <form action="{{ route('login.post',app()->getLocale())}}" method="POST">
                @csrf
                <img src="{{ asset('assets') }}/img/logo/logo-act.png" alt="Limonist" title="Limonist" alt="" class="mb-4">
                <h1 class="login-text">{{ __('general.login') }}</h1>
                <div class="login-description">{{ __('general.login_description') }}</div>
                <input type="e-mail" placeholder="{{ __('general.email_placeholder') }}" class="form-control email mb-2 " name="email" value="{{old('email')}}" autofocus required>
                @error('email') <span style="" class="badge bg-danger mb-3">{{$message}}</span> @enderror
                <input type="password" placeholder="{{ __('general.password_placeholder') }}" class="form-control password mb-2" name="password" required>
                @error('password') <span class="badge bg-danger ">{{$message}}</span> @enderror
                <div class="forgot text-start mb-3">
                    <a href="#" class="text-reset text-decoration-none">{{ __('general.forgot') }}</a>
                </div>
                <button class="btn btn-success login-button px-4">{{ __('general.login_button') }}</button>
            </form>
        </main>
    </div>

    <script src="{{ asset('assets') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets') }}/js/script.js"></script>

</body>

</html>
