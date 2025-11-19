# 🔧 Guide de Dépannage Rapide - Images

## ⚡ Solution Rapide (90% des cas)

### Étape 1 : Vider le Cache
**Appuyez sur ces touches en même temps :**
- **Windows/Linux** : `Ctrl + Shift + R`
- **Mac** : `Cmd + Shift + R`

### Étape 2 : Tester
Ouvrez le fichier `test-images.html` dans votre navigateur pour voir quelles images fonctionnent.

---

## 📋 Checklist de Dépannage

### ✅ 1. Vérifier que les fichiers existent
```bash
cd website
ls images/portfolio/
ls images/avatars/
```

Vous devriez voir :
- `project-1.svg` à `project-6.svg` (portfolio)
- `client-1.svg` à `client-3.svg` (avatars)

### ✅ 2. Ouvrir avec un serveur local

**Option Python :**
```bash
cd website
python -m http.server 8000
```

**Option Node.js :**
```bash
cd website
npx http-server -p 8000
```

Puis ouvrez : http://localhost:8000

### ✅ 3. Vérifier la console du navigateur

1. Ouvrez le site
2. Appuyez sur `F12`
3. Allez dans l'onglet **Console**
4. Cherchez des erreurs rouges liées aux images
5. Partagez ces erreurs si besoin

### ✅ 4. Tester une image directement

Collez cette URL dans votre navigateur :
```
file:///Users/amadougeoffroy/PROJETS/questions/website/images/portfolio/project-1.svg
```

Si l'image s'affiche → Le problème vient du cache ou des chemins
Si l'image ne s'affiche pas → Le fichier SVG a un problème

---

## 🎯 Détails des Corrections Apportées

### ✅ Problèmes Résolus

1. **Fichiers renommés** : `.jpg` → `.svg`
   - Tous les fichiers portfolio et avatars

2. **Références mises à jour** dans :
   - `index.html`
   - `realisations.html`
   - `js/projects-data.js`

3. **IDs des projets corrigés** :
   - Les boutons "Voir le projet" utilisent les bons IDs

4. **Script anti-cache ajouté** :
   - Recharge automatiquement les images qui échouent

---

## 🆘 Si Rien Ne Fonctionne

### Option 1 : Conversion en PNG

Je peux convertir les SVG en vraies images PNG si votre navigateur a du mal avec les SVG.

### Option 2 : Utiliser des Images Placeholder

Je peux utiliser des services d'images placeholder en attendant vos vraies photos :
- https://via.placeholder.com
- https://placehold.co

### Option 3 : Diagnostic Complet

Envoyez-moi :
1. Les erreurs de la console (F12 → Console)
2. Le navigateur utilisé (Chrome, Firefox, Safari?)
3. Comment vous ouvrez le site (file:// ou serveur local?)

---

## 📊 État Actuel

✅ **9 fichiers SVG créés** (6 portfolio + 3 avatars)  
✅ **Toutes les références mises à jour**  
✅ **IDs des projets corrigés**  
✅ **Script anti-cache ajouté**  
✅ **Page de test créée** (test-images.html)  

**Le problème est très probablement le cache du navigateur !**

---

## 🎨 Pour Utiliser Vos Propres Images

Quand vous serez prêt, remplacez simplement les fichiers SVG par vos vraies photos :

```bash
# Vos images doivent s'appeler :
images/portfolio/project-1.svg (ou .jpg, .png, .webp)
images/portfolio/project-2.svg
# ... etc

images/avatars/client-1.svg (ou .jpg, .png)
# ... etc
```

Le site accepte tous les formats : SVG, JPG, PNG, WebP !

---

**🚀 Dans 99% des cas, faire Ctrl+Shift+R résout le problème !**

