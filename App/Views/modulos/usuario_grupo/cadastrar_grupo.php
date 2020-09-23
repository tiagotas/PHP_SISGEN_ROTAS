<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <title>Cadastrar Grupo de Usuários</title>
    <?php include PATH_VIEW . 'includes/css_config.php' ?>
</head>

<body>
    <div id="global">

        <?php include PATH_VIEW . 'includes/cabecalho.php' ?>

        <main class="container mt-3">

            <h4>
                Cadastro de Grupo
            </h4>

            <form method="post" action="/usuario/grupo/salvar">

                <div class="form-group">
                    <label for="descricao">Descrição (Nome) do grupo: </label>
                    <input id="descricao" name="descricao" class="form-control" value="<?= isset($dados_grupo) ? $dados_grupo->descricao : "" ?>" type="text" />
                </div>

                <fieldset class="border rounded p-3 mb-3 bg-light">
                    <legend class="form-label col-auto bg-light">Permissões do Grupo</legend>

                    <div class="form-row">
                        <div class="form-group col-md-3">                            
                            <input id="cadastrar" name="cadastrar" type="checkbox" <?= ($dados_grupo->cadastrar == 'S') ? 'checked' : '' ?> />
                            <label for="cadastrar">Cadastrar </label>
                        </div>
                        <div class="form-group col-md-3">                            
                            <input id="editar" name="editar" type="checkbox" <?= ($dados_grupo->editar == 'S') ? 'checked' : '' ?> />
                            <label for="editar">Editar </label>
                        </div>
                        <div class="form-group col-md-3">                            
                            <input id="listar" name="listar" type="checkbox" <?= ($dados_grupo->listar == 'S') ? 'checked' : '' ?> />
                            <label for="listar">Listar </label>
                        </div>
                        <div class="form-group col-md-3">                            
                            <input id="excluir" name="excluir" type="checkbox" <?= ($dados_grupo->excluir == 'S') ? 'checked' : '' ?> />
                            <label for="excluir">Excluir </label>
                        </div>
                    </div>
                </fieldset>








                <?php if (isset($dados_grupo)) : ?>
                    <input name="id" type="hidden" value="<?= $dados_grupo->id ?>" />
                    <a class="btn btn-danger" href="/usuario/grupo/excluir?id=<?= $dados_grupo->id ?>">
                        EXCLUIR
                    </a>
                <?php endif ?>

                <button type="submit" class="btn btn-success">Salvar</button>
            </form>
        </main>

        <?php include PATH_VIEW . 'includes/rodape.php' ?>

        <?php include PATH_VIEW . 'includes/js_config.php' ?>

    </div>
</body>

</html>