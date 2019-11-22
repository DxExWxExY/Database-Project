<?php
/*
 * Creates connection to MySQL
 * */
$conn = new mysqli("ilinkserver.cs.utep.edu", "dnrodriguez", "*utep2020!", "f19_team5");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function areCredentialsValid() {
    global $conn;
    if (isset($_POST['un']) && isset($_POST['pw'])) {
        $u = $conn->real_escape_string($_POST['un']);
        $p = $conn->real_escape_string(hash("sha256", $_POST['pw']));
        $query = /** @lang MySQL */
            "SELECT * FROM f19_team5.users WHERE `Uemail` = \"$u\" AND `Upassword` = \"$p\"";
        $result = $conn->query($query);
        /*echo $query;*/
        if ($result->num_rows > 0) {
            echo "Login successful";
        } else{
            echo "Invalid Credentials";
        }
    }
}