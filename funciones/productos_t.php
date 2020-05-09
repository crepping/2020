<?php
include './configuraciones.php';
        //get rows query
        $query = $db->query("SELECT * FROM mis_productos ORDER BY id DESC LIMIT 10");
        if($query->num_rows > 0){ 
            while($row = $query->fetch_assoc()){
            }
?>