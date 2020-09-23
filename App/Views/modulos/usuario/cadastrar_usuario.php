<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <title>Cadastrar Usuários</title>
    <?php include PATH_VIEW . 'includes/css_config.php' ?>
</head>

<body>
    <div id="global">

        <?php include PATH_VIEW . 'includes/cabecalho.php' ?>

        <main class="container mt-3">

            <h4>
                Cadastro de Usuário
            </h4>

            <?php if (isset($_GET['duplicate_email']) || isset($validations['duplicate_email']))  : ?>
                <div class="alert alert-danger" role="alert">
                    O <strong>e-mail</strong> informado já está sendo usado para outro usuário.
                </div>
            <?php endif ?>

            <?php if (isset($_GET['duplicate_user'])) : ?>
                <div class="alert alert-danger" role="alert">
                    O <strong>usuário</strong> escolhido já está sendo usado para outro usuário.
                </div>
            <?php endif ?>

            <form method="post" action="/usuario/salvar">

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nome">Nome: </label>
                        <input name="nome" class="form-control" value="<?= isset($dados_usuario) ? $dados_usuario->nome : "" ?>" type="text" required />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">E-mail: </label>
                        <input name="email" class="form-control" value="<?= isset($dados_usuario) ? $dados_usuario->email : "" ?>" type="email" required />
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="usuario">Usuário: </label>
                        <input name="usuario" class="form-control" value="<?= isset($dados_usuario) ? $dados_usuario->usuario : "" ?>" type="text" required />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="id_grupo">Grupo: </label>

                        <select id="id_grupo" name="id_grupo" class="form-control" required>
                                <option>Selecione o Grupo</option>

                                <?php 
                                
                                    foreach($lista_grupos as $g):

                                        $selecinado = "";

                                        if(isset($dados_usuario->id_grupo))
                                            $selecinado = ($g->id == $dados_usuario->id_grupo) ? "selected" : "";
                                ?>

                                <option value="<?= $g->id ?>" <?= $selecinado ?> >
                                    <?= $g->descricao  ?> 
                                </option>

                                <?php endforeach ?>

                            </select>
                        
                    </div>
                </div>





                <?php if (isset($dados_usuario)) : ?>
                    <input name="id" type="hidden" value="<?= $dados_usuario->id ?>" />
                    <a class="btn btn-danger" href="/usuario/excluir?id=<?= $dados_usuario->id ?>">
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