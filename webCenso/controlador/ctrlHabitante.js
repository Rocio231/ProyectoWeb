const CRUDHabitante = require('../modelo/CRUD');

const crud_habitante = new CRUDHabitante();

if (req.method === "POST" && req.body.agregarHabitante) {
    const idhabitante = req.body.idhabitante;
    const nombre = req.body.nombre;
    const edad = req.body.edad;
    const sexo = req.body.sexo;
    const edoCivil = req.body.edoCivil;
    const nivel_educativo = req.body.nivEducativo;
    const ingresos = req.body.ingresos;
    const nacionalidad = req.body.nacionalidad;

    crud_habitante.crearHabitante(idhabitante, nombre, edad, sexo, edoCivil, nivel_educativo, ingresos, nacionalidad);
}

if (req.method === "POST" && req.body.modificarHabitante) {
    const idhabitante = req.body.idhabitante;
    const nombre = req.body.nombre;
    const edad = req.body.edad;
    const sexo = req.body.sexo;
    const edoCivil = req.body.edoCivil;
    const nivel_educativo = req.body.nivEducativo;
    const ingresos = req.body.ingresos;
    const nacionalidad = req.body.nacionalidad;

    crud_habitante.actualizarHabitante(nombre, edad, sexo, edoCivil, nivel_educativo, ingresos, nacionalidad);
}
