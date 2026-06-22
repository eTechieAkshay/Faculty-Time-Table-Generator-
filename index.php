<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include 'db.php'; 

// Admin control variables checker
$is_admin = (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true);

$selected_teacher = isset($_GET['view_teacher']) ? $conn->real_escape_string($_GET['view_teacher']) : '';

$matrix = [];
if (!empty($selected_teacher)) {
    $res = $conn->query("SELECT * FROM faculty_schedule WHERE teacher_name = '$selected_teacher'");
    if ($res) {
        while($row = $res->fetch_assoc()) {
            $matrix[$row['day_name']][$row['time_slot']] = $row;
        }
    }
}

// FIXED: Instructor list now pulls globally from the master faculty directory table
$faculty_list = [];
$fac_res = $conn->query("SELECT faculty_name FROM faculty_directory ORDER BY faculty_name ASC");
if ($fac_res) {
    while($f_row = $fac_res->fetch_assoc()) { 
        $faculty_list[] = $f_row['faculty_name']; 
    }
}

// Fetch dynamic classes from database
$classes_pool = [];
$class_res = $conn->query("SELECT * FROM university_classes ORDER BY class_name ASC");
if ($class_res) {
    while($c_row = $class_res->fetch_assoc()) {
        $classes_pool[] = $c_row;
    }
}

$slots = [
    '10:45 AM - 11:30 AM',
    '11:30 AM - 12:15 PM',
    '12:30 PM - 01:15 PM',
    '01:15 PM - 02:00 PM', 
    '02:30 PM - 03:15 PM', 
    '03:15 PM - 04:00 PM',
    '04:00 PM - 04:45 PM',
    '04:45 PM - 05:00 PM'  
];

$days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Routine Matrix - Admin Control Center</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #cbd5e1 0%, #e2e8f0 55%, #93c5fd 100%);
            background-attachment: fixed;
        }
        .ui-panel-card {
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.96) 0%, rgba(248, 250, 252, 0.9) 100%);
        }
        .glass-modal {
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(12px);
        }

        /* ================= PREMIUM GLASSMORPHISM MODAL WORKSPACE ================= */
        .premium-modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(10, 11, 18, 0.82);
            backdrop-filter: blur(16px) cubic-bezier(0.4, 0, 0.2, 1);
            -webkit-backdrop-filter: blur(16px);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 99999;
            opacity: 0;
            transition: opacity 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .premium-modal-overlay.active {
            opacity: 1;
            display: flex;
        }
        .premium-modal-content {
            background: linear-gradient(145deg, rgba(23, 25, 35, 0.85) 0%, rgba(15, 16, 24, 0.95) 100%);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 32px 80px rgba(0, 0, 0, 0.85), 0 0 50px rgba(99, 102, 241, 0.12);
            border-radius: 24px;
            width: 92%;
            max-width: 1050px;
            padding: 32px;
            max-height: 88vh;
            overflow-y: auto;
            color: #f3f4f6;
            transform: scale(0.94) translateY(10px);
            transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
        .premium-modal-overlay.active .premium-modal-content {
            transform: scale(1) translateY(0);
        }
        .matrix-dropdown {
            background: #1e2030;
            border: 1px solid rgba(255, 255, 255, 0.12);
            padding: 11px 20px;
            border-radius: 12px;
            color: #fff;
            font-size: 13px;
            font-weight: 600;
            outline: none;
            transition: all 0.2s;
            cursor: pointer;
        }
        .matrix-dropdown:focus {
            border-color: #6366f1;
            box-shadow: 0 0 12px rgba(99, 102, 241, 0.35);
        }

        /* ================= CRISP A4 PRINT QUALITY STANDARDS ================= */
        @media print {
            @page {
                size: auto;
                margin: 8mm 10mm 8mm 10mm;
            }
            body { 
                background: #ffffff !important; 
                color: #000000 !important; 
                padding: 0 !important; 
                margin: 0 !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
                font-size: 11px;
            }
            .no-print { display: none !important; }
            
            .print-full-wrapper { 
                width: 100% !important; 
                max-width: 100% !important; 
                box-shadow: none !important; 
                border: 1px solid #cbd5e1 !important; 
                background: #ffffff !important;
                margin: 0 !important; 
                padding: 10px !important; 
                border-radius: 6px !important;
                overflow: visible !important;
                display: block !important;
            }
            
            .min-w-\[1000px\], .min-w-\[950px\] {
                min-width: 100% !important;
                width: 100% !important;
            }

            .grid-cols-7 {
                display: grid !important;
                grid-template-columns: repeat(7, minmax(0, 1fr)) !important;
                gap: 5px !important;
                width: 100% !important;
            }
            
            .grid-cols-7 > div {
                border: 1px solid #cbd5e1 !important;
                background: #ffffff !important;
                color: #000000 !important;
                border-radius: 4px !important;
                padding: 4px !important;
            }
            
            .class-allocation-block, .border-indigo-500\/20 { 
                background: #f8fafc !important; 
                border: 1px solid #94a3b8 !important; 
                padding: 5px !important;
                border-radius: 6px !important;
                box-shadow: none !important;
                height: 100% !important;
            }
            
            span, p, div, text {
                color: #000000 !important;
            }
            .text-indigo-300, .text-indigo-400 {
                color: #1e3a8a !important;
                font-weight: 800 !important;
            }
            .text-slate-400 {
                color: #334155 !important;
                font-weight: 600 !important;
            }
            
            .vacant-box-frame, .border-dashed { 
                border: 1px dashed #cbd5e1 !important; 
                background: #ffffff !important; 
                min-height: 50px !important; 
                color: #94a3b8 !important;
            }
            
            .bg-emerald-50\/60, .bg-amber-50\/70, .bg-emerald-500\/5, .bg-amber-500\/5 {
                background: #f1f5f9 !important;
                border: 1px solid #475569 !important;
                color: #000000 !important;
                font-weight: 700 !important;
            }
        }
    </style>
</head>
<body class="text-slate-800 min-h-screen font-sans antialiased pb-16">

    <nav class="bg-white/95 border-b border-slate-200 sticky top-0 z-50 shadow-xs no-print backdrop-blur-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center gap-2">
                    <span class="text-xs font-black uppercase tracking-wider text-slate-900">Faculty <span class="text-blue-600">Day-Routine Hub</span></span>
                    <?php if($is_admin): ?>
                        <span class="ml-2 text-[10px] font-black bg-rose-600 text-white px-2 py-0.5 rounded-md uppercase tracking-wider animate-pulse">Principal Mode</span>
                    <?php endif; ?>
                </div>
                <div class="flex items-center gap-3">
                    
                    <?php if($is_admin): ?>
                        <button onclick="openClassMatrixPortal()" class="bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white text-xs font-black px-4 py-2 rounded-xl transition-all shadow-md flex items-center gap-1.5 cursor-pointer">
                            <i class="fas fa-th-large"></i> View Class Matrix
                        </button>
                    <?php endif; ?>

                    <button onclick="window.print()" class="bg-slate-100 hover:bg-slate-200 text-slate-800 text-xs font-bold px-4 py-2 rounded-xl transition-all cursor-pointer">🖨️ Print</button>
                    
                    <?php if($is_admin): ?>
                        <a href="logout.php" class="bg-rose-600 hover:bg-rose-700 text-white text-xs font-bold px-4 py-2 rounded-xl transition-all shadow-xs">Logout 🔐</a>
                    <?php else: ?>
                        <a href="login.php" class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-4 py-2 rounded-xl transition-all shadow-xs">Principal Login 🔑</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
    
 


    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">

        <?php if(isset($_GET['error'])): ?>
            <div class="mb-5 p-3.5 bg-rose-100 border-l-4 border-l-rose-500 text-rose-900 rounded-r-xl text-xs font-bold no-print">
                <?php 
                    if($_GET['error'] == 'teacher_busy') echo "⚠️ CLASH: This Faculty member is already occupied in another class during this time slot!";
                    elseif($_GET['error'] == 'class_busy') {
                        $busy_instructor = isset($_GET['busy_with']) ? htmlspecialchars($_GET['busy_with']) : 'Another Faculty';
                        echo "⚠️ BATCH OCCUPIED: This Class has an active schedule assigned to <span class='text-rose-700 underline font-black'>$busy_instructor</span>!";
                    } else echo "⚠️ Database transaction process failed.";
                ?>
            </div>
        <?php endif; ?>
        <?php if(isset($_GET['success'])): ?>
            <div class="mb-5 p-3.5 bg-emerald-100 border-l-4 border-l-emerald-500 text-emerald-900 rounded-r-xl text-xs font-bold no-print">
                <?php
                    if($_GET['success'] == 'added') echo "✅ Slot allocated and database record initialized successfully!";
                    elseif($_GET['success'] == 'updated') echo "✅ Allocation parameters updated and saved cleanly!";
                    elseif($_GET['success'] == 'deleted') echo "✅ Selected schedule block removed from master roster.";
                    elseif($_GET['success'] == 'faculty_purged') echo "✅ Complete directory history for the selected faculty has been purged.";
                    elseif($_GET['success'] == 'faculty_deleted') echo "✅ Faculty profile removed from management matrix.";
                    elseif($_GET['success'] == 'faculty_added') echo "✅ New faculty member successfully registered into roster system.";
                    elseif($_GET['success'] == 'class_added') echo "✅ New target class profile added successfully.";
                    elseif($_GET['success'] == 'class_deleted') echo "✅ Target class profile dropped from data structures.";
                    else echo "✅ Transaction completed successfully!";
                ?>
            </div>
        <?php endif; ?>

        <div class="ui-panel-card border border-slate-200 p-4 rounded-2xl mb-6 shadow-3xs no-print flex flex-col sm:flex-row justify-between items-center gap-4">
            <form method="GET" id="selectionFilterForm" class="w-full sm:w-auto flex items-center gap-2.5">
                <label class="text-xs font-black uppercase text-slate-500">Select Instructor View:</label>
                <select name="view_teacher" onchange="document.getElementById('selectionFilterForm').submit()" class="bg-white border border-slate-300 rounded-lg p-2 text-xs font-bold text-slate-700 shadow-3xs focus:outline-hidden">
                    <option value="">-- Choose Instructor --</option>
                    <?php foreach($faculty_list as $fName): ?>
                        <option value="<?php echo htmlspecialchars($fName); ?>" <?php if($selected_teacher===$fName) echo 'selected'; ?>><?php echo htmlspecialchars($fName); ?></option>
                    <?php endforeach; ?>
                </select>
            </form>
            <div class="text-xs font-bold text-blue-700 bg-blue-50/80 px-3 py-1.5 rounded-xl border border-blue-100">
                📌 Access Mode: <?php echo $is_admin ? 'Administrative Core (Read/Write/Modify)' : 'Public Read-Only Display Mode'; ?>
            </div>
        </div>

        <div class="grid grid-cols-1 <?php echo $is_admin ? 'lg:grid-cols-4' : 'lg:grid-cols-3'; ?> gap-6 items-start">
            
            <?php if($is_admin): ?>
                <div class="flex flex-col gap-6 lg:col-span-1 no-print">
                    
                    <div class="ui-panel-card border border-slate-200 rounded-2xl p-5 shadow-xs">
                        <h3 class="text-xs font-black uppercase tracking-wider text-slate-400 mb-4 pb-2 border-b border-slate-100">Slot Allocation Manager</h3>
                        <form action="manage.php" method="POST" class="flex flex-col gap-3.5">
                            <input type="hidden" name="action" value="add">
                            <div>
                                <label class="block text-[10px] font-black text-slate-500 uppercase mb-1">Faculty Name</label>
                                <select name="teacher_name" required class="w-full bg-white border border-slate-200 rounded-lg p-2 text-xs font-bold text-slate-700 focus:outline-hidden">
                                    <option value="" disabled <?php if(empty($selected_teacher)) echo 'selected'; ?>>-- Choose Faculty Profile --</option>
                                    <?php foreach($faculty_list as $fDropName): ?>
                                        <option value="<?php echo htmlspecialchars($fDropName); ?>" <?php if($selected_teacher === $fDropName) echo 'selected'; ?>>
                                            <?php echo htmlspecialchars($fDropName); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div>
                                <label class="block text-[10px] font-black text-slate-500 uppercase mb-1">Target Class</label>
                                <select name="course_class" required class="w-full bg-white border border-slate-200 rounded-lg p-2 text-xs font-bold text-slate-700 focus:outline-hidden">
                                    <?php foreach($classes_pool as $c_item): ?> 
                                        <option value="<?php echo htmlspecialchars($c_item['class_name']); ?>"><?php echo htmlspecialchars($c_item['class_name']); ?></option> 
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="grid grid-cols-2 gap-2">
                                <div>
                                    <label class="block text-[10px] font-black text-slate-500 uppercase mb-1">Weekday</label>
                                    <select name="day_name" id="allocation_day_select" required class="w-full bg-white border border-slate-200 rounded-lg p-2 text-xs text-slate-700 focus:outline-hidden">
                                        <?php foreach($days as $d): ?> <option value="<?php echo $d; ?>"><?php echo $d; ?></option> <?php endforeach; ?>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-[10px] font-black text-slate-500 uppercase mb-1">Room No</label>
                                    <input type="text" name="room_no" required placeholder="Room 402" class="w-full bg-white border border-slate-200 rounded-lg p-2 text-xs focus:outline-hidden">
                                </div>
                            </div>
                            <div>
                                <label class="block text-[10px] font-black text-slate-500 uppercase mb-1">Time Slot</label>
                                <select name="time_slot" required class="w-full bg-white border border-slate-200 rounded-lg p-2 text-xs font-mono text-slate-700 focus:outline-hidden">
                                    <?php foreach($slots as $sl): ?> <option value="<?php echo $sl; ?>"><?php echo $sl; ?></option> <?php endforeach; ?>
                                </select>
                            </div>
                            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-black py-2.5 rounded-xl text-xs tracking-wider shadow-md cursor-pointer">Lock Slot</button>
                        </form>
                    </div>

                    <div class="ui-panel-card border border-slate-200 rounded-2xl p-5 shadow-xs">
                        <h3 class="text-xs font-black uppercase tracking-wider text-indigo-600 mb-2 pb-2 border-b border-slate-100 flex items-center gap-1">
                            <span>🎓 Manual Class Master</span>
                        </h3>
                        <form action="manage.php" method="POST" class="flex gap-1.5 mb-4">
                            <input type="hidden" name="action" value="add_class">
                            <input type="text" name="new_class_name" required placeholder="e.g., MCA Section B" class="flex-1 bg-white border border-slate-200 rounded-lg p-2 text-xs font-bold text-slate-700 focus:outline-hidden">
                            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-black text-xs px-3 rounded-lg shadow-xs cursor-pointer">+</button>
                        </form>
                        <?php if(empty($classes_pool)): ?>
                            <div class="text-[11px] font-bold text-slate-400 text-center py-2">No custom classes found.</div>
                        <?php else: ?>
                            <div class="max-h-[140px] overflow-y-auto border border-slate-100 rounded-xl divide-y divide-slate-100 bg-white">
                                <?php foreach($classes_pool as $c_item): ?>
                                    <div class="p-2 flex justify-between items-center gap-2 hover:bg-slate-50">
                                        <span class="text-xs font-bold text-slate-700 truncate">📚 <?php echo htmlspecialchars($c_item['class_name']); ?></span>
                                        <a href="manage.php?action=delete_class&id=<?php echo $c_item['id']; ?>" 
                                           onclick="return confirm('Are you sure you want to delete this Class profile permanently?');" 
                                           class="text-rose-500 hover:text-rose-700 font-extrabold text-[11px] px-1.5 py-0.5 rounded transition-all shrink-0">
                                            ✕
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="ui-panel-card border border-slate-200 rounded-2xl p-5 shadow-xs">
                        <h3 class="text-xs font-black uppercase tracking-wider text-rose-500 mb-2 pb-2 border-b border-slate-100 flex items-center gap-1">
                            <span>🚨 Faculty Directory Master</span>
                        </h3>
                        
                        <form action="manage.php" method="POST" class="flex gap-1.5 mb-4">
                            <input type="hidden" name="action" value="add_faculty">
                            <input type="text" name="new_faculty_name" required placeholder="e.g., Dr. Ramesh" class="flex-1 bg-white border border-slate-200 rounded-lg p-2 text-xs font-bold text-slate-700 focus:outline-hidden">
                            <button type="submit" class="bg-rose-600 hover:bg-rose-700 text-white font-black text-xs px-3 rounded-lg shadow-xs cursor-pointer">+</button>
                        </form>

                        <?php 
                        $master_fac_res = $conn->query("SELECT * FROM faculty_directory ORDER BY faculty_name ASC");
                        if (!$master_fac_res || $master_fac_res->num_rows === 0): 
                        ?>
                            <div class="text-[11px] font-bold text-slate-400 text-center py-2">No active records found.</div>
                        <?php else: ?>
                            <div class="max-h-[140px] overflow-y-auto border border-slate-100 rounded-xl divide-y divide-slate-100 bg-white">
                                <?php while($fDir = $master_fac_res->fetch_assoc()): ?>
                                    <div class="p-2 flex justify-between items-center gap-2 hover:bg-slate-50">
                                        <span class="text-xs font-black text-slate-700 truncate">👤 <?php echo htmlspecialchars($fDir['faculty_name']); ?></span>
                                        <div class="flex items-center">
                                            <a href="manage.php?action=delete_faculty&id=<?php echo $fDir['id']; ?>" 
                                               onclick="return confirm('Are you sure you want to drop this instructor name layout from active indexes?');" 
                                               class="text-rose-500 hover:text-rose-700 font-extrabold text-sm px-2 py-0.5 rounded transition-all">
                                                ✕
                                            </a>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                </div>
            <?php endif; ?>

            <div class="lg:col-span-3 bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden print-full-wrapper">
                <?php if(empty($selected_teacher)): ?>
                    <div class="p-16 text-center text-slate-400 font-bold text-xs tracking-wide">👋 Please select an active Faculty member from the dropdown menu to view their timeline routine matrix.</div>
                <?php else: ?>
                    <div class="bg-slate-50 p-4 border-b border-slate-200">
                        <p class="text-sm font-black text-slate-900">Instructor Name: <span class="text-blue-600"><?php echo htmlspecialchars($selected_teacher); ?></span></p>
                    </div>
                    <div class="overflow-x-auto p-5">
                        <div class="min-w-[1000px]">
                            
                            <div class="grid grid-cols-7 gap-3 mb-4 border-b border-slate-200 pb-2.5 text-center">
                                <div class="text-left font-bold text-[10px] uppercase tracking-wider text-slate-400 self-center pl-1">Timeline Workspace</div>
                                <?php foreach($days as $day): ?>
                                    <div class="bg-slate-100 border border-slate-200 rounded-lg py-1 text-xs font-black text-slate-600 uppercase"><?php echo $day; ?></div>
                                <?php endforeach; ?>
                            </div>

                            <div class="flex flex-col gap-3.5">
                                <?php 
                                $passed_first_half = false;
                                foreach($slots as $time_key): 
                                    if($time_key == '02:30 PM - 03:15 PM') { $passed_first_half = true; }
                                ?>
                                    <div class="grid grid-cols-7 gap-3 items-stretch">
                                        <div class="text-left flex flex-col justify-center pl-1 border-r border-slate-100 font-mono">
                                            <span class="text-xs font-black text-slate-800"><?php echo explode(' - ', $time_key)[0]; ?></span>
                                            <span class="text-[10px] text-slate-400 font-bold"><?php echo explode(' - ', $time_key)[1]; ?></span>
                                        </div>
                                        <?php foreach($days as $day_key): ?>
                                            <div>
                                                <?php 
                                                // AUTOMATIC SATURDAY POST-02:30 PM BLOCK LOGIC
                                                if($day_key === 'Saturday' && $passed_first_half): 
                                                ?>
                                                    <div class="bg-slate-100/50 border border-dashed border-slate-200 rounded-xl h-full min-h-[76px] flex items-center justify-center text-center text-[10px] text-slate-400 font-bold tracking-wide uppercase select-none">
                                                        🔒 Off
                                                    </div>
                                                <?php elseif(isset($matrix[$day_key][$time_key])): $lec = $matrix[$day_key][$time_key]; ?>
                                                    <div class="class-allocation-block border border-blue-100 bg-blue-50/40 text-blue-950 rounded-xl p-3 flex flex-col justify-between h-full relative shadow-3xs">
                                                        <div class="flex flex-col gap-1">
                                                            <span class="text-[11px] font-black text-blue-900 uppercase tracking-wide">🏫 <?php echo htmlspecialchars($lec['course_class']); ?></span>
                                                            <span class="text-[10px] font-bold text-slate-500 font-mono">Loc: <?php echo htmlspecialchars($lec['room_no']); ?></span>
                                                        </div>

                                                        <?php if($is_admin): ?>
                                                            <div class="no-print mt-3 pt-2 border-t border-blue-100 flex items-center justify-end gap-1.5">
                                                                <button onclick="openEditPortal(<?php echo htmlspecialchars(json_encode($lec)); ?>)" class="bg-white border border-slate-200 hover:border-blue-500 text-blue-600 text-[10px] font-extrabold px-2 py-0.5 rounded-md shadow-3xs cursor-pointer transition-colors">
                                                                    ✏️ Edit
                                                                </button>
                                                                <a href="manage.php?action=delete&id=<?php echo $lec['id']; ?>" onclick="return confirm('Are you sure you want to permanently drop this routine block allocation?');" class="bg-white border border-slate-200 hover:border-rose-500 text-rose-600 text-[10px] font-extrabold px-2 py-0.5 rounded-md shadow-3xs transition-colors">
                                                                    🗑️ Delete
                                                                </a>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="vacant-box-frame border border-dashed border-slate-200 bg-slate-25/20 rounded-xl h-full min-h-[76px] flex items-center justify-center text-center text-[11px] text-slate-300 italic font-medium">-</div>
                                                <?php endif; ?>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>

                                    <?php if($time_key == '11:30 AM - 12:15 PM'): ?>
                                        <div class="grid grid-cols-7 gap-3 items-center py-0.5">
                                            <div class="text-left pl-1 text-[10px] font-black text-emerald-700 font-mono uppercase">Break</div>
                                            <div class="col-span-6 bg-emerald-50/60 border border-dashed border-emerald-200 text-emerald-900 rounded-xl py-1 text-center text-xs font-black uppercase tracking-widest">🥪 SHORT BREAK INTERVAL // (12:15 PM - 12:30 PM)</div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($time_key == '01:15 PM - 02:00 PM'): ?>
                                        <div class="grid grid-cols-7 gap-3 items-center py-0.5">
                                            <div class="text-left pl-1 text-[10px] font-black text-amber-700 font-mono uppercase">Recess</div>
                                            <div class="col-span-6 bg-amber-50/70 border border-dashed border-amber-200 text-amber-900 rounded-xl py-1 text-center text-xs font-black uppercase tracking-widest">🍔 MAIN RECESS / LUNCH BREAK // (02:00 PM - 02:30 PM)</div>
                                        </div>
                                    <?php endif; ?>

                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>

    <div id="classMatrixModal" class="premium-modal-overlay no-print">
        <div class="premium-modal-content">
            <div class="flex items-center justify-between pb-3.5 border-b border-slate-700/60 mb-6">
                <h3 class="text-sm font-black uppercase tracking-wide bg-gradient-to-r from-indigo-400 to-cyan-400 bg-clip-text text-transparent flex items-center gap-2">
                    <i class="fas fa-calendar-alt text-indigo-400"></i> Class-wise Weekly Timetable Matrix
                </h3>
                <button onclick="closeClassMatrixPortal()" class="text-slate-400 hover:text-rose-400 text-base font-black cursor-pointer transition-colors">✕</button>
            </div>
            
            <div class="flex items-center gap-3 mb-6 bg-slate-900/40 p-3 rounded-xl border border-slate-800/80">
                <label for="matrixClassSelect" class="text-xs font-bold text-slate-400 uppercase tracking-wide">Select University Class Target:</label>
                <select id="matrixClassSelect" onchange="fetchClassWeeklyMatrix(this.value)" class="matrix-dropdown">
                    <option value="">-- Choose Class --</option>
                    <option value="BCA 1st Year">BCA 1st Year</option>
                    <option value="BCA 2nd Year">BCA 2nd Year</option>
                    <option value="BCA 3rd Year">BCA 3rd Year</option>
                    <option value="BCCA 1st Year">BCCA 1st Year</option>
                    <option value="BCCA 2nd Year">BCCA 2nd Year</option>
                    <option value="BCCA 3rd Year">BCCA 3rd Year</option>
                    <option value="BBA 1st Year">BBA 1st Year</option>
                    <option value="BBA 2nd Year">BBA 2nd Year</option>
                    <option value="BBA 3rd Year">BBA 3rd Year</option>
                    <option value="MBA 1st year">MBA 1st year</option>
                    <option value="MCA 1st Year">MCA 1st Year</option>
                    <option value="MCA 2nd Year">MCA 2nd Year</option>
                </select>
            </div>

            <div id="classMatrixRenderBody" class="w-full overflow-x-auto min-h-[220px] flex flex-col justify-center">
                <p class="text-center text-slate-500 text-xs italic tracking-wide">Please select a college class from the dropdown menu to load the structural master timeline matrix.</p>
            </div>
        </div>
    </div>

    <?php if($is_admin): ?>
        <div id="editSlotModal" class="hidden fixed inset-0 z-100 flex items-center justify-center p-4 glass-modal no-print">
            <div class="bg-white w-full max-w-md rounded-2xl border border-slate-200 p-6 shadow-2xl flex flex-col gap-4">
                <div class="flex items-center justify-between pb-2 border-b border-slate-100">
                    <h3 class="text-xs font-black uppercase tracking-wider text-slate-900">✏️ Update Allocation Parameters</h3>
                    <button onclick="closeEditPortal()" class="text-slate-400 hover:text-slate-600 text-sm font-bold cursor-pointer">✕</button>
                </div>
                <form action="manage.php" method="POST" class="flex flex-col gap-3.5">
                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="slot_id" id="modal_slot_id">
                    
                    <div>
                        <label class="block text-[10px] font-black text-slate-500 uppercase mb-1">Instructor / Faculty Name</label>
                        <select name="teacher_name" id="modal_teacher_name" required class="w-full bg-white border border-slate-200 rounded-lg p-2 text-xs font-bold text-slate-700 focus:outline-hidden">
                            <?php foreach($faculty_list as $fModalName): ?>
                                <option value="<?php echo htmlspecialchars($fModalName); ?>"><?php echo htmlspecialchars($fModalName); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-slate-500 uppercase mb-1">Target Class Allocation</label>
                        <select name="course_class" id="modal_course_class" required class="w-full bg-white border border-slate-200 rounded-lg p-2 text-xs font-bold text-slate-700 focus:outline-hidden">
                            <?php foreach($classes_pool as $c_item): ?> 
                                <option value="<?php echo htmlspecialchars($c_item['class_name']); ?>"><?php echo htmlspecialchars($c_item['class_name']); ?></option> 
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <label class="block text-[10px] font-black text-slate-500 uppercase mb-1">Weekday</label>
                            <select name="day_name" id="modal_day_name" required class="w-full bg-white border border-slate-200 rounded-lg p-2 text-xs text-slate-700 focus:outline-hidden">
                                <?php foreach($days as $d): ?> <option value="<?php echo $d; ?>"><?php echo $d; ?></option> <?php endforeach; ?>
                            </select>
                        </div>
                        <div>
                            <label class="block text-[10px] font-black text-slate-500 uppercase mb-1">Room No Location</label>
                            <input type="text" name="room_no" id="modal_room_no" required class="w-full bg-white border border-slate-200 rounded-lg p-2 text-xs focus:outline-hidden">
                        </div>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-slate-500 uppercase mb-1">Target Timeline Slot</label>
                        <select name="time_slot" id="modal_time_slot" required class="w-full bg-white border border-slate-200 rounded-lg p-2 text-xs font-mono text-slate-700 focus:outline-hidden">
                            <?php foreach($slots as $sl): ?> <option value="<?php echo $sl; ?>"><?php echo $sl; ?></option> <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="flex justify-end items-center gap-2 mt-2">
                        <button type="button" onclick="closeEditPortal()" class="bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold px-4 py-2 rounded-xl text-xs cursor-pointer">Cancel</button>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-black px-5 py-2 rounded-xl text-xs shadow-md cursor-pointer">Save Parameters</button>
                    </div>
                </form>
            </div>
        </div>
    <?php endif; ?>

    <script>
    function openEditPortal(allocationData) {
        if(!allocationData) return;
        document.getElementById('modal_slot_id').value = allocationData.id || '';
        document.getElementById('modal_teacher_name').value = allocationData.teacher_name || '';
        document.getElementById('modal_course_class').value = allocationData.course_class || '';
        document.getElementById('modal_day_name').value = allocationData.day_name || '';
        document.getElementById('modal_room_no').value = allocationData.room_no || '';
        document.getElementById('modal_time_slot').value = allocationData.time_slot || '';
        
        const modalFrame = document.getElementById('editSlotModal');
        modalFrame.classList.remove('hidden');
    }

    function closeEditPortal() {
        const modalFrame = document.getElementById('editSlotModal');
        if(modalFrame) modalFrame.classList.add('hidden');
    }

    /* PREMIUM INTERACTIVE CLASS MATRIX METHODS */
    function openClassMatrixPortal() {
        const matrixOverlay = document.getElementById('classMatrixModal');
        matrixOverlay.style.display = 'flex';
        setTimeout(() => matrixOverlay.classList.add('active'), 20);
    }

    function closeClassMatrixPortal() {
        const matrixOverlay = document.getElementById('classMatrixModal');
        matrixOverlay.classList.remove('active');
        setTimeout(() => matrixOverlay.style.display = 'none', 350);
    }

    // Modal background layout touch tracking dismissal toggle
    window.addEventListener('click', function(e) {
        const matrixOverlay = document.getElementById('classMatrixModal');
        if (e.target === matrixOverlay) {
            closeClassMatrixPortal();
        }
    });

    // ASYNCHRONOUS MATRIX AJAX COMPILE PIPELINE
    function fetchClassWeeklyMatrix(className) {
        const displayBox = document.getElementById('classMatrixRenderBody');
        if(!className) {
            displayBox.innerHTML = '<p class="text-center text-slate-500 text-xs italic tracking-wide">Please select a college class from the dropdown menu to load the structural master timeline matrix.</p>';
            return;
        }

        // Elegant Neon Pulse Spinner
        displayBox.innerHTML = `
            <div class="text-center py-12 flex flex-col items-center justify-center gap-3">
                <i class="fas fa-circle-notch fa-spin text-3xl text-indigo-500"></i>
                <p class="text-xs font-bold text-slate-400 tracking-widest uppercase animate-pulse">Compiling Master Structural Matrix...</p>
            </div>
        `;

        fetch(`get_class_timetable.php?class_name=${encodeURIComponent(className)}`)
            .then(res => {
                if (!res.ok) throw new Error('Network error caught');
                return res.text();
            })
            .then(htmlMarkup => {
                displayBox.innerHTML = htmlMarkup;
            })
            .catch(err => {
                console.error(err);
                displayBox.innerHTML = '<p class="text-center text-rose-400 text-xs font-black p-6 bg-rose-950/20 border border-rose-900/40 rounded-xl">⚠️ Operational Roster Interrupted. Database endpoint configuration loss or missing target file structure.</p>';
            });
    }
    </script>
</body>
</html>