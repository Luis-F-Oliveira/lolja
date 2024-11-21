<?php

namespace App\Interfaces;

interface IProduto
{
    public function index();
    public function create($produto);
    public function show($id);
    public function update($id, $produto);
    public function delete($id);
}
