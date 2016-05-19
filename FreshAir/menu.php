<?PHP
/**
 * index page
 * default page for user
 */
?>
<div class="navbar navbar-inverse navbar-fixed-top headroom" >
	<div class="container">
		<div class="navbar-header">
			<!-- Button for smallest screens -->
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
			<a class="navbar-brand" href="index.php"><img src="assets/images/logo.png" ></a>
                    
		</div>
		<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
				<li><a href="index.php">Home</a></li>
                <li><a href="hotspots.php">Map</a></li>
				<li><a href="statistics.php">Statistics</a></li>
				<li><a href="aboutus.php">About Us</a></li>
				<li><a href="facts.php">Facts</a></li>
				<li><a href="awareness.php">Awareness</a></li>
				<?php
				if(!(@$_SESSION['Admin'] || @$_SESSION['Invited'])) {
				?>					
					<li><a class="btn" href="signin.php">Sign In</a></li>
				<?php
				} 
				if(@$_SESSION['Invited']){				
					?>	
						<li><a href="dataInvited.php">Data Table</a></li>						
						<li><a href="logout.php">Logout</a></li>
					<?php
					}			
				if(@$_SESSION['Admin']){
				?>
					<li><a href="adminData.php">Data Table</a></li>
					<li><a href="logout.php">Logout</a></li>
				<?php
				}
									
				?>
			</ul>
              
		</div><!--/.nav-collapse -->
<h6 style="color:white;"> Beta Version (Under Construction) </h6>
	</div>
</div> 

