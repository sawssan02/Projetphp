<?php
// books.php

// On initialise un tableau de livres (exemple)
$books = [
    ["id" => 1, "title" => "Le Petit Prince", "author" => "Antoine de Saint-Exupéry"],
    ["id" => 2, "title" => "1984", "author" => "George Orwell"],
    ["id" => 3, "title" => "Harry Potter", "author" => "J.K. Rowling"]
];

// Gestion des actions CRUD
if (isset($_POST['action'])) {
    $action = $_POST['action'];
    
    switch ($action) {
        case "add":
            $newId = count($books) + 1;
            $books[] = [
                "id" => $newId,
                "title" => $_POST['title'],
                "author" => $_POST['author']
            ];
            break;
        case "edit":
            foreach ($books as &$book) {
                if ($book['id'] == $_POST['id']) {
                    $book['title'] = $_POST['title'];
                    $book['author'] = $_POST['author'];
                }
            }
            unset($book);
            break;
        case "delete":
            foreach ($books as $key => $book) {
                if ($book['id'] == $_POST['id']) {
                    unset($books[$key]);
                }
            }
            $books = array_values($books); // réindexer
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>CRUD Livres - PHP</title>
    <style>
        body { font-family: Arial; background: #f9f9f9; padding: 20px; }
        table { border-collapse: collapse; width: 100%; margin-bottom: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background: #0078d4; color: white; }
        input, button { padding: 5px; margin: 2px; }
        form { display: inline; }
    </style>
</head>
<body>
    <h1>Gestion des Livres</h1>

    <!-- Formulaire pour ajouter un livre -->
    <h2>Ajouter un livre</h2>
    <form method="POST">
        <input type="hidden" name="action" value="add">
        <input type="text" name="title" placeholder="Titre" required>
        <input type="text" name="author" placeholder="Auteur" required>
        <button type="submit">Ajouter</button>
    </form>

    <!-- Liste des livres -->
    <h2>Liste des livres</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($books as $book): ?>
        <tr>
            <td><?= $book['id'] ?></td>
            <td><?= htmlspecialchars($book['title']) ?></td>
            <td><?= htmlspecialchars($book['author']) ?></td>
            <td>
                <!-- Formulaire édition -->
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="action" value="edit">
                    <input type="hidden" name="id" value="<?= $book['id'] ?>">
                    <input type="text" name="title" value="<?= htmlspecialchars($book['title']) ?>" required>
                    <input type="text" name="author" value="<?= htmlspecialchars($book['author']) ?>" required>
                    <button type="submit">Modifier</button>
                </form>

                <!-- Formulaire suppression -->
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="id" value="<?= $book['id'] ?>">
                    <button type="submit" onclick="return confirm('Voulez-vous vraiment supprimer ce livre ?')">Supprimer</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
