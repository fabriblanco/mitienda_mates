<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('productos', 'Home::productos');
$routes->get('categoriasPrincipales', 'Home::categoriasPrincipales');
$routes->get('productosDestacados', 'Home::productosDestacados');
$routes->get('quienesSomos', 'Home::quienesSomos');
$routes->get('terminosYcondiciones', 'Home::terminosYcondiciones');
$routes->get('contacto', 'Home::contacto');
$routes->get('comercializacion', 'Home::comercializacion');
$routes->get('formProducto', 'Home::formProducto');


/*LOGIN*/
$routes->get('formIniciarSesion', 'userController::formIniciarSesion');
$routes->get('formRegistro', 'userController::formRegistro');
$routes->get('cerrarSesion', 'userController::cerrar_sesion');
$routes->post('login', 'userController::verificar_usuario');
$routes->post('consulta', 'userController::registrar_consulta');
$routes->post('persona', 'userController::registrar_persona');


$routes->get('user_admin', 'admin_controller::nav_admin');

//productos
$routes->get('carga_productos', 'admin_controller::vista_carga_Productos');
$routes->post('registra_producto', 'admin_controller::registrar_producto');
$routes->get('productosAdmin', 'admin_controller::productosAdmin');
$routes->get('datosUser', 'userController::perfil');
$routes->get('gestionProd', 'productoController::gestion_prod');

$routes->get('productoController/eliminar_Producto/(:num)', 'productos_controller::eliminar_Producto/$1');
$routes->get('productoController/editar_Producto/(:num)', 'productoController::editar_Producto/$1');






/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
