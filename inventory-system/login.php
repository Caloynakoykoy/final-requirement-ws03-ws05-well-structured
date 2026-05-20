<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management System</title>

    <!-- External Fonts & Icons (Required for Inter font and Eye icon) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary-black: #000000;
            --accent-light: #f8f9fa;
            --text-main: #1a1a1a;
            --text-muted: #717171;
            --input-bg: #f4f4f4;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-color: #0a0a0a;
            /* Deep space background style */
            background-image: 
                radial-gradient(circle at 10% 20%, #1a1a1a 0%, transparent 40%),
                radial-gradient(circle at 90% 80%, #111 0%, transparent 40%);
            overflow: hidden;
        }

        .login-wrapper {
            width: 100%;
            max-width: 1000px;
            padding: 20px;
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .login-box {
            background: #ffffff;
            display: flex;
            min-height: 600px;
            border-radius: 24px;
            box-shadow: 0 40px 100px -20px rgba(0, 0, 0, 0.7);
            overflow: hidden;
        }

        /* LEFT SIDE: Minimalist Branding */
        .login-branding {
            flex: 1;
            background: #ffffff;
            padding: 80px 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            border-right: 1px solid #f0f0f0;
        }

        .branding-logo h2 {
            font-size: 2.2rem;
            font-weight: 800;
            color: var(--primary-black);
            line-height: 1.1;
            letter-spacing: -0.04em;
            margin-bottom: 25px;
        }

        .branding-text p {
            font-size: 0.95rem;
            color: var(--text-muted);
            font-weight: 500;
            border-left: 4px solid #000;
            padding-left: 15px;
            line-height: 1.6;
        }

        /* RIGHT SIDE: Interactive Form Area */
        .login-form-area {
            flex: 1.2;
            padding: 80px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: #ffffff;
        }

        .form-header h1 {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 10px;
            color: var(--text-main);
        }

        .form-header p {
            color: var(--text-muted);
            font-size: 0.9rem;
            margin-bottom: 45px;
        }

        .input-group {
            margin-bottom: 25px;
        }

        .input-group label {
            display: block;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 10px;
            color: var(--text-main);
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper input {
            width: 100%;
            padding: 16px 20px;
            background: var(--input-bg);
            border: 2px solid transparent;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            outline: none;
        }

        .input-wrapper input:focus {
            background: #ffffff;
            border-color: var(--primary-black);
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
        }

        .toggle-password {
            position: absolute;
            right: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            cursor: pointer;
            padding: 5px;
            transition: color 0.2s;
        }

        .toggle-password:hover {
            color: var(--primary-black);
        }

        .form-utils {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 35px;
        }

        .remember-me {
            font-size: 0.85rem;
            color: var(--text-muted);
            display: flex;
            align-items: center;
            cursor: pointer;
            user-select: none;
        }

        .remember-me input {
            margin-right: 10px;
            width: 18px;
            height: 18px;
            accent-color: #000;
        }

        .btn-login {
            width: 100%;
            padding: 20px;
            background: var(--primary-black);
            color: #ffffff;
            border: none;
            border-radius: 12px;
            font-size: 0.95rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            cursor: pointer;
            margin-top: 40px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .btn-login:hover {
            background: #333333;
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        /* Responsiveness for Tablets/Mobile */
        @media (max-width: 850px) {
            .login-box { flex-direction: column; min-height: auto; }
            .login-branding { padding: 50px; border-right: none; border-bottom: 1px solid #f0f0f0; }
            .login-form-area { padding: 50px 40px; }
            body { overflow: auto; padding: 20px 0; }
        }
    </style>
</head>
<body>

<div class="login-wrapper">
    <div class="login-box">
        <!-- LEFT: BRANDING SIDE -->
        <div class="login-branding">
            <div class="branding-logo">
                <h2>Inventory<br>Management<br>System</h2>
            </div>
            <div class="branding-text">
                <p>Final Requirements for<br>IT WS05 & IT WS03</p>
            </div>
        </div>

        <!-- RIGHT: LOGIN FORM SIDE -->
        <div class="login-form-area">
            <header class="form-header">
                <h1>Welcome Back</h1>
                <p>Please enter your account details to continue.</p>
            </header>

            <form method="POST" action="login_process.php">
                <div class="input-group">
                    <label>Account Username</label>
                    <div class="input-wrapper">
                        <input type="text" name="username" 
                               value="<?php echo $_COOKIE['remember_username'] ?? ''; ?>" 
                               placeholder="Enter your username" required autofocus>
                    </div>
                </div>

                <div class="input-group">
                    <label>Account Password</label>
                    <div class="input-wrapper">
                        <input type="password" id="passField" name="password" 
                               placeholder="Enter your password" required>
                        <i class="fa-solid fa-eye-slash toggle-password" id="eyeIcon" onclick="toggleVisibility()"></i>
                    </div>
                </div>

                <div class="form-utils">
                    <label class="remember-me">
                        <input type="checkbox" name="remember_me" <?php echo isset($_COOKIE['remember_username']) ? 'checked' : ''; ?>>
                        Keep me logged in
                    </label>
                </div>

                <button type="submit" class="btn-login">Sign In to System</button>
            </form>
        </div>
    </div>
</div>

<script>
    function toggleVisibility() {
        const passwordField = document.getElementById('passField');
        const eyeIcon = document.getElementById('eyeIcon');
        
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            eyeIcon.classList.replace('fa-eye-slash', 'fa-eye');
        } else {
            passwordField.type = 'password';
            eyeIcon.classList.replace('fa-eye', 'fa-eye-slash');
        }
    }
</script>

</body>
</html>