

<html xmlns ="http://www.w3c.org/1999/xhtml"/>
<head>
    <meta http-equiv="CONTENT-TYPE" content="text/html"  charset="utf-8"/>
    <title>
        会员系统
    </title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <script src="jquery_ui/external/jquery/jquery.js"></script>
    <script src="jquery_ui/jquery-ui.js"></script>
    <link rel="stylesheet" href="jquery_ui/ui_themes/jquery-ui.css" />
    <script src="jquery_ui/js/defautl.js"></script>



</head>
<body>
    <?php

     function __autoload($_className){
        global $dir;
         $dir=__dir__;
       // echo $dir;
//         die();
         $_req =$dir.'/'.$_className.'.class.php';

            require_once $_req;

        }

        if(isset($_GET['index'] ) ){
            $_main =new Main($_GET['index']);

        }else {
           $_main= new Main();
        }


         $_main -> _run() ;
    echo  date('Y-m-d H:i:s', time());



    ?>


</body>
</html>
