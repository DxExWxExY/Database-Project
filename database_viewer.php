<?php
$servername = "ilinkserver.cs.utep.edu";
$username = "dnrodriguez";
$password = "*utep2020!";
$datbasename = "f19_team5";

// Create connection
$conn = new mysqli($servername, $username, $password, $datbasename);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
function displayUser()
{
    global $conn;
    $sql = "SELECT * FROM `f19_team5`.`user`";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        echo "<table><tbody>";
        echo "<tr><th>Uemail</th><th>Is Student</th><th>Is Front Desk</th><th>Is Advisor</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr >";
            echo "<td >" . $row["uemail"] . "</td>";
            echo "<td >" . $row["ustudent"] . "</td>";
            echo "<td >" . $row["ufront_desk"] . "</td>";
            echo "<td >" . $row["uadvisor"] . "</td>";
            echo "<td><form action='display_user.php' method='post'><input type='hidden' value='" . $row["uemail"] . "' name='delete'><input type='submit' value='Delete'></form></td>";
            echo "</tr>";
        }
        echo "</tbody><table>";
    }
}

function displayStudentNotes()
{
    global $conn;
    $sql = "SELECT * FROM `f19_team5`.`advising_notes`";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        echo "<table><tbody>";
        echo "<tr><th>Sid</th><th>Note</th><th>Semester</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr >";
            echo "<td >" . $row["asid"] . "</td>";
            echo "<td >" . $row["snote"] . "</td>";
            echo "<td><form action='display_student_notes.php' method='post'><input type='hidden' value='" . $row["asid"] . "' name='delete'><input type='submit' value='Delete'></form></td>";
            echo "</tr>";
        }
        echo "</tbody><table>";
    }
}

function displayStudentCoursesTaking()
{
    global $conn;
    $sql = "SELECT * FROM `f19_team5`.`student_courses_taking`";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        echo "<table><tbody>";
        echo "<tr><th>Student ID</th><th>Courses Taking</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr >";
            echo "<td >" . $row["sid"] . "</td>";
            echo "<td >" . $row["sctaking"] . "</td>";
            echo "<td><form action='display_student_courses_taking.php' method='post'><input type='hidden' value='" . $row["sid"] . "' name='delete'><input type='submit' value='Delete'></form></td>";
            echo "</tr>";
        }

        echo "</tbody><table>";
    }
}

function displayStudentCoursesTaken()
{
    global $conn;
    $sql = "SELECT * FROM `f19_team5`.`student_courses_taken`";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        echo "<table><tbody>";
        echo "<tr><th>Student ID</th><th>Courses Taken</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr >";
            echo "<td >" . $row["sid"] . "</td>";
            echo "<td >" . $row["sctaken"] . "</td>";
            echo "<td><form action='display_student_courses_taken.php' method='post'><input type='hidden' value='" . $row["sid"] . "' name='delete'><input type='submit' value='Delete'></form></td>";
            echo "</tr>";
        }
        echo "</tbody><table>";
    }
}

function displayStudentCoursesRetries()
{
    global $conn;
    $sql = "SELECT * FROM `f19_team5`.`student_courses_retries`";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        echo "<table><tbody>";
        echo "<tr><th>Student ID</th><th>Courses Retries</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr >";
            echo "<td >" . $row["sid"] . "</td>";
            echo "<td >" . $row["scretries"] . "</td>";
            echo "<td><form action='display_student_courses_retries.php' method='post'><input type='hidden' value='" . $row["sid"] . "' name='delete'><input type='submit' value='Delete'></form></td>";
            echo "</tr>";
        }
        echo "</tbody><table>";
    }
}

function displayStudentCoursesDrops()
{
    global $conn;
    $sql = "SELECT * FROM `f19_team5`.`student_courses_drops`";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        echo "<table><tbody>";
        echo "<tr><th>Student ID</th><th>Courses Dropped</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr >";
            echo "<td >" . $row["sid"] . "</td>";
            echo "<td >" . $row["scdrops"] . "</td>";
            echo "<td><form action='display_student_courses_drops.php' method='post'><input type='hidden' value='" . $row["sid"] . "' name='delete'><input type='submit' value='Delete'></form></td>";
            echo "</tr>";
        }
        echo "</tbody><table>";
    }
}

function displayStudentAppointment()
{
    global $conn;
    $sql = "SELECT * FROM `f19_team5`.`student_appointment`";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        echo "<table><tbody>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr >";
            echo "<td >" . $row["uemail"] . "</td>";
            echo "<td >" . $row["atime"] . "</td>";
            echo "<td >" . $row["adate"] . "</td>";
            echo "<td >" . $row["sanotes"] . "</td>";
            echo "<td >" . $row["sid"] . "</td>";
            echo "</tr>";
        }
        echo "</tbody><table>";
    }
}

function displayStudent()
{
    global $conn;
    $sql = "SELECT * FROM `f19_team5`.`student`";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        echo "<table><tbody>";
        echo "<tr><th>User Email</th><th>Student ID</th><th>Password</th><th>Degree Plan</th><th>Classification </th><th>Grad Date</th><th>GPA</th><th>First Name</th><th>Middle Name</th><th>Last Name</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr >";
            echo "<td >" . $row["uemail"] . "</td>";
            echo "<td >" . $row["sid"] . "</td>";
            echo "<td >" . $row["spassword"] . "</td>";
            echo "<td >" . $row["sdeg_plan"] . "</td>";
            echo "<td >" . $row["sclassification"] . "</td>";
            echo "<td >" . $row["sgrad_date"] . "</td>";
            echo "<td >" . $row["sgpa"] . "</td>";
            echo "<td >" . $row["sfirst_name"] . "</td>";
            echo "<td >" . $row["smiddle_name"] . "</td>";
            echo "<td >" . $row["slast_name"] . "</td>";
            echo "<td><form action='display_student.php' method='post'><input type='hidden' value='" . $row["sid"] . "' name='delete'><input type='submit' value='Delete'></form></td>";
            echo "</tr>";
        }
        echo "</tbody><table>";
    }
}

function displayFrontDesk()
{
    global $conn;
    $sql = "SELECT * FROM `f19_team5`.`front_desk`";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        echo "<table><tbody>";
        echo "<tr><th>UEmail</th><th>fdpassword </th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr >";
            echo "<td >" . $row["uemail"] . "</td>";
            echo "<td >" . $row["fdpassword"] . "</td>";
            echo "<td><form action='display_front_desk.php' method='post'><input type='hidden' value='" . $row["uemail"] . "' name='delete'><input type='submit' value='Delete'></form></td>";
            echo "</tr>";
        }
        echo "</tbody><table>";
    }

}

function displayCourseName()
{
    global $conn;
    $sql = "SELECT * FROM `f19_team5`.`course_name`";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        echo "<table><tbody>";
        echo "<tr><th>Number</th><th>Name </th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr >";
            echo "<td >" . $row["cnumber"] . "</td>";
            echo "<td >" . $row["cname"] . "</td>";
            echo "<td><form action='display_course_name.php' method='post'><input type='hidden' value='" . $row["cname"] . "' name='delete'><input type='submit' value='Delete'></form></td>";
            echo "</tr>";
        }
        echo "</tbody><table>";
    }

}

function displayCourse()
{
    global $conn;
    $sql = "SELECT * FROM `f19_team5`.`course`";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        echo "<table><tbody>";
        echo "<tr><th>Crn</th><th>Term </th><th>Number</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr >";
            echo "<td >" . $row["ccrn"] . "</td>";
            echo "<td >" . $row["cterm"] . "</td>";
            echo "<td >" . $row["cumber"] . "</td>";
            echo "<td><form action='display_course.php' method='post'><input type='hidden' value='" . $row["ccrn"] . "' name='delete'><input type='submit' value='Delete'></form></td>";
            echo "</tr>";
        }
        echo "</tbody><table>";
    }

}

function displayAppointment()
{
    global $conn;
    $sql = "SELECT * FROM `f19_team5`.`student_appointment`";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        echo "<table><tbody>";
        echo "<tr><th>Date</th><th>Time</th><th>location</th> <th>Term</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr >";
            echo "<td >" . $row["sid"] . "</td>";
            echo "<td >" . $row["asid"] . "</td>";
            echo "<td >" . $row["uemail"] . "</td>";
            echo "<td >" . $row["adate"] . "</td>";
            echo "<td >" . $row["atime"] . "</td>";
            echo "<td >" . $row["alocation"] . "</td>";
            echo "<td >" . $row["aterm"] . "</td>";
            echo "<td><form action='display_appointment.php' method='post'><input type='hidden' value='" . $row["adate"] . "' name='delete'><input type='submit' value='Delete'></form></td>";
            echo "</tr>";

        }
        echo "</tbody><table>";
    }

}

function displayAdvisor()
{
    global $conn;
    $sql = "SELECT * FROM `f19_team5`.`advisor`";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        echo "<table><tbody>";
        echo "<tr><th>Email</th><th>Password</th><th>Student IDs</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr >";
            echo "<td >" . $row["uemail"] . "</td>";
            echo "<td >" . $row["apassword"] . "</td>";
            echo "<td >" . $row["sid"] . "</td>";
            echo "<td><form action='display_advisor.php' method='post'><input type='hidden' value='" . $row["uemail"] . "' name='delete'><input type='submit' value='Delete'></form></td>";
            echo "</tr>";
        }
        echo "</tbody><table>";
    }

}

function displayAdvisingSlip()
{
    global $conn;
    $sql = "SELECT * FROM `f19_team5`.`advising_slip`";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        echo "<table><tbody>";
        echo "<tr><th>Student ID</th><th>Approval</th><th>Date</th><th>Term</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr >";
            echo "<td >" . $row["sid"] . "</td>";
            echo "<td >" . $row["asapproval"] . "</td>";
            echo "<td >" . $row["asdate"] . "</td>";
            echo "<td >" . $row["asterm"] . "</td>";
            echo "<td><form action='display_advising_slip.php' method='post'><input type='hidden' value='" . $row["sid"] . "' name='delete'><input type='submit' value='Delete'></form></td>";
            echo "</tr>";
        }
        echo "</tbody><table>";
    }

}