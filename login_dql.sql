--- loginf
SELECT u.id ,u.nombreUsuario,ru.idRol ,r.id idrol,r.nombreRol FROM usuarios u 
    INNER JOIN rolesusuarios ru ON (u.id = ru.idusuario) INNER JOIN roles r ON (ru.idRol=idrol)
    WHERE u.nombreUsuario = 'root' AND u.contraseña ='1234';