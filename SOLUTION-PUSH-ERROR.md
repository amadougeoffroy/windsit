# 🔧 Solution : Erreur de Push GitHub

## ❌ Erreur rencontrée

```
! [remote rejected] main -> main (push declined due to repository rule violations)
error: failed to push some refs to 'https://github.com/amadougeoffroy/windsit.git'
```

## 🔍 Cause

Votre repository GitHub a des **règles de protection de branche** activées sur `main`.

## ✅ Solution 1 : Désactiver les règles de protection (Recommandé)

### Étapes sur GitHub :

1. Allez sur votre repository : https://github.com/amadougeoffroy/windsit
2. Cliquez sur `Settings` (en haut à droite)
3. Dans le menu de gauche : `Rules` > `Rulesets`
4. Vous verrez une ou plusieurs règles actives
5. Cliquez sur la règle qui protège la branche `main`
6. Soit :
   - **Option A** : Cliquez sur `Disable ruleset` (désactiver temporairement)
   - **Option B** : Cliquez sur `Edit` puis ajoutez votre compte dans les "Bypass list" (exceptions)
7. Sauvegardez

### Ensuite, réessayez le push :

```bash
cd /Users/amadougeoffroy/PROJETS/questions/website
git push origin main
```

## ✅ Solution 2 : Utiliser une branche de développement

Si vous voulez garder les protections :

```bash
cd /Users/amadougeoffroy/PROJETS/questions/website

# Créer et basculer sur une branche dev
git checkout -b dev

# Pousser la branche dev
git push origin dev

# Sur GitHub, faire une Pull Request de dev vers main
```

## ✅ Solution 3 : Forcer le push (Si vous êtes admin)

⚠️ **À utiliser avec précaution** :

```bash
# Sur GitHub : Settings > Rules > Désactiver temporairement
# Puis :
cd /Users/amadougeoffroy/PROJETS/questions/website
git push origin main
```

## 🎯 Recommandation

Pour un projet comme le vôtre (site web personnel/entreprise), la **Solution 1** est la meilleure :
- Désactivez les rulesets ou ajoutez-vous aux exceptions
- Cela vous permettra de push directement
- Le déploiement automatique fonctionnera sans friction

## 📝 Pour vérifier les règles actives

1. GitHub > Votre repo > Settings
2. Rules > Rulesets
3. Vous verrez toutes les règles et leur statut (Active/Disabled)

---

**Une fois résolu, le push fonctionnera et le déploiement automatique se lancera ! 🚀**

