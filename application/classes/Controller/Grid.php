<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Grid extends Controller {
    
	public function action_read()
	{
		$db=mysql_connect("localhost", "valdic_bgetru", "zZ2b5663");
        @mysql_select_db("valdic_bgetru", $db);
        @mysql_query ("SET NAME 'utf8'");

        $sql ="SELECT u.name, e.education, c.city, u.id FROM users u JOIN educations e ON u.id = e.user_id JOIN cities c ON u.id = c.user_id";
        
   
        $result = mysql_query($sql);   
        
        $num = mysql_numrows($result); 
        
        $namesData = array("count" => $num, "names" => array());
        
           if ($filter=$this->request->post("filter")) {
                
                $filter = json_decode($filter, true);
                $eduFilter = $filter["0"]["value"];
                $cityFilter = $filter["1"]["value"];
                
                
                while ($row = mysql_fetch_assoc($result)) {
                    
                    foreach ($eduFilter as $e) {
                        foreach ($cityFilter as $c) {
                            if (in_array($e, $row) & preg_match("/$c/", $row["city"])) {
                                $namesData["names"][] = $row;
                                break;
                            }
                        }
                    }
                }
                $json = json_encode($namesData);
                echo $json;
           }
           else {
                while ($row = mysql_fetch_assoc($result)) {    
                    $namesData["names"][] = $row; 
                }
                
                $json = json_encode($namesData);
                echo $json;
           }
	}
    
    public function action_update()
	{
		if (Request::initial()->is_ajax()) {
		  
            $json = json_decode(file_get_contents('php://input'), true);
            $a = $json['education'];
            $id = $json['id'];
            
            
            $db=mysql_connect("localhost", "valdic_bgetru", "zZ2b5663");
            mysql_select_db("valdic_bgetru", $db);
            mysql_query ("SET NAME 'utf8'");
            
            $sql = "UPDATE educations SET education = '$a' WHERE user_id = '$id'";
            $result = mysql_query($sql);
            
            echo json_encode($json);
        }
	}
    
}