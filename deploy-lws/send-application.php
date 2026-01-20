<?php
/**
 * Traitement du formulaire de candidature - Envoi via Brevo API
 */

header('Content-Type: application/json; charset=utf-8');

// Inclure la configuration
require_once 'config.php';

// Gérer CORS
$origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : '';
if (in_array($origin, ALLOWED_ORIGINS)) {
    header("Access-Control-Allow-Origin: $origin");
    header('Access-Control-Allow-Methods: POST, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type');
}

// Gérer les requêtes OPTIONS (preflight)
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

// Vérifier que c'est une requête POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Méthode non autorisée']);
    exit;
}

// Vérifier les fichiers uploadés
if (!isset($_FILES['cv']) || $_FILES['cv']['error'] !== UPLOAD_ERR_OK) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Le CV est requis']);
    exit;
}

// Récupérer les données du formulaire
$prenom = htmlspecialchars($_POST['prenom'] ?? '', ENT_QUOTES, 'UTF-8');
$nom = htmlspecialchars($_POST['nom'] ?? '', ENT_QUOTES, 'UTF-8');
$email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
$telephone = htmlspecialchars($_POST['telephone'] ?? '', ENT_QUOTES, 'UTF-8');
$poste = htmlspecialchars($_POST['poste'] ?? '', ENT_QUOTES, 'UTF-8');
$linkedin = htmlspecialchars($_POST['linkedin'] ?? '', ENT_QUOTES, 'UTF-8');
$message = htmlspecialchars($_POST['message'] ?? '', ENT_QUOTES, 'UTF-8');

// Validation des champs requis
$required_fields = ['prenom' => $prenom, 'nom' => $nom, 'email' => $email, 'telephone' => $telephone, 'poste' => $poste, 'message' => $message];
foreach ($required_fields as $field => $value) {
    if (empty($value)) {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => "Le champ $field est requis"]);
        exit;
    }
}

// Valider l'email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Email invalide']);
    exit;
}

// Traiter le CV
$cv = $_FILES['cv'];
$cvName = basename($cv['name']);
$cvContent = base64_encode(file_get_contents($cv['tmp_name']));

// Traiter le portfolio (optionnel)
$attachments = [[
    'name' => $cvName,
    'content' => $cvContent
]];

if (isset($_FILES['portfolio']) && $_FILES['portfolio']['error'] === UPLOAD_ERR_OK) {
    $portfolio = $_FILES['portfolio'];
    $portfolioName = basename($portfolio['name']);
    $portfolioContent = base64_encode(file_get_contents($portfolio['tmp_name']));
    $attachments[] = [
        'name' => $portfolioName,
        'content' => $portfolioContent
    ];
}

// Construire le contenu HTML de l'email
$htmlContent = "
<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #FF6B35 0%, #F7931E 50%, #E63946 100%); color: white; padding: 30px; text-align: center; border-radius: 10px 10px 0 0; }
        .content { background: #f9f9f9; padding: 30px; border-radius: 0 0 10px 10px; }
        .field { margin-bottom: 20px; }
        .label { font-weight: bold; color: #FF6B35; }
        .value { margin-top: 5px; padding: 10px; background: white; border-left: 3px solid #FF6B35; }
        .footer { text-align: center; margin-top: 30px; color: #666; font-size: 12px; }
    </style>
</head>
<body>
    <div class='container'>
        <div class='header'>
            <h1 style='margin: 0;'>👔 Nouvelle candidature spontanée</h1>
            <p style='margin: 10px 0 0 0;'>WindsIT Carrières</p>
        </div>
        <div class='content'>
            <div class='field'>
                <div class='label'>👤 Candidat</div>
                <div class='value'>$prenom $nom</div>
            </div>
            <div class='field'>
                <div class='label'>📧 Email</div>
                <div class='value'><a href='mailto:$email'>$email</a></div>
            </div>
            <div class='field'>
                <div class='label'>📱 Téléphone</div>
                <div class='value'><a href='tel:$telephone'>$telephone</a></div>
            </div>
            <div class='field'>
                <div class='label'>💼 Poste souhaité</div>
                <div class='value'>$poste</div>
            </div>" .
            (!empty($linkedin) ? "
            <div class='field'>
                <div class='label'>🔗 LinkedIn</div>
                <div class='value'><a href='$linkedin' target='_blank'>$linkedin</a></div>
            </div>" : "") . "
            <div class='field'>
                <div class='label'>✍️ Lettre de motivation</div>
                <div class='value'>" . nl2br($message) . "</div>
            </div>
            <div class='field'>
                <div class='label'>📎 Pièces jointes</div>
                <div class='value'>
                    ✓ CV: $cvName" .
                    (isset($portfolioName) ? "<br>✓ Portfolio/Lettre: $portfolioName" : "") . "
                </div>
            </div>
        </div>
        <div class='footer'>
            <p>Cette candidature a été envoyée depuis le formulaire Carrières de WindsIT-digital.com</p>
            <p>Date: " . date('d/m/Y à H:i') . "</p>
        </div>
    </div>
</body>
</html>
";

// Préparer les données pour Brevo
$emailData = [
    'sender' => [
        'name' => EMAIL_FROM_NAME,
        'email' => EMAIL_FROM
    ],
    'to' => [
        [
            'name' => EMAIL_TO_NAME,
            'email' => EMAIL_TO
        ]
    ],
    'replyTo' => [
        'name' => "$prenom $nom",
        'email' => $email
    ],
    'subject' => "💼 Candidature : $prenom $nom - $poste",
    'htmlContent' => $htmlContent,
    'attachment' => $attachments
];

// Envoyer l'email via l'API Brevo
$ch = curl_init(BREVO_API_URL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'accept: application/json',
    'api-key: ' . BREVO_API_KEY,
    'content-type: application/json'
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($emailData));

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$error = curl_error($ch);
curl_close($ch);

// Vérifier la réponse
if ($httpCode === 201) {
    echo json_encode([
        'success' => true,
        'message' => 'Votre candidature a été envoyée avec succès ! Nous vous contacterons si votre profil correspond à nos besoins.'
    ]);
} else {
    error_log("Erreur Brevo API: HTTP $httpCode - $response");
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Une erreur est survenue lors de l\'envoi. Veuillez réessayer plus tard.'
    ]);
}
?>

