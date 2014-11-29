<html lang="fr">
    <meta charset="utf-8">
    <div id="container" class="col-lg-offset-1">

        <h2> <?php echo 'Edit userstory : ' . $userstory->userstoryname; ?> </h2>

        <?php
        foreach ($validMsg as $msg) {
            echo "<i class='fa fa-check-square text-success'" . $msg . "</i>";
            echo "</br>";
        }
        ?>

        <?php
        foreach ($errorMsg1 as $msg) {
            echo "<i class='fa fa-times-circle text-danger'" . $msg . "</i>";
            echo "</br>";
        }
        ?>

        <br/>

        <?php
        echo form_open('project/' . $project_id . '/userstory/edit_userstory/' . $userstory->id, "class='col-lg-8 form-horizontal'");
        ?>

        <label  class="col-lg-5" for="userstoryname">Name : </label>
        <div class="col-lg-5">
            <p>
                <input class="form-control" type="text" name="userstoryname" id="userstoryname" value="<?php echo $userstory->userstoryname; ?>" </input>
            </p>
        </div>

        <br/>

        <label for="type" class="col-lg-5" > Statut : </label>
        <div class="col-lg-5">
            <p>
                <select  class="form-control" id="type" name="statut">
                    <option value="Not ready" <?php if($userstory->statut == 'Not ready'){ echo 'SELECTED';}?> > Not ready </option>
                    <option value="Ready" <?php if($userstory->statut == 'Ready'){ echo 'SELECTED';}?> > Ready </option>
                    <option value="In progress" <?php if($userstory->statut == 'In progress'){ echo 'SELECTED';}?> > In progress </option>
                    <option value="Done" <?php if($userstory->statut == 'Done'){ echo 'SELECTED';}?> > Done </option>
                </select>
            </p>
        </div>

        <br/>

        <label for="cost" class="col-lg-5" > Cost * : </label>
        <div class="col-lg-5">
            <p>
                <select  class="form-control" id="cost" name="cost">
                    <option value="0" <?php if($userstory->cost == '0'){ echo 'SELECTED';}?> >0 </option>
                    <option value="1" <?php if($userstory->cost == '1'){ echo 'SELECTED';}?> >1 </option>
                    <option value="2" <?php if($userstory->cost == '2'){ echo 'SELECTED';}?> >2 </option>
                    <option value="3" <?php if($userstory->cost == '3'){ echo 'SELECTED';}?> >3 </option>
                    <option value="5" <?php if($userstory->cost == '5'){ echo 'SELECTED';}?> >5 </option>
                    <option value="8" <?php if($userstory->cost == '8'){ echo 'SELECTED';}?> >8 </option>
                    <option value="13" <?php if($userstory->cost == '13'){ echo 'SELECTED';}?>>13 </option>
                    <option value="21" <?php if($userstory->cost == '21'){ echo 'SELECTED';}?>>21 </option>
                    <option value="34" <?php if($userstory->cost == '34'){ echo 'SELECTED';}?>>34 </option>
                    <option value="55" <?php if($userstory->cost == '55'){ echo 'SELECTED';}?>>55 </option>
                    <option value="89" <?php if($userstory->cost == '89'){ echo 'SELECTED';}?>>89 </option>
                </select>
            </p>
        </div>

        <br/>

        <label for="description"  class="col-lg-5" > Description : </label>
        <textarea  class="form-control" id="description"  name="description" style="width: 390px; height: 111px; resize: none;" ><?php echo $userstory->description; ?></textarea>

        <br/>
        
        <?php
         echo '<div class="col-lg-5">'. form_label('Task(s) assiocated :', 'task_associated') . '</div><div class="col-lg-2">' . form_multiselect('task[]', $tasks_list_associated, '') . '</div>';      
         echo br(4);
         echo '<div class="col-lg-5">'. form_label('Added a task :', 'task_added') . '</div><div class="col-lg-2">' . form_multiselect('tasks_added[]', $tasks_list_possible_to_add, '') . '</div>';       
         echo br(4);
         echo '<div class="col-lg-5">'. form_label('Deleted a task :', 'task_deleted') . '</div><div class="col-lg-2">' . form_multiselect('tasks_deleted[]', $tasks_list_associated, '') . '</div>';
         ?>

         <br/>
         
        <?php
                echo br(4);
        echo "<p>";
        echo form_submit("edit", "Apply", "class='btn btn-primary col-md-offset-7'");
        echo "</p>";
        echo form_close();

        ?>

    </div>

</body>

</html>
