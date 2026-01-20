<?php
/**
 * Script de vérification des traductions WindsIT
 * Vérifie que tous les data-i18n ont des traductions complètes
 */

echo "╔════════════════════════════════════════════════════════════════╗\n";
echo "║      🌍 Vérification des traductions WindsIT                  ║\n";
echo "╚════════════════════════════════════════════════════════════════╝\n\n";

// Charger les traductions depuis le fichier JS
$translationsFile = file_get_contents('js/translations.js');

// Extraire les clés de traduction pour chaque langue
preg_match('/fr:\s*\{(.*?)\n\s*\},\s*en:/s', $translationsFile, $frMatch);
preg_match('/en:\s*\{(.*?)\n\s*\},\s*es:/s', $translationsFile, $enMatch);
preg_match('/es:\s*\{(.*?)\n\s*\}\s*\};/s', $translationsFile, $esMatch);

$frKeys = extractKeys($frMatch[1] ?? '');
$enKeys = extractKeys($enMatch[1] ?? '');
$esKeys = extractKeys($esMatch[1] ?? '');

echo "📊 Nombre de clés par langue:\n";
echo "   FR: " . count($frKeys) . " clés\n";
echo "   EN: " . count($enKeys) . " clés\n";
echo "   ES: " . count($esKeys) . " clés\n\n";

// Vérifier la cohérence des traductions
$allKeys = array_unique(array_merge(array_keys($frKeys), array_keys($enKeys), array_keys($esKeys)));
$missingTranslations = [];

echo "🔍 Vérification de la cohérence des traductions...\n\n";

foreach ($allKeys as $key) {
    $missing = [];
    if (!isset($frKeys[$key])) $missing[] = 'FR';
    if (!isset($enKeys[$key])) $missing[] = 'EN';
    if (!isset($esKeys[$key])) $missing[] = 'ES';
    
    if (!empty($missing)) {
        $missingTranslations[$key] = $missing;
    }
}

if (!empty($missingTranslations)) {
    echo "⚠️  Traductions manquantes:\n";
    foreach ($missingTranslations as $key => $langs) {
        echo "   ❌ '$key' manque en: " . implode(', ', $langs) . "\n";
    }
    echo "\n";
} else {
    echo "✅ Toutes les clés sont traduites dans les 3 langues!\n\n";
}

// Lister les fichiers HTML à vérifier
$htmlFiles = glob('*.html');
$htmlFiles = array_filter($htmlFiles, function($file) {
    return $file !== 'test-images.html'; // Exclure les fichiers de test
});

sort($htmlFiles);

echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
echo "📄 Vérification page par page\n";
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n\n";

$totalKeys = 0;
$totalMissing = 0;
$pageStats = [];

foreach ($htmlFiles as $file) {
    echo "📄 $file\n";
    echo str_repeat('─', 60) . "\n";
    
    $html = file_get_contents($file);
    
    // Extraire tous les data-i18n
    preg_match_all('/data-i18n=["\']([^"\']+)["\']/', $html, $matches);
    $keys = array_unique($matches[1]);
    
    if (empty($keys)) {
        echo "   ⚠️  Aucune clé data-i18n trouvée\n\n";
        continue;
    }
    
    echo "   📊 " . count($keys) . " clés trouvées\n\n";
    
    $missing = [];
    $sections = extractSections($html, $keys);
    
    foreach ($sections as $section => $sectionKeys) {
        if (empty($sectionKeys)) continue;
        
        echo "   📌 Section: $section\n";
        foreach ($sectionKeys as $key) {
            $status = '✅';
            $langs = [];
            
            if (!isset($frKeys[$key])) { $status = '❌'; $langs[] = 'FR'; }
            if (!isset($enKeys[$key])) { $status = '❌'; $langs[] = 'EN'; }
            if (!isset($esKeys[$key])) { $status = '❌'; $langs[] = 'ES'; }
            
            if ($status === '❌') {
                echo "      $status $key (manque: " . implode(', ', $langs) . ")\n";
                $missing[] = $key;
                $totalMissing++;
            } else {
                echo "      $status $key\n";
                if (isset($frKeys[$key])) {
                    echo "         FR: " . substr($frKeys[$key], 0, 60) . (strlen($frKeys[$key]) > 60 ? '...' : '') . "\n";
                }
                if (isset($enKeys[$key])) {
                    echo "         EN: " . substr($enKeys[$key], 0, 60) . (strlen($enKeys[$key]) > 60 ? '...' : '') . "\n";
                }
                if (isset($esKeys[$key])) {
                    echo "         ES: " . substr($esKeys[$key], 0, 60) . (strlen($esKeys[$key]) > 60 ? '...' : '') . "\n";
                }
            }
        }
        echo "\n";
    }
    
    $totalKeys += count($keys);
    $pageStats[$file] = [
        'total' => count($keys),
        'missing' => count($missing)
    ];
}

// Résumé
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
echo "📊 RÉSUMÉ\n";
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n\n";

foreach ($pageStats as $page => $stats) {
    $percent = $stats['total'] > 0 ? round(($stats['total'] - $stats['missing']) / $stats['total'] * 100, 1) : 100;
    $icon = $stats['missing'] === 0 ? '✅' : '⚠️';
    echo "$icon $page: $percent% complété (" . ($stats['total'] - $stats['missing']) . "/" . $stats['total'] . ")\n";
}

echo "\n";
echo "📈 Total: $totalKeys clés utilisées dans le HTML\n";
echo "❌ Manquantes: $totalMissing\n";
echo "✅ Complètes: " . ($totalKeys - $totalMissing) . "\n";

$globalPercent = $totalKeys > 0 ? round(($totalKeys - $totalMissing) / $totalKeys * 100, 1) : 100;
echo "\n";
if ($globalPercent === 100.0) {
    echo "🎉 EXCELLENT! Toutes les traductions sont complètes ($globalPercent%)\n";
} else if ($globalPercent >= 90) {
    echo "👍 TRÈS BIEN! ($globalPercent% complété)\n";
} else if ($globalPercent >= 75) {
    echo "⚠️  BON, mais des traductions manquent ($globalPercent% complété)\n";
} else {
    echo "❌ ATTENTION! Beaucoup de traductions manquent ($globalPercent% complété)\n";
}

echo "\n";

// Fonctions helper
function extractKeys($content) {
    $keys = [];
    preg_match_all('/(\w+):\s*["\'](.+?)["\'],?\s*$/m', $content, $matches, PREG_SET_ORDER);
    foreach ($matches as $match) {
        $key = $match[1];
        $value = $match[2];
        // Unescape
        $value = stripcslashes($value);
        $keys[$key] = $value;
    }
    return $keys;
}

function extractSections($html, $keys) {
    $sections = [];
    $currentSection = 'Général';
    
    // Identifier les sections principales
    $sectionMarkers = [
        'Navbar' => '/<nav/i',
        'Hero' => '/<section[^>]*class="[^"]*hero/i',
        'Services' => '/<section[^>]*class="[^"]*service/i',
        'Portfolio' => '/<section[^>]*class="[^"]*portfolio/i',
        'CTA' => '/<section[^>]*class="[^"]*cta/i',
        'Footer' => '/<footer/i',
        'Formulaire' => '/<form/i',
    ];
    
    foreach ($keys as $key) {
        // Trouver dans quelle section se trouve cette clé
        $pattern = '/data-i18n=["\']' . preg_quote($key, '/') . '["\']/';
        preg_match($pattern, $html, $match, PREG_OFFSET_CAPTURE);
        
        if (!empty($match)) {
            $position = $match[0][1];
            $beforeKey = substr($html, 0, $position);
            
            // Déterminer la section
            $foundSection = 'Général';
            foreach ($sectionMarkers as $sectionName => $sectionPattern) {
                if (preg_match($sectionPattern, $beforeKey, $sectionMatch, PREG_OFFSET_CAPTURE)) {
                    $lastMatch = end($sectionMatch);
                    if ($lastMatch[1] > ($lastSectionPos ?? 0)) {
                        $foundSection = $sectionName;
                        $lastSectionPos = $lastMatch[1];
                    }
                }
            }
            
            if (!isset($sections[$foundSection])) {
                $sections[$foundSection] = [];
            }
            $sections[$foundSection][] = $key;
        }
    }
    
    return $sections;
}
?>

