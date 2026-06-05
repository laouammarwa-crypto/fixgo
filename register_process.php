<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    // تم إزالة التعليقات وتجهيز الاستعلام
    $stmt = $conn->prepare("INSERT INTO users (name, email, phone, password, role) VALUES (?, ?, ?, ?, ?)");
    
    // تأكدي أن عدد الـ s يطابق عدد المتغيرات (5 متغيرات = 5 حروف s)
    $stmt->bind_param("sssss", $name, $email, $phone, $password, $role);

    if ($stmt->execute()) {
        $_SESSION['message'] = "تم إنشاء الحساب بنجاح";
        header("Location: login.php");
        exit();
    } else {
        echo "خطأ في تنفيذ الاستعلام: " . $stmt->error;
    }
    
    $stmt->close();
}
?>