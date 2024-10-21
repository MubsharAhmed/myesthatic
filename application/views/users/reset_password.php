<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #f0f4f8;
        }
        .reset-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            background: white; /* White background for the card */
        }
        h2 {
            font-family: 'Arial', sans-serif; /* Clean font for header */
            font-weight: bold; /* Bold header */
            color: #333; /* Darker text for contrast */
        }
        .btn-primary {
            background-color: #007bff; /* Blue button */
            border: none; /* No border */
        }
        .btn-primary:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
        .form-control {
            border-radius: 5px; /* Rounded corners on inputs */
            box-shadow: none; /* Remove default shadow */
            border: 1px solid #ced4da; /* Light border */
        }
        .form-control:focus {
            border-color: #007bff; /* Blue border on focus */
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Subtle glow */
        }
        .text-center a {
            color: #007bff; /* Blue link */
        }
        .text-center a:hover {
            text-decoration: underline; /* Underline on hover */
        }
    </style>
</head>
<body>
    <div class="reset-container">
    <p class="text-center">&nbsp;</p>
        <h2 class="text-center">Set Your Password</h2>
        <p class="text-center">&nbsp;</p>
        <form id="resetPasswordForm">
            <input type="hidden" name="userId" value="<?= htmlspecialchars($userId); ?>">
            <div class="form-group">
                <label for="password">New Password:</label>
                <input type="password" class="form-control" name="password" required placeholder="Enter new password">
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" class="form-control" name="confirm_password" required placeholder="Confirm new password">
            </div>
            <button type="submit" class="btn btn-success btn-block">Reset Password</button>
        </form>
        <!-- <div class="text-center mt-3">
            <a href="<?= base_url('User/login'); ?>">Return to Login</a>
        </div> -->
    </div>

    <script>
        $('#resetPasswordForm').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?= base_url('User/updatePassword'); ?>',
                method: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    var result = JSON.parse(response);
                    alert(result.message);
                    if (result.success) {
                        // window.location.href = '<?= base_url('User/login'); ?>'; 
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error updating password:', error);
                }
            });
        });
    </script>
</body>
</html>
