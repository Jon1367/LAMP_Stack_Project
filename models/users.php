<?

class users{//name classes as file names

    public function getUsers(){//public makes this available to whoever instanciates it


    	$dbh = new PDO('mysql:host=localhost;dbname=ssl;port=8889', 'root', 'root');

    	// $sql = "select username, password from users where 
    	// username=".$user["username"];


    	$sql = "select * from users";

    	$st=$dbh->prepare($sql);

    	$st->execute();


    	return $st->fetchAll();
    	
    }
    public function deleteUser($userid){


        $dbh = new PDO('mysql:host=localhost;dbname=ssl;port=8889', 'root', 'root');

        // $sql = "select username, password from users where 
        // username=".$user["username"];


        $sql = "delete  from users where id=:id";

        $st=$dbh->prepare($sql);

        $st->execute(array(":id"=>$userid));




    }
    public function getUser($userid){


        $dbh = new PDO('mysql:host=localhost;dbname=ssl;port=8889', 'root', 'root');

        // $sql = "select username, password from users where 
        // username=".$user["username"];


        $sql = "select * from users where id=:id";

        $st=$dbh->prepare($sql);

        $st->execute(array(":id"=>$userid));

        return $st->fetchAll();

        


    }

    public function updateUser($username,$password,$userid){

        var_dump($username,$password,$userid);

        $dbh = new PDO('mysql:host=localhost;dbname=ssl;port=8889', 'root', 'root');

        // $sql = "select username, password from users where 
        // username=".$user["username"];


        $sql = "update users set username=:username
        ,
        password=:pass
        where id=:id";

        $st=$dbh->prepare($sql);

        $st->execute(array(":username"=>$username,
            ":pass"=>$password,
            ":id"=>$userid));

        return $st->fetchAll();

        


    }
    public function addUser($username,$password){

        var_dump($username,$password);

        $dbh = new PDO('mysql:host=localhost;dbname=ssl;port=8889', 'root', 'root');

        // $sql = "select username, password from users where 
        // username=".$user["username"];


        $sql = "insert into users
        (username,password
    
        )values(
        :un, :pass
        );";

        $st=$dbh->prepare($sql);

        $st->execute(array(":un"=>$username,
            ":pass"=>$password));

    //return $st->fetchAll();

        


    }

}


?>