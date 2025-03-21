<?php
require "src/conexao-bd.php";

class ProdutoRepositorio
{
    private PDO $pdo;
    /**
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function opcoesCafe()
    {
        $sql1 = "SELECT * FROM produtos WHERE tipo='Café' ORDER BY preco";
        $stmt = $this->pdo->query($sql1);
        $produtosCafe = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $dadosCafe =
            array_map(
                function ($cafe) {
                    return new Produto(
                        $cafe['id'],
                        $cafe['tipo'],
                        $cafe['nome'],
                        $cafe['descricao'],
                        $cafe['imagem'],
                        $cafe['preco']
                    );
                },
                $produtosCafe
            );

        return $dadosCafe;
    }

    public function opcoesAlmoco()
    {

        $sql2 = "SELECT * FROM produtos WHERE tipo='Almoço' ORDER BY preco";
        $stmt = $this->pdo->query($sql2);
        $produtosAlmoco = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $dadosAlmoco =
            array_map(
                function ($almoco) {
                    return new Produto(
                        $almoco['id'],
                        $almoco['tipo'],
                        $almoco['nome'],
                        $almoco['descricao'],
                        $almoco['imagem'],
                        $almoco['preco']
                    );
                },
                $produtosAlmoco
            );
            return $dadosAlmoco;

    }
}