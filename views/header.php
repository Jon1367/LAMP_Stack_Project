<?
// if(!empty($_GET["action"])){
//   if($_GET["action"] == "profile" || $_GET["action"] == "processLogin"){
//     if(empty($par2) || $par2["loggedin"] == false ){
//         header( "Location: ?controller=home&action=logininForm");
//     }  
//   }
// }
?>


<html>
<head>
	<title></title>

    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/normalize.css">
    <script src="js/vendor/modernizr.js"></script>
<body>

<nav class="top-bar" data-topbar role="navigation">
	<ul class="title-area">
		<li class="name">
			<h1 id="name">Gamer DataBase</h1>
		</li>
	</ul>
		
	<section class="top-bar">
	<ul class="">
		<li><a href="?controller=home&action=loginForm">Login</a></li>
		<li><a href="?controller=home&action=contactus">Contact Us</a></li>
		<li><a href="?controller=home&action=home">Home</a></li>
		<li><a href="?controller=home&action=checkSession">Check Session</a></li>
		<li><a href="?controller=home&action=uploadForm">Upload</a></li>
		<li><a href="?controller=home&action=profile">profile</a></li>
		<li><a href="?controller=home&action=addUser">Add</a></li>
		<li><a href="?controller=home&action=logOut">Logout</a></li>
		<li><a href="?controller=home&action=inJSON">API</a></li>
		


			</ul>	
	</section> 
</nav>

<script src="js/vendor/jquery.js"></script>
<script src="js/foundation.min.js"></script>
<script>
      $(document).foundation();
</script>
</body>
</html>
