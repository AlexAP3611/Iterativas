<?php

namespace Com\Daw2\Core;

use Steampixel\Route;

class FrontController{
    
    static function main(){
        Route::add('/', 
                function(){
                    $controlador = new \Com\Daw2\Controllers\InicioController();
                    $controlador->index();
                }
                , 'get');
        Route::add(
            '/inicio2',
            function () {
                $controlador = new \Com\Daw2\Controllers\InicioController();
                $controlador->inicio2();
            },
            'get'
        );
        Route::add('/iterativas3',
            function(){
                $controlador = new \Com\Daw2\Controllers\IterativasController();
                $controlador->iterativas3();
            }
            , 'get');
        Route::add('/iterativas3',
            function(){
                $controlador = new \Com\Daw2\Controllers\IterativasController();
                $controlador->doIterativas3();
            }
            , 'post');
        Route::add('/iterativas4',
            function(){
                $controlador = new \Com\Daw2\Controllers\IterativasController();
                $controlador->iterativas4();
            }
            , 'get');
        Route::add('/iterativas4',
            function(){
                $controlador = new \Com\Daw2\Controllers\IterativasController();
                $controlador->doIterativas4();
            }
            , 'post');
        Route::add('/iterativas5',
            function(){
                $controlador = new \Com\Daw2\Controllers\IterativasController();
                $controlador->iterativas5();
            }
            , 'get');
            Route::add('/iterativas5',
            function(){
                $controlador = new \Com\Daw2\Controllers\IterativasController();
                $controlador->doIterativas5();
            }
            , 'post');
        Route::add('/iterativas6',
            function(){
                $controlador = new \Com\Daw2\Controllers\IterativasController();
                $controlador->iterativas6();
            }
            , 'get');
        Route::add('/iterativas6',
            function(){
                $controlador = new \Com\Daw2\Controllers\IterativasController();
                $controlador->doIterativas6();
            }
            , 'post');
        Route::add('/demo-proveedores',
            function(){
                $controlador = new \Com\Daw2\Controllers\InicioController();
                $controlador->demo();
            }
            , 'get');
        Route::pathNotFound(
            function(){
                $controller = new \Com\Daw2\Controllers\ErroresController();
                $controller->error404();
            }
        );
        
        Route::methodNotAllowed(
            function(){
                $controller = new \Com\Daw2\Controllers\ErroresController();
                $controller->error405();
            }
        );
        Route::run();
    }
}

