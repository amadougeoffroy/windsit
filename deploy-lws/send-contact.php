<?php
/**
 * Traitement du formulaire de contact - Envoi via Brevo API
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

// Récupérer les données du formulaire
$data = json_decode(file_get_contents('php://input'), true);

// Validation des champs
$required_fields = ['name', 'email', 'phone', 'subject', 'message'];
foreach ($required_fields as $field) {
    if (empty($data[$field])) {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => "Le champ $field est requis"]);
        exit;
    }
}

// Nettoyer les données
$name = htmlspecialchars($data['name'], ENT_QUOTES, 'UTF-8');
$email = filter_var($data['email'], FILTER_SANITIZE_EMAIL);
$phone = htmlspecialchars($data['phone'], ENT_QUOTES, 'UTF-8');
$subject = htmlspecialchars($data['subject'], ENT_QUOTES, 'UTF-8');
$message = htmlspecialchars($data['message'], ENT_QUOTES, 'UTF-8');

// Valider l'email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Email invalide']);
    exit;
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
            <h1 style='margin: 0;'>📧 Nouveau message de contact</h1>
            <p style='margin: 10px 0 0 0;'>WindsIT-digital.com</p>
        </div>
        <div class='content'>
            <div class='field'>
                <div class='label'>👤 Nom complet</div>
                <div class='value'>$name</div>
            </div>
            <div class='field'>
                <div class='label'>📧 Email</div>
                <div class='value'><a href='mailto:$email'>$email</a></div>
            </div>
            <div class='field'>
                <div class='label'>📱 Téléphone</div>
                <div class='value'><a href='tel:$phone'>$phone</a></div>
            </div>
            <div class='field'>
                <div class='label'>📋 Sujet</div>
                <div class='value'>$subject</div>
            </div>
            <div class='field'>
                <div class='label'>💬 Message</div>
                <div class='value'>" . nl2br($message) . "</div>
            </div>
        </div>
        <div class='footer'>
            <p>Ce message a été envoyé depuis le formulaire de contact de WindsIT-digital.com</p>
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
        'name' => $name,
        'email' => $email
    ],
    'subject' => "💼 Contact WindsIT : $subject",
    'htmlContent' => $htmlContent
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
        'message' => 'Votre message a été envoyé avec succès ! Nous vous répondrons dans les plus brefs délais.'
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

