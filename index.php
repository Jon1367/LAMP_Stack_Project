<?

if(empty($_GET["controller"])){//if the url is not empty

    include 'controllers/home.php';

}else{

    if ($_GET["controller"] == "home") {

        include 'controllers/home.php';

    } else{

        include 'controllers/home.php';

    }

}
?>
