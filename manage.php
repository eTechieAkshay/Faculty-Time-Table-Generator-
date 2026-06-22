<?php
if (session_status() === PHP_SESSION_NONE) { 
    session_start(); 
}
include 'db.php';

// Admin Authentication Check
$is_admin = (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true);
if (!$is_admin) { 
    header("Location: login.php"); 
    exit(); 
}

// 1. POST Requests Handlers (Forms)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];

    // ADD SCHEDULE SLOT
    if ($action === 'add') {
        $t = $conn->real_escape_string($_POST['teacher_name']);
        $c = $conn->real_escape_string($_POST['course_class']);
        $d = $conn->real_escape_string($_POST['day_name']);
        $s = $conn->real_escape_string($_POST['time_slot']);
        $r = $conn->real_escape_string($_POST['room_no']);

        $conn->query("INSERT INTO faculty_schedule (teacher_name, course_class, day_name, time_slot, room_no) VALUES ('$t', '$c', '$d', '$s', '$r')");
        header("Location: index.php?success=added&view_teacher=" . urlencode($t));
        exit();
    }

    // UPDATE SCHEDULE SLOT
    elseif ($action === 'update') {
        $id = intval($_POST['slot_id']);
        $t = $conn->real_escape_string($_POST['teacher_name']);
        $c = $conn->real_escape_string($_POST['course_class']);
        $d = $conn->real_escape_string($_POST['day_name']);
        $s = $conn->real_escape_string($_POST['time_slot']);
        $r = $conn->real_escape_string($_POST['room_no']);

        $conn->query("UPDATE faculty_schedule SET teacher_name='$t', course_class='$c', day_name='$d', time_slot='$s', room_no='$r' WHERE id=$id");
        header("Location: index.php?success=updated&view_teacher=" . urlencode($t));
        exit();
    }

    // CLASS MANAGEMENT - ADD CLASS
    elseif ($action === 'add_class') {
        $c_name = $conn->real_escape_string($_POST['new_class_name']);
        $conn->query("INSERT INTO university_classes (class_name) VALUES ('$c_name')");
        header("Location: index.php?success=class_added");
        exit();
    }

    // FACULTY MANAGEMENT - ADD NEW FACULTY
    elseif ($action === 'add_faculty') {
        $f_name = $conn->real_escape_string($_POST['new_faculty_name']);
        $conn->query("INSERT INTO faculty_directory (faculty_name) VALUES ('$f_name')");
        header("Location: index.php?success=faculty_added");
        exit();
    }
}

// 2. GET Requests Handlers (URL Links)
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action'])) {
    $action = $_GET['action'];

    // DELETE SCHEDULE SLOT
    if ($action === 'delete') {
        $id = intval($_GET['id']);
        $res = $conn->query("SELECT teacher_name FROM faculty_schedule WHERE id=$id")->fetch_assoc();
        $t = $res['teacher_name'];
        $conn->query("DELETE FROM faculty_schedule WHERE id=$id");
        header("Location: index.php?success=deleted&view_teacher=" . urlencode($t));
        exit();
    }

    // PURGE WHOLE FACULTY SCHEDULE
    elseif ($action === 'purge_faculty') {
        $name = $conn->real_escape_string($_GET['name']);
        $conn->query("DELETE FROM faculty_schedule WHERE teacher_name='$name'");
        header("Location: index.php?success=faculty_purged");
        exit();
    }

    // CLASS MANAGEMENT - DELETE CLASS
    elseif ($action === 'delete_class') {
        $id = intval($_GET['id']);
        $conn->query("DELETE FROM university_classes WHERE id=$id");
        header("Location: index.php?success=class_deleted");
        exit();
    }

    // FACULTY MANAGEMENT - DELETE FACULTY FROM DIRECTORY
    elseif ($action === 'delete_faculty') {
        $f_id = intval($_GET['id']);
        $conn->query("DELETE FROM faculty_directory WHERE id = $f_id");
        header("Location: index.php?success=faculty_deleted");
        exit();
    }
}

// 3. Fallback Redirect (Agar upar ka koi condition match nahi hua toh)
header("Location: index.php");
exit();
?>