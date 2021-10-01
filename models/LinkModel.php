<?php

namespace Model;

use Model\VO\LinkVO;
use Util\Database;

final class LinkModel extends Model {

    public function selectAll() {
        $db = new Database();
        $query = "SELECT l.*, c.nome AS categoria FROM links l LEFT JOIN categorias c ON c.id = l.id_categoria ";
        $data = $db->select($query);

        $arrlinks = [];

        foreach($data as $row) {
            array_push($arrlinks, new LinkVO($row["id"], $row["link"], $row["titulo"], $row["descricao"], $row["palavras_chave"], $row["imagem"], $row["id_categoria"], $row["categoria"]));
        }

        return $arrlinks;
    }

    public function selectOne($id) {
        $db = new Database();
        $query = "SELECT * FROM links WHERE id = :id";
        $binds = [":id" => $id];
        $data = $db->select($query, $binds);

        if(count($data) == 0) {
            return null;
        }

        $jogador = new LinkVO($data[0]["id"], $data[0]["link"], $data[0]["titulo"], $data[0]["descricao"], $data[0]["palavras_chave"], $data[0]["imagem"], $data[0]["id_categoria"]);
        return $jogador;
    }

    public function insert($vo) {
        $db = new Database();
        $query = "INSERT INTO links (link, titulo, descricao, palavras_chave, imagem, id_categoria) VALUES (:link, :titulo, :descricao, :palavrasChave, :imagem, :idCategoria)";
        $binds = [
            ":link" => $vo->getLink(), 
            ":titulo" => $vo->getTitulo(), 
            ":descricao" => $vo->getDescricao(),
            ":palavrasChave" => $vo->getPalavrasChave(),
            ":imagem" => $vo->getImagem(),
            ":idCategoria" => $vo->getIdCategoria()
        ];

        $success = $db->execute($query, $binds);

        if($success) {
            return $db->getLastInsertedId();
        } 
        
        return null;
    }

    public function update($vo) {
        $db = new Database();
        $query = "UPDATE links SET link = :link, titulo = :titulo, descricao = :descricao, palavras_chave = :palavrasChave, imagem = :imagem, id_categoria = :idCategoria WHERE id = :id";
        $binds = [
            ":link" => $vo->getLink(), 
            ":titulo" => $vo->getTitulo(), 
            ":descricao" => $vo->getDescricao(),
            ":palavrasChave" => $vo->getPalavrasChave(),
            ":imagem" => $vo->getImagem(), 
            ":idCategoria" => $vo->getIdCategoria(), 
            ":id" => $vo->getId()
        ];

        return $db->execute($query, $binds);
    }

    public function delete($id) {
        $db = new Database();
        $query = "DELETE FROM links WHERE id = :id";
        $binds = [":id" => $id];

        return $db->execute($query, $binds);
    }

}