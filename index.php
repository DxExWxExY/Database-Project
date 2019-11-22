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
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,800,700,600" rel="stylesheet" type="text/css"/>
        <link href="https://cloud.typography.com/6793094/7122152/css/fonts.css" rel="stylesheet" type="text/css"/>

        <!-- JS -->
        <script src="./js/jquery-2.1.1.min.js" type="text/javascript"></script>
        <script src="./js/jquery-ui.min.js" type="text/javascript"></script>
        <script>/*Insert Google Analytics*/</script>
    </head>
    <body>
        <a class="sr-only sr-only-focusable" href="#mainContentArea" id="skippy"><span class="container" style="display:block;"><span class="skiplink-text">Skip to main content</span></span></a>
        <div id="sidr-container">
            <div class="sticky-wrapper">
                <nav class="navbar navbar-default utep-nav utepHeader affix" id="header">
                    <div class="bodyBg"></div>
                    <div class="container headerContainer">
                        <div class="hidden-below-1365" id="search-bar">
                            <form action="https://my.utep.edu/Search?" id="myutep-search" role="search" style="display: none;">
                                <div class="container">
                                    <input autocomplete="off" id="search-query" name="q" type="search"/>
                                    <label for="search-query" id="search-query-label">Search pages and people</label>
                                </div>
                            </form>
                        </div>
                        <div class="UTEP-Branding">
                            <a class="UTEP-Logo" href="https://www.utep.edu/"><img alt="UTEP" src="./images/UTEP.png" title="UTEP"/></a>
                            <div class="navbar-header">
                                <button aria-expanded="false" class="navbar-toggle collapsed" data-target="#bs-example-navbar-collapse-1" data-toggle="collapse" type="button">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
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
                                    <li class="dropdown"><a aria-expanded="false" aria-haspopup="true" class="dropdown-toggle" data-toggle="dropdown" href="#" role="button">Advisors <span class="caret"></span></a>
                                        <div class="ddWrapper">
                                            <ul class="dropdown-menu">

                                                <li><a href="">student records</a></li>
                                                <li><a href="">Students Slip</a></li>
                                                <li><a href="">list of students</a></li>

                                            </ul>
                                        </div>
                                    </li>
                                    <li class="dropdown"><a aria-expanded="false" aria-haspopup="true" class="dropdown-toggle" data-toggle="dropdown" href="#" role="button">Students <span class="caret"></span></a>
                                        <div class="ddWrapper">
                                            <ul class="dropdown-menu">
                                                <li><a href="">Create Advising Slip</a></li>
                                                <li><a href="">Make an Appointment</a></li>

                                            </ul>
                                        </div>
                                    </li>

                                    <li class="dropdown"><a aria-expanded="false" aria-haspopup="true" class="dropdown-toggle" data-toggle="dropdown" href="#" role="button">FrontDesk <span class="caret"></span></a>
                                        <div class="ddWrapper">
                                            <ul class="dropdown-menu">
                                                <li><a href="display_user.php">Users</a></li>
                                                <li><a href="display_student.php">Students</a></li>
                                                <li><a href="display_front_desk.php">FrontDesk</a></li>
                                                <li><a href="display_advisor.php">Advisors</a></li>
                                                <li><a href="display_advising_slip.php">Advising Slips</a></li>
                                                <li><a href="display_course.php">Courses</a></li>
                                                <li><a href="display_course_name.php">Course Names</a></li>
                                                <li><a href="display_appointment.php">Appointments</a></li>
                                            </ul>
                                        </div>
                                    </li>

                                </ul>

                                <ul class="nav navbar-nav navbar-right">
                                    <li class="hidden-below-1365"><a href="#" id="search-trigger" title="Search pages and people"><span aria-hidden="true" class="glyphiconglyphicon-search"></span></a></li>
                                    <?php
                                    include_once "database_viewer.php";

                                    $user = $conn->real_escape_string($_POST['un']);
                                    $password = hash("sha256", $_POST['pw']);

                                    $sql = "select * from `f19_team5`.`front_desk` where `uemail` = '{$user}' and `fdpassword` = '{$password}'";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows == 1) {
                                        $_SESSION['login_user'] = 'frontdesk';
                                    }

                                    $sql = "select * from `f19_team5`.`student` where `uemail` = '{$user}' and `spassword` = '{$password}'";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows == 1) {
                                        $_SESSION['login_user'] = 'student';
                                    }

                                    $sql = "select * from `f19_team5`.`advisor` where `uemail` = '{$user}' and `apassword` = '{$password}'";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows == 1) {
                                        $_SESSION['login_user'] = 'advisor';
                                    }
                                    
                                    if (isset($_SESSION['login_user'])) {
                                        echo "<li class=\"myUTEPLink\"><a href=\"logout.php\">Log Out</a></li>";
                                        echo "<li class=\"myUTEPLink\"><a href=\"databaseViewerTemplate.php\">View Tables</a></li>";
                                    } else {
                                        echo "<li class=\"myUTEPLink\"><a href=\"Login.html\">Log In</a></li>";
                                    }
                                    ?>

                                    <li class="dropdown resourcesForLinks"><a aria-expanded="false" aria-haspopup="true" class="dropdown-toggle hidden-below-1365" data-toggle="dropdown" href="#" role="button">Resources for <span class="caret"></span></a>
                                        <p class="hidden-above-1365 infoFor">INFORMATION FOR:</p>
                                        <div class="ddWrapper">
                                        <ul class="dropdown-menu">
                                            <li><a href="/resources/students.html">Students</a></li>
                                            <li><a href="/resources/faculty-and-staff.html">Faculty &amp; Staff</a></li>
                                            <li><a href="http://alumni.utep.edu/">Alumni</a></li>
                                            <li><a href="http://alumni.utep.edu/page.aspx?pid=1255">Parents</a></li>
                                        </ul>
                                        </div>
                                    </li>
                                    <li class="hidden-below-1365"><a href="#" id="simple-menu">Quick Links <span class="quickLinksArrow"></span></a></li>
                                </ul>

                                <!-- Fix iphone 5 menu UC-79 */ -->
                                <br class="visible-xs"/>
                                <br class="visible-xs"/>
                                <!-- END Fix iphone 5 menu UC-79 */ -->
                                <br class="hidden-above-1365"/>
                                <div class="sidr right" id="sidr">
                                    <button aria-label="Close" class="close close-sidr" data-dismiss="modal" type="button"><span aria-hidden="true">X</span></button>
                                    <h3>Quick Links</h3>
                                    <hr class="stroke"/>
                                    <ul class="menu">
										<li>
											<a href="https://www.utep.edu/library/">Library</a>
										</li>
										<li>
											<a href="https://www.utep.edu/vpba/parking-and-transportation/ ">Parking &amp; Maps</a>
										</li>
										<li>
											<a href="https://www.utep.edu/newsfeed/">UTEP News</a>
										</li>
										<li>
											<a href="https://events.utep.edu/">Events</a>
										</li>
										<li>
											<a href="https://www.utep.edu/student-affairs/">Student Affairs</a>
										</li>
										<li>
											<a href="https://www.utep.edu/vpba/">Business Affairs</a>
										</li>
										<li>
											<a href="https://www.utep.edu/human-resources/services/employment/index.html">Employment Opportunities</a>
										</li>
										<li>
											<a href="http://www.utepbookstore.com">University Bookstore</a>
										</li>
										<li>
											<a href="https://www.utep.edu/technologysupport/">Technology Support</a>
										</li>
									</ul>
                                </div>
                            </div><!-- /.navbar-collapse -->
                        </div><!-- /.container-fluid -->


                        <div class="collegeHeading">
                            <h1 role="banner"><a href="#">Appointment Assistance</a></h1>
                        </div>

                    </div><!-- /container -->
                </nav>
            </div>
            <div class="container" id="container">
                <div id="mainContentArea" tabindex="0">Main Content</div>
                <div class="col-md-12 visible-sm visible-xs">

                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><a href="http://utep.edu">UTEP</a></li>
<!--                            <li><a href="#"> Level I</a></li>-->
<!--                            <li><a href="#"> Level II</a></li>-->
                        </ul>
                    </div>
                </div>
                </div>

                <div class="container">
                    <div class="flexBoxWrapper">
                        <div class="col-md-9 col-md-push-3 rightSidebar">
                            <div class="visible-md visible-lg">
                                <div class="row">
                                    <div class="col-md-12">
                                        <ul class="breadcrumb">
                                            <li><a href="http://utep.edu">UTEP</a></li>
<!--                                            <li><a href="#"> Level I</a></li>-->
<!--                                            <li><a href="#"> Level II</a></li>-->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="main-content">
                                <h1>Advising</h1>
                                <div class="stroke" style="width:10%;"></div>
                                <br>
                                <h2>STUDENT’S RESPONSIBILITY</h2>
                                <p>Students are ultimately responsible for meeting the requirements of their chosen catalog. Please review the catalog carefully.  If you cannot make your scheduled advising appointment, please cancel. Seek information on opportunities and become involved in student organizations!</p>
                                <h3>ADVISING STEPS AND TIPS</h3>
                                <p>Initial steps:</p>
                                <ol>
                                    <li>Read the catalog; there are many versions. Your catalog is the one in effect when you first started at UTEP. You may switch to a later catalog,     but you may not switch to an earlier one. You must complete all the requirements in the catalog of the chosen year.</li>
                                    <li>Complete a Plan of Study to plan when you will be taking particular courses. Be sure that you consider the pre-requisites.</li>
                                </ol>
                                <p>Steps to take prior to advising:</p>
                                <ol>
                                    <li>Log in to Goldmine and click on Degree Evaluation to view your progress toward your degree.</li>
                                    <li>Complete an Academic Advising Form prior to seeing your advisor (the form can be changed if needed and is available at the CS front office).</li>
                                    <li>Schedule an appointment with your faculty advisor to review your course selections. Communicate your goals, needs, and concerns with your advisor and inform the advisor of changes in plans and/or circumstances that might impact academic performance.</li>
                                    <li>Bring the yellow copy of your signed advising form to the departmental office to get your hold removed.</li>
                                </ol>
                                <h4>CAUTIONARY ITEMS</h4>
                                <ol>
                                    <li>Students may repeat courses at most three times.</li>
                                    <li>No more than six (6) W’s will be allowed in a student degree plan. This rule comes from the Higher Education Coordinating Board.</li>
                                    <li>The first time that a freshman or sophomore course is repeated, the previously earned grade is automatically excluded from the GPA calculation.</li>
                                </ol>
                                <hr>
<!--                                <h2>Links and Buttons</h2>-->
<!--                                <h3>Primary button:</h3>-->
<!--                                <p><a class="btn btn-primary" href="#">Primary Button</a></p>-->
<!--                                <h3>List of Links</h3>-->
<!--                                <ul class="list-unstyled">-->
<!--                                <li><span aria-hidden="true" class="glyphicon glyphicon-link"></span> <a href="#">List item link to web page</a></li>-->
<!--                                <li><span aria-hidden="true" class="glyphicon glyphicon-link"></span> <a href="#">List item link to web page</a></li>-->
<!--                                <li><span aria-hidden="true" class="glyphicon glyphicon-link"></span> <a href="#">List item link to web page</a></li>-->
<!--                                <li><span aria-hidden="true" class="glyphicon glyphicon-link"></span> <a href="#">List item link to web page</a></li>-->
                                </ul>
<!--                                <h3>List of Documents</h3>-->
<!--                                <ul class="list-unstyled">-->
<!--                                <li><span aria-hidden="true" class="glyphicon glyphicon-file"></span> <a href="#">List item link to document</a></li>-->
<!--                                <li><span aria-hidden="true" class="glyphicon glyphicon-file"></span> <a href="#">List item link to document</a></li>-->
<!--                                <li><span aria-hidden="true" class="glyphicon glyphicon-file"></span> <a href="#">List item link to document</a></li>-->
<!--                                <li><span aria-hidden="true" class="glyphicon glyphicon-file"></span> <a href="#">List item link to document</a></li>-->
                                </ul>
                                <hr>
<!--                                <h2>Table</h2>-->
<!--                                <div class="table-responsive">-->
<!--                                <table class="table table-striped">-->
<!--                                <thead>-->
<!--                                <tr>-->
<!--                                <th>Name</th>-->
<!--                                <th>Title</th>-->
<!--                                <th>Room</th>-->
<!--                                <th>Ext.</th>-->
<!--                                <th>E-Mail</th>-->
<!--                                </tr>-->
<!--                                </thead>-->
<!--                                <tbody>-->
<!--                                <tr>-->
<!--                                <td>Name</td>-->
<!--                                <td>Title</td>-->
<!--                                <td>414-B</td>-->
<!--                                <td>1111</td>-->
<!--                                <td><a href="mailto:test@utep.edu">test@utep.edu</a></td>-->
<!--                                </tr>-->
<!--                                <tr>-->
<!--                                <td>New name</td>-->
<!--                                <td>Title</td>-->
<!--                                <td>414-D</td>-->
<!--                                <td>2222</td>-->
<!--                                <td><a href="mailto:test@utep.edu">test@utep.edu</a></td>-->
<!--                                </tr>-->
<!--                                <tr>-->
<!--                                <td>Name LastName</td>-->
<!--                                <td>Title</td>-->
<!--                                <td>414-C</td>-->
<!--                                <td>3333</td>-->
<!--                                <td><a href="mailto:test@utep.edu">test@utep.edu</a></td>-->
<!--                                </tr>-->
<!--                                </tbody>-->
<!--                                </table>-->
<!--                                </div>-->
                                <hr>
<!--                                <h2>Message from the Director</h2>-->
<!--                                <span class="profilePictureWrapper"><img alt="Cyndi Giorgis, Ph.D." class="profilePicture img-thumbnail" height="600" src="./images/imageComingSoon.jpg" style="float: left;" width="400"></span>-->
<!--                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>-->
<!--                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>-->
<!--                                <p><strong>FirstName LastName, Ph.D.</strong><br>-->
<!--                                 Dean, College <br>-->
<!--                                 Building, Room 111<br>-->
<!--                                 E: email@utep.edu<br>-->
<!--                                 P: (915) 000-0000</p>-->
                                <hr>
                                <h2>Video Embed</h2>
                                <div class="embed-responsive embed-responsive-16by9"><iframe allowfullscreen="allowfullscreen" frameborder="0" height="720" src="https://www.youtube.com/embed/qc98u-eGzlc" width="100%"></iframe></div>
                                <h2>Back to top Button</h2>
                                <p><a class="btn btn-primary btn-lg back-to-top" data-toggle="tooltip" href="#" id="top" role="button" style="float: right;" title="Click to return on the top page"><span class="glyphicon glyphicon-chevron-up"></span></a></p>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                </div>
                                <div class="col-md-6">
                                </div>
                                <div class="col-md-12">
                                </div>
                            </div>
                        </div>
                        <!-- /col-md-9 -->
                        <div class="col-md-3 col-md-pull-9 leftSidebar">
                        <nav>
                            <h2>Side Bar Navigation</h2>

                            <ul class="nav">
                                <!--                                frontdesk-->
                                <?php if (($_SESSION['login_user'])==="frontdesk"): ?>
                                    <li><a href="#"></a></li>
                                    <li><a href="display_user.php">Users</a></li>
                                    <li><a href="display_student.php">Student</a></li>
                                    <li><a href="display_front_desk.php">Front Desk</a></li>
                                    <li><a href="display_advisor.php">Advisor</a></li>
                                    <li><a href="display_advising_slip.php">Advising Slip</a></li>
                                    <li><a href="display_course.php">Course</a></li>
                                    <li><a href="display_course_name.php">Course Name</a></li>
                                    <li><a href="display_appointment.php">Appointment</a></li>

                                    <!--                                advisor-->
                                <?php elseif ($_SESSION['login_user']==='advisor'):?>
                                    <li><a href="display_user.php">Users</a></li>
                                    <li><a href="display_student.php">Student</a></li>
                                    <li><a href="display_front_desk.php">Front Desk</a></li>
                                    <li><a href="display_advisor.php">Advisor</a></li>
                                    <li><a href="display_advising_slip.php">Advising Slip</a></li>
                                    <li><a href="display_course.php">Course</a></li>
                                    <li><a href="display_course_name.php">Course Name</a></li>
                                    <li><a href="display_appointment.php">Appointment</a></li>

                                    <!--                                    Student-->
                                <?php elseif (($_SESSION['login_user'])==='student'):?>
                                    <li><a href="display_user.php">Users</a></li>
                                    <li><a href="display_student.php">Student</a></li>
                                    <li><a href="display_advising_slip.php">Advising Slip</a></li>
                                    <li><a href="display_course.php">Course</a></li>
                                    <li><a href="display_course_name.php">Course Name</a></li>
                                    <li><a href="display_appointment.php">Appointment</a></li>

                                <?php endif; ?>
                            </ul>
<!--                            <ul class="nav UTEPGlobalIcons">-->
<!--                                <li><a class="btn btn-primary" href="http://academics.utep.edu/Default.aspx?tabid=69423">Undergraduate Admissions</a></li>-->
<!--                                <li><a class="btn btn-primary" href="http://graduate.utep.edu/applynow_temp.html">Graduate Admissions</a></li>-->
<!--                            </ul>-->
                        </nav>

                        <h2>Connect With Us</h2>
                        <div class="right-stroke"></div>
                        <p>The University of Texas at El Paso<br/>
                        Department of Computer Science
                            Chemistry & Computer Science<br/>
                        2060 Hawthorne Street, 3rd Floor Room 3.1100<br/>
                        500 W University<br/>
                        El Paso, Texas 79968
                        </p>

                        <p>E: <a class="contact-email" href="mailto:[departmentEmail]@utep.edu">[ csfrontdesk]@utep.edu </a><br/>
                        P: (915) 747-5480<br/>
                        F: (915) 747-5030
                        </p>

                        <ul class="nav socialIcons">
                            <li><a class="facebook" href="https://www.facebook.com/UTEPMiners " target="_blank"><img alt="facebook" src="./images/facebook.png" title="facebook"/></a></li>
                            <li><a class="twitter" href="https://twitter.com/utepnews " target="_blank"><img alt="twitter" src="./images/twitter.png" title="twitter"/></a></li>
                            <li><a class="youtube" href="https://www.youtube.com/user/UTEP " target="_blank"><img alt="youtube" src="./images/youTube.png" title="youtube"/></a></li>
							<li><a class="instagram" href="https://www.instagram.com/utep_miners/" target="_blank"><img alt="instagram" src="./images/instagram.png" title="instagram"></a></li>
                        </ul>


                        </div>
                        <!-- /col-md-3 -->
                    </div>
                    <!-- /flexBoxWrapper -->
                </div>
                <!-- /container -->
            </div>
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
						<a href="https://www.utep.edu/emergency/" rel="noopener" target="_blank">Emergency Information</a>
					</li>
					<li>
						<a href="https://www.utep.edu/human-resources/services/employment/index.html" target="_blank">Employment</a>
					</li>
					<li>
						<a href="https://www.utep.edu/eoaa/policies/accessibility-policy.html" target="_blank">Web Accessibility</a>
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
						<a href="https://www.utep.edu/student-affairs/resources/Mental-Health-Resources-for-UTEP-Students.html" target="_blank">Mental Health Resources</a>
					</li>
					<li>
						<a href="https://www.utep.edu/titleix/" target="_blank">TITLE IX</a>
					</li>
				</ul>
				<ul>
					<li>
						<a href="https://www.utep.edu/resources/public-course-information.html" target="_blank">Public Course Information</a>
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