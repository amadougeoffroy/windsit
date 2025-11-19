<?php
/**
 * Router PHP pour gérer les URL propres (sans extension .html)
 * Utilisé avec le serveur PHP intégré
 */

// Récupérer l'URI demandée
$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

// Si c'est la racine, servir index.html
if ($uri === '/') {
    $uri = '/index.html';
}

// Si l'URI se termine par un slash (ex: /about/), enlever le slash
if ($uri !== '/' && substr($uri, -1) === '/') {
    $uri = rtrim($uri, '/');
}

// Construire le chemin du fichier
$filepath = __DIR__ . $uri;

// Si le fichier existe tel quel, le servir
if (file_exists($filepath) && !is_dir($filepath)) {
    return false; // Laisser le serveur PHP servir le fichier
}

// Si c'est un répertoire, chercher index.html
if (is_dir($filepath)) {
    $indexPath = $filepath . '/index.html';
    if (file_exists($indexPath)) {
        require $indexPath;
        return true;
    }
}

// Sinon, essayer d'ajouter .html
$htmlFilepath = $filepath . '.html';
if (file_exists($htmlFilepath)) {
    require $htmlFilepath;
    return true;
}

// Si aucun fichier n'est trouvé, retourner 404
http_response_code(404);
echo "<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>404 - Page non trouvée</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #FF6B35 0%, #F7931E 50%, #E63946 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: white;
        }
        .container {
            text-align: center;
            padding: 2rem;
            background: rgba(255,255,255,0.1);
            border-radius: 20px;
            backdrop-filter: blur(10px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }
        h1 { font-size: 6rem; margin-bottom: 1rem; font-weight: 800; }
        h2 { font-size: 2rem; margin-bottom: 1rem; }
        p { font-size: 1.2rem; margin-bottom: 2rem; opacity: 0.9; }
        a {
            display: inline-block;
            padding: 1rem 2rem;
            background: white;
            color: #FF6B35;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        a:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>
    <div class='container'>
        <h1>404</h1>
        <h2>Page non trouvée</h2>
        <p>Désolé, la page que vous recherchez n'existe pas.</p>
        <a href='/'>Retour à l'accueil</a>
    </div>
</body>
</html>";
return true;

