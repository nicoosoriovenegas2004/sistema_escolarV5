<?php    
require_once 'auth.php';


include("conexion.php");

$correo = $_SESSION['usuario'] ?? '';

$sql = "SELECT foto, tipo_usuario FROM usuarios WHERE correo = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $correo);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$tipo = strtolower(trim($_SESSION['role'] ?? ''));

$ruta = (!empty($user['foto']) && file_exists($user['foto']))
        ? $user['foto']
        : 'imagenes/user.png';
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
.sidebar {
    position: fixed;
    top: 0;
    left: 0;
    width: 240px;
    height: 100vh;
    background: linear-gradient(180deg, #0f172a, #020617);
    padding-top: 20px;
    box-shadow: 2px 0px 15px rgba(0,0,0,0.5);
}

.user-box {
    text-align: center;
    margin-bottom: 20px;
}

.foto-container {
    width: 90px;
    height: 90px;
    margin: auto;
    cursor: pointer;
}

.foto-container img {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    border: 3px solid #38bdf8;
    object-fit: cover;
    transition: 0.3s;
}

.foto-container img:hover {
    transform: scale(1.05);
    opacity: 0.8;
}

.user-box h6 {
    color: #e2e8f0;
    margin-top: 10px;
    font-size: 13px;
}

.sidebar a {
    display: flex;
    align-items: center;
    gap: 10px;
    color: #cbd5f5;
    padding: 12px 20px;
    text-decoration: none;
    font-size: 14px;
    transition: 0.3s;
}

.sidebar a:hover {
    background: #1e293b;
    color: #38bdf8;
}

.flecha {
    margin-left: auto;
    transition: 0.3s;
}

.flecha.rotar {
    transform: rotate(180deg);
}

.submenu {
    display: none;
    background: #020617;
}

.submenu a {
    padding-left: 40px;
    font-size: 13px;
}

.logout {
    color: #ef4444 !important;
}
</style>

<div class="sidebar">

<div class="user-box">

<form method="POST" action="subir_foto.php" enctype="multipart/form-data" id="formFoto">
    <div class="foto-container" onclick="document.getElementById('inputFoto').click();">
        <img src="<?php echo $ruta; ?>">
    </div>

    <input type="file" name="foto" id="inputFoto" hidden onchange="document.getElementById('formFoto').submit();">
</form>

<h6><?php echo htmlspecialchars($_SESSION['usuario']); ?></h6>

</div>

<h5 style="color:#94a3b8;text-align:center;">Sistema Escolar</h5>

<a href="<?php echo ($tipo === 'administrador') ? 'dashboard.php' : 'dashboard_usuario.php'; ?>">
    <i class="fas fa-home"></i> Inicio
</a>

<?php if($tipo === 'administrador'){ ?>

<a href="#" onclick="toggleMenu('usuariosMenu', this)">
    <i class="fas fa-users"></i> Usuarios
    <i class="fas fa-chevron-down flecha"></i>
</a>

<div id="usuariosMenu" class="submenu">
    <a href="usuarios.php">
        <i class="fas fa-list"></i> Lista
    </a>
    <a href="nuevo_usuario.php">
        <i class="fas fa-user-plus"></i> Nuevo
    </a>
</div>

<?php } ?>

<a href="#" onclick="toggleMenu('alumnosMenu', this)">
    <i class="fas fa-graduation-cap"></i> Alumnos
    <i class="fas fa-chevron-down flecha"></i>
</a>

<div id="alumnosMenu" class="submenu">
    <a href="<?php echo ($tipo === 'administrador') ? 'alumnos.php' : 'alumnos_usuario.php'; ?>">
        <i class="fas fa-list"></i> Ver
    </a>

    <?php if($tipo === 'administrador'){ ?>
        <a href="nuevo_alumno.php">
            <i class="fas fa-user-plus"></i> Nuevo
        </a>
    <?php } ?>
</div>

<a href="#" onclick="toggleMenu('docentesMenu', this)">
    <i class="fas fa-chalkboard-teacher"></i> Docentes
    <i class="fas fa-chevron-down flecha"></i>
</a>

<div id="docentesMenu" class="submenu">
    <a href="<?php echo ($tipo === 'administrador') ? 'docentes.php' : 'docentes_usuario.php'; ?>">
        <i class="fas fa-list"></i> Ver
    </a>

    <?php if($tipo === 'administrador'){ ?>
        <a href="nuevo_docente.php">
            <i class="fas fa-user-plus"></i> Nuevo
        </a>
    <?php } ?>
</div>

<a href="<?php echo ($tipo === 'administrador') ? 'grafico_notas.php' : 'grafico_notas_usuario.php'; ?>">
    <i class="fas fa-chart-bar"></i> Gráficos
</a>

<a href="logout.php" class="logout">
    <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
</a>

</div>

<script>
function toggleMenu(menuId, el) {
    let menu = document.getElementById(menuId);
    let subs = document.querySelectorAll('.submenu');
    let flechas = document.querySelectorAll('.flecha');

    subs.forEach(s => {
        if(s.id !== menuId) s.style.display = "none";
    });

    flechas.forEach(f => {
        if(f !== el.querySelector('.flecha')){
            f.classList.remove("rotar");
        }
    });

    if(menu.style.display === "block"){
        menu.style.display = "none";
        el.querySelector('.flecha').classList.remove("rotar");
    } else {
        menu.style.display = "block";
        el.querySelector('.flecha').classList.add("rotar");
    }
}
</script>