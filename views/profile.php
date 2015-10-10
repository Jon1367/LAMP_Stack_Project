<?
if($par2[] == 0){

	echo "Hello";
    header("Location: http://localhost:8888/?controller=home&action=loginForm");

}elseif{

	  var_dump($par2);
    echo $par2["username"];
	echo md5($par2["password"]);
  
}
?>
<p>body</p>
<?
//echo md5($par["password"]);
?>