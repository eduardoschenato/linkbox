<?php

namespace Controller;

use Model\CategoriaModel;
use Model\VO\CategoriaVO;

final class CategoriaController extends Controller {

    public function selectAll() {
        $model = new CategoriaModel();
        $data = $model->selectAll();

        $this->loadView("listaCategorias", [
            "categorias" => $data
        ]);
    }

    public function selectOne() {
        $id = $_GET["id"] ?? 0;

        if(empty($id)) {
            $vo = new CategoriaVO();
        } else {
            $model = new CategoriaModel();
            $vo = $model->selectOne($id);
        }

        if(!isset($vo)) {
            die("Registro não existe!");
        }

        $this->loadView("formCategoria", [
            "categoria" => $vo
        ]);
    }

    public function save() {
        $id = $_POST["id"];
        $model = new CategoriaModel();
        $vo = new CategoriaVO($_POST["id"], $_POST["nome"]);

        if(empty($id)) {
            $return = $model->insert($vo);
        } else {
            $return = $model->update($vo);
        }

        $this->redirect("categorias.php");
    }

    public function delete() {
        if(empty($_GET["id"])) {
            die("Necessário passar o ID!");
        } 

        $model = new CategoriaModel();
        $return = $model->delete($_GET["id"]);

        $this->redirect("categorias.php");
    }

}