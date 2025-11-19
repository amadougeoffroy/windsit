#!/bin/bash

echo "🧹 Nettoyage de l'historique Git - Retrait de config.php"
echo "========================================================="
echo ""
echo "⚠️  ATTENTION : Cette opération réécrit l'historique Git"
echo ""

cd /Users/amadougeoffroy/PROJETS/questions/website

# Installer git-filter-repo si nécessaire
if ! command -v git-filter-repo &> /dev/null; then
    echo "📦 Installation de git-filter-repo..."
    pip3 install git-filter-repo
fi

# Retirer config.php de tout l'historique
echo ""
echo "🔄 Suppression de config.php de l'historique..."
git filter-repo --path config.php --invert-paths --force

echo ""
echo "✅ Historique nettoyé !"
echo ""
echo "🚀 Prochaine étape : pousser vers GitHub"
echo ""
echo "git remote add origin https://github.com/amadougeoffroy/windsit.git"
echo "git push origin develop --force"
echo ""

