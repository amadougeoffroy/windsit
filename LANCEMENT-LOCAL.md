# 🚀 Guide de Lancement du Site en Local

## Pourquoi `file://` ne fonctionne pas ?

Le protocole `file://` ne supporte pas :
- ❌ Les règles `.htaccess`
- ❌ Les URLs propres (sans `.html`)
- ❌ Les redirections
- ❌ Certaines fonctionnalités JavaScript

**Solution** : Utiliser un serveur web local

## Option 1 : Python (Recommandé - Plus simple) 🐍

### Installation
Python est déjà installé sur Mac. Vérifiez avec :
```bash
python3 --version
```

### Lancement
```bash
cd /Users/amadougeoffroy/PROJETS/questions/website
python3 -m http.server 8000
```

### Accès
Ouvrez votre navigateur et allez sur :
```
http://localhost:8000
```

**Note** : Avec Python, les URLs propres ne fonctionnent pas, mais vous pouvez naviguer avec les extensions :
- `http://localhost:8000/index.html`
- `http://localhost:8000/services.html`
- etc.

### Arrêter le serveur
Appuyez sur `Ctrl+C` dans le terminal

---

## Option 2 : PHP (URLs propres partielles) 🐘

### Installation
PHP est déjà installé sur Mac. Vérifiez avec :
```bash
php --version
```

### Lancement
```bash
cd /Users/amadougeoffroy/PROJETS/questions/website
php -S localhost:8000
```

### Accès
```
http://localhost:8000
```

**Limitation** : PHP ne supporte pas `.htaccess`, mais on peut créer un routeur

---

## Option 3 : MAMP (Apache avec .htaccess) 🎯

### Installation
1. Téléchargez MAMP : https://www.mamp.info/en/downloads/
2. Installez MAMP (version gratuite suffit)

### Configuration
1. Ouvrez MAMP
2. Cliquez sur "Preferences"
3. Allez dans "Web Server"
4. Changez "Document Root" vers : `/Users/amadougeoffroy/PROJETS/questions/website`
5. Cliquez sur "OK"
6. Cliquez sur "Start Servers"

### Accès
```
http://localhost:8888
```

✅ **Avec MAMP, les URLs propres fonctionnent parfaitement !**
- `http://localhost:8888/`
- `http://localhost:8888/services`
- `http://localhost:8888/contact`

---

## Option 4 : Live Server (VS Code) 🔴

### Installation
1. Ouvrez VS Code
2. Allez dans Extensions (⌘+Shift+X)
3. Cherchez "Live Server"
4. Installez l'extension

### Utilisation
1. Ouvrez le dossier `website` dans VS Code
2. Clic droit sur `index.html`
3. Cliquez sur "Open with Live Server"

### Accès
```
http://localhost:5500
```

**Note** : Live Server ne supporte pas `.htaccess` par défaut

---

## Option 5 : Node.js avec http-server 🟢

### Installation
```bash
# Installer Node.js depuis https://nodejs.org/
# Puis installer http-server
npm install -g http-server
```

### Lancement
```bash
cd /Users/amadougeoffroy/PROJETS/questions/website
http-server -p 8000
```

### Accès
```
http://localhost:8000
```

---

## Comparaison des Options

| Option | URLs propres | Facilité | Performance |
|--------|--------------|----------|-------------|
| Python | ❌ | ⭐⭐⭐⭐⭐ | ⭐⭐⭐ |
| PHP | ❌ | ⭐⭐⭐⭐ | ⭐⭐⭐ |
| MAMP | ✅ | ⭐⭐⭐ | ⭐⭐⭐⭐⭐ |
| Live Server | ❌ | ⭐⭐⭐⭐⭐ | ⭐⭐⭐⭐ |
| http-server | ❌ | ⭐⭐⭐⭐ | ⭐⭐⭐⭐ |

## Recommandation

### Pour le développement rapide :
👉 **Python** (aucune installation nécessaire)
```bash
cd /Users/amadougeoffroy/PROJETS/questions/website
python3 -m http.server 8000
```

### Pour tester les URLs propres :
👉 **MAMP** (nécessite installation, mais support complet `.htaccess`)

### Pour VS Code :
👉 **Live Server** (extension VS Code pratique)

---

## Navigation en mode file:// (Temporaire)

Si vous voulez vraiment utiliser `file://` temporairement, vous devez :

1. Accéder directement aux fichiers HTML :
```
file:///Users/amadougeoffroy/PROJETS/questions/website/index.html
file:///Users/amadougeoffroy/PROJETS/questions/website/services.html
file:///Users/amadougeoffroy/PROJETS/questions/website/about.html
```

2. Les liens du site ne fonctionneront pas correctement car ils utilisent des URLs absolues (`/services`)

**⚠️ Non recommandé** : Beaucoup de fonctionnalités ne marcheront pas

---

## En Production

En production, les URLs propres fonctionneront automatiquement avec :
- ✅ Hébergement web classique (Apache)
- ✅ cPanel
- ✅ VPS avec Apache/Nginx
- ✅ Netlify/Vercel (avec config)

---

## Commandes Rapides

### Démarrer un serveur Python
```bash
cd /Users/amadougeoffroy/PROJETS/questions/website && python3 -m http.server 8000
```

### Démarrer un serveur PHP
```bash
cd /Users/amadougeoffroy/PROJETS/questions/website && php -S localhost:8000
```

### Ouvrir dans le navigateur
```bash
open http://localhost:8000
```

---

**Développé pour WindsIT** 🚀

