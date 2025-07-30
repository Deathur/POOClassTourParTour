# POOClassTourParTour

**Mini Jeu de Combat Tour par Tour en PHP**
Vous allez créer un **petit jeu de combat au tour par tour** en **PHP**, en utilisant la **programmation orientée objet**.

Le jeu opposera deux personnages. Le joueur choisit un personnage (parmi Guerrier, Voleur ou Magicien), et affronte un adversaire choisi automatiquement. Le combat se déroule tour par tour, jusqu'à ce qu'un des deux personnages perde tous ses points de vie.

---

## Les Personnages
Vous devez créer une classe parente Personnage, et trois classes filles qui en héritent.

## Classe Personnage (classe parente)
Propriétés :
* Nom
* Vie
* Force
* Méthodes :
    * attaquer(Personnage $adversaire)
    * recevoirDegats(int $degats)
    * afficherEtat()
---

## Les Classes Filles
Chaque classe hérite de Personnage et peut redéfinir ou compléter certaines méthodes.

### Classe Guerrier
Valeurs par défaut :
* Vie : 120
* Force : 15
* Particularité : dégâts constants, bonne résistance.

### Classe Voleur
Valeurs par défaut :
* Vie : 100
* Force : 12
* Particularité : a une chance (30%) d’esquiver une attaque (aucun dégât subi).

### Classe Magicien
Valeurs par défaut :
* Vie : 90
* Force : 8
* Particularité : a une chance (50%) de lancer un sort spécial qui double les dégâts infligés.
---

## Déroulement du combat
1. Le joueur choisit un personnage parmi Guerrier, Voleur ou Magicien (en dur dans le code pour simplifier).
2. L’adversaire est généré automatiquement avec une autre classe.
3. À chaque tour :
Le joueur attaque l’adversaire.
Puis l’adversaire attaque le joueur.
Affichez les points de vie restants.
4. Le jeu continue jusqu’à ce qu’un des deux ait vie <= 0.
5. Affichez le nom du gagnant.