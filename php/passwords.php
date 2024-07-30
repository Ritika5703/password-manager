<?php 
include "connection.php";
session_start();

if (!isset($_SESSION["username"])) {
  echo "<script type='text/javascript'>alert('hello');</script>";
  header("location:./index.html");
  exit;
}

?>



<!doctype html>
<html lang="en">

<head>
  <title>Password Manager</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
      .hidetext { -webkit-text-security: circle; }

      .btn-primary {
        background-color: #42a5f5;
        border-color: #42a5f5;
        transition: background-color 0.3s, border-color 0.3s;
      }
      .btn-primary:hover {
        background-color: #1e88e5;
        border-color: #1e88e5;
      }
    </style>
</head>

<body>
<header>




  <nav
    class="navbar navbar-expand-sm navbar-dark bg-dark"
  >
    <div class="container">
      <a class="navbar-brand" href="#">Password Manager</a>
      <button
        class="navbar-toggler d-lg-none"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#collapsibleNavId"
        aria-controls="collapsibleNavId"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav me-auto mt-2 mt-lg-0">
          <li class="nav-item dropdown d-flex my-2 my-lg-0">
          <a class="text-white btn" href='logout.php'>Logout</a>
            <!-- <a
              class="nav-link dropdown-toggle"
              href="#"
              id="dropdownId"
              data-bs-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
              >View Profile</a
            >
            <div
              class="dropdown-menu"
              aria-labelledby="dropdownId"
            >
              <a class="dropdown-item" href="#"
                >My profile</a
              >
              <a class="dropdown-item" href="#"
                >Logout</a
              >
            </div> -->
          </li>
        </ul>
        <div class="d-flex my-2 my-lg-0">
          <ul class="navbar-nav me-auto mt-2 mt-lg-0">
            <li class="nav-item dropdown d-flex my-2 my-lg-0">
            <div class="form-inline my-2 my-lg-0 ml-auto">
        <div class="dropdown">
            <a class="nav-link" style="text-decoration: none; color: #eee;" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
            <?php
              if (isset($_SESSION["username"])) {
                echo "Welcome, " . $_SESSION["username"]; // Display username if logged in
              } else {
                  echo "My Account";
              }
            ?>
            </a>
            
        </div>
                <!-- <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="dropdownId"
                  data-bs-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                  >View Profile</a
                >
                <div
                  class="dropdown-menu"
                  aria-labelledby="dropdownId"
                >
                  <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#viewUserModal"
                    >My profile</a
                  >
                  <a class="dropdown-item" href="logout.php"
                    >Logout</a
                  >
                </div> -->
              </li>
          </ul>
       </div>
      </div>
    </div>
  </nav>
  
      <!-- place navbar here -->
 
      
    </header>
  <main>
  <a class='btn btn-primary m-5 mb-3' href='add_passwords.php'>Add Passwords</a>

  <?php 

include "connection.php";



//$sql = "SELECT * FROM `accounts` WHERE user_id='{$_SESSION["username"]}'";
$sql = "SELECT id, user_id, acc_name,username,AES_DECRYPT(password, '') AS Password,url,description FROM accounts WHERE user_id='{$_SESSION["username"]}';";
$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result)>0) {

echo "<div class='container my-5'>
<h1 class='text-center my-5'>List Of Passwords</h1>
<!--<input type='checkbox' id='showPassword'> Show Password -->
<div class='table-responsive'>
    <table class='table table-primary'>
        <thead>
            <tr>
                <th scope='col'>Id</th>
                <th scope='col'>Account Name</th>
                <th scope='col'>Username</th>
                <th scope='col'>Password</th>
                <th scope='col'>URL</th>
                <th scope='col'>Description</th>
                <th scope='col'>Action</th>
            </tr>
        </thead>
        <tbody>
";

while ($rows = mysqli_fetch_assoc($result)) {
//  $pass =  mysqli_query($conn,"SELECT AES_DECRYPT(AES_ENCRYPT('{$rows['password']}', ''), '');");
    // echo "<script>alert('fd');</script>";
    echo "  <tr class=''>
    <td scope='row'>{$rows['id']}</td>
    <td>{$rows['acc_name']}</td>
    <td>{$rows['username']}</td>
    <td class='hidetext pas'>{$rows['Password']}</td>
    <td>{$rows['url']}</td>
    <td>{$rows['description']}</td>
    <td>
    <a
    name=''
    id=''
    class='btn btn-info'
    role='button'
    onclick='copyPassword(\"{$rows['Password']}\")'
    >Copy Password</a
>
    <a
    name=''
    id=''
    class='btn btn-warning'
    href='edit.php?id={$rows['id']}'
    role='button'
    >Edit</a
>
<a
    name=''
    id=''
    class='btn btn-danger'
    href='delete.php?id={$rows['id']}'
    role='button'
    >Delete</a
>
</td>
</tr>";
}

   echo "
   </tbody>
</table>
</div>

</div>";
    




} else {
   echo "0 Record Found";
}



mysqli_close($conn);
?>


<script>
   function copyPassword(passwordId) {
    //  var passwordSpan = document.getElementById(passwordId);
     //alert("dfg");
      // Create a temporary input element to copy the text
      var tempInput = document.createElement("input");
      tempInput.setAttribute("type", "text");
      tempInput.setAttribute("value", passwordId);

      // Append the input element to the body
      document.body.appendChild(tempInput);

      // Select and copy the text in the input element
      tempInput.select();
      document.execCommand("copy");

      // Remove the temporary input element
      document.body.removeChild(tempInput);

      // Notify the user that the password has been copied
      //alert("Password copied: " + passwordId);
    }

    
    document.getElementById("showPassword").addEventListener("change", function () {
     
      var passwordInput = document.getElementsByClassName("pas");
      if(!this.checked){
       
        passwordInput.classList.add("hidetext");
      }
      else{
        passwordInput.classList.remove("hidetext");
      }
      
        
    });
  </script>


  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
  </script>
</body>

</html>



