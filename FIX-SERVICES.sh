#!/bin/bash

echo "🔧 Fix du problème /services"
echo "============================="
echo ""

# Vérifier si un dossier services existe sur le serveur
echo "Le problème vient probablement d'un DOSSIER 'services' sur le serveur"
echo "qui entre en conflit avec le fichier 'services.html'"
echo ""

echo "📋 Solutions possibles :"
echo ""
echo "OPTION 1 (Recommandé) : Supprimer le dossier 'services' via FTP"
echo "  1. Connectez-vous en FTP (FileZilla)"
echo "  2. Cherchez un dossier 'services' à la racine"
echo "  3. Supprimez-le ou renommez-le"
echo "  4. /services devrait fonctionner"
echo ""

echo "OPTION 2 : Renommer la page services en nos-services"
echo "  1. Lancer cette commande : ./FIX-SERVICES.sh rename"
echo "  2. Les liens seront mis à jour automatiquement"
echo "  3. URL finale : /nos-services"
echo ""

if [ "$1" == "rename" ]; then
    echo "🔄 Renommage en cours..."
    
    # Renommer le fichier
    mv deploy-lws/services.html deploy-lws/nos-services.html
    mv services.html nos-services.html 2>/dev/null || true
    
    echo "✅ Fichier renommé : services.html → nos-services.html"
    echo ""
    echo "⚠️  ATTENTION : Vous devez maintenant mettre à jour les liens dans vos pages HTML !"
    echo "   Changez tous les liens de /services vers /nos-services"
    echo ""
    
    read -p "Voulez-vous que je mette à jour automatiquement les liens ? (o/n) " -n 1 -r
    echo
    if [[ $REPLY =~ ^[Oo]$ ]]; then
        echo "🔄 Mise à jour des liens..."
        
        # Mettre à jour les liens dans tous les fichiers HTML
        find . -name "*.html" -not -path "*/node_modules/*" -not -path "*/.git/*" -exec sed -i '' 's|href="/services"|href="/nos-services"|g' {} \;
        find . -name "*.html" -not -path "*/node_modules/*" -not -path "*/.git/*" -exec sed -i '' 's|href="services"|href="nos-services"|g' {} \;
        find . -name "*.html" -not -path "*/node_modules/*" -not -path "*/.git/*" -exec sed -i '' 's|href="services.html"|href="nos-services"|g' {} \;
        
        echo "✅ Liens mis à jour dans tous les fichiers HTML"
        echo ""
        echo "🚀 Prêt à commiter et déployer :"
        echo "   git add ."
        echo "   git commit -m 'Fix: Renommage services → nos-services'"
        echo "   git push origin main"
    fi
fi

echo ""
echo "💡 Quelle option préférez-vous ?"
