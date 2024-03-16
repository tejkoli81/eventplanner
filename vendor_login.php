<script type='text/javascript'>
function change(x)
{
	x.style.border='1px solid black';
}
function unchange(x)
{
	x.style.border='none';

}
</script>

<title>Simple Sign up from</title>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link type='text/css' rel='stylesheet' href='css/style1.css'>
    <style>
        body{
            background-image:  url("images/planner.jpg");
            
}
label{
color:black;
}
    </style>
  </head>
 
    <form action="vendor_login1.php" method="post">
      <h1>SIGN IN</h1>
      <div class="icon">
      <a href='index.php'><img src='images/vendor.jpg' width=200 height=200 style="border-radius:50%;"/></a>
      </div>
      <div class="formcontainer">
	  <h2>VENDOR LOGIN</h2>
      <div class="container">
		
        <label for="uname"><strong>EMAIL</strong></label>
        <input type='email' name='vid' class='text' required onfocus='change(this)' onblur='unchange(this)'>
      
        <label for="psw"><strong>Password</strong></label>
        <input type='password' name='vpwd' class='text' required onfocus='change(this)' onblur='unchange(this)'>
        
        <label for="psw"><b>Vendor Type:</b></label>
        <select name='vtype' class='text' required onfocus='change(this)' onblur='unchange(this)'>
        <option value="">Select Type</option>
        <option value="Caterer">Caterer</option>
        <option value="Photographer">Photographer</option>
        <option value="Decorator">Decorator</option>
        </select>
      </div>
      <button type="submit"><strong>LOGIN</strong></button>
      <button type="reset"><strong>RESET</strong></button>
      
      <div class="container" style="background-color: #eee">
        <label style="padding-left: 15px">
        Need an account? 
        </label>
        <span class="psw"><b><a href='vendor_register.php' class='link'>SIGNUP</a></b></span>
      </div>
    </form>

  
  
