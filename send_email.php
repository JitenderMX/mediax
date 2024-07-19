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
/* if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
} */
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $phone = htmlspecialchars($_POST['phone']);
    $hear_about = htmlspecialchars($_POST['hear_about']);

    // Validate email
    if (!$email) {
        die("Invalid email address.");
    }

    // Validate file upload
    $allowedMimeTypes = [
        'image/jpeg', 'image/png', 'image/webp', 
        'application/pdf', 'application/msword', 
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
    ];
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp', 'pdf', 'doc', 'docx'];
    
    if (isset($_FILES['resume_cv']) && $_FILES['resume_cv']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['resume_cv']['tmp_name'];
        $fileName = $_FILES['resume_cv']['name'];
        $fileSize = $_FILES['resume_cv']['size'];
        $fileType = $_FILES['resume_cv']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        if (in_array($fileType, $allowedMimeTypes) && in_array($fileExtension, $allowedExtensions)) {
            // Prepare email
            $to = "recipient@example.com"; // Replace with your email address
            $subject = "New Form Submission";
            $message = "Name: $name\nEmail: $email\nPhone: $phone\nWhere did you hear about us?: $hear_about\n";

            // Prepare file attachment
            $file = chunk_split(base64_encode(file_get_contents($fileTmpPath)));

            // Generate a boundary string
            $separator = md5(time());

            // Headers
            $headers = "From: $email\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: multipart/mixed; boundary=\"$separator\"\r\n";

            // Body with attachment
            $body = "--$separator\r\n";
            $body .= "Content-Type: text/plain; charset=\"iso-8859-1\"\r\n";
            $body .= "Content-Transfer-Encoding: 7bit\r\n";
            $body .= $message . "\r\n";
            $body .= "--$separator\r\n";
            $body .= "Content-Type: $fileType; name=\"$fileName\"\r\n";
            $body .= "Content-Transfer-Encoding: base64\r\n";
            $body .= "Content-Disposition: attachment\r\n";
            $body .= $file . "\r\n";
            $body .= "--$separator--";

            // Send email
            if (mail($to, $subject, $body, $headers)) {
                header('Location: index.html?success=true');
            } else {
                echo "Failed to send email.";
            }
        } else {
            echo "Invalid file type or extension.";
        }
    } else {
        echo "No file uploaded or upload error.";
    }
} else {
    echo "Invalid request method.";
}
?>
