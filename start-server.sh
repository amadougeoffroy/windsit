#!/bin/bash

# Script de lancement du serveur local WindsIT
# Usage: ./start-server.sh

echo "🚀 Lancement du serveur WindsIT..."
echo ""

# Vérifier si le port 8000 est déjà utilisé
if lsof -Pi :8000 -sTCP:LISTEN -t >/dev/null ; then
    echo "⚠️  Le port 8000 est déjà utilisé."
    echo "Voulez-vous arrêter le serveur existant ? (o/n)"
    read -r response
    if [[ "$response" =~ ^([oO][uU][iI]|[oO])$ ]]; then
        lsof -ti:8000 | xargs kill -9 2>/dev/null
        echo "✅ Serveur précédent arrêté"
        sleep 1
    else
        echo "❌ Annulation"
        exit 1
    fi
fi

# Se déplacer dans le dossier du site
cd "$(dirname "$0")"

# Lancer le serveur PHP avec le routeur pour gérer les URL propres
echo "🔧 Démarrage du serveur PHP sur le port 8000 avec support URL propres..."
php -S localhost:8000 router.php > /dev/null 2>&1 &
SERVER_PID=$!

# Attendre que le serveur démarre
sleep 2

# Vérifier que le serveur fonctionne
if ps -p $SERVER_PID > /dev/null; then
    echo "✅ Serveur lancé avec succès !"
    echo ""
    echo "📍 Votre site est accessible sur :"
    echo "   http://localhost:8000"
    echo "   http://localhost:8000/realisations"
    echo "   http://localhost:8000/services"
    echo "   (URL propres sans extension .html)"
    echo ""
    echo "🛑 Pour arrêter le serveur, exécutez :"
    echo "   ./stop-server.sh"
    echo "   ou appuyez sur Ctrl+C"
    echo ""
    
    # Ouvrir le navigateur
    echo "🌐 Ouverture du navigateur..."
    open http://localhost:8000
    
    # Garder le script actif
    echo "⏳ Serveur en cours d'exécution (PID: $SERVER_PID)..."
    echo "   Appuyez sur Ctrl+C pour arrêter"
    
    # Attendre que l'utilisateur arrête le serveur
    trap "echo ''; echo '🛑 Arrêt du serveur...'; kill $SERVER_PID 2>/dev/null; echo '✅ Serveur arrêté'; exit 0" INT TERM
    
    # Boucle infinie pour garder le script actif
    while ps -p $SERVER_PID > /dev/null; do
        sleep 1
    done
else
    echo "❌ Erreur : Le serveur n'a pas pu démarrer"
    exit 1
fi

