
<?php
                     
                     /*$ftp_server = "ftp.consultoresdiaf.com";
                     $ftp_user = "backups@consultoresdiaf.com";
                     $ftp_pass = "AgroDG.2018*";
                     
                     // establecer una conexión o finalizarla
                     $conn_id = ftp_connect($ftp_server) or die("No se pudo conectar a $ftp_server"); 
                     
                     // intentar iniciar sesión
                     if (@ftp_login($conn_id, $ftp_user, $ftp_pass)) {
                         echo "Conectado como $ftp_user@$ftp_server\n";
                     } else {
                         echo "No se pudo conectar como $ftp_user\n";
                     }
                     
                     // cerrar la conexión ftp
                     ftp_close($conn_id);  */
                     
                     if(isset($_POST['SubmitFile'])){
                         $myFile = $_FILES['txt_file']; // This will make an array out of the file information that was stored.
                         $file = $myFile['tmp_name'];  //Converts the array into a new string containing the path name on the server where your file is.
                   
                         $myFileName = basename($_POST['txt_fileName']); //Retrieve filename out of file path
                         
                         $destination_file = "backups/".$myFileName;  //where you want to throw the file on the webserver (relative to your login dir)
                   
                         // connection settings
                         $ftp_server = "ftp.consultoresdiaf.com";  //address of ftp server.
                         $ftp_user_name = "backups@consultoresdiaf.com"; // Username
                         $ftp_user_pass = "dexter.13*1991";   // Password
                   
                         $conn_id = ftp_connect($ftp_server);        // set up basic connection
                         $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass) or die("<h2>You do not have access to this ftp server!</h2>");   // login with username and password, or give invalid user message
                         if ((!$conn_id) || (!$login_result)) {  // check connection
                                // wont ever hit this, b/c of the die call on ftp_login
                                echo "FTP connection has failed! <br />";
                                echo "Attempted to connect to $ftp_server for user $ftp_user_name";
                                exit;
                            } else {
                            //    echo "Connected to $ftp_server, for user $ftp_user_name <br />";
                         }
                         
                         $upload = ftp_put($conn_id, $destination_file, $file, FTP_ASCII);  // upload the file
                         if (!$upload) {  // check upload status
                            echo "<h2>FTP upload of $myFileName has failed!</h2> <br />";
                         } else {
                            echo "Uploading $myFileName Complete!<br /><br />";
                         }
                   
                         ftp_close($conn_id); // close the FTP stream
                     }
                   ?>
                   
                   <html>
                     <head>
                   
                     </head>
                     <body>
                           <form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                               Please choose a file: <input name="txt_file" type="file" id="txt_file" tabindex="1" size="35" onChange="txt_fileName.value=txt_file.value" />
                               <input name="txt_fileName" type="hidden" id="txt_fileName" tabindex="99" size="1" />
                   
                               <input type="submit" name="SubmitFile" value="Upload File" accesskey="ENTER" tabindex="2" />
                         </form>
                     </body>
                   <html>                    