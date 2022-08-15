<?php  
 $message = '';  
 $error = '';  
 if(isset($_POST["submit"]))  
 {  
      if(empty($_POST["name"]))  
      {  
           $error = "<label class='text-danger'>Enter Name</label>";  
      }
      else if(empty($_POST["email"]))  
      {  
           $error = "<label class='text-danger'>Enter an e-mail</label>";  
      }  
      else if(empty($_POST["un"]))  
      {  
           $error = "<label class='text-danger'>Enter a username</label>";  
      }  
      
      else  
      {  
           if(file_exists('data.json'))  
           {  
                $current_data = file_get_contents('data.json');  
                $array_data = json_decode($current_data, true);  
                $extra = array(  
                     'name'               =>     $_POST['name'],  
                     'e-mail'          =>     $_POST["email"],  
                     'comment'     =>     $_POST["un"],  
                );  
                $array_data[] = $extra;  
                $final_data = json_encode($array_data);  
                if(file_put_contents('data.json', $final_data))  
                {  
                     $message = "<label class='text-success'>File Appended Success fully</p>";  
                }  
           }  
           else  
           {  
                $error = 'JSON File not exits';  
           }  
      }  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Contact Us</title>
          <link rel="stylesheet" href="style.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
          <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
          <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
          <link rel="stylesheet" href="../darkmode.css">
      </head> 

      
<body>
     

  <!-- Navbar start -->
  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <a class="navbar-brand" href="../home.php"><i class="fas fa-clinic-medical"></i>&nbsp;&nbsp;Medicine Store</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="../home.php"><i class="fas fa-home"></i> Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../about.php"><i class="fas fa-info-circle"></i> About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../login.php"><i class="fas fa-user-md"></i> Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../register.php"><i class="fas fa-user-plus"></i> Registration</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="./contact.php"><i class="fas fa-phone" ></i> Contact Us</a>
        </li>

       </ul>
       <a style="padding:5px; text-align:right; color:white" onclick="myFunction()"><i class="fas fa-toggle-on"></i> Dark Mode</a>
     <script>
          function myFunction() {
               var element = document.body;
               element.classList.toggle("dark-mode");
          }
     </script>
    </div>
   
  </nav>

  <div class="container" style="width:500px; padding:5px;"> 
          <h3 style="text-align:center" ><br><br><br><br> Contact Us</h3>  
               <form method="post">  
                     <?php   
                     if(isset($error))  
                     {  
                          echo $error;  
                     }  
                     ?>  
                     <br />  
                     <input type="text" name="name" placeholder="Name" class="form-control" /><br />  
                     <input type="text" name = "email" placeholder="Email" class="form-control" /><br />
                     <input type="text" name = "un" placeholder="Comment" class="form-control" /><br />

                     
                     <input type="submit" name="submit" value="Submit" class="btn btn-primary text-center" /><br />
                     <?php  
                     if(isset($message))  
                     {  
                          echo $message;  
                     }  
                     ?>  
                </form>
  </div>
  <!-- Navbar end -->                    
                  
          </div>  

     </div> 
</div>
<br />  

<?php include '../footer.php' ?>
     </body>  
 </html>  