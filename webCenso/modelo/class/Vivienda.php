<?php
if (class_exists("Vivienda") != true) {
    class Vivienda
    {
        private $idvivienda; //id de la vivienda
        private $tipo; // (casa, apartamento, etc.)
        private $material; //(Vivienda de concreto, Vivienda de adobe (antiguo), Vivienda de ladrillo, Vivienda de madera...)
        private $saneamiento; //(alcantarillado, pozo séptico, letrina, etc.)
        private $agua;
        private $luz;
        private $drenaje;
        private $tendencia; //(propia, alquilada, en comodato, etc.)
        private $direccion; //(Dirección de la vivienda)
        private $numHabitaciones; //(Número de habitaciones)
        private $numBanios; //(Número de baños)
        private $id_municipio; //(cve del municipio)
        private $municipio; //(nombre del municipio)
        private $id_localidad; //(cve de la localidad)
        private $localidad; //(nombre de la localidad)
        private $ubicacion; //(Rural, urbana)
        private $habitantes; // Agregamos un atributo para almacenar los habitantes
        private $ocupaciones; //ocupacione spor vivienda

        public function __construct($idvivienda, $tipo, $material, $saneamiento, $agua, $luz, $drenaje, $tendencia, $direccion, $numHabitaciones, $numBanios, $id_municipio, $municipio, $id_localidad, $localidad, $ubicacion, $habitantes, $ocupaciones)
        {
            $this->idvivienda = $idvivienda;
            $this->tipo = $tipo;
            $this->material = $material;
            $this->saneamiento = $saneamiento;
            $this->agua = $agua;
            $this->luz = $luz;
            $this->drenaje = $drenaje;
            $this->tendencia = $tendencia;
            $this->direccion = $direccion;
            $this->numHabitaciones = $numHabitaciones;
            $this->numBanios = $numBanios;
            $this->id_municipio = $id_municipio;
            $this->municipio = $municipio;
            $this->id_localidad = $id_localidad;
            $this->localidad = $localidad;
            $this->ubicacion = $ubicacion;
            $this->habitantes = $habitantes;
            $this->ocupaciones = $ocupaciones;
        }

        public function getIdvivienda()
        {
            return $this->idvivienda;
        }

        public function setIdvivienda($idvivienda): self
        {
            $this->idvivienda = $idvivienda;

            return $this;
        }


        public function getTipo()
        {
            return $this->tipo;
        }


        public function setTipo($tipo): self
        {
            $this->tipo = $tipo;

            return $this;
        }

        public function getMaterial()
        {
            return $this->material;
        }

        public function setMaterial($material): self
        {
            $this->material = $material;

            return $this;
        }

        public function getSaneamiento()
        {
            return $this->saneamiento;
        }

        public function setSaneamiento($saneamiento): self
        {
            $this->saneamiento = $saneamiento;

            return $this;
        }

        public function getAgua()
        {
            return $this->agua;
        }

        public function setAgua($agua): self
        {
            $this->agua = $agua;

            return $this;
        }


        public function getLuz()
        {
            return $this->luz;
        }

        public function setLuz($luz): self
        {
            $this->luz = $luz;

            return $this;
        }

        public function getDrenaje()
        {
            return $this->drenaje;
        }


        public function setDrenaje($drenaje): self
        {
            $this->drenaje = $drenaje;

            return $this;
        }

        public function getTendencia()
        {
            return $this->tendencia;
        }


        public function setTendencia($tendencia): self
        {
            $this->tendencia = $tendencia;

            return $this;
        }

        public function getDireccion()
        {
            return $this->direccion;
        }

        public function setDireccion($direccion): self
        {
            $this->direccion = $direccion;

            return $this;
        }

        public function getNumHabitaciones()
        {
            return $this->numHabitaciones;
        }

        public function setNumHabitaciones($numHabitaciones): self
        {
            $this->numHabitaciones = $numHabitaciones;

            return $this;
        }

        public function getNumBanios()
        {
            return $this->numBanios;
        }

        public function setNumBanios($numBanios): self
        {
            $this->numBanios = $numBanios;

            return $this;
        }


        public function getIdMunicipio()
        {
            return $this->id_municipio;
        }

        public function setIdMunicipio($id_municipio): self
        {
            $this->id_municipio = $id_municipio;

            return $this;
        }

        public function getMunicipio()
        {
            return $this->municipio;
        }

        public function setMunicipio($municipio): self
        {
            $this->municipio = $municipio;

            return $this;
        }


        public function getIdLocalidad()
        {
            return $this->id_localidad;
        }

        public function setIdLocalidad($id_localidad): self
        {
            $this->id_localidad = $id_localidad;

            return $this;
        }


        public function getLocalidad()
        {
            return $this->localidad;
        }

        public function setLocalidad($localidad): self
        {
            $this->localidad = $localidad;

            return $this;
        }

        public function getUbicacion()
        {
            return $this->ubicacion;
        }


        public function setUbicacion($ubicacion): self
        {
            $this->ubicacion = $ubicacion;

            return $this;
        }

        public function getHabitantes()
        {
            return $this->habitantes;
        }

        public function setHabitantes($habitantes): self
        {
            $this->habitantes = $habitantes;

            return $this;
        }

        public function getOcupaciones()
        {
            return $this->ocupaciones;
        }

        public function setOcupaciones($ocupaciones): self
        {
            $this->ocupaciones = $ocupaciones;

            return $this;
        }
        public function agregarHabitante($habitante)
        {
            // Verificar si la ocupación ya existe en la lista
            if (!in_array($habitante, $this->habitantes)) {
                // Agregar la nueva ocupación a la lista
                $this->habitantes[] = $habitante;
            }
        }

        public function agregarOcupacion($ocupacion)
        {
            // Verificar si el habitante ya existe en la lista
            if (!in_array($ocupacion, $this->ocupaciones)) {
                // Agregar el nuevo habitante a la lista
                $this->ocupaciones[] = $ocupacion;
            }
        }
    }
    
}
