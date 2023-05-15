<?php
if (class_exists("Usuario") != true) {
    class Usuario
    {
    private $usuario;
    private $pass;
    
    public function __construct(
        $usuario=null,
        $pass=null,
    ){
        $this->usuario=$usuario;
        $this->pass=$pass;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }


    public function setUsuario($usuario): self
    {
        $this->usuario = $usuario;

        return $this;
    }


    public function getPass()
    {
        return $this->pass;
    }


    public function setPass($pass): self
    {
        $this->pass = $pass;

        return $this;
    }
}
}
?>
