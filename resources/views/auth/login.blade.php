
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
<style>
    /* Global Styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Arial', sans-serif;
}

body {
    background: #f5f5f5;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    height: 100vh;
    text-align: center;
}

/* Heading Styles */
.heading {
    margin-top: 20px!important;
    margin-bottom: 1px;
}

.heading h1 {
    font-size: 36px;
    color: #333;
    margin-bottom: 5px;
}

.heading p {
    font-size: 18px;
    color: #777;
}

/* Login Container */
.login-container {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100%;
}

/* Login Box */
.login-box {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 15px 30px rgba(0, 0, 0, 0.1);
    text-align: center;
    width: 300px;
}

/* Title */
h2 {
    color: #4c4c6c;
    margin-bottom: 20px;
}

/* Textbox Styles */
.textbox {
    margin: 20px 0;
    position: relative;
}

.textbox input {
    width: 100%;
    padding: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    outline: none;
    transition: border-color 0.3s ease;
}

.textbox input:focus {
    border-color: #4caf50;
}

/* Button Styles */
.btn {
    width: 100%;
    padding: 15px;
    background-color: #4caf50;
    border: none;
    color: white;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    margin-bottom: 10px!important;
}
/* Register Link Styling */
.register-link {
    color: #4caf50;
    text-decoration: none;
    font-weight: bold;

}

.btn:hover {
    background-color: #45a049;
}
.text_message
{
    color: red!important;
}

</style>
<body>

    <div class="heading">
        <h2>Welcome to Our Smart Expense Tracker Platform</h2>
        <p>Login to your account to continue</p>
    </div>
    @if ($errors->any())
            <div class="text_message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif

    <div class="login-container">
        <div class="login-box">
            <h2>Login</h2>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="textbox">
                    <input type="email" placeholder="Username" name="email" required>
                </div>
                <div class="textbox">
                    <input type="password" placeholder="Password" name="password" required>
                </div>
                <input type="submit" class="btn" value="Login">
            </form>
            <p>Don't have an account? <a href="{{ route('register') }}" class="register-link">Register here</a></p>
        </div>

    </div>

</body>
</html>
{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
