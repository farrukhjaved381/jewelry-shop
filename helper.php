<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
function is_loggged_in()
{
    if (isset($_SESSION['username'])) {
        return true;
    } else {
        return false;
    }
}

function wpent_get_current_user()
{
    if (is_loggged_in()) {
        return array('login' => 1, 'user_fields' => array('username' => $_SESSION['username']));
    } else {

        return array('login' => 0, 'user_fields' => false);

    }
}

function wpent_get_user_image()
{
    if (is_loggged_in()) {
        $conn = new mysqli("localhost", "root", "", "jewelry_website");
        $user = $_SESSION['username'];
        $sql = "SELECT profile_pic FROM tbl_users WHERE username = '$user'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Fetch the image URL
            $row = $result->fetch_assoc();
            $profile_pic_url = $row['profile_pic'];
        } else {
            $profile_pic_url = null;
        }

        $conn->close();
        return $profile_pic_url;
    }
    return null;
}

function get_records($table_name)
{
    
    $conn = new mysqli("localhost", "root", "", "jewelry_website");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql_query = "SELECT * FROM $table_name";
    $records = $conn->query($sql_query);
    $rows= array();
    if ($records->num_rows > 0) {
        while ($row = $records->fetch_assoc()) {
            $rows[] = $row;
        }
    }

    return $rows;
}


function delete_record($table_name, $record_id)
{
    $conn = new mysqli("localhost", "root", "", "jewelry_website");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql_query = "DELETE FROM $table_name WHERE id='$record_id'";
    
    if ($conn->query($sql_query) === true) {
        return "User record deleted successfully";
    } else {
        return "Error deleting record: " . $conn->error;
    }
}

function update_record($table_name, $record_id, $fields) {
    $conn = new mysqli("localhost", "root", "", "jewelry_website");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $arr = [];
    foreach ($fields as $column => $value) {
        $arr[] = "$column='" . $conn->real_escape_string($value) . "'";
    }
    $set_sql_stmt = implode(', ', $arr);

    $sql = "UPDATE $table_name SET $set_sql_stmt WHERE  id='$record_id'";

    if ($conn->query($sql) === true) {
        return "Record updated successfully";
    } else {
        return "Error updating record: " . $conn->error;
    }

    $conn->close();
}

function add_record($table_name, $fields) {
    $conn = new mysqli("localhost", "root", "", "jewelry_website");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $columns = implode(', ', array_keys($fields));
    $data = implode(', ', array_fill(0, count($fields), '?'));

    $sql = "INSERT INTO $table_name ($columns) VALUES ($data)";
    
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        echo "Error preparing statement: " . $conn->error;
        return false;
    }

    $types = '';
    $values = [];
    foreach ($fields as $value) {
        if (is_int($value)) {
            $types .= 'i'; // integer
        } elseif (is_float($value)) {
            $types .= 'd'; // double
        } elseif (is_string($value)) {
            $types .= 's'; // string
        } else {
            $types .= 's'; // default to string if type is unknown
        }
        $values[] = $value;
    }

    $stmt->bind_param($types, ...$values);
    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        return true;
    } else {
        echo "Error adding record: " . $stmt->error;
        $stmt->close();
        $conn->close();
        return false;
    }
}

function fetch_edit_record($tbl_name) 
{
  if(isset($_GET['id'])) 
  {
    $id = $_GET['id'];
    $conn = new mysqli("localhost", "root", "", "jewelry_website");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $query = "SELECT * FROM $tbl_name WHERE id = $id ";
    $result = $conn->query($query);
    if ($result) 
    {
      $row = $result->fetch_assoc();
      
    }
    return $row;
  }
}