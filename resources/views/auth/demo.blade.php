<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{asset('css')}}/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Login</title>
</head>

<body>
    <div class="wrapper">
    <x-auth-session-status class="mb-4" :status="session('status')" />
        <form action="{{ route('login') }}" method="post">
        @csrf
            <h1>Login</h1>
            <div class="input-box">
                <input type="email" placeholder="Email" id="email" name="email" :value="old('email')" required autofocus autocomplete="username">
                <i class='bx bxs-user'></i>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div class="input-box">
                <input type="password" id="password" placeholder="Password" name="password" required autocomplete="current-password">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                <i class='bx bx-lock-alt' ></i>
            </div>
            <div class="remember-forgot">
                <label>
                    <input type="checkbox" id="remember_me" name="remember"> Remember me !
                </label>
                <a href="#">Forgot Password ?</a>
            </div>
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
            <button type="submit" class="btn">{{ __('Log in') }}</button>

            <div class="register-link">
                <p>Don't have an account? <a href="{{url('/admin/register')}}">Register</a></p>
            </div>
        </form>
    </div>
</body>
</html>