<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "grocery@kal.et"; // where you want to receive orders
    $subject = "New grocery order from website";

    $name = strip_tags($_POST["name"]);
    $phone = strip_tags($_POST["phone"]);
    $email = strip_tags($_POST["email"]);
    $address = strip_tags($_POST["address"]);
    $order = strip_tags($_POST["order"]);
    $instructions = strip_tags($_POST["instructions"]);

    $message = "
    Name: $name
    Phone: $phone
    Email: $email
    Address: $address

    Order:
    $order

    Additional instructions:
    $instructions
    ";

    $headers = "From: website@yourdomain.com\r\n";
    $headers .= "Reply-To: $email\r\n";

    if (mail($to, $subject, $message, $headers)) {
        // Redirect to a thank you page
        header("Location: thank-you.html");
        exit;
    } else {
        echo "Oops! Something went wrong.";
    }
} else {
    echo "Invalid request.";
}
?>