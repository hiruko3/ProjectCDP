<html lang="fr">
    <meta charset="utf-8">
    <div id="container">

        <h1> <?php echo 'Edit ' . $userstory->userstoryname; ?> </h1>

        <br/>

        <?php
        echo anchor(base_url() . 'userstory_controller/index/' . $project_id, ' Return to backlog', 'class="btn btn-default fa fa-arrow-left "');
        echo br(2);
        ?>

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
        echo form_open('project/' . $project_id . '/userstory/edit_userstory/' . $userstory->id, "class='col-lg-6 form-horizontal'");
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
                    <option value="Ready to do" <?php if($userstory->statut == 'Ready to do'){ echo 'SELECTED';}?> > Ready to do </option>
                    <option value="In progress" <?php if($userstory->statut == 'In progress'){ echo 'SELECTED';}?> > In progress </option>
                    <option value="Done" <?php if($userstory->statut == 'Done'){ echo 'SELECTED';}?> > Done </option>
                </select>
            </p>
        </div>

        <br/>

        <label  class="col-lg-5" for="cost">Cost : </label>
        <div class="col-lg-5">
            <p>
                <input class="form-control" type="number" min="1" max="20" name="cost" id="cost" value="<?php echo $userstory->cost; ?>" </input>
            </p>
        </div>

        <br/>

        <label for="date_begin"  class="col-lg-5" > Date start : </label>
        <div class="col-lg-5">
            <p>
                <input type="date" name="datestart" value="<?php echo $userstory->datestart; ?>" >
            </p>
        </div>

        <br/>

        <label for="date_end"  class="col-lg-5" > Date end : </label>
        <div class="col-lg-5">
            <p>
                <input type="date" name="dateend" value="<?php echo $userstory->dateend; ?>">
            </p>
        </div>


        <label for="description"  class="col-lg-5" > Description : </label>
        <textarea  class="form-control" id="description"  name="description" style="width: 390px; height: 111px; resize: none;" ><?php echo $userstory->description; ?></textarea>

        <br/>
        <br/>

        <?php
        echo "<p>";
        echo form_submit("edit", "Edit", "class='btn btn-primary col-md-offset-7'");
        echo "</p>";
        echo form_close();
        ?>

    </div>

</body>

</html>
