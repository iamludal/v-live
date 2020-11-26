

# 📸 Aperçu du site

![Page principale](https://i.imgur.com/kSBpZob.jpg)

![Recherche de stations](https://i.imgur.com/zLW8sgg.png)


# ℹ️ Détails

## ✅ Ce qui a été traité

Le sujet a été traité dans son intégralité.


## ❌ Ce qui n'a pas été traité 

N/A


## 🤔 Limites du projet

- Pas d'affichage des stations dans un rayon de `x` kilomètres
*(selon une adresse fournie ou à partir de la géolocalisation de l'utilisateur)*

- Pas de gestion de favoris: l'utilisateur pourrait choisir certaines
stations qu'il utilise le plus souvent.

- Pas d'affichage du chemin pour aller de l'endroit actuel jusqu'à la
station sélectionnée *(à l'instar des GPS)*.


## 🔧 Difficultés rencontrées

- gestion des icônes *(d'abord avec une libraire JS externe,
  que nous avons dû abandonner en raison des consignes du projet)*
     * **Résolution:** utilisation du fichier css fourni par cette
        même librairie *(il n'y a donc plus de JS à proprement parler)*

- garder le tri sélectionné lorsque l'utilisateur effectue une
  nouvelle recherche, et vice versa *(garder les paramètres actuels
  lorsque l'utilisateur change la méthode de tri)*.
     * **Résolution:** inputs de type `hidden` qui stockent les
     paramètres actuels

- garder les paramètres sélectionnés par l'utilisateur lorsqu'il change
  la méthode tri sur la liste des stations
     * **Résolution:** même résolution que pour le problème précédent.


