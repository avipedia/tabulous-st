<? include APP . '/views/layouts/header.html.php' ?>
    <div class="container">
        <div class="jumbotron text-center">
            <h1><?= $tourn->tournament_name ?></h1>
            <h2><?= $tourn->tournament_venue ?></h2>
            <h2><?= $tourn->tournament_date_display ?></h2>
        </div>
    </div>

<? include APP . '/views/layouts/footer.html.php' ?>