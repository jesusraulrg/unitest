CREATE DATABASE unitest;

CREATE TABLE IF NOT EXISTS usuarios(
    id_usuario integer PRIMARY KEY AUTO_INCREMENT,
    nombre varchar(40) not null,
    primer_apellido varchar(40) not null,
    segundo_apellido varchar(40),
    edad integer not null,
    genero varchar(15) not null,
    email varchar(60) not null,
    password varchar(500) not null
);

CREATE TABLE IF NOT EXISTS test(
    id_test integer PRIMARY KEY AUTO_INCREMENT,
    pregunta1 integer,
    pregunta2 integer,
    pregunta3 integer,
    pregunta4 integer,
    pregunta5 integer,
    pregunta6 integer,
    pregunta7 integer,
    pregunta8 integer,
    pregunta9 integer,
    pregunta10 integer,
    c integer AS (pregunta1+pregunta3+pregunta5+pregunta7+pregunta9),
    h integer AS (pregunta2+pregunta4+pregunta6+pregunta8+pregunta10)
);




/*

    id_usuario integer not null REFERENCES usuarios(id_usuario),


CREATE VIEW IF NOT EXISTS vista_resultados AS
SELECT test.id_test, usuarios.email
FROM test
JOIN 
);
*/