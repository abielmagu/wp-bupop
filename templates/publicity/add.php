<div class="wrap">
    <h1 class="mb-3">Popub</h1>

    <form action="<?= popub_admin_post_url() ?>" method="post" class="box" enctype="multipart/form-data" autocomplete="off">
        <div class="box-body">
            <h2 class="mt-0 mb-3">Nueva publicidad</h2>
            <div class="form-group">
                <label for="titulo" class="font-size-md">Titulo</label>
                <input type="text" name="titulo" id="titulo" class="input" required>
            </div>
            <div class="form-group">
                <label for="select_tipo" class="font-size-md">Tipo</label>
                <select name="tipo" id="select_tipo" class="select" required>
                    <option selected disabled></option>
                    <?php foreach($types as $type): ?>
                    <option value="<?= $type ?>"><?= ucfirst($type) ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group d-none" id="wrapper_contenido">
                <!-- <label class="font-size-md">Contenido</label> -->

                <!-- Code input -->
                <div id="contenido_codigo" style="display:none">
                    <label for="input_codigo">Escribe o pega el código</label>
                    <textarea name="codigo" class="textarea" id="input_codigo" cols="20" rows="5"></textarea>
                </div>
                
                <!-- Image input -->
                <div id="contenido_imagen" style="display:none">
                    <label for="input_imagen">Seleccionar la imagen</label>
                    <input name="imagen" class="input mb-3" id="input_imagen" type="file">

                    <label for="input_enlace">Url de enlace</label>
                    <input name="enlace" class="input" id="input_enlace" type="text" placeholder="">
                </div>

            </div>
            <br>

            <input type="hidden" name="token" value="<?= popub_token() ?>">
            <input type="hidden" name="action" value="popub_publicity_store">
            <button class="button button-primary">Guardar publicidad</button>
        </div>
    </form>
</div>
