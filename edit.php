<?php 
include_once('./Models/Student.php');
    $student = Student::show($_GET['id']);

    if(isset($_POST['submit'])){
        $response = Student::update([
            'id' => $_POST['id'],
            'name' => $_POST['name'],
            'nis' => $_POST['nis'],
        ]);

        setcookie('message', $response, time() + 10);
        header("location: index.php");

    }

?>

<?php include('./layouts/top.php'); ?>
<?php include('./layouts/header.php'); ?>


<!--content-->
<div class="basis-1/4 bg-gray-900 p-4">
    <div class="bg-slate-600 rounded-xl p-4 mt-5">
        <h1 class="text-white text-2xl mb-2">Input Students Data</h1>
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?=$student['id']?>">
            <div class="text-white mb-3">
                <label for="name">Name</label>
                <input class="bg-gray-950 text-white block w-full rounded-xl p-2" name="name" type="text" id="name" placeholder="Input your name" value="<?=$student['name']?>">
            </div>
            <div class="text-white mb-3">
                <label for="name">NIS</label>
                <input class="bg-gray-950 text-white block w-full rounded-xl p-2" name="nis" type="number" id="nis" placeholder="Input your NIS" value="<?=$student['nis']?>">
            </div>
            <div class="grid gap-2">
            <button name="submit" class="bg-gray-950 hover:bg-gray-800 p-2 rounded-xl text-white" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>


<?php include('./layouts/footer.php'); ?>
<?php include('./layouts/buttom.php'); ?>