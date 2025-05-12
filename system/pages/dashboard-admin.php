<?php
session_start();

// Verificar si la sesión está activa
if (!isset($_SESSION['email']) || $_SESSION['rol'] != "Administrativo") {
  header("Location: http://localhost/medicsoft/login.php"); // Si no es admin, lo manda al login
  exit();
}
include '../../conexion.php';

// Obtener el nombre desde la sesión
$nombreAdmin = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : 'Administración';
$usuarioId = isset($_SESSION['id']) ? $_SESSION['id'] : null;

// Consulta para obtener el estado laboral
$sql = "SELECT estado_laboral FROM usuarios WHERE id = $usuarioId";
$result = $conexion->query($sql);

$estadoLaboral = 'fuera'; // Valor por defecto
if ($result && $row = $result->fetch_assoc()) {
  $estadoLaboral = $row['estado_laboral']; // Este valor debe ser 'en' o 'fuera'
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/icon.png">
  <title>
    Panel Principal - MedicSoft
  </title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,800" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.1.0" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>

</head>

<body class="g-sidenav-show  bg-gray-100">

  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 "
    id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
        aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/soft-ui-dashboard/pages/dashboard.php "
        target="_blank">
        <img src="../assets/img/icon.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">MedicSoft</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link  active" href="../pages/dashboard-admin.php">
            <div
              class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>shop </title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(0.000000, 148.000000)">
                        <path class="color-background opacity-6"
                          d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z">
                        </path>
                        <path class="color-background"
                          d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z">
                        </path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Panel Principal</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link  " href="../pages/pacientes-admin.php">
            <div
              class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i style="color: #181818;" class="bi bi-people-fill"></i>
            </div>
            <span class="nav-link-text ms-1">Pacientes</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link  " href="../pages/personal.php">
            <div
              class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i style="color: #181818;" class="bi bi-person-arms-up"></i>
            </div>
            <span class="nav-link-text ms-1">Personal</span>
          </a>
        </li>

        <!-- <li class="nav-item">
          <a class="nav-link  " href="../pages/virtual-reality.html">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>box-3d-50</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-2319.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(603.000000, 0.000000)">
                        <path class="color-background" d="M22.7597136,19.3090182 L38.8987031,11.2395234 C39.3926816,10.9925342 39.592906,10.3918611 39.3459167,9.89788265 C39.249157,9.70436312 39.0922432,9.5474453 38.8987261,9.45068056 L20.2741875,0.1378125 L20.2741875,0.1378125 C19.905375,-0.04725 19.469625,-0.04725 19.0995,0.1378125 L3.1011696,8.13815822 C2.60720568,8.38517662 2.40701679,8.98586148 2.6540352,9.4798254 C2.75080129,9.67332903 2.90771305,9.83023153 3.10122239,9.9269862 L21.8652864,19.3090182 C22.1468139,19.4497819 22.4781861,19.4497819 22.7597136,19.3090182 Z"></path>
                        <path class="color-background opacity-6" d="M23.625,22.429159 L23.625,39.8805372 C23.625,40.4328219 24.0727153,40.8805372 24.625,40.8805372 C24.7802551,40.8805372 24.9333778,40.8443874 25.0722402,40.7749511 L41.2741875,32.673375 L41.2741875,32.673375 C41.719125,32.4515625 42,31.9974375 42,31.5 L42,14.241659 C42,13.6893742 41.5522847,13.241659 41,13.241659 C40.8447549,13.241659 40.6916418,13.2778041 40.5527864,13.3472318 L24.1777864,21.5347318 C23.8390024,21.7041238 23.625,22.0503869 23.625,22.429159 Z"></path>
                        <path class="color-background opacity-6" d="M20.4472136,21.5347318 L1.4472136,12.0347318 C0.953235098,11.7877425 0.352562058,11.9879669 0.105572809,12.4819454 C0.0361450918,12.6208008 6.47121774e-16,12.7739139 0,12.929159 L0,30.1875 L0,30.1875 C0,30.6849375 0.280875,31.1390625 0.7258125,31.3621875 L19.5528096,40.7750766 C20.0467945,41.0220531 20.6474623,40.8218132 20.8944388,40.3278283 C20.963859,40.1889789 21,40.0358742 21,39.8806379 L21,22.429159 C21,22.0503869 20.7859976,21.7041238 20.4472136,21.5347318 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Virtual Reality</span>
          </a>
        </li> -->

        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Personal</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link  " href="../pages/profile-admin.php">
            <div
              class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 46 42" version="1.1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>Yo</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1717.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(1.000000, 0.000000)">
                        <path class="color-background opacity-6"
                          d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z">
                        </path>
                        <path class="color-background"
                          d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z">
                        </path>
                        <path class="color-background"
                          d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z">
                        </path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Mi Información</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" onclick="confirmarCerrarSesion(event)">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i style="color: #181818;" class="bi bi-door-closed-fill"></i>
            </div>
            <span class="nav-link-text ms-1">Cerrar Sesión</span>
          </a>
        </li>

      </ul>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
      navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Página</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Panel Principal</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Panel Principal</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" placeholder="Buscar..">
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">

            <li class="nav-item d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none"><?php echo htmlspecialchars($nombreAdmin); ?></span>
              </a>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">

            </li>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown"
                aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
              </a>
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">Cita Médica </span> hoy a las 10:00 am
                        </h6>
                        <p class="text-xs text-secondary mb-0 ">
                          <i class="fa fa-clock me-1"></i>
                          hace 13 minutos
                        </p>
                      </div>
                    </div>
                  </a>
                </li>

              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <h4 class="mb-3">¡Hola <?php echo htmlspecialchars($nombreAdmin); ?>! 👋</h4>

      <div class="row">

        <div class="col-lg-6 col-12">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
              <a class="card-green" href="pacientes-admin.php">
                <div class="card">
                  <span class="mask bg-primary opacity-10 border-radius-lg"></span>
                  <div class="card-body p-3 position-relative">
                    <div class="row">
                      <div class="col-8 text-start">
                        <div class="icon icon-shape bg-white shadow text-center border-radius-2xl">
                          <i style="color: #30807a;" class="bi bi-people-fill"></i>
                        </div>
                        <h5 class="text-white font-weight-bolder mb-0 mt-3">
                          Pacientes
                        </h5>
                        <span class="text-white text-sm">Mira a todos pacientes</span>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-4 mt-md-0">
              <a href="profile-admin.php">
                <div class="card">
                  <span class="mask bg-dark opacity-10 border-radius-lg"></span>
                  <div class="card-body p-3 position-relative">
                    <div class="row">
                      <div class="col-8 text-start">
                        <div class="icon icon-shape bg-white shadow text-center border-radius-2xl">
                          <i style="color: #181818;" class="bi bi-person-circle"></i>
                        </div>
                        <h5 class="text-white font-weight-bolder mb-0 mt-3">
                          Mi Información
                        </h5>
                        <span class="text-white text-sm">Ver tu información</span>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="row mt-4">
            <div class="col-lg-6 col-md-6 col-12">
              <a href="personal.php">
                <div class="card">
                  <span class="mask bg-dark opacity-10 border-radius-lg"></span>
                  <div class="card-body p-3 position-relative">
                    <div class="row">
                      <div class="col-8 text-start">
                        <div class="icon icon-shape bg-white shadow text-center border-radius-2xl">
                          <i style="color: #181818;" class="bi bi-person-arms-up"></i>
                        </div>
                        <h5 class="text-white font-weight-bolder mb-0 mt-3">
                          Personal</h5>
                        <span class="text-white text-sm">Gestión de personal médico</span>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-4 mt-md-0">
              <a href="#" data-bs-toggle="modal" data-bs-target="#modalHospitalizar">
                <div class="card">
                  <span class="mask bg-dark opacity-10 border-radius-lg"></span>
                  <div class="card-body p-3 position-relative">
                    <div class="row">
                      <div class="col-8 text-start">
                        <div class="icon icon-shape bg-white shadow text-center border-radius-2xl">
                          <i style="color: #181818;" class="bi bi-bandaid-fill"></i>
                        </div>
                        <h5 class="text-white font-weight-bolder mb-0 mt-3">
                          Hospitalización
                        </h5>
                        <span class="text-white text-sm">Gestionar el egreso del paciente</span>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>

      </div>


      <div class="row mt-4">
        <div class="col-lg-7 mb-lg-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <!-- Columna Izquierda -->
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                  <p class="mb-1 pt-2 text-bold">Estado Laboral</p>
                  <div class="mb-3">
                    <select class="form-control mt-3" id="tipoConsulta" onchange="cambiarIcono()" required>
                      <option value="fuera" <?= $estadoLaboral == 'fuera' ? 'selected' : '' ?>>Fuera de Servicio</option>
                      <option value="en" <?= $estadoLaboral == 'en' ? 'selected' : '' ?>>En Servicio</option>
                    </select>
                  </div>
                  <button type="button" class="btn btn-primary" onclick="actualizarEstado(<?= $usuarioId ?>)">Actualizar Estado</button>
                </div>


                <!-- Columna Derecha (Decorativa) -->
                <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
                  <div class="bg-primary border-radius-lg h-100 position-relative">
                    <img src="../assets/img/shapes/waves-white.svg"
                      class="position-absolute h-100 w-50 top-0 d-lg-block d-none" alt="waves">
                    <div class="position-relative d-flex align-items-center justify-content-center h-100">
                      <i id="iconoEstado" style="color: aliceblue; font-size: 80px;" class="bi bi-person-workspace"></i>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="modalHospitalizar" tabindex="-1" aria-labelledby="modalHospitalizarLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Header -->
            <div class="modal-header">
              <h5 class="modal-title" id="modalHospitalizarLabel">Hospitalizar Paciente</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Body -->
            <div class="modal-body">

              <div class="mb-3">
                <label for="pacienteSelect" class="form-label">Selecciona al paciente:</label>
                <select id="pacienteSelect" class="form-select">
                  <option value="">--Selecciona--</option>
                  <?php
                  include '../../conexion.php';
                  $consulta = "SELECT id, CONCAT(curp, ' ', nombre, ' ', apellidos) AS nombre_completo FROM usuarios WHERE hospitalizado = 0 AND rol = 'Paciente'";
                  $resultado = mysqli_query($conexion, $consulta);
                  while ($fila = mysqli_fetch_assoc($resultado)) {
                    echo '<option value="' . $fila['id'] . '">' . $fila['nombre_completo'] . '</option>';
                  }
                  ?>
                </select>
              </div>

              <div class="mb-3">
                <label for="diagnostico_principal" class="form-label">Diagnóstico Principal:</label>
                <input type="text" id="diagnostico_principal" class="form-control" placeholder="Escribe aquí..." required>
              </div>

              <div class="mb-3">
                <label for="numero_habitacion" class="form-label">Número de Habitación:</label>
                <input type="text" id="numero_habitacion" class="form-control" placeholder="Escribe aquí..." required>
              </div>

              <div class="mb-3">
                <label for="estado_actual" class="form-label">Estado actual:</label>
                <select id="estado_actual" class="form-select" required>
                  <option value="" disabled selected>Selecciona estado</option>
                  <option value="Estable">Estable</option>
                  <option value="Crítico">Crítico</option>
                  <option value="Grave">Grave</option>
                  <option value="Recuperación">En recuperación</option>
                </select>
              </div>

              <div class="mb-3">
                <label for="enfermeroSelect" class="form-label">Selecciona al Enfermero que le atenderá:</label>
                <select id="enfermeroSelect" class="form-select">
                  <option value="">--Selecciona--</option>
                  <?php
                  include '../../conexion.php';
                  $consulta = "SELECT id, CONCAT(curp, ' ', nombre, ' ', apellidos) AS nombre_completo FROM usuarios WHERE rol = 'Enfermero'";
                  $resultado = mysqli_query($conexion, $consulta);
                  while ($fila = mysqli_fetch_assoc($resultado)) {
                    echo '<option value="' . $fila['id'] . '">' . $fila['nombre_completo'] . '</option>';
                  }
                  ?>
                </select>
              </div>

              <div class="mb-3">
                <label for="medicoSelect" class="form-label">Selecciona al Médico que le atenderá:</label>
                <select id="medicoSelect" class="form-select">
                  <option value="">--Selecciona--</option>
                  <?php
                  include '../../conexion.php';
                  $consulta = "SELECT id, CONCAT(curp, ' ', nombre, ' ', apellidos) AS nombre_completo FROM usuarios WHERE rol = 'Medico'";
                  $resultado = mysqli_query($conexion, $consulta);
                  while ($fila = mysqli_fetch_assoc($resultado)) {
                    echo '<option value="' . $fila['id'] . '">' . $fila['nombre_completo'] . '</option>';
                  }
                  ?>
                </select>
              </div>

              <div class="mb-3">
                <label for="observaciones" class="form-label">Observaciones:</label>
                <textarea id="observaciones" class="form-control" rows="2" placeholder="Escribe aquí..."></textarea>
              </div>


              <!-- Footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="confirmarHospitalizacion()">Hospitalizar</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              </div>

            </div>
          </div>
        </div>
      </div>

  </main>



  <!--   Core JS Files   -->


  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    function cambiarIcono() {
      const select = document.getElementById('tipoConsulta');
      const icono = document.getElementById('iconoEstado');
      if (select.value === 'en') {
        icono.className = 'bi bi-check-circle-fill'; // Icono verde de "en servicio"
        icono.style.color = 'white';
      } else {
        icono.className = 'bi bi-slash-circle-fill'; // Icono rojo de "fuera de servicio"
        icono.style.color = 'white';
      }
    }

    // Ejecutar al cargar para que ya muestre el correcto según selección inicial
    cambiarIcono();

    function confirmarHospitalizacion() {
      let pacienteId = document.getElementById('pacienteSelect').value;
      let diagnostico = document.getElementById('diagnostico_principal').value;
      let habitacion = document.getElementById('numero_habitacion').value;
      let estado = document.getElementById('estado_actual').value;
      let enfermeroId = document.getElementById('enfermeroSelect').value;
      let medicoId = document.getElementById('medicoSelect').value;
      let observaciones = document.getElementById('observaciones').value;

      // Validaciones simples
      if (!pacienteId || !diagnostico || !habitacion || !estado || !enfermeroId || !medicoId) {
        Swal.fire('Error', 'Por favor completa todos los campos obligatorios.', 'error');
        return;
      }

      Swal.fire({
        title: 'Hospitalizar paciente',
        text: '¿Estás seguro de que deseas hospitalizar al paciente seleccionado?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí, hospitalizar',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.isConfirmed) {
          // Aquí enviamos los datos usando GET en la URL (igual que darDeBaja)
          window.location.href = 'hospitalizar.php' +
            '?paciente=' + encodeURIComponent(pacienteId) +
            '&diag=' + encodeURIComponent(diagnostico) +
            '&habitacion=' + encodeURIComponent(habitacion) +
            '&estado=' + encodeURIComponent(estado) +
            '&enfermero=' + encodeURIComponent(enfermeroId) +
            '&medico=' + encodeURIComponent(medicoId) +
            '&obs=' + encodeURIComponent(observaciones);
        }
      });
    }

    function confirmarCerrarSesion(e) {
      e.preventDefault(); // Evita que el enlace se ejecute directo
      Swal.fire({
        title: '¿Estás seguro?',
        text: 'Se cerrará tu sesión actual',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí, cerrar sesión',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = '../pages/cerrar_sesion.php';
        }
      });
    }

    function actualizarEstado(usuarioId) {
      let estadoSeleccionado = document.getElementById('tipoConsulta').value;

      Swal.fire({
        title: 'Actualizar Estado Laboral',
        text: '¿Estás seguro de que deseas actualizar el estado laboral?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí, actualizar',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.isConfirmed) {
          // Enviamos el estado y el ID del usuario por GET
          window.location.href = 'actualizar_estado.php?estado=' + encodeURIComponent(estadoSeleccionado) + '&id=' + usuarioId;
        }
      });
    }
  </script>
  <script>
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Sales",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "#fff",
          data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
          maxBarThickness: 6
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 15,
              font: {
                size: 14,
                family: "Inter",
                style: 'normal',
                lineHeight: 2
              },
              color: "#fff"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false
            },
            ticks: {
              display: false
            },
          },
        },
      },
    });


    var ctx2 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

    var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
    gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
            label: "Mobile apps",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#cb0c9f",
            borderWidth: 3,
            backgroundColor: gradientStroke1,
            fill: true,
            data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
            maxBarThickness: 6

          },
          {
            label: "Websites",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#3A416F",
            borderWidth: 3,
            backgroundColor: gradientStroke2,
            fill: true,
            data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
            maxBarThickness: 6
          },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#b2b9bf',
              font: {
                size: 11,
                family: "Inter",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#b2b9bf',
              padding: 20,
              font: {
                size: 11,
                family: "Inter",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.1.0"></script>
</body>

</html>