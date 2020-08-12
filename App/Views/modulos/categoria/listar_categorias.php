<html>
    <head>
        <title>Sistema</title>
        <?php include PATH_VIEW . 'includes/css_config.php' ?>
    </head>
    <body>
        
        <?php include PATH_VIEW . 'includes/cabecalho.php' ?>

        <main class="container mt-3">

            <?php if(isset($_GET['excluido'])): ?>
            <p>Categoria foi excluida!<p>
            <?php endif ?>

            <h4>
                Lista de Categorias
            </h4>

            <table class="table table-hover mt-3">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Ações</th>
                        <th scope="col">Id</th>
                        <th scope="col-lg-9">Descrição:</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for($i=0; $i<$total_categorias; $i++): ?>
                    <tr>
                        <th scope="row"> 
                            <a href="categoria/ver?id=<?= $lista_categorias[$i]->id ?>">
                                Abrir
                            </a> 
                        </th>
                        <td> <?= $lista_categorias[$i]->id ?> </td>
                        <td> <?= $lista_categorias[$i]->descricao  ?> </td>
                    </tr>
                    <?php endfor ?>
                </tbody>
            </table>
        </main>

        <?php include PATH_VIEW . 'includes/rodape.php' ?>
        <?php include PATH_VIEW . 'includes/js_config.php' ?>

    </body>
</html>