<?php
include_once "inc/header.php";
?>
<body>
<div class="container" style="margin-top:50px ;width:350px;height: 600px;">
<?php if (isset($_GET['error'])) { ?>
        <div class="alert alert-danger" role="alert">
        <?php echo $_GET['error']; ?>
      </div>
      <?php } ?>
<form action="register_confirm.php" method="POST">
  <h1>Register</h1>
  <!-- username input -->
  <div class="form-outline mb-4">
    <label class="form-label" for="form2Example1">User Name</label>
    <input type="text" name="username"  id="form2Example1" class="form-control" />
    
  </div>

  <div class="form-outline mb-4">
    <label class="form-label" for="form2Example1">Email address</label>
    <input type="email" name="mail" id="form2Example1" class="form-control" />
    
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <label class="form-label" for="form2Example2">Password</label>
    
    <input type="password" name="password" id="form2Example2" class="form-control" />
  </div>
  <!-- Confirme Password input -->
  <div class="form-outline mb-4">
    <label class="form-label" for="form2Example2">Confirme Password</label>
    
    <input type="password" name="password2" id="form2Example2" class="form-control" />
  </div>

  

  <!-- Submit button -->
  <div class="row">
  <button type="submit" class="btn btn-primary">Register</button>
  </div>
  <div class="row justify-content-md-center g-0">
  <div class="col-5">have an account ?</div>
  <a class="col" href="login.php">Sign in Now</a>
  </div>

 
</form>
</div>
</body>
</html>