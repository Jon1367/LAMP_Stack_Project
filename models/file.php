<?

class file{//name classes as file names

    public function upload($up){//public makes this available to whoever instanciates it

    	$uploaddir = './uploads/'; //physical path on Apache
		$uploadfile = $uploaddir . basename($up['myfile']['name']);

	if (move_uploaded_file($up['myfile']['tmp_name'], $uploadfile)) {
	echo "File is valid, and was successfully uploaded.\n";
	?>
		 <img src="uploads/<?=$up['myfile']['name']?>" alt="">
	<?
	} else {
	echo "Possible file upload attack!\n";
	}
	print_r($up);

    }

 //    public function getImage($up){//public makes this available to whoever instanciates it

 //    $uploaddir = './uploads/'; //physical path on Apache
	// $uploadfile = $uploaddir . basename($up['myfile']['name']);

	// if (move_uploaded_file($up['myfile']['tmp_name'], $uploadfile)) {
	// echo "File is valid, and was successfully uploaded.\n";
	
	// } else {
	// echo "Possible file upload attack!\n";
	// }
	// print_r($up);

 //    }




 	}


?>