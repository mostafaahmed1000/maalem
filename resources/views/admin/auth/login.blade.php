<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Maalem Education</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #1d63dc;
            --secondary: #0f172a;
            --accent: #38bdf8;
            --bg: #020617;
            --card-bg: rgba(15, 23, 42, 0.8);
            --text: #f8fafc;
            --text-muted: #94a3b8;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Outfit', sans-serif;
        }

        body {
            background-color: var(--bg);
            background-image: 
                radial-gradient(at 0% 0%, rgba(29, 99, 220, 0.15) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(56, 189, 248, 0.1) 0px, transparent 50%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            color: var(--text);
        }

        .login-container {
            width: 100%;
            max-width: 450px;
            padding: 2rem;
            position: relative;
        }

        .login-card {
            background: var(--card-bg);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 30px;
            padding: 3rem 2.5rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            animation: slideUp 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }

        @keyframes slideUp {
            from { transform: translateY(30px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        .logo {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .logo h1 {
            font-size: 2rem;
            font-weight: 800;
            letter-spacing: -1px;
            background: linear-gradient(to right, #fff, var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .logo p {
            color: var(--text-muted);
            font-size: 0.9rem;
            margin-top: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-group i {
            position: absolute;
            left: 1.2rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            transition: color 0.3s;
        }

        input {
            width: 100%;
            padding: 1rem 1.2rem 1rem 3rem;
            background: rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            color: #fff;
            font-size: 1rem;
            transition: all 0.3s;
        }

        input:focus {
            outline: none;
            border-color: var(--primary);
            background: rgba(29, 99, 220, 0.05);
            box-shadow: 0 0 0 4px rgba(29, 99, 220, 0.1);
        }

        input:focus + i {
            color: var(--accent);
        }

        .options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            font-size: 0.85rem;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            color: var(--text-muted);
        }

        .remember input {
            width: auto;
            margin: 0;
            accent-color: var(--primary);
        }

        .btn-login {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, var(--primary), #154ea3);
            color: #fff;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(29, 99, 220, 0.3);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .error-msg {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: #fca5a5;
            padding: 0.8rem;
            border-radius: 10px;
            font-size: 0.85rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Background Shapes */
        .shape {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            z-index: -1;
        }

        .shape-1 {
            width: 300px;
            height: 300px;
            background: var(--primary);
            top: -100px;
            left: -100px;
            opacity: 0.2;
        }

        .shape-2 {
            width: 250px;
            height: 250px;
            background: var(--accent);
            bottom: -50px;
            right: -50px;
            opacity: 0.15;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
        
        <div class="login-card">
            <div class="logo">
                <img src="{{ asset('identity/Logo/PNG/White.png') }}" alt="Maalem Logo" style="height: 80px; width: auto; margin-bottom: 1rem;">
                <p>Admin Portal</p>
            </div>

            @if($errors->any())
                <div class="error-msg">
                    <i class="fas fa-exclamation-circle"></i>
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ url('/admin/login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="email" name="email" placeholder="Email Address" required value="{{ old('email') }}">
                    <i class="fas fa-envelope"></i>
                </div>
                
                <div class="form-group">
                    <input type="password" name="password" placeholder="Password" required>
                    <i class="fas fa-lock"></i>
                </div>

                <div class="options">
                    <label class="remember">
                        <input type="checkbox" name="remember"> Remember me
                    </label>
                </div>

                <button type="submit" class="btn-login">
                    Sign In <i class="fas fa-arrow-right"></i>
                </button>
            </form>
        </div>
    </div>
</body>
</html>
