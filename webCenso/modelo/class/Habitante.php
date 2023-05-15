<?php
if (class_exists("Habitante") != true) {


    class Habitante
    {
        private $idhabitante;
        private $nombre;
        private $edad;
        private $sexo;
        private $estadoCivil;
        private $nivelEducativo;
        private $ingresos;
        private $nacionalidad;
        private $idvivienda;

        public function __construct(
            $idhabitante = null,
            $nombre = null,
            $edad = null,
            $sexo = null,
            $estadoCivil = null,
            $nivelEducativo = null,
            $ingresos = null,
            $nacionalidad = null,
            $idvivienda = null
        ) {
            $this->idhabitante = $idhabitante;
            $this->nombre = $nombre;
            $this->edad = $edad;
            $this->sexo = $sexo;
            $this->estadoCivil = $estadoCivil;
            $this->nivelEducativo = $nivelEducativo;
            $this->ingresos = $ingresos;
            $this->nacionalidad = $nacionalidad;
            $this->idvivienda = $idvivienda;
        }


        public function getIdhabitante()
        {
            return $this->idhabitante;
        }


        public function setIdhabitante($idhabitante): self
        {
            $this->idhabitante = $idhabitante;

            return $this;
        }


        public function getNombre()
        {
            return $this->nombre;
        }


        public function setNombre($nombre): self
        {
            $this->nombre = $nombre;

            return $this;
        }


        public function getEdad()
        {
            return $this->edad;
        }


        public function setEdad($edad): self
        {
            $this->edad = $edad;

            return $this;
        }


        public function getSexo()
        {
            return $this->sexo;
        }


        public function setSexo($sexo): self
        {
            $this->sexo = $sexo;

            return $this;
        }


        public function getEstadoCivil()
        {
            return $this->estadoCivil;
        }


        public function setEstadoCivil($estadoCivil): self
        {
            $this->estadoCivil = $estadoCivil;

            return $this;
        }


        public function getNivelEducativo()
        {
            return $this->nivelEducativo;
        }


        public function setNivelEducativo($nivelEducativo): self
        {
            $this->nivelEducativo = $nivelEducativo;

            return $this;
        }


        public function getIngresos()
        {
            return $this->ingresos;
        }


        public function setIngresos($ingresos): self
        {
            $this->ingresos = $ingresos;

            return $this;
        }

        public function getNacionalidad()
        {
            return $this->nacionalidad;
        }


        public function setNacionalidad($nacionalidad): self
        {
            $this->nacionalidad = $nacionalidad;

            return $this;
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
    }
}
