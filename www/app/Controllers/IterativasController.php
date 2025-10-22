<?php

declare(strict_types=1);

namespace Com\Daw2\Controllers;

class IterativasController
{
    public function iterativas3(): void
    {
        $data = array(
            'titulo' => 'Iterativas 3',
            'breadcrumbs' => ['Inicio', 'Iterativas', 'Iterativas 3']
        );
        $this->view->showViews(
            array('templates/header.view.php', 'iterativas3.view.php', 'templates/footer.view.php'),
            $data
        );
    }

    public function doIterativas3(): void
    {
        $errors = $this->checkErrorsIterativas3($_POST);
    }

    private function checkErrorsIterativas3(array $data): void
    {
        $errors = array();
        if (empty($data['matriz'])) {
            $errors['matriz'] = 'Inserte una matriz';
        } else {
            $tmp = explode('|', $data['matriz']);
            $procesada = array();
            foreach ($tmp as $item) {
                $procesada[] = explode(',', $item);
            }

            //Comprobamos si son numeros todos los elementos de la matriz
            $noNumeros = [];
            foreach ($procesada as $lista) {
                foreach ($lista as $num) {
                    if (!is_numeric($num)) {
                        $noNumeros[] = $num;
                    }
                }
            }
            if ($noNumeros !== []) {
                $errors['matriz'] = 'Los siguientes elementos no son numeros: ' . implode(', ', $noNumeros);
            } else {
                //Comprobamos si todas las filas de la matriz tienen el mismo tamaño
                $tamanoInicial = count($procesada[0]);
                $errorTamano = false;
                $i = 1;
                while ($i < count($procesada) && $errorTamano) {
                    $errorTamano = count($procesada[$i]) !== $tamanoInicial;
                }
                if ($errorTamano) {
                    $errors['matriz'] = 'Las filas no tienen el mismo tamaño';
                } else {

                }
            }
        }
        return $errors;
    }
}
