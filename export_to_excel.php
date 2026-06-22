<?php
include 'db.php';
$target_class = $conn->real_escape_string($_GET['class_name']);

// Excel file format set karo
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Timetable_".$target_class.".xls");

$slots = ['10:45 AM - 11:30 AM', '11:30 AM - 12:15 PM', '12:30 PM - 01:15 PM', '01:15 PM - 02:00 PM', '02:30 PM - 03:15 PM', '03:15 PM - 04:00 PM', '04:00 PM - 04:45 PM', '04:45 PM - 05:00 PM'];
$days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

$res = $conn->query("SELECT * FROM faculty_schedule WHERE course_class = '$target_class'");
$matrix = [];
while($row = $res->fetch_assoc()) {
    $matrix[$row['day_name']][$row['time_slot']] = $row['teacher_name'] . "\n(RM: " . $row['room_no'] . ")";
}
?>

<table border="1">
    <thead>
        <tr style="background-color: #1a1d29; color: #ffffff;">
            <th>Time Slot</th>
            <?php foreach($days as $day): ?>
                <th><?php echo $day; ?></th>
            <?php endforeach; ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach($slots as $time): ?>
            <tr>
                <td style="font-weight: bold;"><?php echo $time; ?></td>
                <?php foreach($days as $day): ?>
                    <td><?php echo isset($matrix[$day][$time]) ? $matrix[$day][$time] : '-'; ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>