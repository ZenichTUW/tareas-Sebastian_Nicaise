<?php

require_once "../src/models/usuarioModel.php";

class usuarioController{
    public function allUsers(){

        $modeloUsuario= new usuario;
        echo json_encode(["Resultado"=> $modeloUsuario->todosUsuarios()]);
    }
    public function getById($id){
        $modeloUsuario=new usuario;
        echo json_encode(["Resultado"=> $modeloUsuario->usuarioPorId($id)]);

    }

}