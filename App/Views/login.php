<html lang="pt-br">

<head>
    <title>LOGIN</title>
    <meta charset="utf-8" />

    <?php include PATH_VIEW . 'includes/css_config.php' ?>
</head>

<body>
    <div id="global">
        <header class="container mt-3">
            <div class="row mb-3">
                <div class="col-md-9">
                    <h1>
                        SISGEN
                        <small>Sistema de Gestão</small>
                    </h1>
                </div>

            </div>

            <main class="container mt-3">

                <div style="margin:0 auto; max-width:40%">

                    <form method="post" action="/autenticar">

                        <div class="form-group">
                            <label for="user">Usuário: </label>
                            <input id="user" name="user" class="form-control" type="text" />
                        </div>

                        <div class="form-group">
                            <label for="pass">Senha: </label>
                            <input id="pass" name="pass" class="form-control" type="password" />
                            </label>
                        </div>
                        <button type="submit" class="btn btn-success">Entrar</button>
                    </form>
                </div>
            </main>


            <footer class="container mt-5">

                <div class="text-center">
                    <p>
                        SISGEN - Sistema de Gestão - Todos os direitos reservados.
                    </p>
                    <p>
                        Programação Web com @prof.tiagotas
                    </p>
                </div>

            </footer>
    </div>
    <?php include PATH_VIEW . 'includes/js_config.php' ?>
</body>

</html>