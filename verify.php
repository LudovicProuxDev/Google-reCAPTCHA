<?php
require_once('./config.php');
require_once('./vendor/autoload.php');

// Library
use ReCaptcha\ReCaptcha;
// Message to display on the page
$message = "";
// Form exists
if (!empty($_POST)) {
    // Check the response reCAPTCHA
    $captcha = new ReCaptcha(reCAPTCHA_SECRET_KEY);
    $captchaResponse = $captcha->verify($_POST['g-recaptcha-response']);
    // Display the reCAPTCHA result according to the response from Google server 
    switch ($captchaResponse->isSuccess()) {
        case true:
            $message = sprintf('<div class="alert alert-success" role="alert">reCAPTCHA is good %s %s.</div>', $_POST['surname'], $_POST['firstname']);
            break;
        case false:
            $message = sprintf('<div class="alert alert-danger" role="alert">Error from the reCAPTCHA %s %s.</div>', $_POST['surname'], $_POST['firstname']);
            break;
        default:
            $message = sprintf('<div class="alert alert-primary" role="alert">Missing response %s %s.</div>', $_POST['surname'], $_POST['firstname']);
            break;
    }
} else {
    // No reCAPTCHA
    $message = '<div class="alert alert-secondary" role="alert">No reCAPTCHA to check.</div>';
}
?>

<html>
<head>
    <title>Verify reCAPTCHA</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <h1 class="m-2">Verify reCAPTCHA</h1>
    <div class="row m-2">
        <?php echo $message; ?>
    </div>
</body>
</html>