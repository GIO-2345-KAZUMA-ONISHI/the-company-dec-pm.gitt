<?php
session_start();

include '../classes/User.php';

$user_obj = new User;
$all_users = $user_obj->getAllUsers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Dashboard</title>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand navbar-dark bg-dark" styke="margin-bottom: 80px;">
        <div class="container">
            <a href="dashboard.php" class="navbar-brand">
                <h1 class="h3">The Company</h1>
            </a>

            <div class="navbar-nav">
                <span class="navbar-text"><?= $_SESSION['full_name'] ?></span>
                <form action="../actions/logout.php" method="post" class="d-flex ms-2">
                    <button type="submit" class="text-danger bg-transparent border-0">Log out</button>
                </form>
            </div>
        </div>
    </nav>

    <main class="row justify-content-center">
        <div class="col-6">
            <h2 class="text-center">USER LIST</h2>

            <table class="table-hover align-middle">
                <thead>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while($user = $all_users->fetch_assoc()){
                    ?>
                    <tr>
                        <td>
                            <?php
                            if($user['photo']){
                            ?>
                                <img src="../assets/images<?= $user['photo'] ?>" alt="<?= $user['phpto']?>" class="d-block mx-auto dashboard-photo">
                            <?php
                            }else{
                            ?>
                                <i class="fas fa-user text-secondary d-block text-center-dashboard-icon"></i>
                            <?php
                            }
                            ?>
                        </td>
                        <td><?= $user['id'] ?></td>
                        <td><?= $user['first_name'] ?></td>
                        <td><?= $user['last_name'] ?></td>
                        <td><?= $user['username'] ?></td>
                        <td>
                            <?php
                            if($_SESSION['id'] == $user['id']){
                            ?>
                                <a href="edit-user.php" class="btn btn-outline-warning" title="Edit">
                                    <i class="far fa-pen-to-square"></i>
                                </a> 
                                <a href="delete-user.php" class="btn btn-outline-danger" title="Delete">
                                    <i class="far fa-trash-can"></i>
                                </a>
                            <?php
                            }
                            ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>

</body>
</html>