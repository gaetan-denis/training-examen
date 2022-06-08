<?php

/**
 * === Capacité terminale ===
 *
 * Todo : Créez un menu de navigation en HTML permettant d'accéder à :
 * - la page d'accueil, avec l'intitulé "Home"
 * - le profil utilisateur, avec l'intitulé "Profile"
 * - la page affichant la liste des items, avec l'intitulé "Items"
 * - le formulaire de login, avec l'intitulé "Login"
 *
 * La page d'accueil sera affichée par défaut
 *
 * Estimation : max 15min
 *
 * === BONUS (degré de maîtrise) ===
 *
 * Affichez le lien vers le profil utilisateur uniquement si l'utilisateur est connecté.
 * Affichez le bouton de déconnexion à la place de l'intitulé "Login" si l'utilisateur est connecté.
 *
 */

?>

<nav>
    <ul>
        <li><a href="index.php?source=view/index">Home</a></li>
        <?php if (!empty($_SESSION['userid'])) { ?>
        <li><a href="index.php?source=view/profile">Profile</a></li>
        <?php } ?>
        <li><a href="index.php?source=view/item">Item</a></li>
            <?php if (!empty($_SESSION['userid'])) { ?>
        <li><a href="index.php?source=view/logout">Delog</a></li>
            <?php } else { ?>
        <li><a href="index.php?source=view/login">Login</a></li>
            <?php } ?></li>
    </ul>
</nav>
