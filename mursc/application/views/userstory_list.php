<html lang="fr">
    <meta charset="utf-8">
    <div id="container">
        <?php
        echo br(3);
        form_fieldset('User Stories');
        ?>
        <fieldset class="col-lg-offset-1">
            
            <div class='col-md-2'>
                <a class='btn btn-primary' href=<?php echo base_url() . 'project/' . $project->id . '/new_userstory' ?>><i class='fa fa-plus'></i> Create a new US </a>
                &nbsp;</div>
           
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
                $this->table->set_heading('Name', 'Status', 'Description', 'Cost', 'Start date', 'End date', 'Action');
                foreach ($list_us as $us) {
                    $this->table->add_row($us->userstoryname, $us->statut, $us->description, $us->cost, $us->datestart, $us->dateend, '<a class="btn btn-primary" href="' . base_url() . 'project/' . $project->id . '/userstory/index_userstory/' . $us->id . '"><i class="fa icon-eye-open"></i> View </a> &nbsp;
                             <a class="btn btn-primary" href="' . base_url() . 'project/' . $project->id . '/userstory/edit_userstory/' . $us->id . '"><i class="fa fa-cog"></i> Edit </a> &nbsp;
                             <a onclick="return confirm(\'Are you sure you want to delete the user story ' . $us->userstoryname . ' ?\');" class="btn btn-danger" href="' . base_url() . 'project/' . $project->id . '/userstory/delete_userstory/' . $us->id . '" ><i class="fa fa-close"></i> Delete </a> &nbsp;');
                }

                echo $this->table->generate();
                ?>
            </div>
        </fieldset>
    </div>
</html>


<script>
$('#search_userstory_input').keyup(function() {

    var colonnes = {};

    $("#table_us thead th ").each(function(index, th)
    {
        colonnes[index] = $(th).text();
    }
    );

    var mot = $('#search_userstory_input').val().toLowerCase();

    $("#table_us tbody tr").each(function(index, tr)
    {
        if (mot[0].length > 0)
        {
            $(tr).hide();
        }
        else
        {
            $(tr).show();
        }

        $("td", tr).each(function(index, td)
        {
            if (colonnes[index] in {'Name': true, 'Description': true})
            {
                    if (mot.length > 0 && $(td).text().toLowerCase().indexOf(mot) >= 0)
                    {
                        $(tr).show();
                        return false;
                    }
            }
        });
    });
});

//////////////////////////////

$('#statut_filter').change(function() {

    var colonnes = {};

    $("#table_us thead th ").each(function(index, th)
    {
        colonnes[index] = $(th).text();
    }
    );

    var mot = $('#statut_filter').val().toLowerCase();

    $("#table_us tbody tr").each(function(index, tr)
    {
        if (mot[0].length > 0)
        {
            $(tr).hide();
        }
        else
        {
            $(tr).show();
        }
        
        if (mot === "no filter")
        {
            $(tr).show();
        }
        

    $("td", tr).each(function(index, td)
    {
        if (colonnes[index] in {'Status': true})
        {
            if ($(td).text().toLowerCase() === mot)
            {
                $(tr).show();
                 return false;
            }
        }
            
    });
  });
});

 </script>