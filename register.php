<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];
    $role = $_POST["role"];
    $password = $_POST["password"];

    if($username == "" || $age == "" || $gender == "" || $email == "" || $role == "" || $password == ""){
    echo ("<script LANGUAGE='JavaScript'> window.alert('Please fill out all the column!'); window.location.href='login.php#'; </script>");
    }else{
        $conn = mysqli_connect("localhost", "root", "", "legends");

    if(!$conn){
      die("Could not connect to database: " . mysqli_connect_error());
    }

    $stmt = mysqli_prepare($conn, "INSERT INTO acc (username,age,gender,email,role,password) VALUES (?, ?, ?,?,?,?)");
    mysqli_stmt_bind_param($stmt, "ssssss", $username, $age, $gender, $email, $role, $password);

    if(mysqli_stmt_execute($stmt)){
      echo ("<script LANGUAGE='JavaScript'> window.alert('Registered Sucessfully!'); window.location.href='login.php';</script>");
      } else {
        echo "Error registering: " . mysqli_stmt_error($stmt);
      }
  
      mysqli_stmt_close($stmt);
      mysqli_close($conn);
    }
  }
?>
<body>
    <link href="assets/css/login.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" crossorigin="anonymous"></script>
    <div class="wrapper">
        <div class="text-center mt-4 name">
            Register!
        </div>
        <form action="" method="post" class="p-3 mt-3">
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="username" id="username" placeholder="Username">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="num" name="age" id="age" placeholder="age">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <select name="gender" id="gender">
                    <option value="" selected disabled>Choose a gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="email" name="email" id="email" placeholder="email">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <select name="role" id="role">
                    <option value="" selected disabled>Choose a role</option>
                    <option value="rider">Rider</option>
                    <option value="customer">Customer</option>
                </select>
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="pwd" name="password" id="password" placeholder="password">
            </div>
            <button class="btn mt-3" name="submit">Register</button>
        </form>
    </div>
</body>