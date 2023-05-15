<?php
if (class_exists("Ocupacion") != true) {
    class Ocupacion
    {
        private $idocupacion;
        private $nombre_ocupacion;

        public function __construct(
            $idocupacion = null,
            $nombre_ocupacion = null
        ) {
            $this->idocupacion = $idocupacion;
            $this->nombre_ocupacion = $nombre_ocupacion;
        }


        public function getIdocupacion()
        {
            return $this->idocupacion;
        }

        public function setIdocupacion($idocupacion): self
        {
            $this->idocupacion = $idocupacion;

            return $this;
        }

        public function getNombreOcupacion()
        {
            return $this->nombre_ocupacion;
        }

        public function setNombreOcupacion($nombre_ocupacion): self
        {
            $this->nombre_ocupacion = $nombre_ocupacion;

            return $this;
        }
    }
}
