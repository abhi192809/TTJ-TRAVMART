<style>
       
        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h4 class="my-3"><span style="border-bottom:1px solid black">Make Users </span></h4>
        </div>
    </div>
    <div class="col-md-12">
        <form id="signupForm" method="post">
         <label for="name">Type of :</label>
        <select name="user_type" class="form-control">
            <option value="">Select User Type</option>
            <option value="Admin">Admin</option>
            <option value="Sub Admin">Sub Admin</option>
            <option value="Normal Users">Normal Users</option>
        </select>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <button  onclick="submitForm()">Sign Up</button>
    </form>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
         <div class="col-">
             
         </div>
    </div>
</div>
<script>
function submitForm() {
     event.preventDefault();

    var formData = $('#signupForm').serialize();

    // Send Ajax request
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url();?>Admin/Manu/signup', 
        data: formData,
        dataType: 'json',
        success: function(response) {
            if (response == '1') {
               Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: response.message,
                });
                  $('#signupForm')[0].reset();
            } else {
                // Handle errors, e.g., display validation errors
                alert('Error: ' + response.message);
            }
        }
    });
}
</script>