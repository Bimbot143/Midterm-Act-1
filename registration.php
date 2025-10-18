<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container">
    <h2>Student Registration Form</h2>

    <?php
    $file = "students.txt";

    // Save student data
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $course = $_POST['course'];
        $year = $_POST['year'];

        // open file in append mode (a)
        $handle = fopen($file, "a") or die("Unable to open file!");
        $data = "Name: $name | Course: $course | Year: $year" . PHP_EOL;
        fwrite($handle, $data);
        fclose($handle);

        echo "<p class='msg success'>Student registered successfully!</p>";
    }

    // Clear file
    if (isset($_POST['clear'])) {
        // open file in write mode (w) → clears file contents
        $handle = fopen($file, "w") or die("Unable to open file!");
        fclose($handle);
        echo "<p class='msg clear'>All student records cleared!</p>";
    }
    ?>

    <!-- Registration Form -->
    <form method="post">
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="text" name="course" placeholder="Course" required>
        <input type="text" name="year" placeholder="Year" required>
        <button type="submit" name="submit" class="btn">Register</button>
    </form>

    <!-- Clear Button -->
    <form method="post">
        <button type="submit" name="clear" class="btn clear-btn">Clear File</button>
    </form>
</div>
</body>
</html>
