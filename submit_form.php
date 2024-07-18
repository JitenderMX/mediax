<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
     // Access the submitted data
     $contactData = $_POST['contact'];

     if (is_array($contactData)) {
        // Initialize message body
        $messageBody = "Contact details:\n";

        // Loop through the data to concatenate fields to the message body
        foreach ($contactData as $key => $value) {
            // Check if the value is not empty
            if (!empty($value)) {
                // Concatenate the field name and value to the message body
                $messageBody .= ucfirst($key) . ": " . $value . "\n";
            }
        }

        // Encode the message body for URL
        $encodedMessageBody = urlencode($messageBody);
    }
    // Set the recipient email address
    $to = "jitender.work.mediax@gmail.com";
    
    // Set the email subject
    $subject = "New Form Submission";
    
    // Build the email content
    $email_content = "Name: $contactData['name']\n";
    $email_content .= "Email: $contactData['email']\n";
    $email_content .= "Phone: $contactData['phone']\n";
    $email_content .= "Message:\n $encodedMessageBody";
    
    // Set the email headers
    $headers = "From: $name <$email>\r\n";
    
    // Send the email
    if (mail($to, $subject, $email_content, $headers)) {
        echo "Thank you for contacting us. We'll get back to you shortly.";
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }
} 
?>
<?php
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
//     // Access the submitted data
//     $name = $_POST['name'];
//     $email = $_POST['email'];
//     $phone = $_POST['phone'];
//     $company = $_POST['company'];
//     $website = $_POST['website'];
//     $social = $_POST['social-pre'];
//     $contactData = $_POST['contact'];


//     if (is_array($contactData)) {
//         // Initialize message body
//         $messageBody = "Contact details:\n";

//         // Loop through the data to concatenate fields to the message body
//         foreach ($contactData as $key => $value) {
//             // Check if the value is not empty
//             if (!empty($value)) {
//                 // Concatenate the field name and value to the message body
//                 // $messageBody .= ucfirst($key) . ": " . $value . "\n";
//     // Set the recipient email address
//     $messageBody .= "<tr><td>" . ucfirst($key) . ": <td>" . htmlspecialchars($value) . "</td><br></tr>\n";

//             }
//         }

//         // Encode the message body for URL (not needed for email but shown here for clarity)
//     }
    
//     // Set the recipient email address
//     $to = "jitender.work.mediax@gmail.com";
    
//     // Set the email subject
//     $subject = "New Form Submission";
    
//     // Build the email content
//     $email_content = "Name: $name \n<br>";
//     $email_content .= "Email: $email \n<br>";
//     $email_content .= "Phone: $phone \n<br>";
//     $email_content = "Company: $company \n<br>";
//     $email_content .= "Website: $website \n<br>";
//     $email_content .= "Social Presence: $social \n";
//     $email_content .= "Message:\n" . $messageBody;
    
//     echo $email_content;
//     // Set the email headers
//     // $headers = "From: " . $contactData['name'] . " <" . $contactData['email'] . ">\r\n";
//     $headers = "From: Jitender <'jitenderjkr19@gmail.com'>\r\n";
    
//     // Send the email
//     if (mail($to, $subject, $email_content, $headers)) {
//         echo "Thank you for contacting us. We'll get back to you shortly.";
//     } else {
//         echo "Oops! Something went wrong. Please try again later.";
//     }
// }
?>

