create table grupos (
  id int auto_increment,
  descricao varchar(150),
  primary key(id)
);

INSERT INTO grupos (descricao) VALUES ('Administrador'), ('Usuário');


create table grupos_permissoes (
  id int auto_increment,
  id_grupo int,
  cadastrar enum('S','N'),  
  editar enum('S','N'), 
  listar enum('S','N'), 
  excluir enum('S','N'),
  foreign key (id_grupo) references grupos(id), 
  primary key(id)
);


INSERT INTO grupos_permissoes (id_grupo, cadastrar, editar, listar, excluir) VALUES
                              (   1    ,    'S'   ,   'S' ,   'S' ,   'S'  ),
                              (   2    ,    'S'   ,   'N' ,   'S' ,    'N' );



alter table usuarios add column id_grupo int;
alter table usuarios add foreign key (id_grupo) references grupos (id);







