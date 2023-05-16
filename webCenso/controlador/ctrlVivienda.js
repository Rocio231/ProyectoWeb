const CRUD = require('../modelo/CRUD');

const crud_vivienda = new CRUD();

if (req.method === "POST" && req.body.agregarVivienda) {
    let idMunicipio = null;
    if (req.body.idMunicipio) {
        idMunicipio = req.body.idMunicipio;
    }
    const municipio = req.body.municipio;
    const idLocalidad = 4; // Obtén el id de localidad adecuado
    const tipoVivienda = req.body.tipoVivienda;
    const material = req.body.material;
    const saneamiento = req.body.saneamiento;
    const tendencia = req.body.tendencia;
    const direccion = req.body.direccion;
    const agua = req.body.agua ? req.body.agua : "NO";
    const luz = req.body.luz ? req.body.luz : "NO";
    const drenaje = req.body.drenaje ? req.body.drenaje : "NO";
    const habitaciones = req.body.habitaciones;
    const banos = req.body.banos;

    crud_vivienda.crearVivienda(tipoVivienda, material, saneamiento, agua, luz, drenaje, tendencia, direccion, habitaciones, banos, idLocalidad, idMunicipio);
}

if (req.method === "POST" && req.body.modificarVivienda) {
    let idMunicipio = null;
    if (req.body.idMunicipio) {
        idMunicipio = req.body.idMunicipio;
    }
    const municipio = req.body.municipio;
    const idLocalidad = 20; // Obtén el id de localidad adecuado
    const tipoVivienda = req.body.tipoVivienda;
    const material = req.body.material;
    const saneamiento = req.body.saneamiento;
    const tendencia = req.body.tendencia;
    const direccion = req.body.direccion;
    const agua = req.body.agua ? req.body.agua : "NO";
    const luz = req.body.luz ? req.body.luz : "NO";
    const drenaje = req.body.drenaje ? req.body.drenaje : "NO";
    const habitaciones = req.body.habitaciones;
    const banos = req.body.banos;

    crud_vivienda.actualizarUltimaViviendaAgregada(tipoVivienda, material, saneamiento, agua, luz, drenaje, tendencia, direccion, habitaciones, banos, idLocalidad, idMunicipio);
}