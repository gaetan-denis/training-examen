<?php

/**
 * === Capacité terminale ===
 *
 * Todo : Créez un script de traitement du formulaire de login (view/login.php)
 * L'identifiant et le mot de passe du formulaire doivent correspondre à un identifiant et un mot de passe d'utilisateur valide en base de données (table <user>), validant la connexion
 * Si un paramètre est manquant ou si l'identification échoue, affichez le message suivant : "Echec à l'authentification, veuillez recommencer", ainsi qu'un lien HTML permettant de revenir au formulaire de login
 * Si la connexion est validée, la date de la dernière connexion <lastlogin> de l'utilisateur sera mise à jour avec la date et l'heure courante, et l'utilisateur sera connecté (session), lui donnant accès aux pages réservées de l'app.
 *
 *  Estimation : +/-30min
 *
 * === BONUS (degré de maîtrise) ===
 *
 * L'utilisateur sera redirigé vers la page de profil en cas de succès à la connexion avec le message "Bienvenue <login>", sinon vers le formulaire de login avec le message d'échec précisé plus haut.
 *
 */

if (!empty($_POST['login']) && !empty($_POST['pwd'])) {

    $connection = connection();
    $request = $connection->prepare('SELECT * FROM user WHERE login = ?');
    $request->execute([$_POST['login']]);
    $user = $request->fetchObject();
    if (password_verify($_POST['pwd'], $user->pwd)) {
        $update = $connection->prepare('UPDATE user SET lastlogin = NOW() WHERE id = ?');
        $update->execute([$user->id]);
        $_SESSION['userid'] = $user->id;
        header('Location: index.php');
        $_SESSION['alert'] = 'Utilisateur ' . $_POST['login']  . ' connecté avec succès';
        $_SESSION['alert_level'] = 'success';
    } else {
        echo "Paramètres invalides!";
    }
}
