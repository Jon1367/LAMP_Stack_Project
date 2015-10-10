<?

class profile{//name classes as file names

    public function getUser($user){//public makes this available to whoever instanciates it


    	$dbh = new PDO('mysql:host=localhost;dbname=ssl;port=8889', 'root', 'root');

    	// $sql = "select username, password from users where 
    	// username=".$user["username"];


    	$sql = "select username, password from users where 
    	username = :un and password=:pass";

    	$st=$dbh->prepare($sql);

        var_dump($user);

    	$st->execute(array(":un"=>$user["username"],
    	 	":pass"=>md5($user["password"])));

        

        return $st->fetchAll();



    	// if($st->fetchAll()){
    	// 	return 1;
    	// }else{

    	// 	return 0;
    	// }
    }




}


?>