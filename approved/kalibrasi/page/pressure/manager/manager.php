<?php
session_start();
require_once '../../../src/config/config.php';

if (!isset($_SESSION['token']) || empty($_SESSION['token'])) {
    header('Location: log-in-app1.php?id=' . $id );
    exit;
}

$username = $_SESSION['username'];
$bagian = $_SESSION['bagian'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MANAGER</title>

    <!-- css -->
    <link rel="stylesheet" href="../../../src/styles/kalibrasi.css">
    <link rel="stylesheet" href="../../../src/components/bootstrap/css/bootstrap.min.css">
    <!-- /css -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
</head>
<body>
<div class="all">
    <div class="header">
        <img src="../../../src/assets/BAS_logo.png" alt="">
    </div>

    <!-- navbar -->

    <div class="navbar">

    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
    </svg>
    </button>

    <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
        <div class="offcanvas-header">
            <h3 class="offcanvas-title" id="offcanvasScrollingLabel">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
            </svg>
                <?php echo htmlspecialchars($username); ?>
            </h3>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <hr>
        <div class="offcanvas-body">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                       Account
                    </button>
                </h2>
                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                    <div class="accordion-body">
                    <hr>
                    <table>
                        <tr>
                            <td>ID</td>
                            <td>:</td>
                            <td></td>
                            <td><?php echo htmlspecialchars($id); ?></td>
                        </tr>
                        <tr>
                            <td>USERNAME</td>
                            <td>:</td>
                            <td></td>
                            <td><?php echo htmlspecialchars($username); ?></td>
                        </tr>
                        <tr>
                            <td>ROLE</td>
                            <td>:</td>
                            <td></td>
                            <td><?php echo htmlspecialchars($bagian); ?></td>
                        </tr>
                    </table>
                    </div>
                    </div>
            </div>
            </li>
            <?php
                if (isset($_GET['action']) && $_GET['action'] === 'logout') {
                    session_unset();
                    session_destroy();
                    header('Location: ../log-in-app3.php');
                    exit;
                }
            ?>
            <li class="list-group-item"><a href="?action=logout" class="link-dark link-underline link-underline-opacity-0">Logout</a></li>
        </ul>
        </div>
    </div>
</div>

    <!-- page -->

<div class="fill">
<div class="dread">
</div>
<div class="page">
<a href="belumapprove.php?username=<?php echo $_GET['username']; ?>&bagian=<?php echo $_GET['bagian']; ?>&token=<?php echo htmlspecialchars($_SESSION['token']); ?>" class="link-dark link-underline link-underline-opacity-0">
    <div class="box">
    <svg xmlns="http://www.w3.org/2000/svg" width="50%" height="50%" fill="rgb(61, 60, 60)" class="bi bi-x-square" viewBox="0 0 16 16">
      <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
      <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
    </svg>
        <div class="name">BELUM APPROVE</div>
    </div>
</a>
<a href="sudahapprove.php?username=<?php echo $_GET['username']; ?>&bagian=<?php echo $_GET['bagian']; ?>&token=<?php echo htmlspecialchars($_SESSION['token']); ?>" class="link-dark link-underline link-underline-opacity-0">
    <div class="box">
    <svg xmlns="http://www.w3.org/2000/svg" width="50%" height="50%" fill="rgb(61, 60, 60)" class="bi bi-check-square" viewBox="0 0 16 16">
      <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
      <path d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z"/>
    </svg>
        <div class="name">SUDAH APPROVE</div>
    </div>
</a>
</div>
</div>

<!-- js -->
<script src="script.js"></script>
<script src="../../../src/components/bootstrap/js/bootstrap.min.js"></script>
<script src="../../../src/components/bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>