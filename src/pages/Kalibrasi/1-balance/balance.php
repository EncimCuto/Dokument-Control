<?php
session_start();
require_once '../../../config/config1.php';

if (!isset($_SESSION['token']) || empty($_SESSION['token'])) {
    header('Location: ../../../../index.php');
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
    <title>balance</title>

    <!-- css -->
    <link rel="stylesheet" href="../../../styles/mainpage.css">
    <link rel="stylesheet" href="../../../components/bootstrap/css/bootstrap.min.css">
    <!-- /css -->
    <!-- icon -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.4/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="path/to/bootstrap-icons.css">
    <!-- /icon -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="all">
        <div class="header">
            <img src="../../../assets/BAS_logo.png" alt="">
        </div>

        <!-- navbar -->
        <div class="navbar">
            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
                <i class="bi bi-list" style="font-size: 20px;"></i>
            </button>

            <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
                id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                <div class="offcanvas-header">
                    <h3 class="offcanvas-title" id="offcanvasScrollingLabel">
                        <i class="bi bi-person-circle" style="font-size: 25px;"></i>
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
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseTwo">
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
                            header('Location: ../../../../index.php');
                            exit;
                        }
                        ?>
                        <li class="list-group-item"><a href="?action=logout"
                                class="link-dark link-underline link-underline-opacity-0">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- page -->
        <div class="fill">
            <div class="dread">
                <div class="crumb">
                    <a class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover"
                        href="../../../../public/indeks.php?token=<?php echo htmlspecialchars($_SESSION['token']); ?>">MENU</a>
                    <a class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover"
                        href="../../kalibrasi.php?token=<?php echo htmlspecialchars($_SESSION['token']); ?>">>
                        KALIBRASI</a>
                    <a class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover"
                        href="balance.php">> BALANCE</a>
                </div>
            </div>
            <div class="page">
                <a href="certificate.php?token=<?php echo htmlspecialchars($_SESSION['token']); ?>"
                    class="link-dark link-underline link-underline-opacity-0">
                    <div class="box">
                        <i class="bi bi-award" style="font-size: 70px;"></i>
                        <div class="name">CERTIFICATE-BALANCE</div>
                    </div>
                </a>
                <a href="form.php?token=<?php echo htmlspecialchars($_SESSION['token']); ?>"
                    class="link-dark link-underline link-underline-opacity-0">
                    <div class="box">
                        <i class="bi bi-file-earmark-ruled" style="font-size: 70px;"></i>
                        <div class="name">FORM-BALANCE</div>
                    </div>
                </a>
                <a href="handover.php?token=<?php echo htmlspecialchars($_SESSION['token']); ?>"
                    class="link-dark link-underline link-underline-opacity-0">
                    <div class="box">
                        <i class="bi bi-hand-thumbs-up" style="font-size: 70px;"></i>
                        <div class="name">HAND OVER-BALANCE</div>
                    </div>
                </a>
                <a href="master.php?token=<?php echo htmlspecialchars($_SESSION['token']); ?>"
                    class="link-dark link-underline link-underline-opacity-0">
                    <div class="box">
                        <i class="bi bi-key" style="font-size: 70px;"></i>
                        <div class="name">MASTER-BALANCE</div>
                    </div>
                </a>
                <a href="schedule.php?token=<?php echo htmlspecialchars($_SESSION['token']); ?>"
                    class="link-dark link-underline link-underline-opacity-0">
                    <div class="box">
                        <i class="bi bi-calendar-date" style="font-size: 70px;"></i>
                        <div class="name">SCHEDULE-BALANCE</div>
                    </div>
                </a>
                <a href="form-pdf.php?token=<?php echo htmlspecialchars($_SESSION['token']); ?>" class="link-dark link-underline link-underline-opacity-0">
                    <div class="box">
                        <i class="bi bi-file-earmark-pdf-fill" style="font-size: 70px;"></i>
                        <div class="name">FORM-PDF</div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- js -->
    <script src="../../../components/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../../components/bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>