<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>

<body
    style="margin: 0; padding: 0; font-family: Arial, sans-serif; background: #2c2c2c; color: #fff; display: flex; justify-content: center; align-items: center; height: 100vh;">

    <div
        style="text-align: center; background: #3b0f0f; border-radius: 20px; padding: 40px; box-shadow: 0 8px 16px rgba(0, 0, 0, 0.6); width: 95%; max-width: 500px;">
        <!-- Logo -->
        <div
            style="width: 120px; height: 120px; background: #5a1919; margin: 0 auto; border-radius: 20px; display: flex; justify-content: center; align-items: center; font-size: 36px; color: #fff; font-weight: bold; text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);">
            <img src="https://knightctf.com/images/knightctf-logo.png" style="width: 80px; height: 80px;" />
        </div>

        <!-- Title -->
        <h1
            style="margin-top: 20px; font-size: 32px; font-weight: bold; color: #ffdddd; text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.8);">
            Welcome to KnightConnect
        </h1>
        <p style="font-size: 16px; color: #ffc9c9; margin-top: 10px;">
            Join the community and connect with knight around the world.
        </p>

        <!-- Buttons -->
        <div style="margin-top: 30px;">
            <a href="{{ route('login') }}"
                style="text-decoration: none; display: inline-block; background: #e63946; color: white; padding: 12px 24px; border-radius: 30px; font-size: 16px; font-weight: bold; margin: 10px; transition: background 0.3s, transform 0.2s; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);">
                Login
            </a>
            <a href="{{ route('register') }}"
                style="text-decoration: none; display: inline-block; background: #d90429; color: white; padding: 12px 24px; border-radius: 30px; font-size: 16px; font-weight: bold; margin: 10px; transition: background 0.3s, transform 0.2s; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);">
                Register
            </a>
        </div>

        <!-- Social Media Tagline -->
        <p style="margin-top: 30px; font-size: 14px; color: #ffa6a6;">
            Share your moments. Discover new knights. Build connections.
        </p>
    </div>

</body>

</html>
