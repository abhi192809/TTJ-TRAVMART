<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Panel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-panel {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            text-align: center;
        }

        .login-panel h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .login-form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        .login-form button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .login-form button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<div class="login-panel">
        <h2>Login</h2>
        <!-- Add an element for displaying error messages -->
        <div class="error-message" id="error-message"></div>
        <form class="login-form" id="login-form">
            <input type="text" name="Username" id="username" placeholder="Username" required>
            <input type="password" name="Password" id="password" placeholder="Password" required>
            <button type="button" onclick="performLogin()">Login</button>
        </form>
    </div>

   <script>
        function performLogin() {
            // Get form data
            var username = $('#username').val();
            var password = $('#password').val();

            // Create a data object to send data as key-value pairs
            var data = {
                'Username': username,
                'Password': password
            };

            // Send a POST request using jQuery
            $.ajax({
                url: '<?php echo base_url()?>Admin/AdminLogin/process_login',
                method: 'POST',
                data: data,
                dataType: 'json',
                success: function (response) {
                    // Check the response from the server
                      if (response == 1) {
                    // Redirect to the specified URL for successful login
                    window.location.href ='<?php echo base_url();?>Admin/Home';
                } else {
                    // Display error message for unsuccessful login
                    var errorMessage = $('#error-message');
                    errorMessage.html(response.message || 'Invalid credentials. Please try again.');
                    errorMessage.show();
                }
                },
                error: function (error) {
                    console.error('Error:', error);
                }
            });
        }
    </script>

</body>
</html>