<?php

// Strict Session Initialization & Output Buffering to prevent header errors

ob_start();

if (session_status() === PHP_SESSION_NONE) {

    session_start();

}



// Agar pehle se logged in hai toh direct index par bhejo

if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true) {

    header("Location: index.php");

    exit();

}



$error_msg = '';



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = isset($_POST['username']) ? trim($_POST['username']) : '';

    $password = isset($_POST['password']) ? trim($_POST['password']) : '';



    if ($username !== '' && $password !== '') {

        // Core Master Credentials Verification

        if ($username === 'admin' && $password === 'admin123') {

           

            // Session variables explicitly synchronized

            $_SESSION['is_admin'] = true;

            $_SESSION['authenticated'] = true;

            $_SESSION['username'] = 'admin';

           

            // Redirect to Dashboard (index.php) and stop further execution

            header("Location: index.php");

            exit();

        } else {

            $error_msg = 'Invalid username or password matrix.';

        }

    } else {

        $error_msg = 'Please enter both fields.';

    }

} 


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal Login - TechieTimeTable</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        body { background: #0f172a; overflow: hidden; font-family: system-ui, sans-serif; }
        .spring-card { background: #ffffff; border-radius: 32px; box-shadow: 0 30px 60px -15px rgba(2, 6, 23, 0.3); transform: scale(0.9) translateY(40px); opacity: 0; animation: springIn 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) forwards; }
        @keyframes springIn { to { transform: scale(1) translateY(0); opacity: 1; } }
        .character-container { position: relative; height: 130px; width: 100%; overflow: visible; }
        @keyframes liquidFloat { 0%, 100% { transform: translateY(0px); } 50% { transform: translateY(-6px); } }
        .blob-char { position: absolute; bottom: 0; animation: liquidFloat 4s ease-in-out infinite; }
        .eye { width: 14px; height: 14px; background: #000000; border-radius: 50%; transition: transform 0.2s cubic-bezier(0.175, 0.885, 0.32, 1.275); }
        .matrix-input { width: 100%; background: #f8fafc; border: 2px solid #e2e8f0; border-radius: 16px; padding: 12px 16px; font-size: 13px; font-weight: 600; transition: all 0.3s ease; }
        .matrix-input:focus { outline: none; border-color: #4f46e5; background: #ffffff; box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1); }
        .login-submit-btn { background: #000000; color: #ffffff; transition: all 0.3s; cursor: pointer; }
        .login-submit-btn:hover { transform: translateY(-2px); background: #1e1b4b; }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center bg-slate-900 p-4">

    <div class="spring-card w-full max-w-md p-8 flex flex-col relative overflow-hidden">
        <div class="text-center mb-4">
            <h1 class="text-2xl font-black text-slate-900">Principal Login</h1>
            <p class="text-xs font-semibold text-slate-400">Enter master control credentials</p>
        </div>

        <div class="character-container my-2 flex justify-center items-end">
            <div class="blob-char bg-amber-400 w-20 h-20 rounded-full -left-2 shadow-md flex items-center justify-center" style="animation-delay: 0s; border-radius: 50% 50% 20% 50%">
                <div class="flex gap-1.5 bg-white px-1.5 py-1 rounded-full"><div class="eye"></div><div class="eye"></div></div>
            </div>
            <div class="blob-char bg-indigo-600 w-24 h-28 rounded-t-full z-10 shadow-lg flex flex-col items-center justify-center" style="animation-delay: -1.5s; left: calc(50% - 48px);">
                <div class="flex gap-2 bg-white px-2 py-1.5 rounded-full"><div class="eye"></div><div class="eye"></div></div>
            </div>
            <div class="blob-char bg-emerald-500 w-20 h-16 rounded-t-3xl -right-2 shadow-md flex items-center justify-center" style="animation-delay: -0.7s;">
                <div class="flex gap-1 bg-white px-1 py-1 rounded-full"><div class="eye"></div><div class="eye"></div></div>
            </div>
        </div>

        <?php if(!empty($error_msg)): ?>
            <div class="bg-rose-50 border border-rose-200 text-rose-600 p-3 rounded-xl text-xs font-bold text-center mb-4">
                ❌ <?php echo $error_msg; ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="login.php" class="flex flex-col gap-4">
            <input type="text" name="username" required placeholder="Username" class="matrix-input">
            <input type="password" name="password" id="password_field" required placeholder="Password" class="matrix-input">
            <button type="submit" class="login-submit-btn w-full py-3.5 rounded-2xl text-xs font-black uppercase tracking-wider">Verify Keys & Enter Hub</button>
        </form>
    </div>

    <script>
        let isPasswordFocused = false;
        const eyes = document.querySelectorAll('.eye');
        document.addEventListener('mousemove', (e) => {
            if (isPasswordFocused) return;
            eyes.forEach(eye => {
                const rect = eye.getBoundingClientRect();
                const angle = Math.atan2(e.clientY - (rect.top + 7), e.clientX - (rect.left + 7));
                eye.style.transform = `translate(${Math.cos(angle)*3}px, ${Math.sin(angle)*3}px)`;
            });
        });
        const pf = document.getElementById('password_field');
        pf.addEventListener('focus', () => { isPasswordFocused = true; eyes.forEach(e => e.style.transform = `scaleY(0.2)`); });
        pf.addEventListener('blur', () => { isPasswordFocused = false; eyes.forEach(e => e.style.transform = `scaleY(1)`); });
    </script>
</body>
</html>