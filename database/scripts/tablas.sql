CREATE TABLE IF NOT EXISTS usuarios(
    id_usuario integer PRIMARY KEY AUTO_INCREMENT,
    nombre varchar(40) not null,
    primer_apellido varchar(40) not null,
    segundo_apellido varchar(40),
    edad integer not null,
    genero varchar(15) not null,
    email varchar(60) not null,
    password varchar(20) not null
);

CREATE TABLE IF NOT EXISTS test(
    id_test integer PRIMARY KEY AUTO_INCREMENT,
    pregunta1 integer,
    pregunta2 integer,
    pregunta3 integer,
    pregunta4 integer,
    c integer AS (pregunta1+pregunta3),
    h integer AS (pregunta2+pregunta4)
);




/*

    id_usuario integer not null REFERENCES usuarios(id_usuario),


CREATE VIEW IF NOT EXISTS vista_resultados AS
SELECT test.id_test, usuarios.email
FROM test
JOIN 
);
*/