<?php
/**
 * Configuration Brevo API pour WindsIT
 * IMPORTANT: Ne jamais commiter ce fichier dans un repo public
 */

// Configuration Brevo
define('BREVO_API_KEY', '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');
define('BREVO_API_URL', 'https://api.brevo.com/v3/smtp/email');

// Configuration emails
define('EMAIL_FROM', 'amadougeoffroy@gmail.com'); // Temporaire - à remplacer par contact@windsit.com
define('EMAIL_FROM_NAME', 'WindsIT');
define('EMAIL_TO', 'amadougeoffroy@gmail.com');
define('EMAIL_TO_NAME', 'Amadou Geoffroy');

// Configuration du site
define('SITE_NAME', 'WindsIT');
define('SITE_URL', 'https://windsit.com'); // À adapter selon votre domaine

// Sécurité
define('ALLOWED_ORIGINS', [
    'http://localhost:8000',
    'http://localhost:3000',
    'https://windsit.com',
    'https://www.windsit.com'
]);
?>

