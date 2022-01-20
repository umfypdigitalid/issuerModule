<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8" />
    <title>Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <!-- custom css -->
    <link rel="stylesheet" type="text/css" href="style_UI_missing.css">
    <link rel="stylesheet" href="../style.css">
    <!-- bootstrap link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>

<body class="m-body">
<nav class="navbar">
        <div class="navbar__container">
            <img src="../assets/gov_logo.png" class="govLogo" alt="Gov logo">
            <a href="#home" id="navbar__logo">OneDigitalID</a>
            <div class="navbar__toggle" id="mobile-menu">
                <span class="bar"></span> <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <ul class="navbar__menu">
                <li class="navbar__item">
                    <a href="#home" class="navbar__links" id="home-page">Home</a>
                </li>
                <li class="navbar__item">
                    <a href="#about" class="navbar__links" id="about-page">About</a>
                </li>
                <li class="navbar__item">
                    <a href="#services" class="navbar__links" id="services-page">Services</a>
                </li>
                <li class="navbar__btn">
                    <a href="login2.html" class="button" id="login">Login</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="row">
        <div class="col-md-5 m-left-col py-4 py-md-5">
            <img class="m-img-logo" src="assets/image-missing.jpg" alt="Registration"> <br>
            <img class="m-img-cover" src="assets/image-cover.jpg" alt="Registration">
        </div>

        <div class="col-md-7 m-right-col pt-3 px-5 pb-5 p-md-5 registration-container">
            <div class="m-registration-container">
                <h3 class="m-txt-head py-3 py-md-4">Report on missing or lost digital ID</h3>
                <form class="m-form">

                    <!--username-->
                    <div class="mb-3">
                        <input type="text" class="m-input m-input-blue" id="email" placeholder="Email" name="email">
                        <small class="m-error">*Please fill out this field.</small>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="m-input m-input-blue" id="nric" placeholder="NRIC" name="nric">
                        <small class="m-error">*Please fill out this field.</small>
                    </div>

                    <div class="mb-3">
                        <label for="reason" class="m-input m-input-blue">Reason</label>
                        <textarea class="form-control" id="reason" rows="4"></textarea>
                    </div>
                    <div class="prompt" id="prompt"></div>
                    <div class="row">
                        <div class="col-md-6 d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary m-button register-btn mt-3 m-2 w-100"
                                id="submit"
                                style="background-color:#0060A4; padding-top:12px; padding-bottom:12px; ">Submit</button>
                            <button type="submit" class="btn m-button mt-3 m-2 w-100" id="cancel"
                                style="color:#878787;background-color:#E9E9E9; border:none; padding-top:12px; padding-bottom:12px; ">Cancel</button>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <p align="center" style="font-size: 12px;bottom:0; width: 100%;">Any Problem? Read FAQ or Email
                        <a style="color: #0060A4" href="mailto:fypdigitalid@gmail.com">fypdigitalid@gmail.com</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#submit').on("click", function(e) {
            e.preventDefault();
            e.stopPropagation();
            $email = $('#email').val();
            $reason = $('#reason').val();
            $nric = $('#nric').val();

            $.ajax({
                url: "reportmissing.php",
                type: "POST",
                cache: false,
                data: {
                    email: JSON.stringify($email),
                    reason: JSON.stringify($reason),
                    nric:JSON.stringify($nric),
                },
                success: function(response, status, xhr) {
                    $('#prompt').text("Submitted successfully");
                    console.log("response was " + response);
                    
                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                },
            });

        });
    });
    </script>

    
</body>

</html>