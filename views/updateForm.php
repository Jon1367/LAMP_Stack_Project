<?

	foreach ($par2 as $user) {
?>
<form action="?controller=home&action=update&id=<?=$user['id']?>" method="POST" >
<input type="text" name="username" value="<?echo $user["username"]?>">
<input type="text" name="password" value="<?echo $user["password"]?>">

<input type="submit">
<?

 //    echo $par2["username"];
	// echo md5($par2["password"]);
  
	

		echo $user["username"];
		echo " <a href='?controller=home&action=delete&id=".$user["id"]."'>delete</a>";
		echo " <a href='?controller=home&action=updateForm&id=".$user["id"]."'>update</a>";
		//echo " <a href=''>update</a>";
		echo "<br>";

		# code...
	}
?>
</form>
<p>body</p>
