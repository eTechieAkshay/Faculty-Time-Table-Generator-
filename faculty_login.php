<?php
session_start();
include 'db.php';

$error_msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $conn->real_escape_string(trim($_POST['username']));
    $password = trim($_POST['password']);

    if (!empty($username) && !empty($password)) {
        $res = $conn->query("SELECT * FROM faculty_users WHERE username = '$username'");
        if ($res && $res->num_rows === 1) {
            $user = $res->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                $_SESSION['is_faculty'] = true;
                $_SESSION['faculty_name'] = $user['faculty_name'];
                
                // Directly auto-route the logged faculty into index dashboard with their view selected!
                header("Location: index.php?view_teacher=" . urlencode($user['faculty_name']));
                exit();
            } else { $error_msg = 'Invalid credentials verification password matrix.'; }
        } else { $error_msg = 'Username not registered inside institutional directory.'; }
    } else { $error_msg = 'Please fill all authentication parameters.'; }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Login - TechieTimeTable</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        body { background: radial-gradient(circle at 50% 50%, #0f172a 0%, #020617 100%); }
    </style>
</head>
<body class="text-slate-200 min-h-screen flex items-center justify-center p-4">
    <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-6 w-full max-w-md backdrop-blur-md shadow-2xl">
        <h3 class="text-sm font-black uppercase tracking-wider text-white mb-1">👤 Faculty Login</h3>
        <p class="text-[11px] text-slate-500 font-bold uppercase mb-4 tracking-wide">Enter administrative assigned keys</p>
        
        <?php if(!empty($error_msg)): ?>
            <div class="bg-rose-500/10 border border-rose-500/30 text-rose-400 p-2.5 rounded-lg text-xs font-bold mb-4"><?php echo $error_msg; ?></div>
        <?php endif; ?>

        <form method="POST" class="flex flex-col gap-3.5">
            <div>
                <label class="block text-[10px] font-black text-slate-400 uppercase mb-1">Username</label>
                <input type="text" name="username" required placeholder="assigned_username" class="w-full bg-slate-950 border border-slate-800 rounded-lg p-2 text-xs font-bold text-white focus:outline-hidden">
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-400 uppercase mb-1">Secure Password</label>
                <input type="password" name="password" required placeholder="••••••••" class="w-full bg-slate-950 border border-slate-800 rounded-lg p-2 text-xs text-white focus:outline-hidden">
            </div>
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-black py-2.5 rounded-xl text-xs tracking-wider uppercase cursor-pointer transition-all mt-2 shadow-md">Verify & Open Matrix</button>
            <a href="welcome.php" class="text-center text-[10px] font-bold text-slate-500 hover:text-slate-400 uppercase tracking-wide mt-2">➔ Back to Splash Welcome Center</a>
        </form>
    </div>
</body>
</html>