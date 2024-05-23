<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Your custom styles -->
    <link rel="stylesheet" href="https://www.ttjtravmart.com/Spam/assets/Admin_Css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
        body {
            background-color: #272727; /* Dark Gray */
            color: #f2f2f2; /* Light Gray */
        }

        .container {
            max-width: 400px;
            margin-top: 190px;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #343a40; /* Dark Gray */
            color: #f2f2f2; /* Light Gray */
            border-radius: 10px 10px 0 0;
        }

        .card-body {
            padding: 20px;
        }

        .btn-primary {
            background-color: #ff5050; /* Light Red */
            border-color: #ff5050;
        }

        .btn-primary:hover {
            background-color: #d13c3c; /* Slightly Darker Red */
            border-color: #d13c3c;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header text-center">
                <h4>Login</h4>
            </div>
            <div class="card-body">
                <form id="loginForm">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </form>
            </div>
        </div>
    </div>

 <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
   $(document).ready(function () {
    $('#loginForm').submit(function (event) {
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url();?>Attendance/Login/login',
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            data: $.param({
                username: $('#username').val(),
                password: $('#password').val(),
            }),
            success: function (data) {
                var response = parseInt(data);
                if (!isNaN(response)) {
                    if (response === 1) {
                        // Check if it's between 10:00 AM and 6:30 PM
                        var currentTime = new Date();
                        var hours = currentTime.getHours();
                        var minutes = currentTime.getMinutes();
                            window.location.href = "<?php echo base_url();?>Attendance/Dasboard";
                    } else if (response === -1) {
                        alert('IP not authorized for non-admin users.');
                    } else {
                        alert('Invalid credentials. Please try again.');
                    }
                } else {
                    console.error('Invalid response:', data);
                    alert('An error occurred. Please try again later.');
                }
            },
            error: function (error) {
                console.error('Error:', error);
                alert('An error occurred. Please try again later.');
            },
        });
    });
});

</script>

</body>

</html>
