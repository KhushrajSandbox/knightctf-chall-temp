<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KnightConnect</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Courier New', Courier, monospace;
            background: #0a0a0a;
            color: #f5f5f5;
            display: flex;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            text-transform: uppercase;
            color: #00ffcc;
            margin: 20px 0;
            text-align: center;
        }

        .container {
            display: flex;
            flex-direction: column;
            margin: 0 auto;
            max-width: 1200px;
            width: 100%;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 20px;
            border-bottom: 2px solid #333;
        }

        .logout-btn {
            background: #e63946;
            color: white;
            border: none;
            border-radius: 20px;
            padding: 8px 16px;
            font-size: 14px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .logout-btn:hover {
            background: #d90429;
        }

        .main {
            display: flex;
            margin-top: 20px;
        }

        .news-feed {
            flex: 2;
            margin-right: 20px;
        }

        .post {
            background: #151515;
            border-radius: 10px;
            margin-bottom: 20px;
            padding: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        }

        .post-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #00ffcc;
        }

        .post-content {
            font-size: 14px;
            line-height: 1.5;
            color: #e6e6e6;
        }

        .sidebar {
            flex: 1;
            background: #1b1b1b;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        }

        .sidebar h2 {
            font-size: 18px;
            margin-bottom: 20px;
            color: #ff007f;
        }

        .user-list {
            list-style: none;
            padding: 0;
        }

        .user-list li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .connect-btn {
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 20px;
            padding: 8px 16px;
            font-size: 14px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .connect-btn:hover {
            background: #388E3C;
        }

        .flag {
            background: #00ffcc;
            color: #0a0a0a;
            font-weight: bold;
            padding: 10px;
            margin-top: 20px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 0 10px #00ffcc, 0 0 20px #00ffcc;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="logo">KnightConnect</div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>

        @if (isset($flag) && session()->has('is_admin') && session('is_admin'))
            <div class="flag">
                Flag: {{ $flag->flag }}
            </div>
        @endif


        <div class="main">
            <!-- News Feed Section -->
            <div class="news-feed">
                <div class="post">
                    <div class="post-title">KnightCTF</div>
                    <div class="post-content">Join us for the latest CTF challenges and sharpen your hacking skills!
                    </div>
                </div>
                <div class="post">
                    <div class="post-title">KnightSquad</div>
                    <div class="post-content">New exploit techniques revealed! Check out our latest write-up on buffer
                        overflow attacks.</div>
                </div>
                <div class="post">
                    <div class="post-title">KS HackZone</div>
                    <div class="post-content">We’ve released a new set of penetration testing tools. Get them now!</div>
                </div>
                <div class="post">
                    <div class="post-title">NS TechValley</div>
                    <div class="post-content">Discover cutting-edge technology trends in cybersecurity and AI.</div>
                </div>
            </div>

            <!-- Sidebar Section -->
            <div class="sidebar">
                <h2>Users You May Know</h2>
                <ul class="user-list">
                    @foreach ($users as $user)
                        <li>
                            <span>{{ $user->username }}</span>
                            <button class="connect-btn" onclick="alert('Connect feature is under construction!')">
                                Connect
                            </button>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</body>

</html>
