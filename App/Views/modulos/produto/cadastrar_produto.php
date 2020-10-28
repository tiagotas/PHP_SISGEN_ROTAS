<html>

<head>
    <title>Cadastro de Produtos</title>

    <?php include PATH_VIEW . 'includes/css_config.php' ?>

</head>

<body>
    <?php include PATH_VIEW . 'includes/cabecalho.php' ?>

    <main class="container mt-3">

        <h4>
            Cadastro de Produto
        </h4>

        <?php if ($model->hasValidationErrors()) : ?>

            <div class="alert alert-danger" role="alert">

                <?php foreach ($model->getValidationErrors() as $error) :

                    echo $error . "<br />";

                endforeach; ?>
            </div>
        <?php endif; ?>




        <form method="post" action="/produto/salvar">

            <div class="form-group">
                <label for="descricao">Descrição (Nome) do produto:</label>
                <input class="form-control" id="descricao" name="descricao" type="text" value="<?= $model->descricao ?>" />
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="preco">Preço:</label>
                    <input class="form-control" id="preco" name="preco" type="number" value="<?= $model->preco ?>" />
                </div>

                <div class="form-group col-md-6">
                    <label for="foto">Foto:</label>
                    <input class="form-control-file" id="foto" name="foto" type="file" />
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="id_categoria">Categoria:</label>
                    <select id="id_categoria" name="id_categoria" class="form-control">
                        <option value="">Selecione a categoria</option>

                        <?php foreach($model->lista_categorias as $categoria):                       

                            $selecinado = ($categoria->id == $model->id_categoria) ? "selected" : "";
                        ?>

                            <option value="<?= $categoria->id ?>" <?= $selecinado ?>>
                                <?= $categoria->descricao  ?>
                            </option>

                        <?php endforeach ?>

                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="id_marca">Marca:</label>
                    <select id="id_marca" name="id_marca" class="form-control">
                        <option value="">Selecione a marca</option>

                        <?php foreach($model->lista_marcas as $marca):

                            $selecinado = ($marca->id == $model->id_marca) ? "selected" : "";

                        ?>
                            <option value="<?= $marca->id ?>" <?= $selecinado ?>>
                                <?= $marca->descricao  ?>
                            </option>
                        <?php endforeach ?>
                    </select>

                </div>
            </div>

            <?php if ($model->id !== null) : ?>
                <input name="id" type="hidden" value="<?= $model->id ?>" />

                <a class="btn btn-danger" href="/produto/excluir?id=<?= $model->id ?>">
                    EXCLUIR
                </a>

            <?php endif ?>

            <button type="submit" class="btn btn-success">Salvar</button>

        </form>
    </main>


    <?php include PATH_VIEW . 'includes/rodape.php' ?>
    <?php include PATH_VIEW . 'includes/js_config.php' ?>

</body>

</html>