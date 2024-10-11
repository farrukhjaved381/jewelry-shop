<!-- users.php -->
<?php
include($_SERVER['DOCUMENT_ROOT']."/myweb/Jewellery-website/admin/includes/admin-panel-header.php");
include($_SERVER['DOCUMENT_ROOT']."/myweb/Jewellery-website/admin/includes/admin-panel-sidebar.php");

$users = get_records("tbl_users");
?>

<div class="container mt-3">
  <h1 style="text-align: center;">Users Data
  <span style="text-align:right;">
          <a href='add_user.php?id=$id'>
          <h5><button style='padding:5px'>Add New User</button></h5>
          </a>
          </span>
  </h1>
  
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Password</th>
        <th>Profile Pic</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($users as $user) {
          $id = $user["id"];
          $username = $user["username"];
          $pass = $user["password"];
          $profile_pic = $user["profile_pic"];
          echo "<tr>";
          echo "<td>$id</td>";
          echo "<td>$username</td>";
          echo "<td>$pass</td>";
          echo "<td><img src='$profile_pic' alt='Profile Pic' width='50' height='50'></td>";
          echo "<td>
          <span>
          <a href='edit_user.php?id=$id'>
          <button style='padding:5px'>Edit</button>
          </a>
          </span>
          <span style='padding-left:20px'>
          <a href='delete_user.php?id=$id' onclick='return confirm(\"Are you sure you want to delete this user?\")'>
          <button style='padding:5px'>Delete</button>
          </a>
          </span>
          </td>";
          echo "</tr>";
      }
      ?>
    </tbody>
  </table>
</div>

</body>
</html>
