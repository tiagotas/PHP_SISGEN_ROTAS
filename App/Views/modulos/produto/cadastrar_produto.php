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
            
            <form method="post" action="/produto/salvar">

                <div class="form-group">  
                    <label for="descricao">Descrição (Nome) do produto:</label>
                    <input class="form-control" id="descricao" name="descricao" type="text" value="<?= isset($dados_produto) ? $dados_produto->descricao : "" ?>" />     
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">  
                        <label for="preco">Preço:</label>
                        <input class="form-control" id="preco" name="preco" type="number" value="<?= isset($dados_produto) ? $dados_produto->preco : "" ?>" />
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
                                <option>Selecione a categoria</option>

                                <?php 
                                
                                    for($i=0; $i<$total_categorias; $i++):
                                        
                                        $selecinado = "";

                                        if(isset($dados_produto->id))
                                            $selecinado = ($lista_categorias[$i]->id == $dados_produto->id_categoria) ? "selected" : "";
                                    ?>

                                <option value="<?= $lista_categorias[$i]->id ?>" <?= $selecinado ?> >
                                    <?= $lista_categorias[$i]->descricao  ?> 
                                </option>

                                <?php endfor ?>

                            </select>
                    </div>
                        
                    <div class="form-group col-md-6">
                        <label for="id_marca">Marca:</label>
                        <select id="id_marca"  name="id_marca" class="form-control">
                                <option>Selecione a marca</option>

                                <?php for($i=0; $i<$total_marcas; $i++): 
                                    
                                    $selecinado = "";

                                    if(isset($dados_produto->id))
                                        $selecinado = ($lista_marcas[$i]->id == $dados_produto->id_marca) ? "selected" : "";
                                    
                                ?>
                                <option value="<?= $lista_marcas[$i]->id ?>" <?= $selecinado ?>> 
                                    <?= $lista_marcas[$i]->descricao  ?> 
                                </option>
                                <?php endfor ?>
                            </select>
                        
                    </div>
                </div>

                <?php if(isset($dados_produto)): ?>
                        <input name="id" type="hidden" value="<?= $dados_produto->id ?>" />

                        <a class="btn btn-danger" href="/produto/excluir?id=<?= $dados_produto->id ?>">
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