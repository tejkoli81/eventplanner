		<div class="nav-side-menu">
			<div class="brand">Admin</div>
			<i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
			<div class="menu-list">
				<ul id="menu-content" class="menu-content collapse out">
					<li class="active">
						<a href="admin_home.php">
	                  		<i class="fas fa-tachometer-alt"></i> Admin
	                  	</a>
					</li>
	                <li><a href="manage_vendors.php"><i class="fas fa-hard-hat" aria-hidden="true"></i> Vendors</a></li>                    

	                <li><a href="manage_customer.php"><i class="fas fa-user-friends" aria-hidden="true"></i> Customers</a></li>                    

					<li  data-toggle="collapse" data-target="#users" class="collapsed">
	                	<a href="#"><i class="fa fa-user"></i> Event Planners <i class="fa fa-caret-down"></i></a>
	                </li>
	                <ul class="sub-menu collapse" id="users">
	                    <li><a href="add_planner.php">Add Planner</a></li>
	                    <li><a href="manage_planners.php">Manage Planner</a></li>
	                </ul>

					<li  data-toggle="collapse" data-target="#venue" class="collapsed">
	                	<a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i> Venue <i class="fa fa-caret-down"></i></a>
	                </li>
	                <ul class="sub-menu collapse" id="venue">
	                    <li><a href="add_venue.php">Add Venue</a></li>
	                    <li><a href="manage_venues.php">Manage Venue</a></li>
	                </ul>

					<li  data-toggle="collapse" data-target="#booking" class="collapsed">
	                	<a href="#"><i class='fas fa-file-invoice-dollar'></i> Booking <i class="fa fa-caret-down"></i></a>
	                </li>
	                <ul class="sub-menu collapse" id="booking">
	                    <li><a href="manage_bookings.php">Generate Bill</a></li>
	                    <li><a href="view_bills.php">View Bills</a></li>
	                </ul>
	                <li><a href="manage_feedbacks.php"><i class="fa-solid fa-comments"></i> Feedback</a></li>
	                <li><a href="admin-profile.php"><i class="fa fa-users fa-lg"></i> Profile</a></li>
	                <li><a href="admin-settings.php"><i class="fa fa-sun fa-lg"></i> Settings</a></li>
	                <li><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
				</ul>	
			</div>
		</div>
