<?php
include 'conn.php';

if (isset($_POST["signup"])) {
    $fname = $_POST["MyfName"];
    $lname = $_POST["MylName"];
    $address = $_POST["Myaddress"];
    $number = $_POST["Mynumber"];
    $city = $_POST["Mycity"];
    $pcode = $_POST["Mypcode"];
    $email = $_POST["MyEmail"];
    $uname = $_POST["MyuName"];
    $pword = $_POST["Mypword"];
    $cpword = $_POST["Mycpword"];


    // Check if the email already exists
    $rownum = "SELECT * FROM user";
    $id = $conn->query($rownum)->num_rows + 1;
    $check_email = "SELECT * FROM user WHERE user_email='$email'";
    $result = $conn->query($check_email);
    if ($pword = $cpword) {
        // $hpword = password_hash($pword, PASSWORD_DEFAULT);
        if ($result->num_rows > 0) {
            echo "Email already exists";
        } else {
            $sql = "INSERT INTO user (user_district,user_postal_code,user_id,user_role_id,fname,lname,user_address,user_contact,user_email,user_name,user_password) VALUES ('$city','$pcode','$id','1','$fname', '$lname', '$address', '$number', '$email', '$uname', '$pword')";

            if ($conn->query($sql) === TRUE) {
                // echo "New record created successfully";
                header('Location: login.php');
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    } else {
        echo "Passwords donot match";
    }
}

$conn->close();
