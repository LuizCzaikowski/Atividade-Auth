<?php

use Database\Connection;

class produtoModel {

    private $nome_produto;
    private $lote_produto;
    private $data_entrada_produto;
    private $session_produto;

    public function listaProdutoModel() {

        $conn = Connection::getConn();

        $sql = 'SELECT * FROM produtos';
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function insereProdutoModel() {

        $conn = Connection::getConn();
        $sql = "INSERT INTO produtos (nome_produto, lote_produto, data_entrada_produto, session_produto) VALUES (?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->getNomeProduto(), $this->getLoteProduto(), $this->getDataEntradaProduto(), $this->getSessaoProduto()]);

        $sql = 'SELECT * FROM usuario_table WHERE email = :email';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':email', $this->email);
        $stmt->execute();
        $result = $stmt->fetch();
        $_SESSION['usr'] = array(
            'id_user' => $result['id'], 
            'name_user' => $result['name']
        );
        return true;

    }

    public function setNomeProduto($nome_produto) {
            
        $this->nome_produto = $nome_produto;
        
    }

    public function setLoteProduto($lote_produto) {
            
        $this->lote_produto = $lote_produto;
        
    }

    public function setDataEntradaProduto($data_entrada_produto) {
            
        $this->data_entrada_produto = $data_entrada_produto;
        
    }

    public function setSessaoProduto($session_produto) {
            
        $this->session_produto = $session_produto;
        
    }

    public function getNomeProduto() {
            
        return $this->nome_produto;
        
    }

    public function getLoteProduto() {
            
        return $this->lote_produto;
        
    }

    public function getDataEntradaProduto() {
            
        return $this->data_entrada_produto;
        
    }

    public function getSessaoProduto() {
            
        return $this->session_produto;
        
    }

}