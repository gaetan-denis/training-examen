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


$connection=connection();

if (!empty($_POST['login']) && !empty($_POST['password']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $output='';
    $login = trim($_POST['login']);
    $insert = $connection->prepare("INSERT INTO user (login, pwd, email, created) VALUES (?, ?, ?, NOW())");
    $insert->execute([$login,password_hash($_POST['password'], PASSWORD_DEFAULT), $_POST['email']]);
    if ($insert->rowcount()) {
        if ($_FILES['photo']['tmp_name'] &&
            $_FILES['photo']['name'] &&
            ($_FILES['photo']['type'] == 'image/png' || $_FILES['photo']['type'] == 'image/jpg' || $_FILES['photo']['type'] == 'image/jpeg')
        ) {
            $id = $connection->lastInsertId();
            $imagepath = str_replace('\\', '/', getcwd() . '/image/photo/' . $id); // Ouaip toute cette coke que je vais devoir te payer bordel - On m'appelle Pierrot AvecUneBarreDansLeNez
            if (!is_dir($imagepath)) {
                mkdir($imagepath, 0755, true);
            }
            $ext = pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION);
            $move = move_uploaded_file($_FILES['photo']['tmp_name'], $imagepath . '/' . $login . '.' . $ext);
            $namePicture = $login . '.' . $ext;
            if ($move) {
                $request = $connection->prepare("UPDATE user SET image = ? WHERE id = ?");
                $request->execute([$namePicture, $id]);
                // rowcount
                if ($request->rowCount()) {
                    echo 'Votre ' . $namePicture . 'image a été crée';
                    echo '<img src="image/photo/' . $id . '/' . $login . '.' . $ext . '" alt="' . $login . '">';
                    $_SESSION['alert'] = 'Utilisateur ' . $login . ' avec l\'adresse email ' . $_POST['email'] . ' créé avec succès';
                    $_SESSION['alert_level'] = 'success';
                    header('Location: index.php?source=view/login');
                    die;
                } else {
                    echo 'Votre image n\'a pas été créé';
                }
            }
        }
    } else {
        echo 'Echec à la création. Revenir en <a href="index.php?source=view/signup">arrière</a>';
    }
}else {
    echo 'Paramètre manquant ou erroné, veuillez recommencer';
}

// Mais que faites vous monsieur?
// ce que je te disais de mettre la gestion d'image dans le $insert->rowcount comme sa tu auras qu'un message à envoie si tout est ok
// Ah oui sorry, j'avais pas compris ça ok
// Voila normalement si tu test ça devrait être good
// Ouais je viens de le faire j'ai effectivment ma photo du grand Clint
//un grand merci mec
// Tu as vu un message avec ?
