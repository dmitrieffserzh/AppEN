@extends('admin.login')

@section('content')

    <form class="form-signin shadow-lg" method="POST" action="{{ route('admin.login.submit') }}">
        @csrf

        <h1>Admin Panel</h1>
        <label for="email" class="sr-only">{{ __('E-Mail Address') }}</label>
        <input type="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
               value="{{ old('email') }}" placeholder="Email address" required="" autofocus="">

        @if ($errors->has('email'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif

        <label for="password" class="sr-only">{{ __('Password') }}</label>
        <input type="password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
               name="password" placeholder="Password" required="">

        @if ($errors->has('password'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif

        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">{{ __('Login') }}</button>
    </form>
@endsection
