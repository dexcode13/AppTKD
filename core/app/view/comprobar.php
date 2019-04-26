<?php
      $user = $_POST['b'];
       
      if(!empty($user)) {
            comprobar($user);
      }
       
      function comprobar($b) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "produccion_eric";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
            $sql = "SELECT * FROM alumnos WHERE rgi='".$b."'";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                echo "<div class='alert alert-danger' role='alert'>
                EL RGI YA EXISTE!!!
              </div>";
            } else {
                echo "<div class='alert alert-success' role='alert'>
                DISPONIBLE!
              </div>";
                
            }
            $conn->close();
      }     
?>