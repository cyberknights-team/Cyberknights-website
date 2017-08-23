<!doctype html>
<html lang="en">
<head>
	<!--Session Check-->
	<?php include 'controller/session_check.php';?>
	
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>DIGI-SCHOOL PORTAL</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
	
	<!-- Social Media Icons CSS From W3School-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <link href="assets/css/animate.min.css" rel="stylesheet"/>
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
    <link href="assets/css/demo.css" rel="stylesheet" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="black" data-image="assets/img/sidebar-4.jpg">

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    CyberKnights
                </a>
				<center>
					Welcome <?php echo $_SESSION['username'];?>
				<center>
            </div>

            <ul class="nav">
		<?php
			if(isset($_GET['div'])){
			if($_GET['div']=="material")
				echo '<li class="active">';
			else
				echo '<li>';
			}
			else
				echo '<li class="active">';
                   echo' <a href="welcome.php?div=material">
                        <i class="pe-7s-graph"></i>
                        <p>Materials</p>
                    </a>
                </li>';	
			if(isset($_GET['div'])){
			if($_GET['div']=="software")
				echo '<li class="active">';
			else
				echo '<li>';
			}
			else
				echo '<li class="active">';
                   echo' <a href="welcome.php?div=software">
                        <i class="pe-7s-paint-bucket"></i>
                        <p>Software</p>
                    </a>
                </li>';	
			
			
			if(isset($_SESSION['admin'])){
				if(isset($_GET['div'])){
				  if($_GET['div']=="member")
				    echo '<li class="active">';
			     else
				    echo '<li>';
				}
				else
				echo '<li>';
				echo '
                    <a href="welcome.php?div=member">
                        <i class="pe-7s-user"></i>
                        <p>Members</p>
                    </a>
                </li>';
				if(isset($_GET['div'])){
				  if($_GET['div']=="Show feedbacks")
				    echo '<li class="active">';
			     else
				    echo '<li>';
				}
				else
				echo '<li>';
				echo '
                    <a href="welcome.php?div=showFeedbacks">
                        <i class="pe-7s-note2"></i>
                        <p>Show Feedbacks</p>
                    </a>
                </li>';
				
			}
			else{
				if(isset($_GET['div'])){				
              if($_GET['div']=="feedback")
				echo '<li class="active">';
			  else
				echo '<li>';
			}
			else
				echo '<li>';
                   echo' <a href="welcome.php?div=feedback">
                        <i class="pe-7s-note2"></i>
                        <p>Feedback</p>
                    </a>
                </li>';	
			}
			if(isset($_GET['div'])){
			if($_GET['div']=="logout")
				echo '<li class="active">';
			else
				echo '<li>';
			}
			else
				echo '<li>';
                   echo' <a href="welcome.php?div=logout">
                        <i class="pe-7s-junk"></i>
                        <p>Logout</p>
                    </a>
                </li>';	
			?>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">DIGI-SCHOOL Portal</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">                       
						<li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>

<?php
if(isset($_GET['div'])){
	if($_GET['div']== "material"){
		include 'controller/getAllEvents.php';
			echo '
			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="header">						
									<h4 class="title">Materials</h4>
									<p class="category"></p>
								</div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
										<th>Event name</th>
										<th>Category</th>
                                        <th>FileName</th>
										<th>Date</th>
										<th>File Size</th>
										<th>Options</th>
                                    </thead>
                                    <tbody>';
	


foreach($entities as $entity){
	echo "<tr>";
	echo "<td>".$entity->getPartitionKey()."</td>";
	echo "<td>".$entity->getProperty("Category")->getValue()."</td>";
	echo "<td>".$entity->getProperty("FileName")->getValue()."</td>";
	echo "<td>".$entity->getProperty("Date")->getValue()."</td>";
	echo "<td>".$entity->getProperty("Size")->getValue()."</td>";
	$category = strtolower($entity->getProperty("Category")->getValue());
	$fileName = $entity->getProperty("FileName")->getValue();
	echo "<center><td>
	<a target='_blank' href='controller/viewPDF.php?category=".$category."&fileName=".$fileName."'>
	<button type='submit' class='btn btn-info btn-fill'>View</button>
	</a>";
	echo "</tr>";	
}                         
		
echo '</tbody></table></div></div></div></div></div></div>';
}

else if ($_GET['div']== "member" && isset($_SESSION['admin'])){
	include 'controller/getAllUsers.php';
	echo '
        <div class="content">
            <div class="container-fluid">
                <div class="row">
				  <div class="card">
                            <div class="header">
                                <h4 class="title">Add Member</h4>
                            </div>
                            <div class="content">
                                <form action="controller/register.php" method="POST">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="username" id="username" class="form-control" placeholder="Username" required><br>
												<input type="text" name="password" id="password" maxlength="4" class="form-control" placeholder="PIN" required><br>
												 <select name="role" id ="role" class="form-control">
													<option value="user" default>User</option>
													<option value="admin">Admin</option>
												</select> 
                                            </div>
                                        </div>                                      
                                    </div>
                                    <button type="submit" class="btn btn-info btn-fill pull-right">Add Member</button>
                                    <div class="clearfix"></div>
                                </form>
                                </form>
                            </div>
                        </div>
						<div class="card">
                            <div class="header">
                                <h4 class="title">Remove Member</h4>
                            </div>
                            <div class="content">
                                <form action="controller/delete.php" method="POST">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="username" id="username" class="form-control" placeholder="Username" required><br>
                                            </div>
                                        </div>                                      
                                    </div>
                                    <button type="submit" class="btn btn-info btn-fill pull-right">Remove Member</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
							
					<div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Users</h4>
                                <p class="category"></p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Member Username</th>
                                    	<th>Pin (Max-Length:4)</th>
										<th>Role (Member Access)</th>											
										<th>Options</th>										
                                    </thead>
									<tbody>';
	foreach($entities as $entity){
	if($entity->getProperty("role")->getValue()=="user"){
	echo "<tr><form action= 'controller/updateUser.php' method='POST'>";
	echo "<input type='hidden' name='partition' value='".$entity->getPartitionKey()."' />";
	echo "<input type='hidden' name='rowKey' value='".$entity->getRowKey()."' />";
	echo "<td><div class='form-group'>
	<input type='text' name='username' id='username' class='form-control' placeholder='Username' value=".$entity->getPartitionKey()." required>
     </div></td>";
	echo "<td><div class='form-group'>
	<input type='text' name='password' id='password' maxlength='4' class='form-control' placeholder='password' value=".$entity->getRowKey()." required>
     </div></td>";
	echo "<td><select name='role' id ='role' class='form-control'>
				<option value='user' default>User</option>
				<option value='admin'>Admin</option>
		</select></td>";
	echo "<td><button type='submit' class='btn btn-info btn-fill'>Update</button></form>
	<a href='controller/deleteUser.php?partition=".$entity->getPartitionKey()."&rowkey=".$entity->getRowKey()."'><button type='submit' class='btn btn-info btn-fill'>Delete</button></a></td>";
	echo "</tr>";	
	}
} 
									echo '</tbody>
                                </table>

                            </div>
                        </div>
                    </div>
					<div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Admins</h4>
                                <p class="category"></p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Member Username</th>
                                    	<th>Pin (Max-Length:4)</th>
										<th>Role (Member Access)</th>
										<th>Options</th>										
                                    </thead>
									<tbody>';
	foreach($entities as $entity){
	if($entity->getProperty("role")->getValue()=="admin"){
		echo "<tr><form action= 'controller/updateUser.php' method='POST'>";
		echo "<input type='hidden' name='partition' value='".$entity->getPartitionKey()."' />";
		echo "<input type='hidden' name='rowKey' value='".$entity->getRowKey()."' />";
		echo "<td>
		       <div class='form-group'>
				<input type='text' name='username' id='username' class='form-control' placeholder='Username' value=".$entity->getPartitionKey()." required>
			   </div>
			  </td>";
		echo "<td><div class='form-group'>
				<input type='text' name='password' id='password' class='form-control' placeholder='password' value=".$entity->getRowKey()." maxLength='4' required>
			  </div></td>";
		echo "<td><select name='role' id ='role' class='form-control'>
					<option value='admin' default>Admin</option>
					<option value='user'>User</option>
				  </select></td>";
		echo "<td><button type='submit' class='btn btn-info btn-fill'>Update</button></form>
		<a href='controller/deleteUser.php?partition=".$entity->getPartitionKey()."&rowkey=".$entity->getRowKey()."'><button type='submit' class='btn btn-info btn-fill'>Delete</button></a></td>";
		echo "</tr>";	
	}
} 
									echo '</tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
				
            </div>
        </div>';
}
else if($_GET['div']== "software"){
		include 'controller/getAllSoftware.php';
			echo '
			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="header">						
									<h4 class="title">Software</h4>
									<p class="category"></p>
								</div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
										<th>Category</th>
                                        <th>Software kit</th>
										<th>Contains</th>
										<th>Options</th>
                                    </thead>
                                    <tbody>';
	


foreach($entities as $entity){
	echo "<tr>";
	echo "<td>".$entity->getPartitionKey()."</td>";
	echo "<td>".$entity->getRowKey()."</td>";
	echo "<td>".$entity->getProperty("Contains")->getValue()."</td>";
	echo "<center><td>
	<a target='_blank' href='http://digischool.blob.core.windows.net/".$entity->getPartitionKey()."/".$entity->getRowKey()."'>
	<button type='submit' class='btn btn-info btn-fill'>Download</button>
	</a>";
	echo "</tr>";	
}                         
		
echo '</tbody></table></div></div></div></div></div></div>';
}
else if ($_GET['div']== "showFeedbacks"){
	include 'controller/getAllFeedbacks.php';
			echo '
			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="header">						
									<h4 class="title">Show Feedback</h4>
									<p class="category"></p>
								</div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
										<th>Username</th>
										<th>Date</th>
                                        <th>Event</th>
										<th>Feedback</th>
										<th>Options</th>
                                    </thead>
                                    <tbody>';
	


foreach($entities as $entity){
	echo "<tr>";
	echo "<td>".$entity->getPartitionKey()."</td>";
	echo "<td>".$entity->getRowKey()."</td>";
	echo "<td>".$entity->getProperty("event")->getValue()."</td>";
	echo "<td>".$entity->getProperty("feedback")->getValue()."</td>";
	echo "<td><a href='controller/deleteFeedback.php?partition=".$entity->getPartitionKey()."&rowkey=".$entity->getRowKey()."'>
	<button type='submit' class='btn btn-info btn-fill'>Delete</button>
	</a></td>";
	echo "</tr>";	
}                         
		
echo '</tbody></table></div></div></div></div></div></div>';
}
else if($_GET['div']== "feedback"){
	echo '
        <div class="content">
            <div class="container-fluid"> 
                <div class="row">
				  <div class="card">
                            <div class="header">
                                <h4 class="title">Feedback</h4>
                            </div>

                            <div class="content">
							
                                <form action="controller/feedback.php" method="GET">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
												<input type="text"  name="event" id="event" class="form-control" placeholder="Event" required/>
                                                <br>
												<textarea name="feedback" id="feedback" rows="4" cols="50" class="form-control" placeholder="Feedback" required></textarea>
                                            </div>
                                        </div>                                      
                                    </div>
                                    <button type="submit" class="btn btn-info btn-fill pull-right">Send Feedback</button>
                                    <div class="clearfix"></div>
                                </form>
								
                            </div>
						
                        </div>
					</div>
				</div>
			</div>
		';
}

else if($_GET['div']== "logout"){
session_start();
session_destroy();
header("Location: ../digi-school");
}

}
else
{
	header("Location: welcome.php?div=material");
}
?>
        <footer class="footer">
            <div class="container-fluid">
			<p class="copyright pull-left">
							<a href="https://www.facebook.com/CyberKnightsHlin/" class="fa fa-facebook" target="_blank"></a>
							<a href="https://twitter.com/CyberKnights4" class="fa fa-twitter" target="_blank"></a>
							<a href="https://www.youtube.com/channel/UC3509mOLV67pDqpJOgQ8euQ" class="fa fa-youtube" target="_blank"></a>
							<a href="http://github.com/cyberknights-team/" class="fa fa-github" target="_blank"></a>
			</p>
                <p class="copyright pull-right">
                    <a href="http://www.cyberknights.in">&copy;CyberKnights</a>
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>
	<script src="assets/js/chartist.min.js"></script>
    <script src="assets/js/bootstrap-notify.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
	<script src="assets/js/light-bootstrap-dashboard.js"></script>
	<script src="assets/js/demo.js"></script>

	<?php
	$msg ="";
	if(isset($_GET['result'])){
		if(isset($_GET['result'])=='y'){
			if($_GET['div']=="feedback"){
				$msg = "Thanks for your feedback !!!";
			}
			else if($_GET['div']=="member"){
				if($_GET['result']=="deletey"){
					$msg = "Member has been Removed !!!";
				}
				else if($_GET['result']=="updateUsery"){
					$msg = "Member has been Updated !!!";
				}
				else{
					$msg = "Member has been Added !!!";
				}
		
			}

			else if($_GET['div']=="showFeedbacks"){
				$msg = "Feedback has been removed !!!";
			}
		}
		else{
			$msg = $_GET['result'];
		}
	echo '
		<script type="text/javascript">
			$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: "pe-7s-gift",
            	message: "'.$msg.'"

            },{
                type: "info",
                timer: 2000
            });

    	});
		</script>';
	}
		
?>
</html>
