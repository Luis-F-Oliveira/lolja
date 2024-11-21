<?php

namespace App\Models;

use App\Interfaces\IProduto;
use Config\Database;
use PDO;

class ProdutoDAO implements IProduto
{
    private $pdo;

    public function __construct()
    {
        $connection = new Database();
        $this->pdo = $connection->getConnection();
    }

    public function index()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM product");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function create($produto)
    {
        $stmt = $this->pdo->prepare("INSERT INTO Product (name, price, unit, stats, url) 
            VALUES (:name, :price, :unit, :status, :url)");
        $stmt->bindParam(':name', $produto['name']);
        $stmt->bindParam(':price', $produto['price']);
        $stmt->bindParam(':unit', $produto['unit']);
        $stmt->bindParam(':status', $produto['status']);
        $stmt->bindParam(':url', $produto['url']);
        $stmt->execute();

        header('Location: /lolja');
        exit();
    }

    public function show($id) 
    {
        $stmt = $this->pdo->prepare("SELECT * FROM product WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function update($id, $produto) 
    {
        $stmt = $this->pdo->prepare("UPDATE product 
            SET name = :name, price = :price, unit = :unit, stats = :stats, url = :url
            WHERE id = :id");
    
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $produto['name']);
        $stmt->bindParam(':price', $produto['price']);
        $stmt->bindParam(':unit', $produto['unit']);
        $stmt->bindParam(':stats', $produto['stats']);
        $stmt->bindParam(':url', $produto['url']);
        $stmt->execute();

        header('Location: /lolja');
        exit();
    }

    public function delete($id) 
    {
        $stmt = $this->pdo->prepare("DELETE FROM product WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        header('Location: /lolja');
        exit();
    }
}
