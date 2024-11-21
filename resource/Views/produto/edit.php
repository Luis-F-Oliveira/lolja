<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>Editar Produto</h2>
        <form action="/lolja/produto/update" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $id ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Nome do Produto</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($data->name) ?>" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Preço</label>
                <input type="text" class="form-control" id="price" name="price" value="<?= htmlspecialchars($data->price) ?>" required>
            </div>

            <div class="mb-3">
                <label for="unit" class="form-label">Unidade</label>
                <input type="text" class="form-control" id="unit" name="unit" value="<?= htmlspecialchars($data->unit) ?>" required>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="stats" required>
                    <option value="1" <?= $data->stats == 1 ? 'selected' : '' ?>>Ativo</option>
                    <option value="0" <?= $data->stats == 0 ? 'selected' : '' ?>>Inativo</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Imagem do Produto</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*">
            </div>

            <div class="mb-3">
                <img id="product-image" src="<?= '../../container/' . basename($data->url) ?>" alt="Imagem do Produto" class="img-fluid" style="max-width: 100px; height: 100px; display: block;">
            </div>

            <input type="hidden" name="current_image_url" value="<?= htmlspecialchars($data->url) ?>">

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Salvar Produto</button>
                <a href="javascript:history.back()" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('image').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    const img = document.getElementById('product-image');
                    img.src = event.target.result;
                    img.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>

</html>
