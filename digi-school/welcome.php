<!doctype html>
<html lang="en">
<head>
	<?php include 'controller/session_check.php';?>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>DIGI-SCHOOL PORTAL</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <link href="assets/css/animate.min.css" rel="stylesheet"/>
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
    <link href="assets/css/demo.css" rel="stylesheet" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="azure" data-image="assets/img/sidebar-5.jpg">

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
			
			
			
			if(isset($_SESSION['admin'])){
				if(isset($_GET['div'])){
				  if($_GET['div']=="addUser")
				    echo '<li class="active">';
			     else
				    echo '<li>';
				}
				else
				echo '<li>';
				echo '
                    <a href="welcome.php?div=addUser">
                        <i class="pe-7s-user"></i>
                        <p>Add User</p>
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
				if(isset($_GET['div'])){
				  if($_GET['div']=="Remove User")
				    echo '<li class="active">';
			     else
				    echo '<li>';
				}
				else
				echo '<li>';
				echo '
                    <a href="welcome.php?div=removeUser">
                        <i class="pe-7s-delete-user"></i>
                        <p>Remove User</p>
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
	$link = "http://digischool.blob.core.windows.net/".$category."/".$entity->getRowKey().".pdf";
	echo "<center><td>
	<a target='_blank' href='".$link."'>
	<button type='submit' class='btn btn-info btn-fill'>View</button>
	</a>";
	echo "</tr>";	
}                         
		
echo '</tbody></table></div></div></div></div></div></div>';
}

else if ($_GET['div']== "addUser" && isset($_SESSION['admin'])){
	include 'controller/getAllUsers.php';
	echo '
        <div class="content">
            <div class="container-fluid">
                <div class="row">
				  <div class="card">
                            <div class="header">
                                <h4 class="title">Add Members</h4>
                            </div>
                            <div class="content">
                                <form action="controller/register.php" method="POST">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="username" id="username" class="form-control" placeholder="Username"><br>
												<input type="text" name="password" id="password" class="form-control" placeholder="PIN"><br>
												 <select name="role" id ="role" class="form-control">
													<option value="user" default>User</option>
													<option value="admin">Admin</option>
												</select> 
                                            </div>
                                        </div>                                      
                                    </div>
                                    <button type="submit" class="btn btn-info btn-fill pull-right">Add User</button>
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
                                        <th>Username</th>
                                    	<th>Pin</th>											
                                    </thead>
									<tbody>';
	foreach($entities as $entity){
	if($entity->getProperty("role")->getValue()=="user"){
	echo "<tr>";
	echo "<td>".$entity->getPartitionKey()."</td>";
	echo "<td>".$entity->getRowKey()."</td>";
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
                                        <th>Username</th>
                                    	<th>Pin</th>											
                                    </thead>
									<tbody>';
	foreach($entities as $entity){
	if($entity->getProperty("role")->getValue()=="admin"){
	echo "<tr>";
	echo "<td>".$entity->getPartitionKey()."</td>";
	echo "<td>".$entity->getRowKey()."</td>";
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
                                    </thead>
                                    <tbody>';
	


foreach($entities as $entity){
	echo "<tr>";
	echo "<td>".$entity->getPartitionKey()."</td>";
	echo "<td>".$entity->getRowKey()."</td>";
	echo "<td>".$entity->getProperty("event")->getValue()."</td>";
	echo "<td>".$entity->getProperty("feedback")->getValue()."</td>";
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
												<input type="text"  name="event" id="event" class="form-control" placeholder="Event"/>
                                                <br>
												<textarea name="feedback" id="feedback" rows="4" cols="50" class="form-control" placeholder="Feedback"></textarea>
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
else if($_GET['div']== "removeUser"){
	include 'controller/getAllUsers.php';
	echo '
        <div class="content">
            <div class="container-fluid">
                <div class="row">
				  <div class="card">
                            <div class="header">
                                <h4 class="title">Remove Member</h4>
                            </div>
                            <div class="content">
                                <form action="controller/delete.php" method="POST">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="username" id="username" class="form-control" placeholder="Username"><br>
                                            </div>
                                        </div>                                      
                                    </div>
                                    <button type="submit" class="btn btn-info btn-fill pull-right">Add User</button>
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
                                        <th>Username</th>
                                    	<th>Pin</th>											
                                    </thead>
									<tbody>';
	foreach($entities as $entity){
	if($entity->getProperty("role")->getValue()=="user"){
	echo "<tr>";
	echo "<td>".$entity->getPartitionKey()."</td>";
	echo "<td>".$entity->getRowKey()."</td>";
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
                                        <th>Username</th>
                                    	<th>Pin</th>											
                                    </thead>
									<tbody>';
	foreach($entities as $entity){
	if($entity->getProperty("role")->getValue()=="admin"){
	echo "<tr>";
	echo "<td>".$entity->getPartitionKey()."</td>";
	echo "<td>".$entity->getRowKey()."</td>";
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
   
                <p class="copyright pull-right">
                    &copy;CyberKnights
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
	if(isset($_GET['result'])){
		if(isset($_GET['result'])=='y'){
	if($_GET['div']=="feedback"){
		echo '
		<script type="text/javascript">
			$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: "pe-7s-gift",
            	message: "Thanks for your feedback !!!"

            },{
                type: "info",
                timer: 2000
            });

    	});
		</script>';
	}
	else if($_GET['div']=="addUser"){
		echo '
		<script type="text/javascript">
			$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: "pe-7s-gift",
            	message: "Member has been added !!!"

            },{
                type: "info",
                timer: 2000
            });

    	});
		</script>';
	}
	else if($_GET['div']=="removeUser"){
		echo '
		<script type="text/javascript">
			$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: "pe-7s-gift",
            	message: "Member has been removed !!!"

            },{
                type: "info",
                timer: 2000
            });

    	});
		</script>';
	}
		}
		else{
			echo '
		<script type="text/javascript">
			$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: "pe-7s-gift",
            	message: '.$_GET['result'].'

            },{
                type: "info",
                timer: 2000
            });

    	});
		</script>';
		}
	}
?>
</html>
