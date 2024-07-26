<?php
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $name = $_POST["name"];
//     $email = $_POST["email"];
//     $phone = $_POST["phone"];
//     $company = $_POST["company"];
//     $website = $_POST["website"];
//     $social_pre = $_POST["social-pre"];
//     $partnership_in = $_POST["partnership-in"];
//     $service = $_POST["service"];
//     $sub_service = $_POST["sub-service"];
//     $budget = $_POST["budget"];
//     $learn_about_us = $_POST["learn-about-us"];
    
//     // Validate input (you can add more validation if required)
//     if (empty($name) || empty($email) || empty($phone)) {
//         echo "Please fill in all the fields.";
//         exit;
//     }
    
//     // Set the recipient email address
//     $to = "jitender.work.mediax@gmail.com";
    
//     // Set the email subject
//     $subject = "New Form Submission";
    
//     // Build the email content
//     $email_content = "Name: $name\n <br>";
//     $email_content .= "Email: $email\n <br>";
//     $email_content .= "Phone: $phone\n <br>";
//     $email_content .= "Company: $company\n <br>";
//     $email_content .= "Website: $website\n <br>";
//     $email_content .= "Website: $website\n <br>";
//     $email_content .= "Social Presence: $social_pre\n <br>";
//     $email_content .= "We want to partnership in: $partnership_in\n <br>";
//     $email_content .= "We want to your service: $service\n <br>";
//     $email_content .= "We want to your sub-service: $sub_service\n <br>";
//     $email_content .= "Our Budget: $budget\n <br>";
//     $email_content .= "I learn about you by: $learn_about_us\n";
//     // Set the email headers
//     $headers = "From: $name <$email>\r\n";
    
//     // Send the email
//     if (mail($to, $subject, $email_content, $headers)) {
//         // header('Location: index.html?success=true');
//     } else {
//         echo "Oops! Something went wrong. Please try again later.";
//     }
// }
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $company = $_POST["company"];
    $website = $_POST["website"];
    $social_pre = $_POST["social-pre"];
    $partnership_in = $_POST["partnership-in"];
    $service = $_POST["service"];
    $sub_service = $_POST["sub-service"];
    $budget = $_POST["budget"];
    $learn_about_us = $_POST["learn-about-us"];
    
    // Validate input (you can add more validation if required)
    if (empty($name) || empty($email) || empty($phone) || empty($message)) {
        echo "Please fill in all the fields.";
        exit;
    }
    
    // Set the recipient email address
    $to = "jitender.work.mediax@gmail.com";
    
    // Set the email subject
    $subject = "New Form Submission";
    
    // Build the email content
    $email_content = "Name: $name\n <br>";
    $email_content .= "Email: $email\n <br>";
    $email_content .= "Phone: $phone\n <br>";
    $email_content .= "Company: $company\n <br>";
    $email_content .= "Website: $website\n <br>";
    $email_content .= "Website: $website\n <br>";
    $email_content .= "Social Presence: $social_pre\n <br>";
    $email_content .= "We want to partnership in: $partnership_in\n <br>";
    $email_content .= "We want to your service: $service\n <br>";
    $email_content .= "We want to your sub-service: $sub_service\n <br>";
    $email_content .= "Our Budget: $budget\n <br>";
    $email_content .= "I learn about you by: $learn_about_us\n";
    
    // Set the email headers
    $headers = "From: $name <$email>\r\n";
    
    // Send the email
    if (mail($to, $subject, $email_content, $headers)) {
        header("Location: index.html?success=true");
    } else {
        header("Location: error.html");
    }
}
?>
