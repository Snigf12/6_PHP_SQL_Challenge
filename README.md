# PHP to update html using CSV file

Challenge 7: Using the following code as an example, create a Webpage that will display relevant student data on the page:
```php
<?php
    $conn = mysqli_connect("localhost", "gradeUser", "gradeUser", "grades");
    $result = mysqli_query($conn, "SELECT * FROM students;");
    while (($entry = mysqli_fetch_assoc($result))){
            echo $entry['firstName']." ".$entry['lastName']."</br>";
        };
?>
```

Challenge 8: In this Challenge, you will create a Drop down Input Form, and populate the <option> with all the courses from the "courses" table in the Database.  This is done by retrieving the data from the database using PHP, the creating a loop to create a new line for the <option>. You end result should activate your dropdown menu in the form, and populate it with course names: