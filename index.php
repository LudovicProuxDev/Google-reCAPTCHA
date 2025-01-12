<?php
require_once __DIR__ . '/config.php';
?>

<html>

<head>
    <title>reCAPTCHA</title>
    <script src="https://www.google.com/recaptcha/api.js?hl=en-GB" async defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <h1 class="m-2">reCAPTCHA</h1>
    <form action="./verify.php" method="POST" class="row m-2">
        <div class="col-12 mt-3">
            <label for="surname" class="form-label">Surname</label>
            <input type="text" class="form-control" name="surname" placeholder="Doe">
        </div>
        <div class="col-12 mt-3">
            <label for="firstname" class="form-label">Firstname</label>
            <input type="text" class="form-control" name="firstname" placeholder="John">
        </div>
        <div class="col-12 mt-3">
            <div class="g-recaptcha" data-sitekey="<?php echo reCAPTCHA_KEY; ?>"></div>
        </div>
        <div class="col-12 mt-3">
            <input type="submit" class="btn btn-primary" value="Submit">
        </div>
    </form>
</body>

</html>