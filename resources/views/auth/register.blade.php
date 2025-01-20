<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
        .register-container {
            width: 100%;
            max-width: 400px;
            background: rgba(20, 20, 20, 0.9);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.9);
            text-align: center;
            border: 2px solid #f5f5f5;
        }
        .register-container h1 {
            font-size: 32px;
            color: #ff007f;
            text-shadow: 0 0 10px #ff007f, 0 0 20px #ff007f;
            margin-bottom: 30px;
        }
        .register-container form {
            width: 100%;
        }
        .register-container input[type="text"],
        .register-container input[type="email"],
        .register-container input[type="password"] {
            width: 100%;
            padding: 12px 20px;
            margin-bottom: 20px;
            border: none;
            border-radius: 5px;
            background: #151515;
            color: #ff007f;
            font-size: 16px;
            box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.8);
            transition: all 0.3s ease;
        }
        .register-container input[type="text"]:focus,
        .register-container input[type="email"]:focus,
        .register-container input[type="password"]:focus {
            outline: none;
            background: #1f1f1f;
            box-shadow: 0 0 8px #ff007f;
        }
        .register-container button {
            width: 100%;
            background: #ff007f;
            color: #000;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            text-transform: uppercase;
            box-shadow: 0 0 10px #ff007f, 0 0 20px #ff007f;
            transition: background 0.3s, box-shadow 0.3s;
        }
        .register-container button:hover {
            background: #cc0066;
            box-shadow: 0 0 15px #cc0066, 0 0 25px #cc0066;
        }
        .register-container p {
            font-size: 14px;
            color: #ff4444;
        }
        .register-container .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #f5f5f5;
        }
        .register-container .footer a {
            color: #ff007f;
            text-decoration: none;
        }
        .register-container .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h1>Register</h1>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Register</button>
        </form>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        @endif
        <div class="footer">
            <p>Already have an account? <a href="{{ route('login') }}">Login here</a>.</p>
        </div>
    </div>
</body>
</html>
