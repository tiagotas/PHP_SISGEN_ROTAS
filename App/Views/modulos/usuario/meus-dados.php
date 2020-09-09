<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <title>Meus Dados</title>
    <?php include PATH_VIEW . 'includes/css_config.php' ?>
</head>

<body>
    <div id="global">

        <?php include PATH_VIEW . 'includes/cabecalho.php' ?>

        <main class="container mt-3">

            <h4>
                Meus Dados
            </h4>

            <form method="post" action="/usuario/salvar">

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nome">Nome: </label>
                        <input name="nome" class="form-control" value="<?= $meus_dados->nome ?>" type="text" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">E-mail: </label>
                        <input name="email" class="form-control" value="<?= $meus_dados->email ?>" type="email" />
                    </div>
                </div>

                <fieldset>
                    <legend>Trocar a Senha: </legend>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nova_senha">Nova Senha: </label>
                            <input name="nova_senha" class="form-control" type="password" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="confirmacao_nova_senha">Confirme a Nova Senha: </label>
                            <input name="confirmacao_nova_senha" class="form-control" type="password" />
                        </div>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Senha Atual: </legend>

                    <div class="form-group">
                        <label for="senha_atual">Senha Atual: </label>
                        <input name="senha_atual" class="form-control" type="password" />
                    </div>
                </fieldset>




                <button type="submit" class="btn btn-success">Salvar</button>
            </form>
        </main>

        <?php include PATH_VIEW . 'includes/rodape.php' ?>

        <?php include PATH_VIEW . 'includes/js_config.php' ?>

    </div>
</body>

</html>