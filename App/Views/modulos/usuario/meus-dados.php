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

            <?php if (isset($retorno['positivo'])) : ?>
                <div class="alert alert-success" role="alert">
                    <?= $retorno['positivo'] ?>
                </div>
            <?php endif ?>

            <?php if (isset($retorno['senha_incorreta'])) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= $retorno['senha_incorreta'] ?>
                </div>
            <?php endif ?>

            <?php if (isset($retorno['senha_confirmacao_incorreta'])) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= $retorno['senha_confirmacao_incorreta'] ?>
                </div>
            <?php endif ?>



            <form method="post" action="/usuario/meus-dados/salvar">

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nome">Nome: </label>
                        <input name="nome" class="form-control" value="<?= $meus_dados->nome ?>" type="text" required />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">E-mail: </label>
                        <input name="email" class="form-control" value="<?= $meus_dados->email ?>" type="email" required />
                    </div>
                </div>

                <fieldset class="border rounded p-3 mb-3">
                    <legend class="form-label col-auto">Trocar a Senha: </legend>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nova_senha">Nova Senha: </label>
                            <input name="nova_senha" class="form-control" type="password" placeholder="Alteração de senha é opcional" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="confirmacao_nova_senha">Confirme a Nova Senha: </label>
                            <input name="confirmacao_nova_senha" class="form-control" type="password" />
                        </div>
                    </div>
                </fieldset>

                <fieldset class="border rounded p-3 mb-3 bg-light">
                    <legend class="form-label col-auto bg-light">Senha Atual: </legend>

                    <div class="form-group border border-danger p-3 p-3 mb-5 rounded">
                        <input name="senha_atual" class="form-control" type="password" placeholder="Informe sua senha atual para realizar alterações no seu cadastro:" required />
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