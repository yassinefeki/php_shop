<?php
include_once "inc/header.php";
if(isset($_COOKIE["usermail"])) {
  $user="value=".$_COOKIE["usermail"];
} else {
  $user="";
}
if(isset($_COOKIE["password"])) {
  $pass="value=".$_COOKIE["password"];
} else {
  $pass="";
}

?>
<body>
<div class="container" style="margin-top:50px ;width:350px;height: 600px;">

<?php if (isset($_GET['error'])) { ?>
        <div class="alert alert-danger" role="alert">
        <?php echo $_GET['error']; ?>
      </div>
      <?php } ?>
<?php if (isset($_GET['register'])) { ?>
        <div class="alert alert-success" role="alert">
        <?php echo $_GET['register']; ?>
      </div>
     	<?php } ?>
<form action="login_confirm.php" method="POST">
  <h1>Connect</h1>
  <!-- Email input -->
  <div class="form-outline mb-4">
    <label class="form-label" for="form2Example1">Email or Username</label>
    <input type="mail" name="usermail" id="form2Example1" <?php echo $user;?>  class="form-control" />
    
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <label class="form-label" for="form2Example2">Password<a href="#">(Forgot password?)</a></label>
    
    <input type="password" name="password" id="form2Example2" <?php echo $pass;?>  class="form-control" />
  </div>

  <!-- 2 column grid layout for inline styling -->
  
    <div>
      <!-- Checkbox -->
      <div class="form-check">
        <label class="form-check-label" for="form2Example31"> Remember me </label>
        <input class="form-check-input" type="checkbox" name="checkbox" value="remember" id="form2Example31" />
        
      </div>
    </div>

  <!-- Submit button -->
  <div class="row">
  <button type="submit" class="btn btn-primary">Sign in</button>
  </div>
  <div class="row">
  <a href="register.php">Register Now</a>
  </div>
 
</form>
</div>
</body>
</html>