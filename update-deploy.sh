#!/bin/bash

# Script de mise à jour du dossier deploy-lws
# Utilisation : ./update-deploy.sh

echo "🔄 Mise à jour du dossier deploy-lws"
echo "===================================="
echo ""

# Aller dans le dossier website
cd "$(dirname "$0")"

# Créer deploy-lws s'il n'existe pas
mkdir -p deploy-lws

# Copier tous les fichiers HTML
echo "📄 Copie des fichiers HTML..."
cp -v *.html deploy-lws/ 2>/dev/null | grep -v "test-" | grep -v "DEBUG"

# Copier les dossiers
echo ""
echo "📁 Copie des dossiers..."
cp -r css deploy-lws/ 2>/dev/null
echo "  ✅ css/"

cp -r js deploy-lws/ 2>/dev/null
echo "  ✅ js/"

cp -r images deploy-lws/ 2>/dev/null
echo "  ✅ images/"

cp -r fonts deploy-lws/ 2>/dev/null && echo "  ✅ fonts/" || echo "  ⚠️  fonts/ (non trouvé)"

# Supprimer les fichiers de test si présents
echo ""
echo "🧹 Nettoyage..."
rm -f deploy-lws/test-*.html
rm -f deploy-lws/*-test.html
rm -f deploy-lws/DEBUG-*.md

echo ""
echo "✅ Mise à jour terminée !"
echo ""
echo "📊 Contenu de deploy-lws :"
ls -lh deploy-lws/ | grep -v "^d" | wc -l | xargs echo "  Fichiers :"
ls -lh deploy-lws/ | grep "^d" | wc -l | xargs echo "  Dossiers :"

echo ""
echo "🚀 Prochaines étapes :"
echo "  1. Vérifiez les modifications"
echo "  2. git add deploy-lws/"
echo "  3. git commit -m 'Mise à jour déploiement'"
echo "  4. git push origin main"
echo "  5. Le déploiement automatique se lance !"
echo ""

