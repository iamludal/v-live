# URL DU PROJET

[http://webtp.fil.univ-lille1.fr/~chombeau/Projet-1/]()


# CE QUI A ÉTÉ TRAITÉ

Le sujet a été traité dans son intégralité.


# CE QUI N'A PAS ÉTÉ TRAITÉ

N/A


# LIMITATIONS DU PROJET

- Affichage des stations dans un rayon de x kilomètres (selon une 
adresse fournie ou la géolocalisation de l'utilisateur)

- Gestion de favoris: l'utilisateur pourrait choisir certaines
stations qui apparaitraient dans une liste de favoris.

- Afficher la chemin pour aller de l'endroit actuel jusqu'à la
station sélectionnée (à l'instar des GPS)


# DIFFICULTÉS RENCONTRÉES

- gestion des icônes (d'abord avec une libraire JS externe,
  que nous avons dû abandonner en raison des consignes du projet)
     * **Résolution:** utilisation du fichier css fourni par cette
        même librairie (il n'y a donc plus de JS à proprement parler)

- garder le tri sélectionné lorsque l'utilisateur effectue une
  nouvelle recherche, et vice versa (garder les paramètres actuels
  lorsque l'utilisateur change la méthode de tri).
     * **Résolution:** input de type hidden qui stockent les paramètres
        actuels

- garder les paramètres sélectionnés par l'utilisateur lorsqu'il change
  la méthode tri sur la liste des stations
     * **Résolution:** comme pour le problème précédent, ajout d'inputs
     de type hidden qui stockent les paramètres courants


