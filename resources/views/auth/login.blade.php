
<!DOCTYPE html>
<html>
<head>
    <title>Login - Publisher Supplier</title>
    <style>
        body {
            font-family: Arial;
            background: #f1f5f9;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            background: white;
            padding: 30px;
            width: 350px;
            border-radius: 12px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 12px;
            background: #2563eb;
            color: white;
            border: none;
            cursor: pointer;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Login</h2>
    <p>Publisher & Supplier Management</p>

    @if ($errors->any())
        <div class="error">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf

        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <label>
            <input type="checkbox" name="remember" value="1" style="width:auto">
            Remember me
        </label>

        <button type="submit">Login</button>
    </form>

    <p>Don't have an account?
        <a href="{{ route('register') }}">Register</a>
    </p>
</div>
</body>
</html>
