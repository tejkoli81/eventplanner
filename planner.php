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

<title>Planner Login</title>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link type='text/css' rel='stylesheet' href='css/style1.css'>
    <style>
        body{
            background-image:  url("images/planner_lo.jpg");
            backdrop-filter: blur(5px);
            
	background-position: center;
  background-repeat: no-repeat;
  background-size: cover;      
}
form{
  background-color:transparent;
	backdrop-filter: blur(10px);
border:none;
}
label,h1,h2 {
    color: white
}

    </style>
  </head>
 
  <form method='post' action='planner1.php'>
      <h1>SIGN IN</h1>
      <div class="icon">
      <a href='index.php'><img src='images/planner.jfif' width=200 height=200 style="border-radius:50%;"/></a>
      </div>
      <div class="formcontainer">
      <h2>PLANNER LOGIN</h2>
      <div class="container">
        <label for="uname"><strong>EMAIL</strong></label>
        <input type='email' name='cid'   required onfocus='change(this)' onblur='unchange(this)'>
      
        <label for="psw"><strong>PASSWORD</strong></label>
        <input type='password' name='cpwd'   required onfocus='change(this)' onblur='unchange(this)'>
        
      </div>
      <button type="submit"><strong>LOGIN</strong></button>
      <button type="reset"><strong>RESET</strong></button>
    </form>

   
