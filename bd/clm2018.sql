create table "usuarios"(
	user_id integer primary key,
	nombre varchar(100),
	password varchar(100),
	tipo varchar(10)
);

create table "alumnos"(
	alum_carnet varchar(100) primary key,
	nombre varchar(100),
	apellido varchar(100),
	direccion text,
	telefono integer
);

create table "grado"(
	id_grado int primary key,
	grado varchar(100),
    year varchar(4)
);


create table "materia"(
        id_materia int primary key,
        nombre_materia varchar(100)
);


create table "docente"(
        id_docente int primary key,
        nombre varchar(100),
        apellido varchar(100),
        direccion varchar(100)
);


create table "matricula"(
        id_matricula int primary key,
        alum_carnet varchar(100),
        id_docente int,
        id_grado int,
        fecha_matricula date

);



create SEQUENCE idnota_seq;

create table "nota"(
	idnota integer primary key default nextval('idnota_seq'),
  id_asignatura int,
	id_matricula int,
	cali1 float,
	cali2 float,
	cali3 float,
	cali4 float,
	cali5 float,
	prom float
);

ALTER TABLE nota
ADD FOREIGN KEY (id_asignatura)
REFERENCES materia(id_materia);

ALTER TABLE matricula
ADD FOREIGN KEY (id_grado)
REFERENCES grado(id_grado);

ALTER TABLE matricula
ADD FOREIGN KEY (id_docente)
REFERENCES docente(id_docente);

ALTER TABLE nota
ADD FOREIGN KEY (id_matricula)
REFERENCES matricula(id_matricula);

ALTER TABLE docente
ADD FOREIGN KEY (id_docente)
REFERENCES usuarios(user_id);

ALTER TABLE matricula
ADD FOREIGN KEY (alum_carnet)
REFERENCES alumnos(alum_carnet);

create view reporte as
SELECT alumnos.alum_carnet as Carnet,
       concat(alumnos.nombre,' ', alumnos.apellido) as Alumno,
       nota.cali1 as N1,
       nota.cali2 as N2,
       nota.cali3 as N3,
       nota.cali4 as N4,
       nota.cali5 as N5,
       nota.prom as PROMEDIO,
       grado.id_grado as CodigoGrado,
       grado.grado ,
       grado.year,
       materia.nombre_materia as Materia,
       concat(docente.nombre, ' ', docente.apellido) as Docente
FROM nota
INNER JOIN matricula
ON matricula.id_matricula = nota.id_matricula
INNER JOIN alumnos
ON alumnos.alum_carnet = matricula.alum_carnet
INNER JOIN docente
ON docente.id_docente = matricula.id_docente
INNER JOIN grado
ON grado.id_grado = matricula.id_grado
INNER JOIN materia
ON materia.id_materia = nota.id_asignatura;
