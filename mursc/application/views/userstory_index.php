<html lang="fr">
    <meta charset="utf-8">
    <div id="container">

        <h1> <?php echo 'View ' . $userstory->userstoryname; ?> </h1>
        <br/>

        <div class='row'>
            <div class='col-md-3'>
                <?php echo anchor('project/index_project/'.  $project_id, 'Return to the projects list', 'class="btn btn-default fa fa-arrow-left "'); ?>
            </div>
            <div class='col-md-1'></div>
        </div>
        <br /><br /><br/>

        <div class='row'>

            <?php echo form_fieldset(''); ?>
            <fieldset class="col-lg-offset-1">
                <div class="col-lg-11">
                    <?php
                    echo br(2);

                    echo form_label('Description of US :', 'description_userstory');
                    echo "   " . $userstory->description;

                    echo br(2);

                    echo form_label('Statut :', 'statut');
                    echo "   " . $userstory->statut;

                    echo br(2);

                    echo form_label('Cost :', 'cost');
                    echo "   " . $userstory->cost;
                    
                    echo br(2);

                    echo form_label('Date start :', 'datestart');
                    echo "   " . $userstory->datestart;
                    
                    echo br(2);

                    echo form_label('Date end :', 'dateend');
                    echo "   " . $userstory->dateend;
                    
                    ?>
                </div>
            </fieldset>
            <?php echo form_fieldset_close(); ?>
        </div>
    </div>
</html>