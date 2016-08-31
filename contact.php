<!DOCTYPE html>
<html class="uk-notouch" dir="ltr" lang="en-gb"><head>
 <head>
        <title>CyberKnights | Contact</title>
        <link rel="stylesheet" href="css/uikit.min.css" />
		<link rel="stylesheet" href="bower_components/sweetalert/dist/sweetalert.css">
		
		<script src="bower_components/sweetalert/dist/sweetalert.min.js"></script> 
        <script src="js/jquery.js"></script>
        <script src="js/uikit.min.js"></script>
		
		
	
    </head>
	
	
	
	<body>
	<?php
	if(isset($_GET['id'])) {
      echo "<script>sweetAlert('Message Send !!!','Thanks for your response... We will contact you soon... ');</script>";
    }
	?>
	 <div class="uk-container uk-container-center uk-margin-top uk-margin-large-bottom">

            <nav class="uk-navbar uk-margin-large-bottom">
                <a class="uk-navbar-brand uk-hidden-small" href="index.php">CyberKnights</a>
                <ul class="uk-navbar-nav uk-hidden-small">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="products.php">Products</a>
                    </li>
                    <li  class="uk-active">
                        <a href="contact.php">Contact</a>
                    </li>
                    <li>
                        <a href="developers.php">Developers</a>
                    </li>
                </ul>
                <a href="#offcanvas" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas=""></a>
                <div class="uk-navbar-brand uk-navbar-center uk-visible-small">CyberKnights</div>
            </nav>
			
			
			 
      <div class="uk-grid" data-uk-grid-margin="">

                <div class="uk-width-medium-2-3 uk-row-first">
                    <div class="uk-panel uk-panel-header">

                        <h3 class="uk-panel-title">Get in touch</h3>

                        <form class="uk-form uk-form-stacked" action="php/send.php" method="post">

                            <div class="uk-form-row">
                                <label class="uk-form-label">Your Name</label>
                                <div class="uk-form-controls">
                                    <input name="name" placeholder="" class="uk-width-1-1" type="text" maxlength="50">
                                </div>
                            </div>

                            <div class="uk-form-row">
                                <label class="uk-form-label">Your Email</label>
                                <div class="uk-form-controls">
                                    <input name="email" type="email" placeholder="" class="uk-width-1-1" type="text" maxlength="50">
                                </div>
                            </div>

                            <div class="uk-form-row">
                                <label class="uk-form-label">Your Message</label>
                                <div class="uk-form-controls">
                                    <textarea name="message" maxlength="255" class="uk-width-1-1" id="form-h-t" cols="100" rows="9"></textarea>
                                </div>
                            </div>

                            <div class="uk-form-row">
                                <div class="uk-form-controls">
                                    <button name="send" class="uk-button uk-button-primary">Send</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>

                <div class="uk-width-medium-1-3">
                    <div class="uk-panel uk-panel-box uk-panel-box-secondary">
                        <h3 class="uk-panel-title">Contact Details</h3>
                        <p>
                            <strong>CyberKnights</strong>
                            <br>NIIT University,<br>Neemrana,<br>Alwar,Rajasthan<br>India-301705
                        </p>
                        <p>
                            Mail:<a href="mailto:cyberknightsnu@gmail.com">cyberknightsnu@gmail.com</a>
                        </p>
                        <h3 class="uk-h4">Follow Us</h3>
                        <p>
						    <a target="_blank" href="https://www.facebook.com/CyberKnightsHlin/" class="uk-icon-button uk-icon-facebook"></a>      
                            <a target="_blank" href="https://twitter.com/CyberKnights4" class="uk-icon-button uk-icon-twitter"></a>
							<a target="_blank" href="https://www.youtube.com/channel/UC3509mOLV67pDqpJOgQ8euQ" class="uk-icon-button uk-icon-youtube"></a>
                            
                        </p>
                    </div>
                </div>
            </div>
					
					<hr class="uk-grid-divider">
             <footer>
                <img src="assets/logo.png" alt="" height="50" width="50"> Reserved by cyberknights
				<div style="float:right;">
				            <a target="_blank" href="https://www.facebook.com/CyberKnightsHlin/" class="uk-icon-button uk-icon-facebook"></a>      
                            <a target="_blank" href="https://twitter.com/CyberKnights4" class="uk-icon-button uk-icon-twitter"></a>
							<a target="_blank" href="https://www.youtube.com/channel/UC3509mOLV67pDqpJOgQ8euQ" class="uk-icon-button uk-icon-youtube"></a>
				</div>
             </footer>
	</div>
	
	</body>
	</html>