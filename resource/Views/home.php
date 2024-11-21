<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Lista de Produtos</h1>
        <div class="mb-4">
            <a href="/lolja/produto/create" class="btn btn-primary">Adicionar Produto</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Unidade</th>
                    <th scope="col">Status</th>
                    <th scope="col">Criado em</th>
                    <th scope="col">Atualizado em</th>
                    <th scope="col">Imagem</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $produto): ?>
                    <tr>
                        <td><?= $produto->name ?></td>
                        <td>R$ <?= number_format($produto->price, 2, ',', '.') ?></td>
                        <td><?= $produto->unit ?></td>
                        <td>
                            <?php if ($produto->stats == 1): ?>
                                <span class="badge bg-success">Ativo</span>
                            <?php else: ?>
                                <span class="badge bg-danger">Inativo</span>
                            <?php endif; ?>
                        </td>
                        <td><?= $produto->created_at ?></td>
                        <td><?= $produto->updated_at ?></td>
                        <td>
                            <img src="<?= 'container/' . basename($produto->url) ?>" alt="Imagem do Produto" class="img-fluid" style="width: 100px; height: 100px; object-fit: cover;" />
                        </td>
                        <td>
                            <a href="<?= 'produto/edit/' . $produto->id ?>" class="btn btn-warning btn-sm">Editar</a>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $produto->id ?>">
                                Deletar
                            </button>
                        </td>
                    </tr>
                    <div class="modal fade" id="exampleModal<?= $produto->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tem certeza?</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Deletar essas informações não terá forma de recuperar futuramente.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                        Fechar
                                    </button>
                                    <form action="/lolja/produto/destroy" method="POST">
                                        <input type="hidden" name="id" value="<?= $produto->id ?>">
                                        <button type="submit" class="btn btn-primary">
                                            Apagar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>