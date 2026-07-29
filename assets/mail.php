<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = strip_tags(trim($_POST["name"]));
    $email   = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    if (empty($name) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo json_encode(["status" => "error", "message" => "Invalid inputs"]);
        exit;
    }

    $to      = "info@lumatas.com";
    $subject = "New Contact Form Submission from " . $name;

    $headers  = "From: " . $name . " <" . $email . ">\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    $email_content  = "You have received a new contact form message:\n\n";
    $email_content .= "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    if (mail($to, $subject, $email_content, $headers)) {
        http_response_code(200);
        echo json_encode(["status" => "success"]);
    } else {
        http_response_code(500);
        echo json_encode(["status" => "error"]);
    }
} else {
    http_response_code(403);
    echo json_encode(["status" => "forbidden"]);
}
?>