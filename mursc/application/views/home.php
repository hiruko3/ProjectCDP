<html lang="fr">
    <meta charset="utf-8">
    <div id="container">

        <h1><i class="fa fa-home fa-2x"></i> Mursc Home </h1>

        <h3><?php echo $home_message; ?></h3>

        <?php echo anchor('project/index', 'Projects list', 'class="link-class"') ?>
        <br/>
        <?php echo anchor('user/index', 'User index', 'class="link-class"') ?>

    </div>

</body>
</html>
