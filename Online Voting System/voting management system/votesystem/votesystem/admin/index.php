<?php
  	session_start();
  	if(isset($_SESSION['admin'])){
    	header('location:home.php');
  	}
?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition login-page" style="background-color:#F1E9D2" >
<div class="login-box" style="background-color:#a69f8b ;color:white ; font-size: 22px; font-family:Times">
  	<div class="login-logo" style="background-color: #a69f8b  ;color:white ; font-size: 22px; font-family:Times  ">
  		<b> Online Voting System</b>
  	</div>
  
  	<div class="login-box-body"style="background-color:#a69f8b ;color:white ; font-size: 22px; font-family:Times  " >
    	<p class="login-box-msg" style="color:black ; font-size: 16px; font-family:Times  " >Sign in to start your admin session</p>

    	<form action="login.php" method="POST">
      		<div class="form-group has-feedback">
        		<input type="text" class="form-control" name="username" placeholder="Username" required>
        		<span class="glyphicon glyphicon-user form-control-feedback"></span>
      		</div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
      		<div class="row">
    			<div class="col-xs-4">
          			<button type="submit" class="btn btn-primary btn-block btn-curve"style="background-color: #4682B4 ;color:black ; font-size: 12px; font-family:Times"  name="login"><i class="fa fa-sign-in"></i> Sign In</button>
        		</div>
      		</div>
    	</form>
  	</div>
  	<?php
  		if(isset($_SESSION['error'])){
  			echo "
  				<div class='callout callout-danger text-center mt20'>
			  		<p>".$_SESSION['error']."</p> 
			  	</div>
  			";
  			unset($_SESSION['error']);
  		}
  	?>
</div>
	
<?php include 'includes/scripts.php' ?>
</body>
</html>