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

<title>Customer Login</title>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link type='text/css' rel='stylesheet' href='css/style1.css'>
    <style>
        body{
            background-image:  url("images/cust_login.jpg");         
}
label{
	color:black;
}
    </style>
  </head>
 
  <form method='post' action='customer1.php'>
      <h1>SIGN IN</h1>
      <div class="icon">
      <a href='index.php'><img src='images/user.jpg' width=200 height=200 style="border-radius:50%;"/></a>
      </div>
      <div class="formcontainer">
      <h2>CUSTOMER LOGIN</h2>
      <div class="container">
        <label for="uname"><strong>EMAIL</strong></label>
        <input type='email' name='cid' class='text' required onfocus='change(this)' onblur='unchange(this)'>
      
        <label for="psw"><strong>PASSWORD</strong></label>
        <input type='password' name='cpwd' class='text' required onfocus='change(this)' onblur='unchange(this)'>
        
      </div>
      <button type="submit"><strong>LOGIN</strong></button>
      <button type="reset"><strong>RESET</strong></button>
      
      <div class="container" style="background-color: #eee">
        <label style="padding-left: 15px">
        Need an account? 
        </label>
        <span class="psw"><b><a href='register.php' class='link'>SIGNUP</a></b></span>
      </div>
    </form>

