<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Design by foolishdeveloper.com -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>OTP Input</title>
    <!-- Google Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap"
        rel="stylesheet"
    />
    <!-- Stylesheet -->
    <link rel="stylesheet" href="tv.css" />
</head>
<body>
<div class="container">
    <div class="inputfield">
        <input type="number" maxlength="1" class="input" disabled />
        <input type="number" maxlength="1" class="input" disabled />
        <input type="number" maxlength="1" class="input" disabled />
        <input type="number" maxlength="1" class="input" disabled />
        <input type="number" maxlength="1" class="input" disabled />
        <input type="number" maxlength="1" class="input" disabled />
    </div>
    <button class="" id="submit" onclick="validateOTP()">Submit</button>
</div>
<!-- Script -->
<script src="tv.js"></script>
</body>
</html>