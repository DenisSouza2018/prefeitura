<?php
    
    header ('Content-type: text/html; charset=UTF-8');
    session_start();

    function __autoload($class_name){
        
        require_once 'D:/xampp/htdocs/prefeitura/enquete/classe/'. $class_name . '.php';
    }
   

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $status = $_POST['skills'];
        $id = filter_input(INPUT_POST, "form_IDEnquente", FILTER_SANITIZE_MAGIC_QUOTES);
      
        $max = sizeof($status);
        

       
             
        $Array=[];
         for($i=0;$i<$max;$i++){
             array_push($Array,explode("+",$status[$i]));
        } 
        
        for($i=0;$i<$max;$i++){
            if($Array[$i][0] == $id){
                $status = $Array[$i][1];
            }
       }
        
        
     
        

        $sql = "UPDATE `enquete` SET status='$status' WHERE id = $id";

       echo $sql;
    
         $stmt = DB::prepare($sql);
        header('Location:/prefeitura/enquete/index.php');

        return $stmt->execute();  
        

    }
       
      

    
        
        
      

       
    

?>