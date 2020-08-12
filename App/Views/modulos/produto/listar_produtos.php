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

        <table class="table table-hover mt-3">
                <thead class="thead-dark">
                    <tr>
                        <th>Ações</th>
                        <th>Id</th>
                        <th>Descrição:</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for($i=0; $i<$total_produtos; $i++): ?>
                    <tr>
                        <td> 
                            <a href="/produto/ver?id=<?= $lista_produtos[$i]->id ?>">
                                Abrir
                            </a> 
                        </td>
                        <td> <?= $lista_produtos[$i]->id ?> </td>
                        <td> <?= $lista_produtos[$i]->descricao  ?> </td>
                    </tr>
                    <?php endfor ?>
                </tbody>
            </table>
        </main>

        <?php include PATH_VIEW . 'includes/rodape.php' ?>
        <?php include PATH_VIEW . 'includes/js_config.php' ?>

    </body>
</html>