<html lang="fr">
    <meta charset="utf-8">
    <div id="container">
        <?php echo br(3);
        form_fieldset('Tasks'); ?>

        <fieldset class="col-lg-offset-1">

            <div class="col-lg-11">
                <?php
                if (ISSET($error)) {
                    echo "<div class = 'error'>" . $error . "</div>";
                }
                if (ISSET($succes)) {
                    echo "<div class = 'error'>" . $succes . "</div>";
                }

                $this->table->set_template(array('table_open' => '<table border="1" id="table_task" class="table table-responsive table-bordered">'));
                $this->table->set_heading('Name', 'Nb of contributors', 'Postulate');
                foreach ($projects as $p)
                {
                    $this->table->add_row('<a href=' . base_url() . 'project/index_project/' . $p->id . '>' . form_label($p->projectname) . '</a>',
                        $p->contributor_count,
                        "<a class='btn btn-primary' href=" . base_url() . "user/candidate/" . $p->id . "><i class='fa fa-envelope-o'></i> Candidate </a> &nbsp;");
                }

                echo $this->table->generate();
                ?>
            </div>
        </fieldset>
    </div>
</html>