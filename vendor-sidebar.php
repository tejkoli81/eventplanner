		<div class="nav-side-menu">
			<div class="brand">Vendor</div>
			<i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
			<div class="menu-list">
				<ul id="menu-content" class="menu-content collapse out">
					<li class="active">
						<a href="vendor_home.php">
	                  		<i class="fas fa-tachometer-alt"></i> Vendor
	                  	</a>
					</li>
	                <li><a href="view_vendor_bookings.php"><i class="fa fa-book" aria-hidden="true"></i> Bookings</a></li>                    
					<li  data-toggle="collapse" data-target="#users" class="collapsed">
	                	<a href="#"><i class='fas fa-image'></i> Gallery <i class="fa fa-caret-down"></i></a>
	                </li>
	                <ul class="sub-menu collapse" id="users">
	                    <li><a href="add_gallery.php">Add Gallery</a></li>
	                    <li><a href="manage_gallery.php">Manage Gallery</a></li>
	                </ul>
<?php if ($_SESSION['type'] == 'Caterer') { ?>
					<li  data-toggle="collapse" data-target="#venue" class="collapsed">
	                	<a href="#"><i class='fas fa-coffee'></i> Thali <i class="fa fa-caret-down"></i></a>
	                </li>
	                <ul class="sub-menu collapse" id="venue">
	                    <li><a href="add_thali.php">Add Thali</a></li>
	                    <li><a href="manage_thali.php">Manage Thali</a></li>
	                </ul>
<?php } ?>
	                <li><a href="vendor-profile.php"><i class="fa fa-users fa-lg"></i> Profile</a></li>
	                <li><a href="vendor-settings.php"><i class="fa fa-sun fa-lg"></i> Settings</a></li>
	                <li><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
				</ul>	
			</div>
		</div>
