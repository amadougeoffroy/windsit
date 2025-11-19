<?php
/**
 * Script de test pour vérifier l'intégration Brevo
 */

require_once 'config.php';

echo "=== Test de l'API Brevo ===\n\n";

// Test 1: Vérification de la clé API
echo "1. Vérification de la clé API...\n";
echo "   Clé API: " . substr(BREVO_API_KEY, 0, 20) . "...\n";
echo "   URL API: " . BREVO_API_URL . "\n\n";

// Test 2: Vérification des emails
echo "2. Configuration des emails:\n";
echo "   Email FROM: " . EMAIL_FROM . "\n";
echo "   Email TO: " . EMAIL_TO . "\n\n";

// Test 3: Test de l'envoi d'un email
echo "3. Envoi d'un email de test...\n";

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
    'subject' => 'Test WindsIT - Vérification intégration Brevo',
    'htmlContent' => '
        <html>
        <body style="font-family: Arial, sans-serif; padding: 20px;">
            <h2 style="color: #FF6B35;">✅ Email de test WindsIT</h2>
            <p>Ceci est un email de test pour vérifier l\'intégration Brevo.</p>
            <p>Si vous recevez cet email, l\'intégration fonctionne correctement !</p>
            <p><strong>Date:</strong> ' . date('d/m/Y à H:i:s') . '</p>
        </body>
        </html>
    '
];

$ch = curl_init(BREVO_API_URL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'accept: application/json',
    'api-key: ' . BREVO_API_KEY,
    'content-type: application/json'
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($emailData));

echo "   Envoi en cours...\n";
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$curlError = curl_error($ch);
curl_close($ch);

echo "\n=== Résultat ===\n";
echo "Code HTTP: $httpCode\n";

if ($curlError) {
    echo "❌ Erreur cURL: $curlError\n";
}

if ($httpCode === 201) {
    echo "✅ SUCCESS! Email envoyé avec succès\n";
    $responseData = json_decode($response, true);
    echo "ID du message: " . ($responseData['messageId'] ?? 'N/A') . "\n";
} else {
    echo "❌ ERREUR: L'email n'a pas pu être envoyé\n";
    echo "Réponse complète:\n";
    echo $response . "\n";
}

echo "\n=== Fin du test ===\n";
?>

