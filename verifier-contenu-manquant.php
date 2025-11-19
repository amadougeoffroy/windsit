<?php
/**
 * Vérifie quel contenu n'est pas encore traduit sur chaque page
 */

echo "╔═══════════════════════════════════════════════════════════════════╗\n";
echo "║   🔍 Analyse du contenu non traduit par page                     ║\n";
echo "╚═══════════════════════════════════════════════════════════════════╝\n\n";

$pages = [
    'index.html' => [
        'sections' => ['Hero', 'Services', 'Portfolio', 'CTA'],
        'available_keys' => ['hero_tag', 'hero_title', 'hero_title_gradient', 'hero_subtitle', 'hero_cta_project', 
                            'hero_cta_portfolio', 'hero_stat_projects', 'hero_stat_clients', 'hero_stat_experience',
                            'services_tag', 'services_title', 'services_title_gradient', 'cta_title', 'cta_subtitle', 'cta_button']
    ],
    'contact.html' => [
        'sections' => ['Hero', 'Formulaire', 'Informations'],
        'available_keys' => ['contact_hero_tag', 'contact_hero_title', 'contact_hero_title_gradient', 'contact_hero_subtitle',
                            'contact_info_title', 'contact_address_title', 'contact_phone_title', 'contact_email_title',
                            'contact_hours', 'contact_form_title', 'contact_form_name', 'contact_form_email',
                            'contact_form_phone', 'contact_form_subject', 'contact_form_subject_option1', 'contact_form_subject_option2',
                            'contact_form_subject_option3', 'contact_form_subject_option4', 'contact_form_subject_option5',
                            'contact_form_message', 'contact_form_message_placeholder', 'contact_form_submit', 'contact_form_sending']
    ],
    'carrieres.html' => [
        'sections' => ['Hero', 'Formulaire'],
        'available_keys' => ['careers_hero_tag', 'careers_hero_title', 'careers_hero_title_gradient', 'careers_hero_subtitle',
                            'careers_form_title', 'careers_form_firstname', 'careers_form_lastname', 'careers_form_email',
                            'careers_form_phone', 'careers_form_position', 'careers_form_position_select', 'careers_form_linkedin',
                            'careers_form_message', 'careers_form_message_placeholder', 'careers_form_cv', 'careers_form_cv_upload',
                            'careers_form_portfolio', 'careers_form_portfolio_upload', 'careers_form_submit', 'careers_form_sending']
    ],
    'blog.html' => [
        'sections' => ['Hero', 'Newsletter'],
        'available_keys' => ['blog_hero_tag', 'blog_hero_title', 'blog_hero_title_gradient', 'blog_hero_subtitle',
                            'blog_read_more', 'blog_newsletter_title', 'blog_newsletter_subtitle', 'blog_newsletter_placeholder',
                            'blog_newsletter_submit']
    ],
    'about.html' => [
        'sections' => ['Hero'],
        'available_keys' => ['about_hero_tag', 'about_hero_title', 'about_hero_title_gradient', 'about_hero_subtitle']
    ]
];

foreach ($pages as $file => $info) {
    if (!file_exists($file)) {
        echo "⚠️  $file n'existe pas\n\n";
        continue;
    }
    
    $html = file_get_contents($file);
    preg_match_all('/data-i18n=["\']([^"\']+)["\']/', $html, $matches);
    $usedKeys = array_unique($matches[1]);
    
    $missingKeys = array_diff($info['available_keys'], $usedKeys);
    
    echo "📄 $file\n";
    echo str_repeat('─', 65) . "\n";
    echo "   📌 Sections: " . implode(', ', $info['sections']) . "\n";
    echo "   ✅ Clés utilisées: " . count($usedKeys) . "\n";
    echo "   ❌ Clés manquantes: " . count($missingKeys) . "\n\n";
    
    if (!empty($missingKeys)) {
        echo "   🔍 Traductions disponibles mais non utilisées:\n";
        foreach ($missingKeys as $key) {
            // Déterminer la section
            if (strpos($key, 'hero') !== false) $section = '🎯 Hero';
            else if (strpos($key, 'form') !== false) $section = '📝 Formulaire';
            else if (strpos($key, 'newsletter') !== false) $section = '📧 Newsletter';
            else if (strpos($key, 'info') !== false || strpos($key, 'address') !== false || strpos($key, 'phone') !== false || strpos($key, 'email') !== false || strpos($key, 'hours') !== false) $section = 'ℹ️  Info';
            else $section = '📄 Contenu';
            
            echo "      $section $key\n";
        }
        echo "\n";
    } else {
        echo "   🎉 Toutes les traductions disponibles sont utilisées!\n\n";
    }
}

echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
echo "💡 RECOMMANDATIONS\n";
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n\n";
echo "Pour avoir un site 100% multilingue, il faut ajouter les attributs\n";
echo "data-i18n aux éléments HTML suivants:\n\n";
echo "• Titres de sections (h1, h2, h3)\n";
echo "• Paragraphes de texte\n";
echo "• Labels de formulaires\n";
echo "• Placeholders d'inputs\n";
echo "• Boutons d'action\n";
echo "• Tags et badges\n\n";
?>
