<?php
session_start();
require_once '../../../src/config/config.php';

if (!isset($_SESSION['token']) || empty($_SESSION['token'])) {
    header('Location: ../log-in-app1.php?id=' . $id );
    exit;
}

$id = $_SESSION['id'];
$username = $_SESSION['username'];
$bagian = $_SESSION['bagian'];

$username = $_GET['username'];
$bagian = $_GET['bagian'];
?>

<?php
require_once '../../../src/config/config2.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the IDs from the POST request
    $ids = isset($_POST['ids']) ? json_decode($_POST['ids'], true) : [];

    if (!empty($ids)) {
        $conn = new mysqli('localhost', 'username', 'password', 'database');

        if ($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        }

        // Create a prepared statement to prevent SQL injection
        $stmt = $conn->prepare('DELETE FROM your_table WHERE id = ?');

        foreach ($ids as $id) {
            $stmt->bind_param('i', $id);
            $stmt->execute();
        }

        $stmt->close();
        $conn->close();
    }
}
?>


 <!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>SUDAH APPROVE</title>

      <!-- css -->
      <link rel="stylesheet" href="../../../src/styles/schedule.css">
      <link rel="stylesheet" href="../../../src/components/bootstrap/css/bootstrap.min.css">
      <!-- /css -->
      <!-- icon -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.4/font/bootstrap-icons.min.css">
      <link rel="stylesheet" href="path/to/bootstrap-icons.css">
      <!-- /icon -->

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
        <i class="bi bi-list" style="font-size: 20px;"></i>
    </button>

<!-- schedule -->
<div class="menu_right">
    
<!-- SELECT DATA -->
  <!-- <button id="toggleButton" class="btn btn-primary" type="button">
        <i class="bi bi-check2-all" style="font-size: 20px;"></i>
  </button> -->
<!-- FILTER -->
  <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling2" aria-controls="offcanvasScrolling">
        <i class="bi bi-filter-right" style="font-size: 20px;"></i>
  </button>

  <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling2" aria-labelledby="offcanvasScrollingLabel">
      <div class="offcanvas-header">
          <h3 class="offcanvas-title" id="offcanvasScrollingLabel">Filter Data</h3>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
  <div class="offcanvas-body">

  <div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Kode Alat
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
        <div class="accordion-body">

            <form style="display: flex; justify-content:right;" action="certificate.php" method="GET">
                <input class="form-control" id="kode_alat" name="kode_alat" placeholder="Kode_Alat" type="text"> 
                <input class="btn btn-primary" type="submit" value="Search">
            </form>

        </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Tanggal
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
        <div class="accordion-body">

            <form style="display: flex; justify-content:right;" action="certificate.php" method="GET">
                <input class="form-control" id="tanggal_dibuat" name="tanggal_dibuat" placeholder="Tanggal" type="text"> 
                <input class="btn btn-primary" type="submit" value="Search">
            </form>

        </div>
    </div>
  </div>
  </div>
</div>
</div>
</div> 

<!-- profil -->
    <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
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
                            header('Location: ../log-in-app1.php');
                            exit;
                        }
                    ?>
                    <li class="list-group-item"><a href="?action=logout" class="link-dark link-underline link-underline-opacity-0">Logout</a></li>
                </ul>
            </div>
    </div>
</div>

<!-- PAGE -->

<div class="fill">          
  <div class="dread">       
      <div class="crumb">   
          <div class="rumb">
              <a class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover" href="foreman.php?username=<?php echo $_GET['username']; ?>&bagian=<?php echo $_GET['bagian']; ?>&token=<?php echo htmlspecialchars($_SESSION['token']); ?>">MENU</a>
          </div>
          <div class="delet">    
              <button id="selectedall" class="btn btn-warning btn-sm">SELECT ALL</button>
              <form method="post" action="app_1.php" id="form-delete">   
              <button class="btn btn-success btn-sm" type="submit" onclick="return confirm('Apakah Anda yakin dengan data yang tercentang?')">APPROVE</button>
          </div>
      </div>
  </div>
<div class="page">
<div class="data-sch">

<!-- TABLE -->
<?php
require_once '../../../src/config/config2.php';

// departemen pemilik
if (isset($_GET['tanggal_dibuat'])) {
    $tanggal_dibuat = $_GET['tanggal_dibuat'];
} else {
    $tanggal_dibuat = '';
}

// nama alat
if (isset($_GET['kode_alat'])) {
    $kode_alat = $_GET['kode_alat'];
} else {
    $kode_alat = '';
}

$sql = "SELECT * FROM pressure_handover WHERE 1";

// departemen pemilik
if (!empty($tanggal_dibuat)) {
    $sql .= " AND tanggal_dibuat LIKE '%$tanggal_dibuat%'";
}

// nama alat
if (!empty($kode_alat)) {
    $sql .= " AND kode_alat LIKE '%$kode_alat%'";
}

// Kondisi untuk menampilkan data yang kolom app1, app2, app3, dan app4 terisi semua
$sql .= " AND (LENGTH(app1) > 0 AND LENGTH(app2) > 0 AND LENGTH(app3) > 0 AND LENGTH(app4) > 0)";
$result = $conn->query($sql);

echo "<table class='table table-hover'>";
echo "<tr class='table-dark table-sm'>";
echo "<th class='title-check'></th>";
echo "<th>#</th>";
echo "<th>TANGGAL DIBUAT</th>";
echo "<th>KODE ALAT YANG DIKALIBRASI</th>";
echo "<th>FOREMAN</th>";
echo "<th>SUPERVISOR</th>";
echo "<th>MANAGER</th>";
echo "<th>USER</th>";
echo "<th>OPSI</th>";
echo "</tr>";

if ($result && $result->num_rows > 0) {
    $counter = 1;
    while ($row = $result->fetch_assoc()) {
        // Check if app fields are filled
        $app1_status = !empty($row['app1']) ? 'Complete' : '';
        $app2_status = !empty($row['app2']) ? 'Complete' : '';
        $app3_status = !empty($row['app3']) ? 'Complete' : '';
        $app4_status = !empty($row['app4']) ? 'Complete' : '';
        $username = isset($row['username']) ? htmlspecialchars($row['username']) : 'default_username';
        $bagian = isset($row['bagian']) ? htmlspecialchars($row['bagian']) : 'default_bagian';
        $id = isset($row['id']) ? htmlspecialchars($row['id']) : 'default_id';

        echo "<tr>";
        echo '<td class="table-check"><input type="checkbox" name="ids[]" class="form-check-input" value="' . htmlspecialchars($row['id']) . '"></td>';
        echo '<td>' . $counter . '</td>';
        echo "<td>" . htmlspecialchars($row['tanggal_dibuat']) . "</td>";
        echo "<td>" . htmlspecialchars($row['kode_alat']) . "</td>";
        echo "<td>" . htmlspecialchars($app1_status) . "</td>";
        echo "<td>" . htmlspecialchars($app2_status) . "</td>";
        echo "<td>" . htmlspecialchars($app3_status) . "</td>";
        echo "<td>" . htmlspecialchars($app4_status) . "</td>";
        echo '<td><a href="view2.php?username=' . $username . '&bagian=' . $bagian . '&id=' . $id . '"><i class="bi bi-eye-fill"></i></a></td>';
        echo "</tr>";
        $counter++;
    }
    echo "</table>";
} else {
    echo "<p>No data to display.</p>";
}
$conn->close();
?>
</div>
</form>
</div>
</div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var toggleButton = document.getElementById('selectedall');
    var checkboxes = document.querySelectorAll('.form-check-input');
    var allChecked = false;
    toggleButton.addEventListener('click', function() {
        allChecked = !allChecked;
        checkboxes.forEach(function(checkbox) {
            checkbox.checked = allChecked;
        });
        toggleButton.textContent = allChecked ? 'DESELECT' : 'SELECTALL';
    });
});

var button = document.getElementById('toggleButton');
button.addEventListener('click', function() {
    var element = document.querySelector('.delet');
    if (element) {
        element.classList.toggle('active');
    }
});

document.getElementById('toggleButton').addEventListener('click', function() {
    document.querySelectorAll('.form-check-input').forEach(function(element) {
        element.classList.toggle('active');
    });
    document.querySelectorAll('.title-check').forEach(function(element) {
        element.classList.toggle('active');
    });
    document.querySelectorAll('.table-check').forEach(function(element) {
        element.classList.toggle('active');
    });
});
</script>

<!-- JS & BOOSTRAP -->
<script src="../../../src/components/bootstrap/js/bootstrap.min.js"></script>
<script src="../../../src/components/bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>