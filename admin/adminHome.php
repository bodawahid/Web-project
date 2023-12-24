<?php include_once("adminComp/header.php");
if (!isset($_SESSION['adminUserName'])) {
    header('location:adminLogin.php');
}
// get number of courses of each admin ....
if ($_SESSION['adminRole'] == 1) {
    $id = $_SESSION['adminId'];
    $num_course = $conn->query("select * from courses where owner_id = '$id' ");
    $num_course->execute();
    $Paid_course = $conn->query("select * from booking join  courses on booking.course_id = courses.id  where courses.owner_id = '$id' ");
    $Paid_course->execute();
} else {
    $num_course = $conn->query("select * from courses");
    $num_course->execute();
    $Paid_course = $conn->query("select * from booking");
    $Paid_course->execute();
}
?>

<head>
 
</head>
<main class="content">
    <section>
        <h2 style="margin-left: 50%;flex-wrap:nowrap; line-height: 130%;">Welcome <?php echo ' ' . $_SESSION['adminUserName']; ?></h2>
        <!-- Add your widgets, tables, charts, etc. here -->
    </section>
</main>
<?php if ($_SESSION['role'] == 1) : ?>

    <body>
        <div class="card">
            number of your courses : <?php echo $num_course->rowCount(); ?>
        </div>
        <div class="card">
            number of Purchased courses : <?php echo $Paid_course->rowCount(); ?>
        </div>
    </body>
<?php else : ?>

    <body>
        <div class="card">
            number Of All Courses : <?php echo $num_course->rowCount(); ?>
        </div>
        <div class="card">
            number of Purchased courses : <?php echo $Paid_course->rowCount(); ?>
        </div>
    </body>
<?php endif; ?>
<?php include_once("adminComp/footer.php"); ?>

</body>

</html>