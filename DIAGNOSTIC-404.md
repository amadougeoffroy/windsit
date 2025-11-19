# 🔍 Diagnostic Erreur 404 - Pages autres que l'accueil

## ❌ Problème

- ✅ Page d'accueil (`index.html`) fonctionne
- ❌ Autres pages (services, about, contact, etc.) affichent "404 Not Found"

## 🔎 Causes possibles

### 1. Structure du serveur FTP incorrecte

**Problème** : Les fichiers sont uploadés dans le mauvais dossier

**Solution** : Vérifier la structure FTP et ajuster `server-dir` dans le workflow

### 2. Extensions .html non reconnues

**Problème** : Le serveur ne trouve pas `services.html`

**Solution** : Le `.htaccess` devrait gérer ça, mais vérifions

### 3. Fichiers non uploadés

**Problème** : Seul `index.html` a été uploadé

**Solution** : Relancer le déploiement

---

## ✅ Solutions

### Solution 1 : Vérifier la structure FTP (RECOMMANDÉ)

#### Étape A : Connectez-vous en FTP avec FileZilla

```
Hôte : ftp.etoilesbrillantes.com
Utilisateur : windsit@windsit-digital.com
Mot de passe : P@ssword@1234
Port : 21
```

#### Étape B : Vérifiez la structure

Une fois connecté, vous devriez voir :

**Option A** : Structure avec `/www/`
```
/ (racine)
├── www/               ← DOSSIER WEB
│   ├── index.html
│   ├── services.html
│   ├── about.html
│   ├── css/
│   └── js/
├── logs/
└── tmp/
```

**Option B** : Structure sans `/www/`
```
/ (racine)
├── index.html         ← FICHIERS À LA RACINE
├── services.html
├── about.html
├── css/
├── js/
├── logs/
└── tmp/
```

**Option C** : Structure avec `/public_html/`
```
/ (racine)
├── public_html/       ← DOSSIER WEB
│   ├── index.html
│   ├── services.html
│   └── ...
├── logs/
└── tmp/
```

#### Étape C : Ajuster le workflow selon votre structure

Éditez `.github/workflows/deploy-ftp.yml` :

**Si Option A** (`/www/`) :
```yaml
server-dir: ./www/
```

**Si Option B** (racine `/`) :
```yaml
server-dir: ./
```

**Si Option C** (`/public_html/`) :
```yaml
server-dir: ./public_html/
```

---

### Solution 2 : Vérifier que tous les fichiers sont uploadés

#### Via FTP (FileZilla)

1. Connectez-vous en FTP
2. Naviguez vers votre dossier web (`www/` ou racine)
3. Vérifiez que TOUS ces fichiers sont présents :

```
✅ index.html
✅ about.html
✅ services.html
✅ realisations.html
✅ contact.html
✅ carrieres.html
✅ blog.html
✅ faq.html
✅ .htaccess
✅ css/ (dossier)
✅ js/ (dossier)
✅ images/ (dossier)
```

#### Si des fichiers manquent

**Option A** : Uploader manuellement
- Sélectionnez les fichiers manquants dans `deploy-lws/`
- Glissez-les vers le serveur FTP

**Option B** : Relancer le déploiement GitHub
- GitHub > Actions > Run workflow

---

### Solution 3 : Vérifier le .htaccess

Le fichier `.htaccess` peut causer des problèmes. Vérifiez qu'il est sur le serveur :

#### Via FTP

1. Connectez-vous
2. Dans le dossier web, cherchez `.htaccess`
3. **Si invisible** : Activez "Afficher les fichiers cachés" dans FileZilla
   - Serveur > Forcer l'affichage des fichiers cachés

#### Si .htaccess est absent

Créez-le manuellement sur le serveur avec ce contenu minimal :

```apache
# Activer le moteur de réécriture
RewriteEngine On

# Forcer HTTPS (si certificat SSL actif)
# RewriteCond %{HTTPS} off
# RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]

# Pages d'erreur
ErrorDocument 404 /404.html
ErrorDocument 500 /500.html

# Type MIME
AddDefaultCharset UTF-8

# Cache
<IfModule mod_expires.c>
    ExpiresActive On
    ExpiresByType text/html "access plus 0 seconds"
    ExpiresByType text/css "access plus 1 month"
    ExpiresByType application/javascript "access plus 1 month"
    ExpiresByType image/jpeg "access plus 1 year"
    ExpiresByType image/png "access plus 1 year"
</IfModule>
```

---

### Solution 4 : Test URLs directes

Testez ces URLs dans votre navigateur :

```
https://windsit-digital.com/index.html          ← Devrait fonctionner
https://windsit-digital.com/services.html       ← À tester
https://windsit-digital.com/about.html          ← À tester
https://windsit-digital.com/www/services.html   ← Si dans sous-dossier
```

**Si `/www/services.html` fonctionne** :
→ Les fichiers sont dans `/www/www/` (double dossier)
→ Changez `server-dir: ./` dans le workflow

**Si aucune ne fonctionne** :
→ Les fichiers ne sont pas uploadés
→ Vérifiez les logs GitHub Actions

---

### Solution 5 : Vérifier les logs GitHub Actions

1. GitHub > Actions
2. Cliquez sur le dernier déploiement
3. Cliquez sur "📦 Déployer sur serveur LWS"
4. Lisez les logs :

Cherchez :
```
✅ "Uploaded X files"
✅ "Deploy complete"
❌ "Error: ..."
```

---

## 🚀 Action Rapide

### Méthode 1 : Upload manuel FTP (2 minutes)

Pendant qu'on diagnostique, uploadez manuellement :

1. FileZilla > Connectez-vous
2. Naviguez vers le bon dossier (`www/` ou racine)
3. Glissez tous les fichiers de `deploy-lws/` vers le serveur
4. Testez : https://windsit-digital.com/services.html

### Méthode 2 : Nouveau déploiement automatique

J'ai déjà poussé une correction qui uploade vers `./www/`

1. Allez sur GitHub > Actions
2. Le déploiement devrait être en cours (🟡)
3. Attendez qu'il se termine (✅)
4. Testez à nouveau

---

## 📝 Checklist de vérification

Une fois le problème résolu, vérifiez :

- [ ] https://windsit-digital.com fonctionne
- [ ] https://windsit-digital.com/services.html fonctionne
- [ ] https://windsit-digital.com/about.html fonctionne
- [ ] https://windsit-digital.com/realisations.html fonctionne
- [ ] https://windsit-digital.com/contact.html fonctionne
- [ ] https://windsit-digital.com/carrieres.html fonctionne
- [ ] https://windsit-digital.com/blog.html fonctionne
- [ ] https://windsit-digital.com/faq.html fonctionne
- [ ] Les images s'affichent
- [ ] Les styles CSS sont appliqués
- [ ] Le JavaScript fonctionne
- [ ] Le formulaire de contact s'affiche

---

## 🆘 Si rien ne fonctionne

1. **Contactez le support LWS**
   - Email : support@lws.fr
   - Téléphone : 01 77 62 30 03
   - Demandez : "Où dois-je uploader les fichiers pour mon site windsit-digital.com ?"

2. **Vérifiez le panneau de configuration LWS**
   - Connectez-vous à votre espace client LWS
   - Vérifiez la configuration de votre domaine
   - Vérifiez le chemin du document root

3. **Essayez un upload FTP manuel complet**
   - Supprimez tout sur le serveur
   - Uploadez tous les fichiers de `deploy-lws/`
   - Testez

---

**Créé le** : 19 novembre 2025  
**Pour** : Diagnostic erreur 404 WindsIT  
**Status** : 🔧 En cours de résolution

