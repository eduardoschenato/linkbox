<?php

namespace Controller;

use Model\CategoriaModel;
use Model\LinkModel;
use Model\VO\LinkVO;

use Embed\Embed;

final class LinkController extends Controller {

    public function selectAll() {
        $model = new LinkModel();
        $data = $model->selectAll();

        $this->loadView("listaLinks", [
            "links" => $data
        ]);
    }

    public function selectOne() {
        $id = $_GET["id"] ?? 0;

        if(empty($id)) {
            $vo = new LinkVO();
        } else {
            $model = new LinkModel();
            $vo = $model->selectOne($id);
        }

        $categoriaModel = new CategoriaModel();
        $categorias = $categoriaModel->selectAll();

        if(!isset($vo)) {
            die("Registro não existe!");
        }

        $this->loadView("formLink", [
            "link" => $vo,
            "categorias" => $categorias
        ]);
    }

    public function save() {
        $id = $_POST["id"];

        $info = Embed::create($_POST["link"]);

        $titulo = $info->title;
        $descricao = $info->description;
        $palavrasChave = implode(", ", $info->tags);
        $imagem = $info->image;

        $model = new LinkModel();
        $vo = new LinkVO($_POST["id"], $_POST["link"], $titulo, $descricao, $palavrasChave, $imagem, $_POST["id_categoria"]);

        if(empty($id)) {
            $return = $model->insert($vo);
        } else {
            $return = $model->update($vo);
        }

        $this->redirect("links.php");
    }

    public function delete() {
        if(empty($_GET["id"])) {
            die("Necessário parrar o ID!");
        } 

        $model = new LinkModel();
        $return = $model->delete($_GET["id"]);

        $this->redirect("links.php");
    }

}