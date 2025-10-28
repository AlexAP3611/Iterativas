<?php

declare(strict_types=1);

namespace Com\Daw2\Controllers;

use Com\Daw2\Core\BaseController;

class IterativasController extends BaseController
{
    public function iterativas3(array $input = [], array $errors = []): void
    {
        $data = array(
            'titulo' => 'Iterativas 3',
            'breadcrumb' => ['Inicio', 'Iterativas', 'Iterativas 3'],
            'errors' => $errors,
            'input' => $input
        );

        $this->view->showViews(
            array('templates/header.view.php', 'iterativas3.view.php', 'templates/footer.view.php'),
            $data
        );
    }

    public function doIterativas3(): void
    {
        $errors = $this->checkErrorsIterativas3($_POST);
        $input = filter_var_array($_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ($errors !== []) {
            $this->iterativas3($input, $errors);
        }
        else
        {
            $input['resultado'] = $this->sortArray($input['matriz']);
            $this->iterativas3($input);
        }
    }

    private function checkErrorsIterativas3(array $data): array
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
            //Comprobamos si son números todos los elementos de la matriz
            $noNumeros = [];
            foreach ($procesada as $lista) {
                foreach ($lista as $num) {
                    if (!is_numeric($num)) {
                        $noNumeros[] = $num;
                    }
                }
            }
            if ($noNumeros !== []) {
                $noNumeros = filter_var_array($noNumeros, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $errors['matriz'] = 'Los siguientes elementos no son números: ' . implode(', ', $noNumeros);
            } else {
                //Comprobamos si todas las filas de la matriz tienen el mismo tamaño
                $tamanoInicial = count($procesada[0]);
                $errorTamano = false;
                $i = 1;
                while ($i < count($procesada) && !$errorTamano) {
                    $errorTamano = count($procesada[$i]) !== $tamanoInicial;
                    $i++;
                }
                if ($errorTamano) {
                    $errors['matriz'] = 'Las filas no tienen el mismo tamaño';
                }
            }
        }
        return $errors;
    }

    private function sortArray(array $array): array
    {
        $array = array_map('intval', $array);
        $array = array_filter($array);
        sort($array);
        return $array;
    }

    public function iterativas4(array $input = [], array $errors = [], array $resultado = []): void {
        $data = array(
            'titulo' => 'Iterativas 4',
            'breadcrumb' => ['Inicio', 'Iterativas', 'Iterativas 4'],
            'errors' => $errors,
            'input' => $input,
            'resultado' => $resultado
        );

        $this->view->showViews(
            array('templates/header.view.php', 'iterativas4.view.php', 'templates/footer.view.php'),
            $data
        );
    }

    public function doIterativas4(): void {
        $errors = $this->checkErrorsIterativas4($_POST);
        $input = filter_var_array($_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ($errors !== []) {
            $this->iterativas4($input, $errors);
        }
        else
        {
            $texto = mb_strtolower(preg_replace('/\P{L}/u', '', $input['texto']));
            $textArray = mb_str_split($texto);
            $resultado = [];
            foreach ($textArray as $letra) {
                if (isset($resultado[$letra])) {
                    $resultado[$letra]++;
                } else {
                    $resultado[$letra] = 1;
                }
            }
            arsort($resultado);
            $this->iterativas4(input: $input, resultado: $resultado);
        }
    }

    private function checkErrorsIterativas4(array $data): array {
        $errors = array();
        if ($data['texto'] === '') {
            $errors['texto'] = 'Inserte un texto';
        } else {
            $texto = preg_replace('/\P{L}/u', '', $data['texto']);
            if ($texto === '') {
                $errors['texto'] = 'El texto no contiene letras';
            }
        }
        return $errors;
    }

    public function iterativas5(array $input = [], array $errors = [], array $resultado = []): void {
        $data = array(
            'titulo' => 'Iterativas 5',
            'breadcrumb' => ['Inicio', 'Iterativas', 'Iterativas 5'],
            'errors' => $errors,
            'input' => $input,
            'resultado' => $resultado
        );

        $this->view->showViews(
            array('templates/header.view.php', 'iterativas5.view.php', 'templates/footer.view.php'),
            $data
        );
    }

    public function doIterativas5(): void {
        $errors = $this->checkErrorsIterativas5($_POST);
        $input = filter_var_array($_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ($errors !== []) {
            $this->iterativas5($input, $errors);
        } else {
            $texto = mb_strtolower(preg_replace('/[^\p{L}\s]/u', '', $input['texto']));
            $textArray = preg_split('/\s+/u', trim($texto));
            $resultado = [];
            foreach ($textArray as $palabra) {
                if (isset($resultado[$palabra])) {
                    $resultado[$palabra]++;
                } else {
                    $resultado[$palabra] = 1;
                }
            }
            arsort($resultado);
            $this->iterativas5(input: $input, resultado: $resultado);
        }
    }

    private function checkErrorsIterativas5(array $data): array {
        $errors = array();
        if ($data['texto'] === '') {
            $errors['texto'] = 'Inserte un texto';
        } else {
            $texto = preg_replace('/\P{L}/u', '', $data['texto']);
            if ($texto === '') {
                $errors['texto'] = 'El texto no contiene letras';
            }
        }
        return $errors;
    }

    public function iterativas6(array $input = [], array $errors = [], array $resultado = []): void {
        $data = array(
            'titulo' => 'Iterativas 6',
            'breadcrumb' => ['Inicio', 'Iterativas', 'Iterativas 6'],
            'errors' => $errors,
            'input' => $input,
            'resultado' => $resultado
        );
        $this->view->showViews(
            array('templates/header.view.php', 'iterativas6.view.php', 'templates/footer.view.php'),
            $data
        );
    }

    public function doIterativas6(): void
    {
        $errors = $this->checkErrorsIterativas6($_POST);
        $input = filter_var_array($_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ($errors !== []) {
            $this->iterativas6($input, $errors);
        } else {
            $n = (int)$input['numero'];

            // array de booleanos: true = primo, false = no primo
            $esPrimo = array_fill(0, $n + 1, true);
            $esPrimo[0] = $esPrimo[1] = false; // 0 y 1 no son primos

            $limite = (int)sqrt($n);
            for ($i = 2; $i <= $limite; $i++) {
                if ($esPrimo[$i]) {
                    // marcar múltiplos de i como no primos
                    for ($j = $i * $i; $j <= $n; $j += $i) {
                        $esPrimo[$j] = false;
                    }
                }
            }

            // recoger los primos
            $primos = [];
            for ($i = 2; $i <= $n; $i++) {
                if ($esPrimo[$i]) $primos[] = $i;
            }

            $this->iterativas6(input: $input, resultado: $primos);
        }
    }

    private function checkErrorsIterativas6(array $data): array {
        $errors = array();
        if ($data['numero'] == 0 || $data['numero'] == 1) {
            $errors['texto'] = 'El numero no puede ser 0 o 1';
        } else if ($data['numero'] < 0) {
            $errors['texto'] = 'El numero no puede ser negativo';
        } else if ($data['numero'] === '') {
            $errors['texto'] = 'Inserte un numero';
        } else if (!is_numeric($data['numero'])) {
            $errors['texto'] = 'Debe de ser un numero';
        }
        return $errors;
    }
}