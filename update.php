<?php
        //$a = var_dump($_POST);
        //$a = implode ($_POST);
        //$a = stripslashes($a);
        //$a = json_decode($a);
        $json = json_decode(file_get_contents('php://input'), true);
        $a = $json['education'];
/****/
        $db=mysql_connect("localhost", "valdic_bgetru", "zZ2b5663");
        mysql_select_db("valdic_bgetru", $db);
        mysql_query ("SET NAME 'utf8'");
        
        $sql = "INSERT INTO test VALUES ('','$a')";
        $result = mysql_query($sql); 


echo json_encode($json);
?>