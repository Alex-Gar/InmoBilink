<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\AdminController;
use Controllers\ApiController;
use Controllers\EmpresaController;
use Controllers\LoginController;
use Controllers\PaginasController;
use Controllers\PropiedadController;
use Controllers\PropietariosController;
use MVC\Router;

$router = new Router();
/* Paginas */
$router->get('/pagina-no-encontrada', [PaginasController::class, 'error404']);

$router->get('/', [PaginasController::class, 'index']);
$router->get('/avanzado', [PaginasController::class, 'avanzado']);
$router->post('/avanzado', [PaginasController::class, 'avanzado']);
$router->get('/sobre_nosotros', [PaginasController::class, 'sobreNosotros']);
$router->get('/contactanos', [PaginasController::class, 'contactanos']);
$router->post('/contactanos', [PaginasController::class, 'contactanos']);
$router->get('/propiedad', [PaginasController::class, 'verPropiedad']);
$router->get('/empresa', [PaginasController::class, 'verEmpresa']);

/*Controladores */
$router->get('/admin', [AdminController::class, 'admin']);
$router->get('/admin-inmobiliaria', [AdminController::class, 'adminInmobiliaria']);
$router->get('/admin-vendedor', [AdminController::class, 'adminVendedor']);
$router->get('/acerca-de', [AdminController::class, 'acercaDe']);
$router->post('/acerca-de', [AdminController::class, 'acercaDe']);
$router->get('/info-de', [AdminController::class, 'infoDe']);
$router->post('/info-de', [AdminController::class, 'infoDe']);

$router->post('/propietarios', [AdminController::class, 'propietarios']);
$router->get('/propietarios', [PropietariosController::class, 'index']);
$router->get('/propietarios/crear', [propietariosController::class, 'crear']);
$router->post('/propietarios/crear', [propietariosController::class, 'crear']);
$router->get('/propietarios/editar', [propietariosController::class, 'actualizar']);
$router->post('/propietarios/editar', [propietariosController::class, 'actualizar']);
$router->post('/propietarios/eliminar', [propietariosController::class, 'eliminar']);

$router->get('/propiedades', [PropiedadController::class, 'index']);
$router->get('/propiedad/crear', [PropiedadController::class, 'crear']);
$router->post('/propiedad/crear', [PropiedadController::class, 'crear']);
$router->get('/propiedad/editar', [PropiedadController::class, 'actualizar']);
$router->post('/propiedad/editar', [PropiedadController::class, 'actualizar']);
$router->post('/propiedad/eliminar', [PropiedadController::class, 'eliminar']);

$router->get('/bienes-r', [EmpresaController::class, 'index']);
$router->get('/bienes-r/crear', [EmpresaController::class, 'crear']);
$router->post('/bienes-r/crear', [EmpresaController::class, 'crear']);
$router->get('/bienes-r/editar', [EmpresaController::class, 'actualizar']);
$router->post('/bienes-r/editar', [EmpresaController::class, 'actualizar']);
$router->post('/bienes-r/eliminar', [EmpresaController::class, 'eliminar']);

$router->get('/finalidades', [AdminController::class, 'finalidades']);
$router->post('/finalidades', [AdminController::class, 'finalidades']);
$router->get('/tipoPropiedad', [AdminController::class, 'tipoPropiedad']);
$router->post('/tipoPropiedad', [AdminController::class, 'tipoPropiedad']);

/* Apis*/
$router->get('/api/no/propiedades', [ApiController::class, 'noPropiedades']);
$router->get('/api/info/propiedades', [ApiController::class, 'infoPropiedades']);

/* Login */
$router->get('/olvide', [LoginController::class, 'olvide']);
$router->post('/olvide', [LoginController::class, 'olvide']);
$router->get('/nuevo-password', [LoginController::class, 'nuevoPassword']);
$router->post('/nuevo-password', [LoginController::class, 'nuevoPassword']);
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);

//Confirmar cuente
$router->get('/confirmar-cuenta', [LoginController::class,'confirmar']);
$router->get('/mensaje', [LoginController::class,'mensaje']);

$router->comprobarRutas();