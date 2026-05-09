<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
include('./db_connect.php');
ob_start();
// Fetch system settings
$system = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
foreach($system as $k => $v){
    $_SESSION['system'][$k] = $v;
}
ob_end_flush();
?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title><?php echo $_SESSION['system']['name'] ?></title>

<?php include('./header.php'); ?>
<?php 
if(isset($_SESSION['login_id']))
    header("location:index.php?page=home");
?>

<style>
    body{
        width: 100%;
        height: 100vh;
        display: flex;
        align-items: center;
        background-color: #343a40 !important;
    }
    main#main{
        width:100%;
    }
    .card {
        padding: 20px;
        border-radius: 8px;
    }
</style>
</head>

<body class="bg-dark">
  <main id="main">
    <div class="align-self-center w-100">
        <h4 class="text-white text-center mb-4"><b><?php echo $_SESSION['system']['name'] ?></b></h4>
        <div id="login-center" class="row justify-content-center">
            <div class="card col-md-4">
                <div class="card-body">
                    <form id="login-form">
                        <div class="form-group d-flex align-items-center">
                            <input type="checkbox" id="autologin_check" style="width:20px; height:20px;">
                            <label for="autologin_check" class="control-label ml-2 mb-0"><b>Quick Login (Auto-fill)</b></label>
                        </div>
                        <hr>

                        <div class="form-group">
                            <label for="username" class="control-label">Username</label>
                            <input type="text" id="username" name="username" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password" class="control-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control">
                        </div>
                        
                        <center>
                            <button class="btn btn-sm btn-block btn-primary col-md-4" id="login_btn">Login</button>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </main>
</body>

<script>
    // 1. Logic for clicking the checkbox
    $('#autologin_check').change(function() {
        if($(this).is(':checked')) {
            // SET YOUR DEFAULT CREDENTIALS HERE
            $('#username').val('admin'); 
            $('#password').val('admin123');
            
            // Trigger form submission automatically
            $('#login-form').submit();
        }
    });

    // 2. Main AJAX Login logic
    $('#login-form').submit(function(e){
        e.preventDefault()
        
        // Disable button and show loading state
        $('#login_btn').attr('disabled',true).html('Logging in...');
        
        // Remove existing alerts
        if($(this).find('.alert-danger').length > 0 )
            $(this).find('.alert-danger').remove();

        $.ajax({
            url: 'ajax.php?action=login',
            method: 'POST',
            data: $(this).serialize(),
            error: err => {
                console.log(err)
                $('#login_btn').removeAttr('disabled').html('Login');
            },
            success: function(resp){
                if(resp == 1){
                    location.href = 'index.php?page=home';
                } else {
                    $('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>');
                    $('#login_btn').removeAttr('disabled').html('Login');
                    // Uncheck the box if login failed
                    $('#autologin_check').prop('checked', false);
                }
            }
        })
    })
</script>   
</html>