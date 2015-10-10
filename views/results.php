<?

 //    echo $par2["username"];
	// echo md5($par2["password"]);
  
	foreach ($par2 as $user) {

		echo $user["username"];
		echo " <a href='?controller=home&action=delete&id=".$user["id"]."'>delete</a>";
		echo " <a href='?controller=home&action=updateForm&id=".$user["id"]."'>delete</a>";
		echo " <a href=''>update</a>";
		echo "<br>";

		# code...
	}
?>
<p>body</p>
