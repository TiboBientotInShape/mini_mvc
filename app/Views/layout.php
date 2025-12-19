<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= isset($title) ? htmlspecialchars($title) : 'App' ?></title>
    
    <style>
        body { font-family: sans-serif; padding: 20px; }
        nav { background-color: #f8f9fa; padding: 10px; margin-bottom: 20px; border-radius: 5px; }
        nav a { margin-right: 15px; text-decoration: none; color: #333; font-weight: bold; }
        nav a:hover { color: #007bff; }
    </style>
</head>

<body>
<header>
    <h1><?= isset($title) ? htmlspecialchars($title) : 'App' ?></h1>

    <nav>
        <a href="/">🏠 Accueil</a>
        <a href="/cart" style="color: #007bff;">🛒 Mon Panier</a>
        
        <a href="/register" style="color: green; margin-left: 20px;">📝 Inscription</a>
    </nav>
</header>

<main>
    <?= $content ?>
</main>

</body>
</html>