# 🚀 Guide de Déploiement Automatique - WindsIT

## 📋 Vue d'ensemble

Votre site WindsIT est maintenant configuré pour un déploiement automatique via GitHub Actions.

**À chaque fois que vous faites un `git push`, votre site est automatiquement déployé sur votre serveur LWS !** 🎉

---

## 🔧 Configuration Initiale (À faire une seule fois)

### Étape 1 : Initialiser Git (si pas déjà fait)

```bash
cd /Users/amadougeoffroy/PROJETS/questions/website

# Initialiser Git
git init

# Ajouter tous les fichiers
git add .

# Premier commit
git commit -m "Initial commit - Site WindsIT"
```

### Étape 2 : Créer un repository sur GitHub

1. Allez sur [https://github.com](https://github.com)
2. Cliquez sur le bouton `+` en haut à droite > `New repository`
3. Remplissez :
   - **Repository name** : `windsit-website`
   - **Description** : `Site web WindsIT - Digital Agency`
   - **Visibilité** : Private (recommandé)
4. **NE PAS** cocher "Initialize with README"
5. Cliquez sur `Create repository`

### Étape 3 : Lier votre projet local à GitHub

GitHub vous donnera des commandes, utilisez celles-ci :

```bash
cd /Users/amadougeoffroy/PROJETS/questions/website

# Ajouter l'origine GitHub (remplacez VOTRE-USERNAME)
git remote add origin https://github.com/VOTRE-USERNAME/windsit-website.git

# Renommer la branche en main
git branch -M main

# Pousser vers GitHub
git push -u origin main
```

### Étape 4 : Configurer les Secrets GitHub (IMPORTANT !)

C'est l'étape la plus importante pour le déploiement automatique.

1. Sur votre repository GitHub, cliquez sur `Settings`
2. Dans le menu de gauche : `Secrets and variables` > `Actions`
3. Cliquez sur `New repository secret`

Ajoutez ces 4 secrets :

#### ✅ Secret 1 : FTP_SERVER
```
Name: FTP_SERVER
Value: ftp.etoilesbrillantes.com
```
Cliquez sur `Add secret`

#### ✅ Secret 2 : FTP_USERNAME
```
Name: FTP_USERNAME
Value: windsit@windsit-digital.com
```
Cliquez sur `Add secret`

#### ✅ Secret 3 : FTP_PASSWORD
```
Name: FTP_PASSWORD
Value: P@ssword@1234
```
Cliquez sur `Add secret`

#### ✅ Secret 4 : FTP_PORT
```
Name: FTP_PORT
Value: 21
```
Cliquez sur `Add secret`

**⚠️ Important** : Vérifiez bien l'orthographe des noms (FTP_SERVER, FTP_USERNAME, etc.)

---

## 🎯 Utilisation Quotidienne

Une fois la configuration initiale terminée, voici votre workflow habituel :

### 1. Modifier votre site localement

Éditez vos fichiers HTML, CSS, JS, etc. dans le dossier `website/`

### 2. Mettre à jour le dossier de déploiement

```bash
cd /Users/amadougeoffroy/PROJETS/questions/website

# Option A : Utiliser le script automatique
./update-deploy.sh

# Option B : Copier manuellement
cp -r *.html deploy-lws/
cp -r css deploy-lws/
cp -r js deploy-lws/
cp -r images deploy-lws/
```

### 3. Commiter et pousser

```bash
# Voir les modifications
git status

# Ajouter les fichiers modifiés
git add .

# Créer un commit avec un message descriptif
git commit -m "Mise à jour de la page d'accueil"

# Pousser vers GitHub
git push origin main
```

### 4. Le déploiement se lance automatiquement ! 🎉

GitHub Actions va :
- ✅ Détecter votre push
- ✅ Se connecter à votre serveur FTP
- ✅ Uploader les fichiers de `deploy-lws/`
- ✅ Votre site est mis à jour !

⏱️ **Durée** : 1-3 minutes

---

## 📊 Suivre le Déploiement

### Voir l'état du déploiement

1. Allez sur votre repository GitHub
2. Cliquez sur l'onglet `Actions` (en haut)
3. Vous verrez la liste de tous les déploiements
4. Le dernier en cours apparaît avec un cercle jaune 🟡
5. Une fois terminé :
   - ✅ Coche verte = Succès
   - ❌ Croix rouge = Échec

### Voir les détails d'un déploiement

1. Cliquez sur un déploiement dans la liste
2. Cliquez sur le job "📦 Déployer sur serveur LWS"
3. Vous verrez tous les logs détaillés
4. En cas d'erreur, vous verrez exactement où ça a planté

---

## 🔧 Déploiement Manuel (Optionnel)

Vous pouvez aussi déclencher un déploiement manuellement sans faire de commit :

1. Allez sur GitHub > Onglet `Actions`
2. Cliquez sur "🚀 Déploiement FTP WindsIT" dans la liste de gauche
3. Cliquez sur le bouton `Run workflow` (à droite)
4. Sélectionnez la branche `main`
5. Cliquez sur `Run workflow` (vert)

Le déploiement se lance immédiatement !

---

## 📁 Structure du Projet

```
website/
├── .github/
│   ├── workflows/
│   │   └── deploy-ftp.yml          ← Configuration GitHub Actions
│   └── CONFIGURATION-SECRETS.md    ← Guide des secrets
│
├── deploy-lws/                     ← Dossier déployé sur le serveur
│   ├── index.html
│   ├── about.html
│   ├── services.html
│   ├── realisations.html
│   ├── contact.html
│   ├── carrieres.html
│   ├── blog.html
│   ├── faq.html
│   ├── .htaccess                   ← Config Apache
│   ├── README.md
│   ├── INSTRUCTIONS-DEPLOIEMENT.txt
│   ├── css/
│   ├── js/
│   ├── images/
│   └── fonts/
│
├── css/                            ← Fichiers sources (à modifier)
├── js/
├── images/
├── fonts/
├── *.html                          ← Pages sources (à modifier)
├── .gitignore
├── update-deploy.sh                ← Script de mise à jour
└── GUIDE-DEPLOIEMENT-AUTO.md       ← Ce fichier
```

---

## 🎬 Workflow Complet - Exemple

Imaginons que vous voulez modifier la page "À propos" :

```bash
# 1. Éditer le fichier
# Ouvrez about.html dans votre éditeur et faites vos modifications

# 2. Mettre à jour deploy-lws
cd /Users/amadougeoffroy/PROJETS/questions/website
./update-deploy.sh

# 3. Voir ce qui a changé
git status
git diff

# 4. Commiter
git add .
git commit -m "Mise à jour de la page À propos - Ajout nouvelle section équipe"

# 5. Pousser
git push origin main

# 6. Attendre 2-3 minutes

# 7. Vérifier sur https://windsit-digital.com
# Votre site est à jour ! 🎉
```

---

## 🐛 Dépannage

### Le déploiement échoue avec "Login failed"

**Cause** : Identifiants FTP incorrects

**Solution** :
1. Vérifiez les secrets sur GitHub (Settings > Secrets)
2. Vérifiez que les identifiants FTP sont corrects
3. Testez la connexion FTP manuellement avec FileZilla

### Le déploiement échoue avec "Connection timeout"

**Cause** : Serveur FTP inaccessible

**Solution** :
1. Vérifiez que le serveur `ftp.etoilesbrillantes.com` est accessible
2. Vérifiez le port (21)
3. Contactez le support LWS si le problème persiste

### Les fichiers ne sont pas à la bonne place sur le serveur

**Cause** : Mauvaise configuration du `server-dir`

**Solution** :
1. Vérifiez dans `.github/workflows/deploy-ftp.yml`
2. Le paramètre `server-dir` devrait être `./` pour la racine
3. Si votre serveur utilise `/www/`, changez en `./www/`

### Le site ne se met pas à jour après un déploiement réussi

**Cause** : Cache du navigateur

**Solution** :
1. Videz le cache de votre navigateur (Ctrl+F5 ou Cmd+Shift+R)
2. Essayez en navigation privée
3. Attendez 2-3 minutes (propagation CDN si applicable)

### GitHub Actions ne se déclenche pas

**Cause** : Workflow mal configuré ou branche incorrecte

**Solution** :
1. Vérifiez que vous êtes sur la branche `main`
2. Vérifiez que le fichier `.github/workflows/deploy-ftp.yml` existe
3. Vérifiez la syntaxe YAML (pas d'erreurs d'indentation)

---

## 🔐 Sécurité

### ✅ Bonnes Pratiques

- **NE JAMAIS** commiter les identifiants FTP dans le code
- **TOUJOURS** utiliser les secrets GitHub
- **CHANGER** régulièrement le mot de passe FTP
- **UTILISER** HTTPS pour le site (SSL activé sur LWS)
- **GARDER** le repository privé si possible

### ⚠️ Les secrets sont sécurisés

- Chiffrés par GitHub
- Jamais affichés dans les logs
- Accessibles uniquement pendant l'exécution du workflow
- Ne peuvent pas être relus après création

---

## 📈 Améliorations Futures (Optionnel)

### Ajouter des environnements (Staging + Production)

```yaml
# .github/workflows/deploy-staging.yml (environnement de test)
# .github/workflows/deploy-production.yml (environnement production)
```

### Ajouter des notifications

```yaml
# Slack, Discord, Email pour être notifié des déploiements
```

### Ajouter des tests avant déploiement

```yaml
# Tests HTML, CSS, JS
# Validation des liens
# Optimisation des images
```

---

## 📞 Support & Ressources

### Documentation

- **GitHub Actions** : https://docs.github.com/actions
- **FTP Deploy Action** : https://github.com/SamKirkland/FTP-Deploy-Action
- **LWS Support** : https://www.lws.fr/support.php

### Contact

- **Support LWS** : support@lws.fr ou 01 77 62 30 03
- **GitHub Support** : https://support.github.com

### Fichiers utiles dans ce projet

- `.github/CONFIGURATION-SECRETS.md` - Guide détaillé des secrets
- `deploy-lws/README.md` - Documentation du dossier de déploiement
- `deploy-lws/INSTRUCTIONS-DEPLOIEMENT.txt` - Guide FTP manuel
- `update-deploy.sh` - Script de mise à jour automatique

---

## ✅ Checklist de Configuration

Cochez au fur et à mesure :

### Configuration Initiale (une seule fois)
- [ ] Git initialisé localement
- [ ] Repository créé sur GitHub
- [ ] Code poussé sur GitHub
- [ ] Secret FTP_SERVER ajouté
- [ ] Secret FTP_USERNAME ajouté
- [ ] Secret FTP_PASSWORD ajouté
- [ ] Secret FTP_PORT ajouté
- [ ] Premier déploiement testé
- [ ] Site accessible sur windsit-digital.com

### Workflow Quotidien
- [ ] Modifications faites dans `website/`
- [ ] `./update-deploy.sh` exécuté
- [ ] Modifications commitées
- [ ] Code poussé sur GitHub
- [ ] Déploiement vérifié dans Actions
- [ ] Site vérifié en ligne

---

## 🎉 Félicitations !

Votre site WindsIT est maintenant configuré pour un déploiement automatique professionnel !

**Un simple `git push` et votre site est en ligne.** C'est aussi simple que ça ! 🚀

---

**Créé le** : 19 novembre 2025  
**Pour** : Site WindsIT  
**Serveur** : LWS (ftp.etoilesbrillantes.com)  
**URL** : https://windsit-digital.com  
**Status** : ✅ Configuration terminée

