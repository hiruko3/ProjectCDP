
<fieldset class="col-lg-12">
    <nav class="navbar-collapse" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url() . "project/index_project/" . $project_id; ?>"><?php echo $project_name; ?></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php if($this->session->userdata('project_type') == 'public' || $this->session->userdata('my_relation') == 'member') { /* affichage pour tous les members, watchers compris */ ?>
                    <li>
                        <a href="<?php echo base_url() . "management_controller/index/" . $project_id; ?>">Management</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() . "userstory_controller/index/" . $project_id; ?>">Backlog</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() . "task_controller/index/"; ?>">Tasks</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() . "test_controller/index/" . $project_id; ?>">Tests</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() . "version_controller/index/" . $project_id; ?>">Versions</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
    
</fieldset>



<?php echo br(3); ?> 