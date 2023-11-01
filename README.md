## Side: Tactical RPG dans un browser


Il faut commencer par identifier le ou les objectifs que l'utilisateur (acteur/utilisateur) souhaite atteindre et, ensuite, remonter à l'interaction entre l'utilisateur et le programme, qui leur permet d'atteindre cet objectif. 

### Étape 0 : Identifiez les interactions par les cas d’utilisation (Uses cases)

- Gagner une partie du jeu

### Étape 1 : Identifiez les interactions par les cas d’utilisation (Uses cases)

- Se déplacer sur la carte 
    - Un joueur peut déplacer son personnage sur la carte du jeu.
    - Le joueur peut sélectionner une case et déplacer son personnage vers cette case.

- Engager un Combat :
    - Un joueur peut engager un combat avec un ennemi sur la carte.
    - Le joueur peut choisir les actions de son personnage pendant le combat, comme attaquer, utiliser des compétences ou se défendre.


### Étape 2 : Identification des différents métiers/domaines AKA Bounded Contexts 

ENTITY : object qui a une identité et une continuité dans le temps
VALUE OBJECT : Pas d'identité, Egalité par valeur, Immuable (constructeur paramétré, factory method), Side-Effect-free, peut etre partagé par des entités

Des entités telles que "Personnage", "Compétence"
Des valeurs d'objet comme "Position", "Points de Vie", "Dégâts"