<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Challenge 7</title>
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="./src/favicon.png">
    </head>

    <body>
        <!--This is the header with the logout button and the logo title-->
        <div class="header-container">
            <button class="lbutton">
                Logout
            </button>
            <div class="cnetLogo">
                <img class="logo" src="./src/cnet.png">
            </div>
        </div>
        <!--This is the form-->
        <div class="form-container">
            <h1>Enter Course Grades</h1>
            <form class="form" onsubmit="return checkFields()">
                <div class="form-item">
                    <label for="fname">First Name :&nbsp</label>
                    <input type="text" id="fname" placeholder="First Name">
                </div>
                <div class="form-item">
                    <label for="lname">Last Name :&nbsp</label>
                    <input type="text" id="lname" placeholder="Last Name">
                </div>
                <div class="form-item">
                    <label for="course">Course Number :&nbsp</label>
                    <select id="course">
                        <option value="" disabled selected>Select Course</option>
                        <?php
                            $conn = mysqli_connect("localhost", "admin", "C0ntr4s3;4", "challenge6");
                            $result = mysqli_query($conn, "SELECT * FROM courses;");
                            while ($entry = mysqli_fetch_assoc($result)) {
                                    echo "<option value='".$entry['courseID']."'>".$entry['courseName']."</option>";
                            };
                        ?>
                    </select>
                </div>
                <div class="form-item">
                    <label for="grade">Final Grade :&nbsp</label>
                    <input type="number" id="grade" min="0" max="100">
                </div>
                <div class="form-item">
                    <input type="submit" name="submit" class="button">
                </div>
                <div class="form-item">
                    <input type="reset" class="button">
                </div>
            </form>
        </div>
        <!--This is the title of the table and then the table information-->
        <div class="table-container">
            <h2>
                The table below displays the contents of the database located on the Webserver
            </h2>
            <table class="table">
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Course ID - Course Name</th>
                    <th>Grade</th>
                    <th>Letter Grade</th>
                </tr>
        <!-- This is going to be updated by PHP -->
        <?php
        // Function to convert grade to letter grade
        function convertGrade($grade) {
            if ($grade >= 95) {
                return 'A+';
            } elseif ($grade >= 90) {
                return 'A';
            } elseif ($grade >= 85) {
                return 'A-';
            } elseif ($grade >= 80) {
                return 'B+';
            } elseif ($grade >= 75) {
                return 'B';
            } elseif ($grade >= 70) {
                return 'B-';
            } elseif ($grade >= 65) {
                return 'C+';
            } elseif ($grade >= 60) {
                return 'C';
            } elseif ($grade >= 55) {
                return 'C-';
            } elseif ($grade >= 50) {
                return 'D';
            } else {
                return 'F';
            }
        }
        
        // connect and write data extracted from the Database challenge6
        $conn = mysqli_connect("localhost", "admin", "C0ntr4s3;4", "challenge6"); //use the password instead of C0ntr4se;a
        $result = mysqli_query($conn, "SELECT firstName,lastName,courses.courseID,courseName,grade FROM students JOIN grades ON grades.studentID=students.studentID JOIN courses ON courses.courseID=grades.courseID;");
        while ($entry = mysqli_fetch_assoc($result)) {
            echo '<tr>';
                echo '<td>'.$entry['firstName'].'</td>';
                echo '<td>'.$entry['lastName'].'</td>';
                echo '<td>'.$entry['courseID'].' - '.$entry['courseName'].'</td>';
                echo '<td>'.$entry['grade'].'</td>';
                echo '<td>'.convertGrade($entry['grade']).'</tc>';
            echo '</tr>';
        };
        ?>
            </table>
            <button class="button">Clear Text file</button>
        </div>
        <script src="script.js"></script>
    </body>
</html>