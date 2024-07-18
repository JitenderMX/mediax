<?php
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Collect form data
//     $name = htmlspecialchars($_POST['name']);
//     $email = htmlspecialchars($_POST['email']);
//     $phone = htmlspecialchars($_POST['phone']);
//     $hear_about = htmlspecialchars($_POST['hear_about']);

//     // Email parameters
//     $to = "jitender.work.mediax@gmail.com"; // Replace with your email address
//     $subject = "Form Submission";
//     $message = "Name: $name\nEmail: $email\nPhone: $phone\nWhere did you hear about us: $hear_about";
//     $headers = "From: $email";

//     // Send email
//     if (mail($to, $subject, $message, $headers)) {
//         echo "Email successfully sent!";
//         header('Location: index.html?success=true');
//     } else {
//         echo "Failed to send email.";
//     }
// }
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $hear_about = $_POST["hear_about"];

    $to = "jitender.rathore@mediax.co.in"; // Replace with your email address
    $subject = "Contact Form Submission";
    $body = "Name: $name\nPhone: $phone\nEmail: $email\nHear About: $hear_about";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        // echo "Email successfully sent!";
        header('Location: index.html?success=true');
    } else {
        echo "Failed to send email.";
    }
}
?>