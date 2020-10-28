<html>

<head>
    <title>Listar de Produtos</title>

    <?php include PATH_VIEW . 'includes/css_config.php' ?>
</head>

<body>
    <?php include PATH_VIEW . 'includes/cabecalho.php' ?>

    <main class="container mt-3">

        <h4>
            Lista de Produtos
        </h4>

        <?php if ($model->hasValidationErrors()) : ?>

            <div class="alert alert-danger" role="alert">

                <?php foreach ($model->getValidationErrors() as $error) :

                    echo $error . "<br />";

                endforeach ?>
            </div>
        <?php endif ?>

        <table class="table table-hover mt-3">
            <thead class="thead-dark">
                <tr>
                    <th>Ações</th>
                    <th>Id</th>
                    <th>Descrição:</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($arr_produtos as $produto) : ?>
                    <tr>
                        <td>
                            <a href="/produto/ver?id=<?= $produto->id ?>">
                                Abrir
                            </a>
                        </td>
                        <td> <?= $produto->id ?> </td>
                        <td> <?= $produto->descricao  ?> </td>
                    </tr>
                <?php endforeach ?>


                <?php if(count($arr_produtos) == 0): ?>
                    <tr>
                        <td colspan="3" class="text-center">Nenhum produto encontrado.</td>
                    </tr>
                <?php endif ?>

            </tbody>
        </table>
    </main>

    <?php include PATH_VIEW . 'includes/rodape.php' ?>
    <?php include PATH_VIEW . 'includes/js_config.php' ?>

</body>

</html>