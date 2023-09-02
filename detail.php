<?php 
include_once("./Models/Student.php");

$id = $_GET['id'];
$student = Student::show($id);

?>

<?php include_once("./layouts/top.php"); ?>
<?php include_once("./layouts/header.php"); ?>

<!--content-->
<div class="flex bg-gray-800 rounded-xl p-3 m-3">
    <div class="basis-1/5">
        <p class="text-white text-bold">Name</p>
        <p class="text-white text-bold">NIS</p>
    </div>
    <div class="basis-4/5">
        <p class="text-white text-bold"><?= $student['name']?></p>
        <p class="text-white text-bold"><?= $student['nis']?></p>
    </div>
</div>
<div class="grid gap-2">
    <a href="index.php" class="bg-gray-800 hover:bg-gray-950 p-3 rounded-xl text-white m-3 text-center">Back</a>
</div>
<!--content end-->
<?php include('./layouts/footer.php'); ?>
<?php include('./layouts/buttom.php'); ?>