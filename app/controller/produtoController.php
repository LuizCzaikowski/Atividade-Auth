<?php

class produtoController {

    public function index() {

        $loader = new \Twig\Loader\FilesystemLoader('app/view');
        $twig = new \Twig\Environment($loader, [
            'cache' => '/path/to/compilation_cache',
            'auto_reload' => true,
        ]);
        $template = $twig->load('insereProduto.html');

        return $template->render();
    }

    public function insere() {
            
        $produto = new produtoModel;
        $produto->setNomeProduto($_POST['nome_produto']);
        $produto->setLoteProduto($_POST['lote_produto']);
        $produto->setDataEntradaProduto($_POST['data_entrada_produto']);
        $produto->setSessaoProduto($_POST['session_produto']);
        $produto->insereProdutoModel();

        header('Location: http://localhost/sistema-auth/dashboard');
    }

    public function listaProduto() {
        $dados = new produtoModel();

        $dados[] = $dados->listaProdutoModel();

        $loader = new \Twig\Loader\FilesystemLoader('app/view');
        $twig = new \Twig\Environment($loader, [
            'cache' => '/path/to/compilation_cache',
            'auto_reload' => true,
        ]);
        $template = $twig->load('dashboard.php');
        
        return $template->render();
    }

    public function atualizaProduto() {
        
    }

    public function excluiProduto() {
        
    }
}