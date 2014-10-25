<html lang="fr">
    <meta charset="utf-8">
    <div id="container">

        <h1> <?php echo $username . "'s profil" ;?> </h1>

        <h3> Projects list : </h3>

        <?php
        foreach ($projects_list as $project) {
            echo '<br/>' . $project;
        }
        ?>
    </div>

</body>
</html>
