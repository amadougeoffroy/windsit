# 📦 Dossier de Déploiement WindsIT

Ce dossier contient tous les fichiers prêts à être déployés sur le serveur de production.

## 🚀 Déploiement

### Méthode 1 : Déploiement automatique (Recommandé)

Le déploiement automatique via GitHub Actions est configuré.

**Prérequis** : Configurer les secrets GitHub (voir `.github/CONFIGURATION-SECRETS.md`)

```bash
# Faire vos modifications dans les fichiers du site
# Copier les fichiers modifiés dans deploy-lws/

# Commiter et pusher
git add .
git commit -m "Mise à jour du site"
git push origin main

# ✅ Le déploiement se lance automatiquement !
```

### Méthode 2 : Déploiement manuel FTP

**Prérequis** : FileZilla ou autre client FTP

1. Ouvrir FileZilla
2. Se connecter :
   - Hôte : ftp.etoilesbrillantes.com
   - Utilisateur : windsit@windsit-digital.com
   - Port : 21
3. Uploader tous les fichiers de `deploy-lws/` vers la racine du serveur (`/` ou `/www/`)

## 📁 Contenu

Ce dossier contient :

- ✅ Toutes les pages HTML
- ✅ Dossiers CSS, JS, Images, Fonts
- ✅ Fichier .htaccess (configuration Apache)
- ✅ Ce fichier README

## ⚠️ Important

- **Ne modifiez pas** directement les fichiers dans ce dossier
- **Modifiez** les fichiers à la racine de `website/`
- **Copiez** ensuite dans `deploy-lws/` avant de déployer

## 🔄 Mise à jour du dossier

Pour mettre à jour ce dossier avec les dernières modifications :

```bash
# Depuis le dossier website/
cd /Users/amadougeoffroy/PROJETS/questions/website

# Copier les fichiers modifiés
cp -r *.html deploy-lws/
cp -r css deploy-lws/
cp -r js deploy-lws/
cp -r images deploy-lws/
cp -r fonts deploy-lws/ 2>/dev/null || true

# Commit
git add deploy-lws/
git commit -m "Mise à jour déploiement"
git push origin main
```

## 📊 Structure

```
deploy-lws/
├── index.html              # Page d'accueil
├── about.html              # À propos
├── services.html           # Services
├── realisations.html       # Portfolio
├── contact.html            # Contact
├── carrieres.html          # Carrières
├── blog.html               # Blog
├── faq.html                # FAQ
├── .htaccess               # Configuration Apache
├── README.md               # Ce fichier
├── INSTRUCTIONS-DEPLOIEMENT.txt  # Guide détaillé
├── css/                    # Styles
├── js/                     # Scripts JavaScript
├── images/                 # Images et assets
└── fonts/                  # Polices (si présentes)
```

## 🌐 Serveur de production

- **URL** : https://windsit-digital.com
- **Serveur** : LWS (ftp.etoilesbrillantes.com)
- **Déploiement** : Automatique via GitHub Actions

## 📝 Checklist avant déploiement

- [ ] Tous les fichiers sont à jour
- [ ] Les images sont optimisées
- [ ] Le formulaire Brevo est configuré
- [ ] Les traductions fonctionnent
- [ ] Test local effectué
- [ ] Pas d'erreurs JavaScript dans la console

## 🔧 Dépannage

### Le site ne s'affiche pas après déploiement

1. Vérifier que `index.html` est à la racine
2. Vider le cache du navigateur (Ctrl+F5)
3. Attendre 2-3 minutes (propagation)
4. Vérifier les logs GitHub Actions

### Les images ne s'affichent pas

1. Vérifier que le dossier `images/` a été uploadé
2. Vérifier les chemins dans le HTML (relatifs, pas absolus)
3. Vérifier les permissions (755 pour dossiers, 644 pour fichiers)

### Erreur 500 ou page blanche

1. Vérifier le fichier `.htaccess`
2. Consulter les logs d'erreur sur le serveur LWS
3. Désactiver temporairement le .htaccess pour tester

## 📞 Support

- **GitHub Actions** : Voir l'onglet Actions sur GitHub
- **Serveur LWS** : support@lws.fr ou 01 77 62 30 03
- **Documentation** : `.github/CONFIGURATION-SECRETS.md`

---

**Dernière mise à jour** : 19 novembre 2025  
**Version** : 1.0.0  
**Status** : ✅ Prêt pour la production

