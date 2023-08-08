<?php
  require('Inc\db_config.php');
  require('Inc\essentials.php');

  session_start();
    if ((isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true)) {
      redirect('user-queries.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel</title>
  <?php require('Inc\links.php'); ?>
  <style>
    div.login-form {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 400px;
    }

    .custom-alert {
      position: fixed;
      top: 25;
      right: 25px;
    }

    body{
      background: no-repeat linear-gradient( rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.7) ), url('../images/adminImg.webp') center;
      background-size: cover;
    }

    .login-form {
      border: 2px solid #fff;
      border-radius: 6px;
    }
  </style>
</head>

<body class="bg-light">
  <div class="login-form text-center bg-white shadow overflow-none">
    <form method="POST">

      <h4 class="text-white bg-dark py-3"> NeuroScan <br> ADMIN LOGIN PANEL</h4>
      <div class="p-4">
        <div class="mb-3">
          <input name="admin_name" required type="text" class="form-control shadow-none text-center" placeholder="Admin Name">
        </div>
        <div class="mb-3">
          <input name="admin_pass" required type="password" class="form-control shadow-none text-center" placeholder="Password">
        </div>
        <button name="login" type="submit" class="btn text-white custom-bg shadow-none">LOGIN</button>
      </div>
    </form>
  </div>


  <?php
  if (isset($_POST['login'])) {
    $frm_data = filteration($_POST);

    $query = "SELECT * FROM `admin_cred` WHERE `admin_name`=? AND `admin_pass`=?";
    $values = [$frm_data['admin_name'], $frm_data['admin_pass']];

    $res = select($query, $values, "ss");
    if ($res->num_rows == 1) {
      $row = mysqli_fetch_assoc($res);
      $_SESSION['adminLogin'] = true;
      $_SESSION['adminId'] = $row['sr_no'];
      $_SESSION['correct_name'] = $row['admin_name'];
      $correct_name = $_SESSION['correct_name'];
      $_SESSION['current_date'] =  date('d F, Y(l)');

      redirect('user-queries.php');
    } else {
      alert('error', 'Login failed - Invalid Credentials!');
    }
  }
  ?>
  <?php
    require('Inc\script.php');
  ?>

</body>

</html>