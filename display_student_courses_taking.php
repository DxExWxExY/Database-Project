<?php session_start(); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" class="no-js" lang="en-US">
<head>
    <meta charset="utf-8"/>
    <meta content="IE=edge" http-equiv="X-UA-Compatible"/>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <title>Page Title</title>
    <link href="https://cdn.utep.edu/images/favicon.ico" rel="icon" type="image/x-icon"/>

    <!-- CSS -->
    <link href="./css/bootstrap.css" rel="stylesheet"/>
    <link href="./css/styles.css" rel="stylesheet"/>
    <link href="./css/jquery.sidr.bare.css" rel="stylesheet"/>

    <!-- Typography -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,800,700,600" rel="stylesheet"
          type="text/css"/>
    <link href="https://cloud.typography.com/6793094/7122152/css/fonts.css" rel="stylesheet" type="text/css"/>

    <!-- JS -->
    <script src="./js/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script src="./js/jquery-ui.min.js" type="text/javascript"></script>
    <script>/*Insert Google Analytics*/</script>
</head>
<body>
<a class="sr-only sr-only-focusable" href="#mainContentArea" id="skippy"><span class="container"
                                                                               style="display:block;"><span
                class="skiplink-text">Skip to main content</span></span></a>
<div id="sidr-container">
    <div class="sticky-wrapper">
        <nav class="navbar navbar-default utep-nav utepHeader affix" id="header">
            <div class="bodyBg"></div>
            <div class="container headerContainer">

                <div class="UTEP-Branding">
                    <a class="UTEP-Logo" href="https://www.utep.edu/"><img alt="UTEP" src="./images/UTEP.png"
                                                                           title="UTEP"/></a>
                    <div class="collegeHeading">
                        <h1 role="banner"><a href="#">Current Courses taking</a></h1>
                    </div>
                    <!-- /navbar-header -->
                </div>
                <!-- /UTEP-Branding -->

                <div class="navbarCollapseContainer">
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <div class="hidden-above-1365">
                            <form action="https://my.utep.edu/Search?" id="myutep-search-mobile" role="search">
                                <div class="search-container">
                                    <input autocomplete="off" class="form-control" name="q" type="search"/>
                                    <label for="search-query">Search</label>
                                </div>
                            </form>
                        </div>

                        <ul class="nav navbar-nav">
                            <li class="dropdown"><a aria-expanded="false" aria-haspopup="true"
                                                    class="dropdown-toggle" data-toggle="dropdown" href="#"
                                                    role="button">Tables Drop Down <span class="caret"></span></a>
                                <div class="ddWrapper">
                                    <ul class="dropdown-menu">
                                        <li><a href="display_user.php">User</a></li>
                                        <li><a href="display_student.php">Student</a></li>
                                        <li><a href="display_front_desk.php">Front Desk</a></li>
                                        <li><a href="display_advisor.php">Advisor</a></li>
                                        <li><a href="display_advising_slip.php">Advising Slip</a></li>
                                        <li><a href="display_course.php">Course</a></li>
                                        <li><a href="display_course_name.php">Course Name</a></li>
                                        <li><a href="display_appointment.php">Appointment</a></li>

                                        <li><a href="display_student_notes.php">Student Notes</a></li>
                                        <li><a href="display_student_courses_taking.php">Student Courses Taking</a>
                                        </li>
                                        <li><a href="display_student_courses_taken.php">Student Courses Taken</a>
                                        </li>
                                        <li><a href="display_student_courses_retries.php">Student Courses
                                                Retries</a></li>
                                        <li><a href="display_student_courses_drops.php">Student Courses Drops</a>
                                        </li>
                                        <li><a href="display_student_appointment.php">Student Appointment</a></li>

                                    </ul>
                                </div>
                            </li>

                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="hidden-below-1365"><a href="#" id="search-trigger"
                                                             title="Search pages and people"><span
                                            aria-hidden="true" class="glyphiconglyphicon-search"></span></a></li>
                            <?php
                            include_once "database_viewer.php";
                            if (isset($_SESSION['login_user'])) {
                                echo "Log In Success";
                                echo "<li class=\"myUTEPLink\"><a href=\"Login.html\">Log Out</a></li>";
                                echo "<li class=\"myUTEPLink\"><a href=\"display_tables.php\">View Tables</a></li>";
                            } else {
                                echo "<li class=\"myUTEPLink\"><a href=\"Login.html\">Log In</a></li>";
                            }
                            ?>


                        </ul>
                    </div><!-- /.navbar-collapse -->


                </div><!-- /.container-fluid -->
            </div><!-- /container -->

        </nav>
    </div>
    <div class="main-content">
        <h1>Courses taking Table</h1>
        <div class="stroke" style="width:10%;"></div>
        <?php
        if (isset($_SESSION['login_user']) && $_SESSION['login_user'] === 'frontdesk') {
            echo "<form action=\"display_student_courses_taking.php\" method=\"post\">
                <p>Student ID: <input type=\"text\" placeholder=\"id\" name=\"sid\" value=\"\"></p>
                <p>Curses Taking: <input type=\"text\" name=\"sctaking\" value=\"\"></p>
                <input type=\"submit\" >
            </form>";
            $sid = $conn->real_escape_string($_POST['sid']);
            $sctaking = $conn->real_escape_string($_POST['sctaking']);
            if ($sid !== "") {
                $sql = "insert into `f19_team5`.`student_courses_taking` ( `sid`,`sctaking`) values ('$sid','$sctaking')";
                $result = $conn->query($sql);
            }
            if ($_POST["Delete"] !== "") {
                $sql = "delete from f19_team5.student_courses_taking where sid = '" . $_POST["delete"] . "'";
                $result = $conn->query($sql);
                $_POST["delete"] = "";
            }
            displayStudentCoursesTaking();
        } else {
            echo "Access denied.";
        }
        ?>
        <!-- /#container -->
        <footer>
            <div class="container">
                <div class="col-md-3 footerLogo">
                    <img alt="UTEP" class="img-responsive" src="./images/UTEP-Footer.png" title="UTEP">
                </div>
                <!-- /col-md-3 -->
                <div class="col-md-9 requiredLinks">
                    <h2>THE UNIVERSITY OF TEXAS AT EL PASO</h2>
                    <ul>
                        <li>
                            <a href="https://www.utep.edu/emergency/" rel="noopener" target="_blank">Emergency
                                Information</a>
                        </li>
                        <li>
                            <a href="https://www.utep.edu/human-resources/services/employment/index.html"
                               target="_blank">Employment</a>
                        </li>
                        <li>
                            <a href="https://www.utep.edu/eoaa/policies/accessibility-policy.html" target="_blank">Web
                                Accessibility</a>
                        </li>
                        <li>
                            <a href="https://www.utep.edu/vpba/state-reports/" target="_blank">State Reports</a>
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <a href="http://www.utsystem.edu/" target="_blank">UT System</a>
                        </li>
                        <li>
                            <a href="http://sao.fraud.state.tx.us/" target="_blank">Report Fraud</a>
                        </li>
                        <li>
                            <a href="https://www.utep.edu/student-affairs/resources/Mental-Health-Resources-for-UTEP-Students.html"
                               target="_blank">Mental Health Resources</a>
                        </li>
                        <li>
                            <a href="https://www.utep.edu/titleix/" target="_blank">TITLE IX</a>
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <a href="https://www.utep.edu/resources/public-course-information.html" target="_blank">Public
                                Course Information</a>
                        </li>
                        <li>
                            <a href="https://www.utep.edu/clery/" target="_blank">Clery Crime Statistics</a>
                        </li>
                        <li>
                            <a href="https://www.utep.edu/required-links/" target="_blank">Required Links</a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                    <div>
                        <div class="contact-information-link">500 West University Avenue |</div>
                        <div class="contact-information-link">El Paso, TX 79968 |</div>
                        <div class="contact-information-link">915-747-5000 |</div>
                        <div class="contact-information-link">
                            <a href="http://utep.edu/feedback" target="_blank">SITE FEEDBACK</a>
                        </div>
                    </div>
                </div>
                <!-- /col-md-9 -->
            </div>

            <script src="./js/bootstrap.min.js" type="text/javascript"></script>
            <script src="./js/modernizr-2.8.3.min.js" type="text/javascript"></script>
            <script src="./js/jquery.sidr.js" type="text/javascript"></script>
            <script src="./js/iphone-inline-video.browser.js" type="text/javascript"></script>
            <script src="./js/carrousel-autoplay.js" type="text/javascript"></script>
            <script src="./js/main.js" type="text/javascript"></script>
            <script src="./js/carousel.js" type="text/javascript"></script>
</body>
</html>