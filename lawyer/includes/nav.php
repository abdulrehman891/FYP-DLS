<?php 
include('connection.php');

?>
		<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>
					<!-- <div class="search-bar flex-grow-1">
						<div class="position-relative search-bar-box">
							<input type="text" class="form-control search-control" placeholder="Type to search..."> <span class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>
							<span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
						</div>
					</div> -->
					<div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center">
							
						
							<li class="nav-item dropdown dropdown-large">
								
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										
									</a>
									<div class="header-notifications-list">
										
										
									</div>
									
								</div>
							</li>
							<li class="nav-item dropdown dropdown-large">
								
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										
									</a>
									<div class="header-message-list">
										<a class="dropdown-item" href="javascript:;">
										
										</a>
										
										
									</div>
									
								</div>
							</li>
						</ul>
					</div>
					<div class="user-box dropdown">

					<?php
					// lawyer Profile 
					$lawyerEmail = $_SESSION['lawyer_email'];
					$sql = "SELECT * FROM lawyer WHERE lawyer_email = '$lawyerEmail' ";
					$result = mysqli_query($conn, $sql);
					$row = mysqli_fetch_assoc($result);
					?>

						<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="assets/images/lawyers/<?php echo $row['lawyer_image'] ?>" class="user-img" alt="user avatar">
							<div class="user-info ps-3">
								<p class="user-name mb-0"><?php echo $row['lawyer_fname']. ' '. $row['lawyer_lname'] ?></p>
								<p class="designattion mb-0"><?php echo $row['lawyer_spec'] ?></p>
							</div>
						</a>


						
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item" href="profile.php"><i class="bx bx-user"></i><span>Profile</span></a>
							</li>
							<li>
								<div class="dropdown-divider mb-0"></div>
							</li>
							<li><a class="dropdown-item" href="includes/logout.php"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>