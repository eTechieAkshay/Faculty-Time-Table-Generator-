<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include 'db.php';

if (!isset($_GET['class_name']) || empty($_GET['class_name'])) {
    echo '<p class="text-center text-slate-400 text-xs italic">No class selected.</p>';
    exit;
}

$target_class = $conn->real_escape_string($_GET['class_name']);

$matrix = [];
$res = $conn->query("SELECT * FROM faculty_schedule WHERE course_class = '$target_class'");
if ($res) {
    while($row = $res->fetch_assoc()) {
        $matrix[$row['day_name']][$row['time_slot']] = $row;
    }
}

$slots = ['10:45 AM - 11:30 AM', '11:30 AM - 12:15 PM', '12:30 PM - 01:15 PM', '01:15 PM - 02:00 PM', '02:30 PM - 03:15 PM', '03:15 PM - 04:00 PM', '04:00 PM - 04:45 PM', '04:45 PM - 05:00 PM'];
$days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
?>

<div class="print-full-wrapper" style="border: 1px solid rgba(30, 41, 59, 0.6); border-radius: 12px; overflow: hidden; background: #11131e; position: relative; width: 100%;">
    
    <div style="display: flex; justify-content: space-between; align-items: center; background: #1a1d29; padding: 12px 15px; border-bottom: 1px solid #1e293b;">
        <span style="color: #818cf8; font-size: 13px; font-weight: 800; text-transform: uppercase;">📊 Live Matrix Dynamic Monitor</span>
        <a href="export_to_excel.php?class_name=<?php echo urlencode($target_class); ?>" 
           style="background: #2563eb; color: #fff; text-decoration: none; padding: 7px 15px; border-radius: 6px; font-size: 11px; font-weight: 700; display: flex; align-items: center; gap: 5px;">
           ⬇️ Export to Excel
        </a>
    </div>

    <div style="background: #161925; padding: 16px; text-align: center; border-bottom: 1px solid rgba(30, 41, 59, 0.8);">
        <h2 style="margin: 0; font-size: 18px; font-weight: 900; color: #ffffff; text-transform: uppercase;">
            TIMETABLE MATRIX: <span style="color: #6366f1;"><?php echo htmlspecialchars($target_class); ?></span>
        </h2>
    </div>

    <div style="display: grid; grid-template-columns: repeat(7, minmax(0, 1fr)); gap: 8px; background: #1a1d29; padding: 12px; text-align: center;">
        <div style="text-align: left; font-weight: 900; font-size: 11px; color: #818cf8; padding-left: 8px;">Time Slots</div>
        <?php foreach($days as $day): ?>
            <div style="background: rgba(15, 23, 42, 0.6); padding: 6px 0; font-size: 12px; font-weight: 900; color: #cbd5e1;"><?php echo $day; ?></div>
        <?php endforeach; ?>
    </div>

    <div style="padding: 12px; display: flex; flex-direction: column; gap: 8px;">
        <?php foreach($slots as $time): ?>
            <div style="display: grid; grid-template-columns: repeat(7, minmax(0, 1fr)); gap: 8px; align-items: center;">
                <div style="font-size: 11px; font-weight: bold; color: #e2e8f0; border-right: 1px solid #334155;"><?php echo $time; ?></div>
                <?php foreach($days as $day): ?>
                    <div style="background: rgba(30, 41, 59, 0.2); border: 1px solid #334155; border-radius: 6px; padding: 6px; min-height: 40px; font-size: 10px; color: #94a3b8; text-align: center;">
                        <?php 
                        if(isset($matrix[$day][$time])) {
                            $lec = $matrix[$day][$time];
                            echo '<span style="color: #a5b4fc; font-weight: bold;">' . htmlspecialchars($lec['teacher_name']) . '</span><br>RM: ' . htmlspecialchars($lec['room_no']);
                        } else {
                            echo '-';
                        }
                        ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>