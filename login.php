<?php
session_start();
include 'db.php';
// عرض رسالة النجاح
if (isset($_SESSION['success'])) {
    echo "<div style='color:green; text-align:center; padding:10px; border:1px solid green;'>" . $_SESSION['success'] . "</div>";
    unset($_SESSION['success']);
}
 if(isset($_SESSION['success'])) { echo "<div class='alert'>".$_SESSION['success']."</div>"; unset($_SESSION['success']); } 
session_start();
include 'db.php';
// عرض رسالة النجاح
if (isset($_SESSION['success'])) {
    echo "<div style='color:green; text-align:center; padding:10px; border:1px solid green;'>" . $_SESSION['success'] . "</div>";
    unset($_SESSION['success']);
}
include 'db.php'; // تأكد أن اسم ملف الاتصال هو db.php أو عدله حسب اسم ملفك
// ... بقية الكود الخاص بك ...
if (isset($_SESSION['message'])) {
    echo "<div style='background: #d4edda; color: #155724; padding: 15px; text-align: center;'>".$_SESSION['message']."</div>";
    unset($_SESSION['message']); // مسح الرسالة بعد عرضها
}
// ... اتصال بقاعدة البيانات ...

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $res = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    $user = mysqli_fetch_assoc($res);

    if ($user && password_verify($password, $user['password'])) {
      $_SESSION['user_id'] = $user['id'];
      header("Location: dashboard.php"); // صفحتك الرئيسية
    } else {
        echo "<script>alert('خطأ في البريد أو كلمة المرور!');</script>";
    }
}
?>