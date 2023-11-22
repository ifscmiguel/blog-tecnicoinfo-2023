<?php
namespace Blog\Classes;

class Texto{

    public $id;
    public $titulo;
    public $texto;
    public $usuario_id;

    /**
     * buscar um texto pelo id ou criar um novo texto
     */
    function __construct($id=null)
    {
        if ($id) {
            $conn = new Conexao();
            $texto = $conn->query("SELECT * FROM texto WHERE id=$id")->fetch();
            if ($texto) {
                $this->id = $texto['id'];
                $this->titulo = $texto['titulo'];
                $this->texto = $texto['texto'];
                $this->usuario_id = $texto['usuario_id'];
            }
            else{
                die('texto não encontrado');
            }
        }
    }

    /**
     * grava no banco de dados (INSERT)
     */
    function salvar(){
        $conn = new Conexao();
        $sql = "INSERT INTO texto (titulo, texto, usuario_id) ";
        $sql .= "VALUES('$this->titulo', '$this->texto', '$this->usuario_id')";
        $r = $conn->query($sql);
        # em caso do id ser auto_increment
        if($r){
            $this->id = $conn->lastInsertId();
        }
        return $r;
    }

     /**
     * faz um update no banco de dados
     */
    function atualizar(){
        $conn = new Conexao();
        $sql = "UPDATE texto SET titulo='$this->titulo', texto='$this->texto', usuario_id='$this->usuario_id' WHERE id=$this->id";
        return $conn->query($sql);
    }

    /**
     * apaga do banco de dados
     */
    function deletar(){
        $conn = new Conexao();
        return $conn->query("DELETE FROM texto WHERE id=$this->id");
    }

}