<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Function to sanitize form data
    function sanitize_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    // Validate and sanitize input
    $name = sanitize_input($_POST["name"]);
    $email = sanitize_input($_POST["email"]);
    $phone = sanitize_input($_POST["phone"]);
    $hearAbout = sanitize_input($_POST["hear-about"]);
    
    // Validate input (you can add more validation if required)
    if (empty($name) || empty($email) || empty($phone)) {
        echo "Please fill in all the required fields with valid data.";
        exit;
    }
    
    // Set the recipient email address
    $to = "careers@mediax.co.in";
    
    // Set the email subject
    $subject = "New Career Submission";
    
    // Build the email content
    $email_content =  "Name: $name\n
    Email: $email\n
    Phone: $phone\n
    Hear About: $hearAbout\n";
    
    // File upload handling
    if (isset($_FILES['resume-cv'])) {
        $file = $_FILES['resume-cv'];
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        
        // Check if file was uploaded without errors
        if ($fileError === 0) {
            // Attach the file to the email
            $boundary = md5(rand());
            $headers = "From: $email\r\n";
            $headers .= "Reply-To: $email\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\r\n";
            
            // Add text data to the message
            $body = "--$boundary\r\n";
            $body .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
            $body .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
            $body .= $email_content . "\r\n";
            
            // Add attachment
            $body .= "--$boundary\r\n";
            $body .= "Content-Type: application/pdf; name=\"$fileName\"\r\n";
            $body .= "Content-Disposition: attachment; filename=\"$fileName\"\r\n";
            $body .= "Content-Transfer-Encoding: base64\r\n";
            $body .= "X-Attachment-Id: " . rand(1000, 99999) . "\r\n\r\n";
            $body .= chunk_split(base64_encode(file_get_contents($fileTmpName))) . "\r\n";
            $body .= "--$boundary--";

            // Send the email
            if (mail($to, $subject, $body, $headers)) {
                header("Location: index.html?success=true");
                exit;
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "No file uploaded.";
    }
    header("Location: index.html?success=true");
}
header("Location: index.html?success=true");
?>
<?php
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Retrieve form data
//     $name = htmlspecialchars($_POST['name']);
//     $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
//     $phone = htmlspecialchars($_POST['phone']);
//     $hear_about = htmlspecialchars($_POST['hear_about']);

//     // Validate email
//     if (!$email) {
//         die("Invalid email address.");
//     }

//     // Validate file upload
//     $allowedMimeTypes = [
//         'image/jpeg', 'image/png', 'image/webp', 
//         'application/pdf', 'application/msword', 
//         'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
//     ];
//     $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp', 'pdf', 'doc', 'docx'];
    
//     if (isset($_FILES['resume_cv']) && $_FILES['resume_cv']['error'] === UPLOAD_ERR_OK) {
//         $fileTmpPath = $_FILES['resume_cv']['tmp_name'];
//         $fileName = $_FILES['resume_cv']['name'];
//         $fileSize = $_FILES['resume_cv']['size'];
//         $fileType = $_FILES['resume_cv']['type'];
//         $fileNameCmps = explode(".", $fileName);
//         $fileExtension = strtolower(end($fileNameCmps));

//         if (in_array($fileType, $allowedMimeTypes) && in_array($fileExtension, $allowedExtensions)) {
//             // Prepare email
//             $to = "recipient@example.com"; // Replace with your email address
//             $subject = "New Form Submission";
//             $message = "Name: $name\nEmail: $email\nPhone: $phone\nWhere did you hear about us?: $hear_about\n";

//             // Prepare file attachment
//             $file = chunk_split(base64_encode(file_get_contents($fileTmpPath)));

//             // Generate a boundary string
//             $separator = md5(time());

//             // Headers
//             $headers = "From: $email\r\n";
//             $headers .= "MIME-Version: 1.0\r\n";
//             $headers .= "Content-Type: multipart/mixed; boundary=\"$separator\"\r\n";

//             // Body with attachment
//             $body = "--$separator\r\n";
//             $body .= "Content-Type: text/plain; charset=\"iso-8859-1\"\r\n";
//             $body .= "Content-Transfer-Encoding: 7bit\r\n";
//             $body .= $message . "\r\n";
//             $body .= "--$separator\r\n";
//             $body .= "Content-Type: $fileType; name=\"$fileName\"\r\n";
//             $body .= "Content-Transfer-Encoding: base64\r\n";
//             $body .= "Content-Disposition: attachment\r\n";
//             $body .= $file . "\r\n";
//             $body .= "--$separator--";

//             // Send email
//             if (mail($to, $subject, $body, $headers)) {
//                 header('Location: index.html?success=true');
//             } else {
//                 echo "Failed to send email.";
//             }
//         } else {
//             echo "Invalid file type or extension.";
//         }
//     } else {
//         echo "No file uploaded or upload error.";
//     }
// } else {
//     echo "Invalid request method.";
// }
?>
