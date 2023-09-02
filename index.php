<?php
include_once('./Models/Student.php');

$students = Student::index();

if(isset($_POST['submit'])) {
    $response = student::create([
        'name'=>$_POST['name'],
        'nis'=>$_POST['nis']
    ]);

    setcookie('message', $response, time() + 10);
    
    header("Location: index.php");
}

if(isset($_POST['delete'])) {
    $response = Student::delete($_POST['id']);

    setcookie('message', $response, time() + 10);

    header("Location: index.php");
}

?>

<!-- alert -->
<?php include('./layouts/alert.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Tailwind</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="">
        <!--header-->
        <div class="bg-gray-950 p-3">
            <h1 class="text-xl text-center text-white">Class Rank Tailwind</h1>
        </div>
        <!--main-->
        <div class="flex">
            <!--sidebar-->
            <div class="basis-1/4 bg-gray-900 p-3 text-white">
                <div class="bg-slate-500 rounded-xl p-2">
                    <h1 class="text-xl mb-2">Form Insert Score</h1>
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input class="bg-gray-900 rounded-xl p-1 block w-full" name="name" type="text" id="name" placeholder="Insert your name">
                        </div>
                        <div class="mb-3">
                            <label for="score">NIS</label>
                            <input class="bg-gray-900 rounded-xl p-1 block w-full" name="nis" type="number" id="score" placeholder="Insert your NIS">
                        </div>
                        <div class="grid gap-2">
                            <button class="bg-gray-950 hover:bg-gray-800 p-2 rounded-xl text-white" name="submit" type="submit" >Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <!--content-->
            <div class="basis-3/4 bg-gray-900 p-3 text-white">
                <div class="bg-slate-500 rounded-xl p-2">
                    <h1 class="text-xl mb-2">Table Students Score</h1>
                    <table class="w-full">
                        <thead class="border border-gray-900 text-center text-white">
                            <tr class="bg-gray-950">
                                <th class="px-6 py-3">No</th>
                                <th class="px-6 py-3">Name</th>
                                <th class="px-6 py-3">NIS</th>
                                <th class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center text-white">
                            <?php foreach($students as $key => $student) :?>
                            <tr class="bg-gray-900 border border-gray-950">
                                <td class="px-6 py-3"><?=$key + 1 ?></td>
                                <td class="px-6 py-3"><?=$student['name']?></td>
                                <td class="px-6 py-3"><?=$student['nis']?></td>
                                <td>
                                    <a href="detail.php?id=<?= $student['id'] ?>" class="text-white bg-blue-900 hover:bg-blue-600 pt-2 pb-2 pr-3 pl-3 rounded-xl">Detail</a>
                                    <a href="edit.php?id=<?= $student['id'] ?>" class="text-white bg-green-900 hover:bg-green-600 pt-2 pb-2 pr-3 pl-3 rounded-xl">Edit</a>
                                    <form action="" method="POST" class="inline">
                                        <input type="hidden" name="id" value="<?= $student['id'] ?>">
                                        <button name="delete" type="submit" class="bg-red-900 hover:bg-red-600 p-2 rounded-xl text-white">Delete</button>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--footer-->
        <div class="bg-gray-950 p-3 text-center text-white">
            Copyright &copy; 2023 Adystya Anandita.
        </div>
    </div>
</body>
</html>