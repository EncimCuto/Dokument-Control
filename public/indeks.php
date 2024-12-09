<?php
session_start();
require_once '../src/config/config.php';

if (!isset($_SESSION['token']) || empty($_SESSION['token'])) {
    header('Location: ../index.php');
    exit;
}

$id = $_SESSION['id'];
$username = $_SESSION['username'];
$bagian = $_SESSION['bagian'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!-- css -->
    <link rel="stylesheet" href="../src/styles/indeks.css">
    <link rel="stylesheet" href="../src/components/bootstrap/css/bootstrap.min.css">
    <!-- /css -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
</head>
<body>
<div class="all">
    <div class="header">
        <img src="../src/assets/BAS_logo.png" alt="">
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
                header('Location: ../index.php');
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
        <div class="crumb">
            <a class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover" href="indeks.php?token=<?php echo htmlspecialchars($_SESSION['token']); ?>">MENU</a>
        </div>
    </div>
        <div class="page">
        <a class="link-dark link-offset-2 link-underline-opacity-0" href="../src/pages/kalibrasi.php?token=<?php echo htmlspecialchars($_SESSION['token']); ?>">
            <div class="box">
                <svg xmlns="http://www.w3.org/2000/svg" width="50%" height="50%" fill="rgb(61, 60, 60)" class="bi bi-rulers" viewBox="0 0 16 16">
                    <path d="M1 0a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h5v-1H2v-1h4v-1H4v-1h2v-1H2v-1h4V9H4V8h2V7H2V6h4V2h1v4h1V4h1v2h1V2h1v4h1V4h1v2h1V2h1v4h1V1a1 1 0 0 0-1-1z"/>
                  </svg>
                <div class="name">KALIBRASI</div>
            </div>
        </a>
        <a class="link-dark link-offset-2 link-underline-opacity-0" href="../src/pages/maintenance.php?token=<?php echo htmlspecialchars($_SESSION['token']); ?>">
            <div class="box">
                <svg xmlns="http://www.w3.org/2000/svg" width="50%" height="50%" fill="rgb(61, 60, 60)" class="bi bi-tools" viewBox="0 0 16 16">
                    <path d="M1 0 0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.27 3.27a.997.997 0 0 0 1.414 0l1.586-1.586a.997.997 0 0 0 0-1.414l-3.27-3.27a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3q0-.405-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814zm9.646 10.646a.5.5 0 0 1 .708 0l2.914 2.915a.5.5 0 0 1-.707.707l-2.915-2.914a.5.5 0 0 1 0-.708M3 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026z"/>
                  </svg>
                <div class="name">MAINTENACE</div>
            </div>
        </a>
        <a class="link-dark link-offset-2 link-underline-opacity-0" href="part/operational/index.html">
            <div class="box">
                <svg xmlns="http://www.w3.org/2000/svg" width="50%" height="50%" fill="rgb(61, 60, 60)" class="bi bi-graph-up-arrow" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M0 0h1v15h15v1H0zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5"/>
                  </svg>
                <div class="name">OPERATIONAL</div>
            </div>
        </a>
        <a class="link-dark link-offset-2 link-underline-opacity-0" href="part/drawing/index.html">
            <div class="box">
                <svg xmlns="http://www.w3.org/2000/svg" width="50%" height="50%" fill="rgb(61, 60, 60)" class="bi bi-easel" viewBox="0 0 16 16">
                    <path d="M8 0a.5.5 0 0 1 .473.337L9.046 2H14a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1h-1.85l1.323 3.837a.5.5 0 1 1-.946.326L11.092 11H8.5v3a.5.5 0 0 1-1 0v-3H4.908l-1.435 4.163a.5.5 0 1 1-.946-.326L3.85 11H2a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h4.954L7.527.337A.5.5 0 0 1 8 0M2 3v7h12V3z"/>
                </svg>
                <div class="name">DRAWING</div>
            </div>
        </a>
    </div>
</div>

<!-- js -->
<script src="../src/components/bootstrap/js/bootstrap.min.js"></script>
<script src="../src/components/bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>