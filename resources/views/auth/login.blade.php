<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Courier New', Courier, monospace;
            background: #0a0a0a;
            color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: radial-gradient(circle, #1b1b1b, #0d0d0d);
        }
        .login-container {
            width: 100%;
            max-width: 400px;
            background: rgba(20, 20, 20, 0.9);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.9);
            text-align: center;
            border: 2px solid #f5f5f5;
        }
        .login-container h1 {
            font-size: 32px;
            color: #00ffcc;
            text-shadow: 0 0 10px #00ffcc, 0 0 20px #00ffcc;
            margin-bottom: 30px;
        }
        .login-container form {
            width: 100%;
        }
        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 12px 20px;
            margin-bottom: 20px;
            border: none;
            border-radius: 5px;
            background: #151515;
            color: #00ffcc;
            font-size: 16px;
            box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.8);
            transition: all 0.3s ease;
        }
        .login-container input[type="text"]:focus,
        .login-container input[type="password"]:focus {
            outline: none;
            background: #1f1f1f;
            box-shadow: 0 0 8px #00ffcc;
        }
        .login-container button {
            width: 100%;
            background: #00ffcc;
            color: #000;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            text-transform: uppercase;
            box-shadow: 0 0 10px #00ffcc, 0 0 20px #00ffcc;
            transition: background 0.3s, box-shadow 0.3s;
        }
        .login-container button:hover {
            background: #00cc99;
            box-shadow: 0 0 15px #00cc99, 0 0 25px #00cc99;
        }
        .login-container p {
            font-size: 14px;
            color: #ff4444;
        }
        .login-container .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #f5f5f5;
        }
        .login-container .footer a {
            color: #00ffcc;
            text-decoration: none;
        }
        .login-container .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        @if ($errors->any())
            <p>{{ $errors->first('login_error') }}</p>
        @endif
        <div class="footer">
            <p>Don't have an account? <a href="{{ route('register') }}">Register here</a>.</p>
        </div>
    </div>
</body>
</html>
