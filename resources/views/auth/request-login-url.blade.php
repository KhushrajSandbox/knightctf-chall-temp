<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Login Link</title>
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
        .container {
            width: 100%;
            max-width: 400px;
            background: rgba(20, 20, 20, 0.9);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.9);
            text-align: center;
            border: 2px solid #00ffcc;
        }
        .container h1 {
            font-size: 28px;
            color: #00ffcc;
            text-shadow: 0 0 10px #00ffcc, 0 0 20px #00ffcc;
            margin-bottom: 30px;
        }
        .container p {
            font-size: 14px;
            line-height: 1.5;
        }
        .container p.success {
            color: #00ffcc;
            text-shadow: 0 0 5px #00ffcc;
        }
        .container p.error {
            color: #ff4444;
        }
        .container form {
            margin-top: 20px;
        }
        .container input[type="email"] {
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
        .container input[type="email"]:focus {
            outline: none;
            background: #1f1f1f;
            box-shadow: 0 0 8px #00ffcc;
        }
        .container button {
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
        .container button:hover {
            background: #00cc99;
            box-shadow: 0 0 15px #00cc99, 0 0 25px #00cc99;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Request Login Link</h1>

        <!-- Success Message -->
        @if (session('success'))
            <p class="success">{{ session('success') }}</p>
        @endif

        <!-- Error Messages -->
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="error">{{ $error }}</p>
            @endforeach
        @endif

        <!-- Form -->
        <form action="{{ route('request-login-url') }}" method="POST">
            @csrf
            <input type="email" name="email" placeholder="Enter your email" required>
            <button type="submit">Request Login Link</button>
        </form>
    </div>
</body>
</html>
