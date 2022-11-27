--- login
SELECT u.id,u.nombreUsuario,ru.idRol idrol,r.id,r.nombreRol FROM usuarios u 
    INNER JOIN rolesusuarios ru ON (u.id = ru.idusuario) INNER JOIN roles r ON (idrol=r.id)
    WHERE u.nombreUsuario = 'empleado' AND u.contraseña ='543';