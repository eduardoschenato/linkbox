<?php

namespace Model;

use Model\VO\CategoriaVO;
use Util\Database;

final class CategoriaModel extends Model {

    public function selectAll() {
        $db = new Database();
        $query = "SELECT * FROM categorias";
        $data = $db->select($query);

        $arrJogadores = [];

        foreach($data as $row) {
            array_push($arrJogadores, new CategoriaVO($row["id"], $row["nome"]));
        }

        return $arrJogadores;
    }

    public function selectOne($id) {
        $db = new Database();
        $query = "SELECT * FROM categorias WHERE id = :id";
        $binds = [":id" => $id];
        $data = $db->select($query, $binds);

        if(count($data) == 0) {
            return null;
        }

        $jogador = new CategoriaVO($data[0]["id"], $data[0]["nome"]);
        return $jogador;
    }

    public function insert($vo)  {
        $db = new Database();
        $query = "INSERT INTO categorias (nome) VALUES (:nome)";
        $binds = [
            ":nome" => $vo->getNome()
        ];

        $success = $db->execute($query, $binds);

        if($success) {
            return $db->getLastInsertedId();
        } 
        
        return null;
    }

    public function update($vo) {
        $db = new Database();
        $query = "UPDATE categorias SET nome = :nome WHERE id = :id";
        $binds = [
            ":nome" => $vo->getNome(), 
            ":id" => $vo->getId()
        ];

        return $db->execute($query, $binds);
    }

    public function delete($id) {
        $db = new Database();
        $query = "DELETE FROM categorias WHERE id = :id";
        $binds = [":id" => $id];

        return $db->execute($query, $binds);
    }

}