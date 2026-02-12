BASE: mysql
GAL:
-Import du template FLIGHT 
-Modele template (olona 1)
-Creation des bases de donnees

Refactorisation
-Modele
-Connexion bases
refactorisation
    app
        config
            config.php: 
                database(77)
            routes.php

        controllers
            a creer
        models
            a creer
        views
            pages rehetra fa ampidirina tsikelikely
            (mandeha daholo)


Conception base(Nampoina)
Template(Anjara)
- image de bases
Refactorisation(Jo) 

login & inscription => users
-Admin
-Users



IMPORTANT
    - ajout photos multiples (insert/update objet)
    - nom des table + "takalo"

BACKOFFICE
    login Admin
        - formulaire de connexion
        - nom par defaut (admin)

    gestion categories 
        base
            - creation table categorie
        fonction
            - creation modele 
            - crud
        design
            - design crud
                - ajout categorie
                - lister
                - supp
                - update
        integration
            - creation categorie controller


    # 2

    STATISTIQUES
        fonction
            - recup nombre d'utilisateurs 
            - recup nombre d'echanges effectues (objet_historique)
        design
        integration

FRONTOFFICE
        base
            - table user 
    login user
        - formulaire
        - verification php + js
        fonction
            - verify user 
            - redirect = home.html
    sign up
        - formulaire
        - verification php + js
        fonction
            - verify user (role admin)
            - redirect = dashboard.html

    PROFILE.HTML
        base 
            - creation table objet
        fonction
            - model
            - crud complet
            - get mes objets (where owner c moi)
        design
            - formulaire ajout 
                - ajouter photos 
            - lister objet 
        integration

    HOME.HTML
        base 
            - creation table echange
        fonction
            - get objets pas a moi
            - recup liste categories
            - envoi proposition echange 
        design
            - fiche objet 
            - bouton pour proposer echange
        integration
            - boucler pour afficher 

    PROPOSITION.HTML
        base
        fonction
            - get demandes POUR moi
            - get demandes PAR moi
        design
            - lien pour voir mes propositions
            - lister les propositions des autres
            - lister les propositions de moi
            - bouton accepter/ refuser proposition
        integration



    # 2

    HOME.HTML
        barre de recherches 
            base
            fonction
                - where nom = like % and categorie = ?
            design
                - input mot complet
                - dropdown categorie
                - bouton rechercher
            integration

    SHOP.HTML
        historique d appartenance
            base
            fonction
            design
                -liste des proprio
                - date + heure d echange 
            integration



BASE: mysql
TABLE:
    users(id, pseudo, email, pswd)
    admin(id, pseudo, email, pswd)
    categories(id_cat, nom_cat) # categories des produits
    objet(id, nom_obj, cat, description, id_proprietaire, prix_estimatif)
    photos_objets(src, id_obj)
    echange(id, id_obj, id_old, id_new, date_demande, date_echange) 

    

Affichage:
login User simple
login User admin

