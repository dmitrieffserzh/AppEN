@extends('admin.login')

@section('content')

    <form class="form-signin shadow-lg" method="POST" action="{{ route('admin.login.submit') }}">
        @csrf

        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-power">
            <path d="M18.36 6.64a9 9 0 1 1-12.73 0"></path>
            <line x1="12" y1="2" x2="12" y2="12"></line>
        </svg>


        <h1 class="h1">Панель управления</h1>
        <label for="email" class="sr-only">{{ __('E-Mail') }}</label>
        <input type="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
               value="{{ old('email') }}" placeholder="Email" required="" autofocus="">

        @if ($errors->has('email'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif

        <label for="password" class="sr-only">{{ __('Пароль') }}</label>
        <input type="password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
               name="password" placeholder="Пароль" required="">

        @if ($errors->has('password'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif

        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Не выходить из системы') }}
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">{{ __('Войти') }}</button>
        <a href="{{ route('home') }}" class="d-block mt-2 text-primary small">Вернуться на сайт</a>
    </form>
@endsection
