<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <style>
        body { font-family: 'Instrument Sans', sans-serif; background: #fdfdfc; }
        .container { max-width: 400px; margin: 60px auto; background: #fff; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 8px #0001; }
        .form-group { margin-bottom: 1rem; }
        label { display: block; margin-bottom: .5rem; }
        input { width: 100%; padding: .5rem; border: 1px solid #ccc; border-radius: 4px; }
        .btn { background: #f53003; color: #fff; border: none; padding: .75rem 1.5rem; border-radius: 4px; cursor: pointer; }
        .error { color: #f53003; margin-bottom: 1rem; }
        .link { margin-top: 1rem; display: block; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        @if ($errors->any())
            <div class="error">{{ $errors->first() }}</div>
        @endif
        <form method="POST" action="{{ url('/register') }}">
            @csrf
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="name" value="{{ old('name') }}" required autofocus>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <div class="form-group">
                <label>Konfirmasi Password</label>
                <input type="password" name="password_confirmation" required>
            </div>
            <button class="btn" type="submit">Register</button>
        </form>
        <a class="link" href="{{ route('login') }}">Sudah punya akun? Login</a>
    </div>
</body>
</html>
