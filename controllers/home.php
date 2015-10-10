<?php

session_start();

//home controller

include 'models/view.php';
include 'models/file.php';
include 'models/login.php';
include 'models/profile.php';
include 'models/users.php';



$viewmodel = new view();//instanciating the view(model) to link on this page
$filemodel = new file();
$loginmodel = new login();
$usersmodel = new users();

// $profilemodel = new profile();





if(empty($_GET["action"])){//this is what the user see right when they access the page

    $viewmodel->getView("views/header.php");//the are looking for parameters in view.php..in the paraentheses is only 1
   // $viewmodel->getView("views/body.php");
   // $viewmodel->getView("views/footer.php");


}else{

    if ($_GET["action"] == "home"){//the action is what the user clicks to navigate through site

        
        $data = $usersmodel->getUsers();
        var_dump($data);
        $viewmodel->getView("views/header.php");
        $viewmodel->getView("views/results.php",$data);



    }elseif(($_GET["action"] == "loginForm")){

        $viewmodel->getView("views/header.php");
        $viewmodel->getView("views/form.php");
        //$viewmodel->getView("views/footer.php");

    }elseif(($_GET["action"] == "processLogin")){

        $returnedLogin = $loginmodel->checkuser($_POST);


        if($returnedLogin){
            $_SESSION["username"] = $_POST["username"];
            $_SESSION["loggedin"] = true;

        }else{
            $_SESSION["username"] = "";
            $_SESSION["loggedin"] = false;
        }

        // $loginmodel->checkuser($_POST);

        // make data equl to return log in
        // created a protect page
        // check if the user's login if not kick back to the log in
         //$data = $_POST;
        $viewmodel->getView("views/header.php");
        $viewmodel->getView("views/results.php",$returnedLogin);
        // $viewmodel->getView("views/footer.php");

    }elseif($_GET["action"] == "checkSession"){
        $data = $_SESSION;
        $viewmodel->getView("views/header.php");
        $viewmodel->getView("views/results.php",$data);
       // $viewmodel->getView("views/footer.php");
    }elseif($_GET["action"] == "uploadForm"){

        $viewmodel->getView("views/header.php");
        $viewmodel->getView("views/uploadForm.php");


    }elseif($_GET["action"] == "delete"){

        $usersmodel->deleteUser($_GET["id"]);
        $data = $usersmodel->getUsers();
        var_dump($data);
        $viewmodel->getView("views/header.php");
        $viewmodel->getView("views/results.php",$data);


    }elseif($_GET["action"] == "updateForm"){

        $data = $usersmodel->getUser($_GET["id"]);
        $viewmodel->getView("views/updateForm.php",$data);

        //$usersmodel->deleteUser($_GET["id"]);
        $data = $usersmodel->getUsers();
        //var_dump($data);
        $viewmodel->getView("views/header.php");
        $viewmodel->getView("views/results.php",$data);


    }elseif($_GET["action"] == "update"){

        $data = $usersmodel->updateUser($_POST["username"],$_POST["password"],$_GET["id"]);
        $viewmodel->getView("views/updateForm.php",$data);

        //$usersmodel->deleteUser($_GET["id"]);
        $data = $usersmodel->getUsers();
        //var_dump($data);
        $viewmodel->getView("views/header.php");
        $viewmodel->getView("views/results.php",$data);


    }elseif($_GET["action"] == "uploadAction"){


        $viewmodel->getView("views/header.php");
        // var_dump($_POST);
        // echo "POST DATA";
        // var_dump($_Files);

        $data = $_SESSION;
        $filemodel->upload($_FILES);
        $viewmodel->getView("views/results.php",$data);



    }elseif($_GET["action"] == "addUser"){

  
    // $viewmodel->getView("views/header.php");
        $viewmodel->getView("views/adduser.php");

    }elseif($_GET["action"] == "addingUser"){

      //,$_GET["id"]
        //$data = $_SESSION;
        $viewmodel->getView("views/header.php");
        $data = $usersmodel->addUser($_POST["username"],$_POST["password"]);
        $viewmodel->getView("views/results.php",$data);

        //$usersmodel->deleteUser($_GET["id"]);
    $data = $usersmodel->getUsers();
        //var_dump($data);

    }elseif($_GET["action"] == "outXML"){


        $data = $usersmodel->getUsers();
        header("Content-Type: text/xml"); //make sure the correct MIME type is set 

        ?>
        <employees>
        <?foreach($data as $user){?>
        <person>
        <firstName><?= $user["username"];?></firstName>
        <userimg>/uploads/photo.jpg</userimg>

        </person>  
        <? } ?>
        </employees>
        <?

        


    }elseif($_GET["action"] == "outJSON"){

        header("Content-Type: application/json"); 
        $data = $usersmodel->getUsers();
        echo json_encode($data);


    }elseif($_GET["action"] == "inJSON"){
        // Weather APi
        // http://api.openweathermap.org/data/2.5/weather?q=Orlando,us&APPID=d4ffe2c3d899b50d3805cefc4fa12bf7
        //header("Content-Type: application/json");
        $data = file_get_contents("https://api.flickr.com/services/rest/?method=flickr.photos.search&api_key=d94e7158d1530aafac66b0aafd9f11e1&text=batman&format=json&nojsoncallback=1&auth_token=72157654528311635-901aee8175f3ce2f&api_sig=9a6d07dd7372572fdbbd8af87e590da9");
        //$data = file_get_contents('https://www.xboxleaders.com/api/Bi0g3n.json');
        // $data = $response = Unirest\Request::get("https://xboxapi.p.mashape.com/json/games/Bi0g3n",
        //         array(
        //                 "X-Mashape-Key" => "<required>",
        //                 "Accept" => "application/json"
        //             )
        //             );
        $jsonarr = json_decode($data,true);
        //echo json_encode($jsonarr);
        //var_dump($jsonarr);
        $viewmodel->getView("views/header.php");
        $viewmodel->getView("views/image.php",$jsonarr);

    }elseif($_GET["action"] == "profile"){

        
  
        // $data = $_SESSION;
        // $profileLogin = $profilemodel->getUser($_POST);
        // var_dump($profileLogin);
        //isset($_session[logedin])
        $data = $_SESSION;
        if(isset($_SESSION["loggedin"])){
            if($_SESSION["loggedin"] == false){

            header("Location: ?controller=home&action=loginForm");

            }
        } else{

            header("Location: ?controller=home&action=loginForm");
        }

    
       
        // var_dump($_FILES);

        $viewmodel->getView("views/uploadForm.php");
        $viewmodel->getView("views/header.php");
        $viewmodel->getView("views/results.php",$data);
        // $filemodel->getImage($_FILES);


        

    }
    elseif($_GET["action"] == "logOut"){


        $viewmodel->getView("views/header.php");
        $viewmodel->getView("views/form.php");
        // Destory's Session
        session_destroy();
    }
}


?>