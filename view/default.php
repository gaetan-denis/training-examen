<main role="main" class="container-fluid">
    <?php
    if (!empty($_SESSION['alert_level']) && !empty($_SESSION['alert'])) {
        echo '<div class="alert alert-' . $_SESSION['alert_level'] . '">' . $_SESSION['alert'] . '</div>';
        unset($_SESSION['alert']);
        unset($_SESSION['alert_level']);
    }
    if (!empty($_GET['source'])) {
        getContent($_GET['source']);
    } else {
        echo '<h1>Scripts Serveurs</h1>
              <div class="alert alert-info">Bienvenue à votre examen blanc de Scripts Serveurs!</div>';
    }
    ?>
</main>