<html lang="fr">
    <meta charset="utf-8">
    <div id="container">
        <?php form_fieldset('User Stories'); ?>
        <fieldset class="col-lg-offset-1">
         
        <div class='col-md-3'>
            <?php
                if($this->session->userdata('my_relation') == 'member' && $this->session->userdata('my_status') == 'project manager') // acl product manager only
                {
                    echo br(3) . "<a class='btn btn-primary' href=" . base_url() . "project/" . $project->id . "/new_userstory><i class='fa fa-plus'></i> Create a new US </a>&nbsp;";
                }
            ?>
        </div>
           
            <?php  echo br(3); ?>

            <div class="col-lg-3">
                <?php echo form_label('Filter by :', 'filter_userstory'); ?>      
                    <select  class="form-control" id="statut_filter" name="statut_filter">
                        <option value="No filter" > No Filter </option>
                        <option value="Not ready" > Not ready </option>
                        <option value="Ready" > Ready </option>
                        <option value="In progress" > In progress </option>
                        <option value="Done" > Done </option>
                    </select>
            </div>
            
            <div class="col-lg-2 col-lg-offset-2">
                <?php echo form_label('Search :', 'search_userstory_label');  
                 $input_search = array(
                                'name'        => 'search_userstory_input',
                                'id'          => 'search_userstory_input',
                                'class'       => 'form-control',
                                'value'       => '',
                                );
                      echo form_input($input_search); ?>     
            </div>
            
            <div class="col-lg-11">
                <?php
                echo br(2);
                $tmpl = array('table_open' => '<table border="1"  id="table_us" class="table table-responsive table-bordered">');
                $this->table->set_template($tmpl);
                $this->table->set_heading('Name', 'Status', 'Cost');
                foreach ($list_us as $us) {
                    $this->table->add_row('<a href="' . base_url() . 'project/' . $project->id . '/userstory/index_userstory/' . $us->id . '"><i class="fa icon-eye-open"></i>&nbsp;' . $us->userstoryname . '</a>', $us->statut, $us->cost);
                }

                echo $this->table->generate();
                ?>
            </div>
        </fieldset>
    </div>
</html>

<script type="text/javascript" src= '<?php echo base_url('application/js/search_and_filter_US.js')?>'></script>