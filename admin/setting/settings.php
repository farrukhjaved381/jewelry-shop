<?php
include("../includes/admin-panel-header.php"); 
include("../includes/admin-panel-sidebar.php"); 
$settings = get_records("tbl_site_settings");
?>

<div class="container mt-3">
<h1 style="text-align: center;">Setting Data
  <span style="text-align:right;">
          <a href='add_settings.php?id=$id'>
          <h5><button style='padding:5px'>Add New Settings</button></h5>
          </a>
          </span>
  </h1>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Setting Key</th>
        <th>Setting Value</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($settings as $setting) {
          $id = $setting["id"];
          $setting_key = $setting["setting_key"];
          $setting_value = $setting["setting_value"];
          echo "<tr>";
          echo "<td>$id</td>";
          echo "<td>$setting_key</td>";
          echo "<td>$setting_value</td>";
          echo "<td>
          <span>
          <a href='edit_settings.php?id=$id'>
          <button style='padding:5px'>Edit</button>
          </a>
          </span>
          <span style='padding-left:20px'>
          <a href='delete_settings.php?id=$id'>
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
