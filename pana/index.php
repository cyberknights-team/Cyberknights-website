<html>
<title>PanaBday</title>
<body>


<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '450461368636435',
      cookie     : true,
      xfbml      : true,
      version    : 'v2.8'
    });
    FB.AppEvents.logPageView();   
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
function myFunction() {

  FB.ui({
    method: 'share',
    display: 'popup',
    href: 'cyberknights.in/pana',
	hashtag : '#PanaBday #Pana19',
  }, function(response){});

}
   
</script>
<input id="clickMe" name="clickMe" type="button" value="clickme" onclick="myFunction()" />
<div class="fb-login-button" data-max-rows="1" data-size="large" data-button-type="login_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="false"></div>
</body>
</html>