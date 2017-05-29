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
	hashtag : '#PanaBday,#Pana19',
  }, function(response){});

}
   
</script>
<input id="clickMe" style="height:100px;width:400px;background:#3b5998;" name="clickMe" type="button" value="Wish her in facebook" onclick="myFunction()" />

</body>
</html>