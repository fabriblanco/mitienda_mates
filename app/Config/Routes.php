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


//HOME
$routes->get('/', 'Home::index');
$routes->get('categoriasPrincipales', 'Home::categoriasPrincipales');
$routes->get('productosDestacados', 'Home::productosDestacados');
$routes->get('quienesSomos', 'Home::quienesSomos');
$routes->get('terminosYcondiciones', 'Home::terminosYcondiciones');
$routes->get('contacto', 'Home::contacto');
$routes->get('comercializacion', 'Home::comercializacion');
$routes->get('formProducto', 'Home::formProducto');

$routes->get('compras/(:num)', 'userController::mis_compras/$1');


/*LOGIN*/
$routes->get('formIniciarSesion', 'userController::formIniciarSesion');
$routes->get('formRegistro', 'userController::formRegistro');
$routes->get('cerrarSesion', 'userController::cerrar_sesion');
$routes->post('login', 'userController::verificar_usuario');
$routes->post('consulta', 'userController::registrar_consulta');
$routes->post('persona', 'userController::registrar_persona');


//ADMIN
$routes->get('user_admin', 'admin_controller::nav_admin');
$routes->get('administrador', 'admin_controller::vista_admin');
$routes->get('consultas_admin', 'admin_controller::verConsultas_admin');
$routes->get('consulta/(:num)', 'admin_controller::estado_consulta/$1');
$routes->get('listar_ventas', 'admin_controller::listar_ventas');
$routes->get('detalles/(:num)', 'admin_controller::ver_detalles_venta/$1');


//GESTION DE PRODUCTOS
$routes->get('productos/(:num)', 'Home::productos/$1');
$routes->get('gestionProd', 'productoController::gestion_prod');
$routes->get('productoController/activar_Producto/(:num)', 'productoController::activar_Producto/$1');
$routes->get('productoController/eliminar_Producto/(:num)', 'productoController::eliminar_Producto/$1');
$routes->get('productoController/editar_Producto/(:num)', 'productoController::editar_Producto/$1');
$routes->post('/productoController/actualizar_Producto', 'productoController::actualizar_Producto');


//PRODUCTOS ADMIN
$routes->get('carga_productos', 'admin_controller::vista_carga_Productos');
$routes->post('registra_producto', 'admin_controller::registrar_producto');
$routes->get('productosAdmin', 'admin_controller::productosAdmin');
$routes->get('datosUser', 'userController::perfil');


//CARRITO
$routes->post('add_cart', 'carrito_controller::agregar_carrito');
$routes->get('vaciar_carrito/all', 'carrito_controller::vaciar_carrito');
$routes->get('ver_carrito', 'carrito_controller::ver_carrito');
$routes->get('eliminar_item/(:hash)', 'carrito_controller::eliminar_item/$1');
$routes->get('comprar/(:num)', 'carrito_controller::guardar_venta/$1');















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
