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
        header('Location: index.html?success=true');
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }
} 
?>
