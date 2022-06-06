<?php

/**
 * === Capacité terminale ===
 *
 * Todo : Créez un script de traitement du formulaire de mise à jour (view/update.php)
 * Seuls les utilisateurs connectés peuvent mettre à jour leur profil
 * L'email devra être un email valide
 * Le mot de passe devra contenir au moins 12 caractères
 * La photo, si elle est définie, sera un fichier de maximum 2Mo au format jpg ou png. Le fichier sera enregistré dans le dossier image/photo/<id> où <id> sera l'identifiant de l'utilisateur. Le lien de l'image sera stocké dans le champ <image> de la table <user>.
 * Si une photo existe déjà pour cet utilisateur, l'ancien fichier sera supprimé sur le serveur.
 * Si un paramètre est manquant ou erroné, redirigez l'utilisateur vers la page de profil en affichant le message "Paramètre manquant ou erroné, veuillez recommencer"
 * Si la mise à jour échoue, redirigez l'utilisateur vers la page de profil en affichant le message "Echec de la mise à jour"
 *
 *  Estimation : +/-60min
 */
