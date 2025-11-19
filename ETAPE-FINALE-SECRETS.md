# 🔐 ÉTAPE FINALE : Configurer les Secrets GitHub

## ✅ Ce qui est fait

- ✅ Code poussé sur GitHub
- ✅ GitHub Actions configuré
- ✅ Dossier deploy-lws prêt

## ⚠️ CE QU'IL RESTE À FAIRE (5 minutes)

### 🎯 Configurer les 4 secrets FTP

Pour que le déploiement automatique fonctionne, vous devez ajouter vos identifiants FTP dans les secrets GitHub.

### 📝 Étapes détaillées

#### 1. Aller sur votre repository GitHub

👉 https://github.com/amadougeoffroy/windsit

#### 2. Cliquer sur "Settings" (en haut à droite)

#### 3. Dans le menu de gauche :
- Cliquer sur **"Secrets and variables"**
- Puis sur **"Actions"**

#### 4. Cliquer sur **"New repository secret"** (bouton vert)

#### 5. Ajouter les 4 secrets suivants

---

### ✅ SECRET 1 : FTP_SERVER

```
Name: FTP_SERVER
Secret: ftp.etoilesbrillantes.com
```

Cliquez sur **"Add secret"**

---

### ✅ SECRET 2 : FTP_USERNAME

```
Name: FTP_USERNAME
Secret: windsit@windsit-digital.com
```

Cliquez sur **"Add secret"**

---

### ✅ SECRET 3 : FTP_PASSWORD

```
Name: FTP_PASSWORD
Secret: P@ssword@1234
```

Cliquez sur **"Add secret"**

---

### ✅ SECRET 4 : FTP_PORT

```
Name: FTP_PORT
Secret: 21
```

Cliquez sur **"Add secret"**

---

## 🔍 Vérification

Une fois les 4 secrets ajoutés, vous devriez voir dans :
**Settings > Secrets and variables > Actions**

```
Repository secrets
------------------
FTP_SERVER         Updated now
FTP_USERNAME       Updated now  
FTP_PASSWORD       Updated now
FTP_PORT           Updated now
```

---

## 🚀 Tester le Déploiement Automatique

### Option 1 : Déclencher manuellement

1. Allez sur votre repo GitHub
2. Cliquez sur l'onglet **"Actions"**
3. Dans la liste de gauche, cliquez sur **"🚀 Déploiement FTP WindsIT"**
4. Cliquez sur le bouton **"Run workflow"** (à droite)
5. Sélectionnez la branche **"main"**
6. Cliquez sur **"Run workflow"** (vert)

**Le déploiement se lance ! ⏱️ Durée : 1-2 minutes**

Vous verrez :
- 🟡 Cercle jaune = En cours
- ✅ Coche verte = Succès
- ❌ Croix rouge = Échec

### Option 2 : Faire un petit changement

```bash
# Dans votre terminal
cd /Users/amadougeoffroy/PROJETS/questions/website

# Faire une petite modification
echo "<!-- Déployé automatiquement -->" >> deploy-lws/index.html

# Commiter et pousser
git add .
git commit -m "Test déploiement automatique"
git push origin main

# Le déploiement se lance automatiquement !
```

---

## 📊 Suivre le Déploiement

1. Allez sur **GitHub > Actions**
2. Vous verrez le déploiement en cours
3. Cliquez dessus pour voir les détails et logs
4. Une fois terminé avec ✅, votre site est à jour !

---

## 🌐 Vérifier le Site en Ligne

Une fois le déploiement terminé (✅), allez sur :

👉 https://windsit-digital.com

Vérifiez que :
- ✅ Site accessible
- ✅ Toutes les pages fonctionnent
- ✅ Images s'affichent
- ✅ Modal des projets fonctionne
- ✅ Formulaire de contact visible
- ✅ Traductions fonctionnent

---

## 🎊 C'EST FAIT !

Une fois les secrets configurés et le premier déploiement réussi :

**Workflow futur = Ultra simple !**

1. Modifier vos fichiers localement
2. `git add .`
3. `git commit -m "Vos modifications"`
4. `git push origin main`
5. Le site se déploie automatiquement ! 🚀

---

## ❓ En cas de problème

### Le déploiement échoue avec "Login failed"

→ Vérifiez que les 4 secrets sont bien configurés avec les bonnes valeurs

### Le déploiement échoue avec "Connection timeout"

→ Vérifiez que le serveur FTP est accessible
→ Contactez le support LWS si nécessaire

### Les fichiers ne sont pas au bon endroit

→ Vérifiez le paramètre `server-dir` dans `.github/workflows/deploy-ftp.yml`
→ Il devrait être `./` pour la racine

---

## 📞 Support

- **Documentation complète** : Lisez `GUIDE-DEPLOIEMENT-AUTO.md`
- **Support LWS** : support@lws.fr ou 01 77 62 30 03
- **GitHub Actions** : https://docs.github.com/actions

---

**Date** : 19 novembre 2025  
**Repository** : https://github.com/amadougeoffroy/windsit  
**Site** : https://windsit-digital.com

✅ **Presque terminé ! Ajoutez les 4 secrets et c'est parti ! 🚀**

