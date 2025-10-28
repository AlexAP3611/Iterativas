<?php

declare(strict_types=1);

if (isset($resultado) && !empty($resultado)) {
    ?>
    <div class="alert alert-success" role="alert">
        <?php
        foreach ($resultado as $numero) {
            echo $numero . '<br>';
        }
        ?>
    </div>
    <?php
}
?>
<div class="card shadow mb-4">
    <form method="post" action="">
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><?php echo $titulo; ?></h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="numero">Inserta el numero hasta el que se va a hacer la criba de Erastótenes</label>
                        <input type="text" class="form-control"
                               name="numero" id="numero"
                               value="<?php
                               echo $input['numero'] ?? ''; ?>"
                               maxlength="9999"
                               placeholder="2,3,4,5..."
                        />
                        <p class="text-danger small">
                            <?php
                            echo $errors['texto'] ?? '';
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="col-12 text-right">
                <input type="submit" value="Enviar" class="btn btn-primary ml-2"/>
            </div>
        </div>
    </form>
</div>
