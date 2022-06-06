<main role="main" class="container-fluid">
    <?php
    if (!empty($_GET['source'])) {
        getContent($_GET['source']);
    } else {
        echo '<h1>Scripts Serveurs</h1>
              <div class="alert alert-info">Bienvenue à votre examen blanc de Scripts Serveurs!</div>';
    }
    ?>
</main>