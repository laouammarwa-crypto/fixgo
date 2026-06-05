<?php
// send_report.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "your-email@example.com"; // ضع بريدك هنا
    $subject = "بلاغ عطل جديد من FixGo";
    $message = "العطل: " . $_POST['description'] . "\n" .
               "المركبة: " . $_POST['brand'] . " " . $_POST['model'] . " (" . $_POST['year'] . ")\n" .
               "الموقع: " . $_POST['location'];

    // ملاحظة: دالة mail تتطلب استضافة حقيقية
    if (mail($to, $subject, $message)) {
        echo "success";
    } else {
        echo "error";
    }
}
?>