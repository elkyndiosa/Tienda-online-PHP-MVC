CREATE DATABASE tienda;
USE tienda;
CREATE TABLE usuarios(
id          int(255) auto_increment not null,
nombre      varchar(255) not null,
apellido    varchar(255) not null,
email       varchar(255) not null,
password    varchar(255) not null,
rol         varchar(20) not null,
imagen      varchar(255) ,
CONSTRAINT pk_usuarios PRIMARY KEY(id),
CONSTRAINT uq_email UNIQUE(email);
)ENGINE=innoDB;

INSERT INTO usuarios VALUES(NULL, 'ADMIN', 'ADMIN', 'ADMIN@ADMIN.COM', 'ADMIN', 'ADMIN', NULL );

CREATE TABLE categorias(
id      int(255) auto_increment not null,
nombre  varchar(50) not null,
CONSTRAINT pk_categorias PRIMARY KEY(id)

)ENGINE=innoDB;
INSERT INTO categorias VALUES(NULL, 'camisas' );
INSERT INTO categorias VALUES(NULL, 'pantalones' );
INSERT INTO categorias VALUES(NULL, 'gorras' );
INSERT INTO categorias VALUES(NULL, 'zapatos' );
INSERT INTO categorias VALUES(NULL, 'ropa interios' );
INSERT INTO categorias VALUES(NULL, 'medias' );
INSERT INTO categorias VALUES(NULL, 'accesorios' );

CREATE TABLE productos(
id          int(255) auto_increment not null,
categoria_id int(255) not null,
nombre      varchar(255) not null,
descripcion text,
precio      float(15, 2) not null,
stock       int(255) not null,
oferta      varchar(5),
fecha       date not null,
imagen      varchar(255) ,
CONSTRAINT pk_productos PRIMARY KEY(id),
CONSTRAINT fk_producto_categoria FOREIGN KEY(categoria_id) REFERENCES categoria(id)
)ENGINE=innoDB;

INSERT INTO productos VALUES(NULL, 1, 'polo', 'polo excelente ', 12000 , 15, NULL );

CREATE TABLE pedidos(
id          int(255) auto_increment not null,
usuario_id  int(255) not null,
departamento varchar(255) not null,
municipio   varchar(255) not null,
direccion   varchar(255) not null,
costo       float(15, 2) not null,
estado      varchar(20) not null,
fecha       date not null,
hora        time not null ,
CONSTRAINT pk_pedidos PRIMARY KEY(id),
CONSTRAINT fk_pedidos_usuario FOREIGN KEY(usuario_id) REFERENCES usuario(id)
)ENGINE=innoDB;

CREATE TABLE linea_pedidos(
id          int(255) auto_increment not null,
pedido_id   int(255) not null,
producto_id int(255) not null,
unidades    int(255) not null,
CONSTRAINT pk_linea_pedidos PRIMARY KEY(id),
CONSTRAINT fk_linea_pedidos FOREIGN KEY(pedido_id) REFERENCES pedidos(id),
CONSTRAINT fk_linea_producto FOREIGN KEY(producto_id) REFERENCES productos(id)

)ENGINE=innoDB;