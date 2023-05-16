const CRUD = require('../modelo/CRUD');

const crud_ochab = new CRUD();

if (req.method === "POST" && req.body.agregarOcupacionVivienda) {
    const idocupacion = req.body.idocupacion;

    crud_ochab.crearViviendaOcupacion(idocupacion);
}