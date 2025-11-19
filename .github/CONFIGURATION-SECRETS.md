# 🔐 Configuration des Secrets GitHub

Pour que le déploiement automatique fonctionne, vous devez configurer les secrets GitHub.

## 📝 Étapes de configuration

### 1. Accéder aux Settings du repository

1. Allez sur votre repository GitHub
2. Cliquez sur `Settings` (en haut à droite)
3. Dans le menu de gauche, cliquez sur `Secrets and variables` > `Actions`
4. Cliquez sur `New repository secret`

### 2. Ajouter les secrets FTP

Ajoutez ces 4 secrets un par un :

#### Secret 1 : FTP_SERVER
```
Name: FTP_SERVER
Secret: ftp.etoilesbrillantes.com
```

#### Secret 2 : FTP_USERNAME
```
Name: FTP_USERNAME
Secret: windsit@windsit-digital.com
```

#### Secret 3 : FTP_PASSWORD
```
Name: FTP_PASSWORD
Secret: P@ssword@1234
```

#### Secret 4 : FTP_PORT
```
Name: FTP_PORT
Secret: 21
```

### 3. Vérifier les secrets

Une fois ajoutés, vous devriez voir dans `Settings` > `Secrets and variables` > `Actions` :

- ✅ FTP_SERVER
- ✅ FTP_USERNAME
- ✅ FTP_PASSWORD
- ✅ FTP_PORT

⚠️ **Note** : Les secrets sont masqués et ne peuvent pas être relus après création.

## 🚀 Utilisation

### Déploiement automatique

Le déploiement se lance automatiquement à chaque fois que vous faites un `git push` sur la branche `main` :

```bash
git add .
git commit -m "Mise à jour du site"
git push origin main
```

➡️ GitHub Actions déploiera automatiquement sur votre serveur FTP !

### Déploiement manuel

Vous pouvez aussi déclencher un déploiement manuellement :

1. Allez sur votre repository GitHub
2. Cliquez sur l'onglet `Actions`
3. Sélectionnez le workflow "🚀 Déploiement FTP WindsIT"
4. Cliquez sur `Run workflow`
5. Confirmez avec `Run workflow`

## 📊 Suivi du déploiement

Pour voir l'état du déploiement :

1. Allez sur l'onglet `Actions` de votre repository
2. Vous verrez la liste des déploiements
3. Cliquez sur un déploiement pour voir les détails et logs
4. ✅ = Succès
5. ❌ = Échec (cliquez pour voir l'erreur)

## 🔒 Sécurité

✅ **Les secrets sont sécurisés** :
- Chiffrés par GitHub
- Jamais affichés dans les logs
- Accessibles uniquement pendant l'exécution du workflow

⚠️ **Important** :
- Ne commitez JAMAIS les identifiants FTP dans le code
- Utilisez toujours les secrets GitHub
- Changez régulièrement vos mots de passe

## 🛠️ Dépannage

### Erreur "Login incorrect"
- Vérifiez que les secrets FTP_USERNAME et FTP_PASSWORD sont corrects
- Testez la connexion FTP manuellement avec FileZilla

### Erreur "Connection refused"
- Vérifiez que FTP_SERVER et FTP_PORT sont corrects
- Assurez-vous que le serveur FTP est accessible

### Erreur "Permission denied"
- Vérifiez que l'utilisateur FTP a les droits d'écriture
- Contactez le support LWS si nécessaire

### Les fichiers ne sont pas à la bonne place
- Vérifiez le paramètre `server-dir` dans le workflow
- Il devrait être `./` pour la racine

## 📞 Support

Pour toute question :
- GitHub Actions : https://docs.github.com/actions
- FTP Deploy Action : https://github.com/SamKirkland/FTP-Deploy-Action
- Support LWS : support@lws.fr

---

**Créé le** : 19 novembre 2025  
**Pour** : Site WindsIT  
**Status** : ✅ Prêt à configurer

