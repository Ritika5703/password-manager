<?php 
include "connection.php";
$id = $_GET["id"];
$sql = "SELECT * FROM `accounts` WHERE `id` = $id;";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
?>
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
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css">
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
    </header>
    <main>
        <div class="container form my-5 p-5">
            <h1 class="text-center">User Details</h1>
            <form action="updatepasswords.php" method="post">
                <div class="mb-3 visually-hidden">
                    <label for="id" class="form-label">ID</label>
                    <input type="text" class="form-control" name="id" id="id" value="<?php echo "{$row['id']}";?>" readonly />
                </div>
                <div class="mb-3">
                    <label for="acc_name" class="form-label">Account Name</label>
                    <input type="text" class="form-control" name="acc_name" id="acc_name" value="<?php echo "{$row['acc_name']}";?>" />
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="username" value="<?php echo "{$row['username']}";?>" />
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" value="<?php echo "{$row['password']}";?>" />
                </div>
                <div class="mb-3">
                    <label for="url" class="form-label">URL</label>
                    <input type="text" class="form-control" name="url" id="url" value="<?php echo "{$row['url']}";?>" />
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="3"><?php echo "{$row['description']}";?></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </form>
        </div>
    </main>
    <footer></footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
