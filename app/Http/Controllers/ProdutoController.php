<?php

namespace App\Http\Controllers;

use App\Models\ProdutoDAO;
use Utils\RenderView;

class ProdutoController extends RenderView
{
    public function create()
    {
        $this->loadView('produto/create', [
            'title' => 'Criar Produto'
        ]);
    }

    public function store($produto)
    {
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $uploadDir = __DIR__ . '/../../../container/';

            $fileName = uniqid('prod_', true) . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $targetFile = $uploadDir . $fileName;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                $imageUrl = $targetFile;

                $produtoData = [
                    'name' => $produto['name'],
                    'price' => $produto['price'],
                    'unit' => $produto['unit'],
                    'status' => $produto['status'],
                    'url' => $imageUrl
                ];

                $produtoDAO = new ProdutoDAO();
                $produtoDAO->create($produtoData);
            } else {
                echo "Erro ao salvar a imagem.";
            }
        } else {
            echo "Imagem não enviada ou erro no upload.";
        }
    }

    public function edit($id)
    {
        $produto = new ProdutoDAO();

        $this->loadView('produto/edit', [
            'id' => $id,
            'data' => $produto->show($id)
        ]);
    }

    public function update($produto)
    {
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $uploadDir = __DIR__ . '/../../../container/';

            $fileName = uniqid('prod_', true) . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $targetFile = $uploadDir . $fileName;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                $imageUrl = '/container/' . $fileName;
            } else {
                echo "Erro ao salvar a imagem.";
                return;
            }
        } else {
            $imageUrl = $produto['current_image_url'];
        }

        $produtoData = [
            'name' => $produto['name'],
            'price' => $produto['price'],
            'unit' => $produto['unit'],
            'stats' => $produto['stats'],
            'url' => $imageUrl
        ];

        $produtoDAO = new ProdutoDAO();
        $produtoDAO->update($produto['id'], $produtoData);
    }


    public function destroy($produto)
    {
        $produtoDAO = new ProdutoDAO();
        $produtoDAO->delete($produto['id']);
    }
}
