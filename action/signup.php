<?php

/**
 * === Capacité terminale ===
 *
 * Todo : Créez un script de traitement du formulaire d'inscription (view/signup.php)
 * L'identifiant <login>, l'email <email> le mot de passe <password> du formulaire doivent correspondre aux type de données requises en base de données (table <user>).
 * Le mot de passe doit être crypté en base de données !
 * La date de création <created> contiendra la date et l'heure de la création. La date de dernière connexion <lastlogin> restera vide. Le statut <status> sera défini à sa valeur par défaut.
 * La photo, si elle est définie, sera un fichier de maximum 2Mo au format jpg ou png. Le fichier sera enregistré dans le dossier image/photo/<id> où <id> sera l'identifiant de l'utilisateur. Le lien de l'image sera stocké dans le champ <image> de la table <user>.
 * Si un paramètre est manquant ou erroné, redirigez l'utilisateur vers le formulaire d'inscription en affichant le message "Paramètre manquant ou erroné, veuillez recommencer"
 * Si la création échoue, affichez le message suivant : "Echec à la création", ainsi qu'un lien HTML permettant de revenir au formulaire d'inscription
 *
 *  Estimation : +/-60min
 *
 */