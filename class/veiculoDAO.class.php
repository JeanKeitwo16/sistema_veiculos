<?php
include_once "veiculo.class.php";
class veiculoDAO{
    private $conexao;
    public function __construct(){
        $this->conexao = new PDO(
            "mysql:host=localhost; dbname=sistema_veiculos",
            "root", ""
        );
    }
    public function inserir(veiculo $obj){
        $sql = $this->conexao->prepare(
            "INSERT INTO veiculo (placa, modelo, ano, cor, id_categoria, imagem)
            VALUES (:placa, :modelo, :ano, :cor, :id_categoria, :imagem)"
        );
        $sql->bindValue(":placa", $obj->getPlaca());
        $sql->bindValue(":modelo", $obj->getModelo());
        $sql->bindValue(":ano", $obj->getAno());
        $sql->bindValue(":cor", $obj->getCor());
        $sql->bindValue("id_categoria", $obj->getIdCategoria());
        $sql->bindValue(":imagem", $obj->getImagem());
        return $sql->execute();
    }
    public function listar(){
        $sql = $this->conexao->prepare(
            "SELECT * FROM veiculo");
        $sql->execute();
        return $sql->fetchAll();
    }
        public function retornarUnico($id){
        $sql = $this->conexao->prepare("
            SELECT * FROM veiculo WHERE id=:id
        ");
        $sql->bindValue(":id", $id);
        $sql->execute();
        return $sql->fetch();
    }

public function listarComFiltros($id_categoria = null, $modelo = null, $ano = null) {
    $sql = "SELECT * FROM veiculo WHERE 1=1";
    $params = [];

    if ($id_categoria) {
        $sql .= " AND id_categoria = :id_categoria";
        $params[':id_categoria'] = $id_categoria;
    }
    if ($modelo) {
        $sql .= " AND modelo LIKE :modelo";
        $params[':modelo'] = "%" . $modelo . "%";
    }
    if ($ano) {
        $sql .= " AND ano = :ano";
        $params[':ano'] = $ano;
    }

    $stmt = $this->conexao->prepare($sql);

    foreach ($params as $chave => $valor) {
        $stmt->bindValue($chave, $valor);
    }

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
    public function editar(veiculo $obj){
        $sql = $this->conexao->prepare(
            "UPDATE veiculo SET
            placa=:placa, modelo=:modelo, ano=:ano, cor=:cor, id_categoria=:id_categoria, imagem=:imagem
            WHERE id=:id"
        );
        $sql->bindValue(":placa", $obj->getPlaca());
        $sql->bindValue(":modelo", $obj->getModelo());
        $sql->bindValue(":ano", $obj->getAno());
        $sql->bindValue(":cor", $obj->getCor());
        $sql->bindValue(":id_categoria", $obj->getIdCategoria());
        $sql->bindValue(":imagem", $obj->getImagem());
        $sql->bindValue(":id", $obj->getId());
        return $sql->execute();
    }
    public function delete($id){
        $sql = $this->conexao->prepare("
            DELETE FROM veiculo WHERE id=:id
        ");
        $sql->bindValue(":id", $id);
        return $sql->execute();
    }

}