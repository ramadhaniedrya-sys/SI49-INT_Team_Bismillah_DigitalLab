
<!DOCTYPE html>
<html>
<head>
    <title>Register - Publisher Supplier</title>
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
    <h2>Create Account</h2>
    <p>Publisher & Supplier Management</p>

    @if ($errors->any())
        <div class="error">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST">
        @csrf

        <label>Name</label>
        <input type="text" name="name" value="{{ old('name') }}" required>

        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <label>Confirm Password</label>
        <input type="password" name="password_confirmation" required>

        <button type="submit">Register</button>
    </form>

    <p>Already have an account?
        <a href="{{ route('login') }}">Login</a>
    </p>
</div>
</body>
</html>
