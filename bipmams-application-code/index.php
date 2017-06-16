<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
include_once 'includes/register.inc.php';
 
sec_session_start();

if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>


<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Secure Login: Log In</title>
    
    
    
    
        <link rel="stylesheet" href="css/index1.css">

  <link rel="stylesheet" href="css/index2.css">
	<script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script> 

	<script type="text/JavaScript" src="js/register.js"></script>
  
    
    
  </head>

  <body>
	<?php
        if (isset($_GET['error'])) {
            echo '<p class="error">Error Logging In!</p>';
        }
        ?> 
    <div class="wrapper">
	<div class="container" style="display:block;" id="container">
		<h1>Welcome to bipmams</h1>
		
		<form class="form" action="includes/process_login.php" method="post" name="login_form">
			<input type="text" placeholder="Username" name="username" required="required">
			<input type="password" placeholder="Password" name="password" 
                             id="password" required="required">
			<button type="submit" id="login-button" value="Login" 
                   onclick="formhash(this.form, this.form.password);">Login</button><br><br>
If you don't have a login, please <div id="reg" onClick="showhide(document.getElementById('container'),document.getElementById('d'))">register</div>
 	</form>
    <?php
//        if (login_check($mysqli) == true) {
//                        echo '<p>Currently logged ' . $logged . ' as ' . htmlentities($_SESSION['username']) . '.</p>';
// 
//            echo '<p>Do you want to change user? <a href="includes/logout.php">Log out</a>.</p>';
//        } else {
//                        echo '<p>Currently logged ' . $logged . '.</p>';
//                        echo "<p>If you don't have a login, please <a href='register.php'>register</a></p>";
//                }
//?>   
	</div>
    <div id='d' align='center' style="display:none;">
<!-- Registration form to be output if the POST variables are not
        set or if the registration script caused an error. -->
        <h1>Register</h1>
        <?php
        if (!empty($error_msg)) {
            echo $error_msg;
        }
        ?>
        <ul>
            <li>Usernames may contain only digits, upper and lowercase letters and underscores</li>
            <li>Passwords must be at least 6 characters long</li>
            <li>Passwords must contain
                <ul>
                    <li>At least one uppercase letter (A..Z)</li>
                    <li>At least one lowercase letter (a..z)</li>
                    <li>At least one number (0..9)</li>
                </ul>
            </li>
            <li>Your password and confirmation must match exactly</li>
        </ul>
        <form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" 
                method="post" 
                name="registration_form">
            Username: <input type='text' 
                name='username' 
                id='username' required="required"/><br>
            Password: <input type="password"
                             name="password" 
                             id="password"
                             required="required"/><br>
            Confirm password: <input type="password" 
                                     name="confirmpwd" 
                                     id="confirmpwd" required="required"/><br>
            <input type="button" 
                   value="Register" 
                   onclick="return regformhash(this.form,
                                   this.form.username,
                                   this.form.password,
                                   this.form.confirmpwd);" /> 
        </form>
        <p>Return to the <a href="employee.php">login page</a>.</p>
</div>    
    

	
	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="js/index.js"></script>

    
  </body>
</html>
