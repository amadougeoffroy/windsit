#!/bin/bash

# Script d'arrêt du serveur local WindsIT
# Usage: ./stop-server.sh

echo "🛑 Arrêt du serveur WindsIT..."

# Trouver et arrêter tous les processus sur le port 8000
if lsof -Pi :8000 -sTCP:LISTEN -t >/dev/null ; then
    lsof -ti:8000 | xargs kill -9 2>/dev/null
    echo "✅ Serveur arrêté avec succès"
else
    echo "ℹ️  Aucun serveur n'est en cours d'exécution sur le port 8000"
fi

