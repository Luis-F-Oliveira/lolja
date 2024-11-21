<?php

namespace App\Http\Controllers;

use App\Models\ProdutoDAO;
use Utils\RenderView;

class HomeController extends RenderView
{
    public function index()
    {
        $produto = new ProdutoDAO();

        $this->loadView('home', [
            'title' => 'Home',
            'data' => $produto->index()
        ]);
    }
}
