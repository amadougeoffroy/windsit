# 🔧 Correction du problème d'envoi d'emails Brevo

## 🚨 Problème identifié

L'API Brevo retourne l'erreur suivante :
```
HTTP 401 - "We have detected you are using an unrecognised IP address 160.120.175.94"
```

Cela signifie que l'adresse IP actuelle n'est pas autorisée à utiliser votre clé API.

## ✅ Solution : Autoriser l'adresse IP dans Brevo

### Option 1 : Autoriser l'IP actuelle (Recommandé pour la production)

1. **Connectez-vous à votre compte Brevo** : https://app.brevo.com
2. **Allez dans Sécurité** : https://app.brevo.com/security/authorised_ips
3. **Ajoutez l'adresse IP** : `160.120.175.94`
4. **Sauvegardez les modifications**
5. **Testez à nouveau l'envoi** avec la commande :
   ```bash
   php test-brevo.php
   ```

### Option 2 : Désactiver la restriction IP (Recommandé pour le développement)

Si vous testez depuis différents endroits (maison, bureau, café, etc.), il est plus pratique de désactiver temporairement la restriction IP :

1. **Connectez-vous à Brevo** : https://app.brevo.com
2. **Allez dans Sécurité** : https://app.brevo.com/security/authorised_ips
3. **Désactivez la restriction IP** ou ajoutez `0.0.0.0/0` (autorise toutes les IP)
   - ⚠️ **Attention** : Cela rend votre clé API accessible depuis n'importe quelle IP
   - Utilisez cette option uniquement pour le développement
   - Réactivez la restriction en production

### Option 3 : Créer une nouvelle clé API sans restriction

1. **Connectez-vous à Brevo** : https://app.brevo.com
2. **Allez dans SMTP & API** : https://app.brevo.com/settings/keys/api
3. **Créez une nouvelle clé API** sans restriction IP
4. **Copiez la nouvelle clé** et remplacez-la dans `config.php`

## 🧪 Vérifier que tout fonctionne

Après avoir autorisé l'IP, lancez le test :

```bash
cd /Users/amadougeoffroy/PROJETS/questions/website
php test-brevo.php
```

Vous devriez voir :
```
✅ SUCCESS! Email envoyé avec succès
```

Puis testez depuis le site web :
1. Ouvrez http://localhost:8000/contact
2. Remplissez le formulaire
3. Envoyez
4. Vérifiez votre boîte email (amadougeoffroy@gmail.com)

## 📧 Vérifier votre adresse email d'expéditeur

**Important** : Pour que les emails soient bien délivrés, vous devez vérifier votre domaine d'expéditeur dans Brevo.

Actuellement, vous utilisez `amadougeoffroy@gmail.com` comme expéditeur. Assurez-vous que cette adresse est bien vérifiée dans votre compte Brevo :

1. Allez sur : https://app.brevo.com/settings/senders/
2. Vérifiez que `amadougeoffroy@gmail.com` est dans la liste des expéditeurs vérifiés
3. Si ce n'est pas le cas, ajoutez-la et confirmez la vérification

## 🔄 Après la correction

Une fois l'IP autorisée ou la restriction désactivée :

1. **Testez l'API** :
   ```bash
   php test-brevo.php
   ```

2. **Testez le formulaire de contact** :
   - Ouvrez http://localhost:8000/contact
   - Remplissez et envoyez le formulaire
   - Vérifiez votre email

3. **Testez le formulaire de candidature** :
   - Ouvrez http://localhost:8000/carrieres
   - Remplissez et envoyez le formulaire
   - Vérifiez votre email

## 📝 Notes importantes

- **En production** : Autorisez uniquement les IP de votre serveur de production
- **En développement** : Vous pouvez désactiver la restriction ou autoriser votre IP actuelle
- **Spam** : Vérifiez aussi votre dossier SPAM/Indésirables si vous ne recevez pas l'email

## 🆘 Si le problème persiste

1. Vérifiez les logs du serveur :
   ```bash
   tail -f server.log
   ```

2. Testez manuellement l'API avec le script de test :
   ```bash
   php test-brevo.php
   ```

3. Vérifiez que la clé API est correcte dans `config.php`

4. Vérifiez que votre compte Brevo est actif et que vous n'avez pas dépassé les limites d'envoi

