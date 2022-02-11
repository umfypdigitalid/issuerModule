<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8" />
    <title>Check status</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <!-- custom css -->

    <!-- bootstrap link -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
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
                    <a href="../index.html" class="navbar__links" id="home-page">Home</a>
                </li>
                <li class="navbar__item">
                    <a href="../index.html" class="navbar__links" id="about-page">About</a>
                </li>
                <li class="navbar__item">
                    <a href="../index.html" class="navbar__links" id="services-page">Services</a>
                </li>
                <li class="navbar__btn">
                    <a href="../login2.html" class="button" id="login">Login</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="row">
        <div class="col-md-7 m-right-col pt-3 px-5 pb-5 p-md-5 registration-container">
            <div class="m-registration-container">
                <h3 class="m-txt-head py-3 py-md-4">Check status</h3>

                <form>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                            else.</small>
                    </div>

                    <div class="form-group">
                        <select class="form-select" id="type" aria-label="Default select example">
                            <option select>Types: </option>
                            <option value="Complaint">Complaints</option>
                            <option value="Report">Report</option>
                            <option value="Registration_status">Check registration status</option>
                        </select>
                    </div>


                    <table class="table" id="complaint" style="display:none">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Email</th>
                                <th scope="col">Comments</th>
                                <th scope="col">Status</th>
                                <th scope="col">Reply</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <table class="table" id="report" style="display:none">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Email</th>
                                <th scope="col">Reason</th>
                                <th scope="col">Status</th>
                                <th scope="col">NRIC</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <table class="table" id="registration_status" style="display:none">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Email</th>
                                <th scope="col">NRIC</th>
                                <th scope="col">Application Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>


                    <button id="submit" class="btn btn-primary">Submit</button>
                </form>
                <br>
                <br>
                <br>
                <p align="center" style="font-size: 12px;bottom:0; width: 100%;">Any Problem? Read FAQ or Email
                    <a style="color: #0060A4" href="mailto:fypdigitalid@gmail.com">support@externalcompany</a><a style="color: #0060A4"></a>
                </p>


            </div>
        </div>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $('#submit').on("click", function(e) {
            e.preventDefault();

            var email = $('#email').val();
            var type = $("#type option:selected").val();
            var userinput = email
            var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;

            if (!pattern.test(userinput)) {
                alert('not a valid e-mail address');

            } else {
                if (type == "Complaint") {
                    $.ajax({
                        url: "getFeedback.php",
                        type: "GET",
                        cache: false,
                        data: {
                            email: JSON.stringify(email),
                            type: JSON.stringify(type),
                        },

                        success: function(response, status, xhr) {
                            var data = JSON.parse(response);
                            buildTable(data);
                        },

                        error: function(xhr, status, error) {
                            console.error(xhr);
                        },
                    });
                }else if(type == "Report"){
                    $.ajax({
                        url: "getReport.php",
                        type: "GET",
                        cache: false,
                        data: {
                            email: JSON.stringify(email),
                            type: JSON.stringify(type),
                        },

                        success: function(response, status, xhr) {
                            var data = JSON.parse(response);
                            buildTable(data);
                        },

                        error: function(xhr, status, error) {
                            console.error(xhr);
                        },
                    });
                }else if(type == "Registration_status"){
                    $.ajax({
                        url: "getRegistration_status.php",
                        type: "GET",
                        cache: false,
                        data: {
                            email: JSON.stringify(email),
                            type: JSON.stringify(type),
                        },

                        success: function(response, status, xhr) {
                            var data = JSON.parse(response);
                            buildTable(data);
                        },

                        error: function(xhr, status, error) {
                            console.error(xhr);
                        },
                    });
                }else{
                    alert("Selected wrong type!");
                }
            }
        });

    });

    function buildTable(data) {
        //var table = document.getElementById("data");
        $type = $("#type option:selected").val();

        if ($type == "Complaint") {
            $("#complaint").css("display", "block")
            for (var i = 0; i < data.length; i++) {
                var status2 = "";
                var reply2 = "";
                if (data[i].status == 0) {
                    status2 = "Uncompleted";
                } else {
                    status2 = "Completed";
                }
                if (data[i].reply == null) {
                    reply2 = "Not service. Please come back next day.";

                } else {
                    reply2 = data[i].reply;
                }

                var row =
                    "<tr>" +
                    "<td>" +
                    data[i].feedbackID +
                    "</td>" +
                    "<td>" +
                    data[i].email +
                    "</td>" +
                    "<td>" +
                    data[i].comment +
                    "</td>" +
                    "<td>" +
                    status2 +
                    "</td>" +
                    "<td>" +
                    reply2 +
                    "</td>" +
                    "<td>";

                complaint.innerHTML += row;
            }

        } else if ($type == "Report") {
            $("#report").css("display", "block")
            for (var i = 0; i < data.length; i++) {
               
                var row =
                    "<tr>" +
                    "<td>" +
                    data[i].reportID +
                    "</td>" +
                    "<td>" +
                    data[i].email +
                    "</td>" +
                    "<td>" +
                    data[i].reason +
                    "</td>" +
                    "<td>" +
                    data[i].status +
                    "</td>" +
                    "<td>" +
                    data[i].nric +
                    "</td>" +
                    "<td>";

                report.innerHTML += row;
            }
        } else if ($type == "Registration_status") {
            $("#registration_status").css("display", "block")

            for (var i = 0; i < data.length; i++) {
                var row =
                    "<tr>" +
                    "<td>" +
                    data[i].userID +
                    "</td>" +
                    "<td>" +
                    data[i].email +
                    "</td>" +
                    "<td>" +
                    data[i].nric +
                    "</td>" +
                    "<td>" +
                    data[i].applicationstatus +
                    "</td>" +
                    "<td>";

                registration_status.innerHTML += row;
            }
        } else {
            alert("Wrong input");
        }
    }
</script>

</html>