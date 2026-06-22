<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to TechieTimeTable - Interactive Matrix</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        body {
            background: #0f172a;
            overflow: hidden;
            font-family: system-ui, -apple-system, sans-serif;
        }

        /* Smooth Liquid Card Entry similar to Instagram video */
        .spring-card {
            background: #ffffff;
            border-radius: 32px;
            box-shadow: 0 30px 60px -15px rgba(2, 6, 23, 0.3);
            transform: scale(0.9) translateY(40px);
            opacity: 0;
            animation: springIn 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
        }

        @keyframes springIn {
            to { transform: scale(1) translateY(0); opacity: 1; }
        }

        /* Floating Character Group Engine */
        .character-container {
            position: relative;
            height: 160px;
            width: 100%;
            overflow: visible;
        }

        /* Liquid Floating Movement */
        @keyframes liquidFloat {
            0%, 100% { transform: translateY(0px) scaleY(1); }
            50% { transform: translateY(-8px) scaleY(1.03); }
        }

        .blob-char {
            position: absolute;
            bottom: 0;
            animation: liquidFloat 4s ease-in-out infinite;
        }

        /* Eye tracking parent structure */
        .eye {
            width: 16px;
            height: 16px;
            background: #ffffff;
            border: 2px solid #000000;
            border-radius: 50%;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        /* Pure pupil elements tracking vector */
        .pupil {
            width: 7px;
            height: 7px;
            background: #000000;
            border-radius: 50%;
            position: absolute;
            transition: transform 0.05s linear;
        }

        /* Premium Minimalist White Dashboard Mode Button Transitions */
        .action-btn-primary {
            background: #000000;
            color: #ffffff;
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }
        .action-btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
            background: #1e1b4b;
        }

        .action-btn-secondary {
            background: #f1f5f9;
            color: #0f172a;
            border: 1px solid #e2e8f0;
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }
        .action-btn-secondary:hover {
            transform: translateY(-3px);
            background: #e2e8f0;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center bg-slate-900 p-4">

    <div class="spring-card w-full max-w-md p-8 flex flex-col justify-between relative overflow-hidden">
        
        <div class="text-center mb-6">
            <div class="flex justify-center mb-3">
                <div class="w-12 h-12 bg-indigo-600 rounded-2xl flex items-center justify-center shadow-md shadow-indigo-200">
                    <span class="text-white text-lg font-black tracking-tighter">3T</span>
                </div>
            </div>
            <h1 class="text-2xl font-black tracking-tight text-slate-900">TechieTimeTable</h1>
            <p class="text-xs font-semibold text-slate-400 mt-0.5 uppercase tracking-wider">Routine Sync System</p>
        </div>

        <div class="character-container my-4 flex justify-center items-end">
            
            <div class="blob-char bg-amber-400 w-24 h-24 rounded-full -left-2 shadow-lg flex items-center justify-center" style="animation-delay: 0s; border-radius: 50% 50% 20% 50%">
                <div class="flex gap-2 bg-white px-2 py-1.5 rounded-full shadow-xs">
                    <div class="eye"><div class="pupil"></div></div>
                    <div class="eye"><div class="pupil"></div></div>
                </div>
            </div>

            <div class="blob-char bg-indigo-600 w-28 h-36 rounded-t-full z-10 shadow-xl flex flex-col items-center justify-center" style="animation-delay: -1.5s; left: calc(50% - 56px);">
                <div class="w-10 h-1.5 bg-slate-900 rounded-full mb-2 opacity-80"></div>
                <div class="flex gap-2.5 bg-white px-2.5 py-2 rounded-full shadow-xs">
                    <div class="eye"><div class="pupil"></div></div>
                    <div class="eye"><div class="pupil"></div></div>
                </div>
            </div>

            <div class="blob-char bg-emerald-500 w-24 h-20 rounded-t-3xl -right-2 shadow-lg flex items-center justify-center" style="animation-delay: -0.7s;">
                <div class="flex gap-1.5 bg-white px-1.5 py-1 rounded-full shadow-xs">
                    <div class="eye"><div class="pupil"></div></div>
                    <div class="eye"><div class="pupil"></div></div>
                </div>
            </div>

        </div>

        <div class="flex flex-col gap-3 mt-6">
            <a href="index.php" class="action-btn-primary w-full text-center py-4 rounded-2xl text-xs font-black uppercase tracking-wider shadow-sm">
                👤 Faculty Login (Direct View)
            </a>
            
            <a href="login.php" class="action-btn-secondary w-full text-center py-4 rounded-2xl text-xs font-black uppercase tracking-wider">
                🔑 Principal Administration
            </a>
        </div>

        <div class="text-center text-[10px] font-bold text-slate-300 uppercase tracking-widest mt-8">
            RAICSIT Architecture Group
        </div>
    </div>

    <script>
        document.addEventListener('mousemove', (e) => {
            const pupils = document.querySelectorAll('.pupil');
            pupils.forEach(pupil => {
                const rect = pupil.getBoundingClientRect();
                const pupilX = rect.left + rect.width / 2;
                const pupilY = rect.top + rect.height / 2;
                
                const angle = Math.atan2(e.clientY - pupilY, e.clientX - pupilX);
                
                // Controlled displacement limits so pupil doesn't break out of borders
                const distance = 3.0;
                const moveX = Math.cos(angle) * distance;
                const moveY = Math.sin(angle) * distance;
                
                pupil.style.transform = `translate(${moveX}px, ${moveY}px)`;
            });
        });
    </script>

</body>
</html>