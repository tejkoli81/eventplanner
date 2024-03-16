
<html>
  <head>
    <title> Vendor registration form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" href="css/regist.css">
    <style>
      body {
    background-image: url("images/vendor_rist.jpg");
	background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
.main-block{
	background-color:transparent;
	backdrop-filter: blur(10px);
}
h1{
	color:black;
}
    </style>
  </head>
  <body>
    
    <div class="main-block">
      <h1><b>Vendor Registration<b></h1>
      <div class="icon">
     <center> <a href='index.php'><img src='images/vendor.jpg' width=100 height=100 style="border-radius:50%;"/></a></center>
      </div>
      <form method='post' action='vendor_register1.php' name='reg' onsubmit='return validate()' enctype="multipart/form-data">
        
      <input type='text' name='name' class='text' required onfocus='change(this)' placeholder="Enter business name" onblur='unchange(this)'>
      <input type='text' name='cpname' class='text' required onfocus='change(this)' placeholder="Enter owner name" onblur='unchange(this)'>
      <input type='text' name='email' class='text' required placeholder="Enter email" onfocus='change(this)' onblur='unchange(this)'>
      <input type='password' name='pwd' class='text' required onfocus='change(this)' placeholder="Enter password" onblur='unchange(this)'>
      <input type='password' name='cpwd' class='text' required onfocus='change(this)' placeholder="Retype password" onblur='unchange(this)'>
      <br>
      <div id="photo">
      <label>Photo</label>
      <input type='file' name='imgpath' class='text' required onfocus='change(this)' onblur='unchange(this)'>
      </div>
      <textarea name='addr' class='text' required onfocus='change(this)' onblur='unchange(this)' rows=3 cols=60 placeholder="Enter address"></textarea>
      <input type='text' name='phone' class='text' required onfocus='change(this)' onblur='unchange(this)' placeholder="Enter 10 digit phone number">
      <select name='type' class='text' required onfocus='change(this)' onblur='unchange(this)'>
        <option value="">Vendor Type</option>
        <option value="Caterer">Caterer</option>
        <option value="Photographer">Photographer</option>
        <option value="Decorator">Decorator</option>
		</select>
    <input type='text' name='website' class='text' required onfocus='change(this)' onblur='unchange(this)' placeholder="Enter you business website url">
    <textarea name="description" id="" cols="60" rows="10" class="text" placeholder="Enter description of your business" width=500></textarea>
        <div class="btn-block">
        <button type="submit"><strong>Register</strong></button>
        <label style="padding-left: 15px">
        Already a Member?
        </label>
        <span class="psw"><b><a href='vendor.php' class='link'>SIGN IN</a></b></span>
      </div>
        </div>
      </form>
    </div>
    <script type='text/javascript'>
function change(x)
{
	x.style.border='1px solid black';
}

function unchange(x)
{
	x.style.border='none';

}

function validate()
{
	x = document.forms["reg"]["pwd"];
	y = document.forms["reg"]["cpwd"];

	if(x.value != y.value)
	{
		alert("Password and confirm password doesn't match");
		x.focus();
		return false;
	}	

	x = document.forms["reg"]["phone"];

	if(!x.value.match(/^\d{10}$/))
	{
		alert("Invalid phone number.");
		x.focus();
		return false;
	}

	x = document.forms["reg"]["email"];
	if(!x.value.match(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/))
	{
		alert("Invalid email id.");
		x.focus();
		return false;
	}	

    x = document.forms["reg"]["website"];

    if(!x.value.match(/^(https?:\/\/)?(www\.)?[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\/.*)?$/)){
        alert("Invalid website.");
		x.focus();
		return false;       
    }

	return true;
}
</script>
  </body>
</html>



