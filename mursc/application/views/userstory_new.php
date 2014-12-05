<html lang="fr">
    <meta charset="utf-8">
    <div id="container" class="col-lg-offset-1">


        <fieldset class="col-lg-5 scheduler-border">
            <legend class="scheduler-border">New User Story</legend>

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

            <?php
            foreach ($errorMsg2 as $msg) {
                echo "<i class='fa fa-times-circle text-danger'" . $msg . "</i>";
            }
            ?>


            <?php
            echo form_open('userstory/new_userstory', "class='form-horizontal'");
            ?>

            <label  class="col-lg-5 " for="userstoryname">Name * : </label>
            <div class="col-lg-6">
                <p>
                    <input class="form-control" type="text" name="userstoryname" id="userstoryname" </input>
                </p>
            </div>

            <br/>

            <label for="cost" class="col-lg-5" > Cost * : </label>
            <div class="col-lg-6">
                <p>
                    <select  class="form-control" id="cost" name="cost">
                        <option value="0"  >0 </option>
                        <option value="1"  >1 </option>
                        <option value="2"  >2 </option>
                        <option value="3"  >3 </option>
                        <option value="5"  >5 </option>
                        <option value="8"  >8 </option>
                        <option value="13" >13 </option>
                        <option value="21" >21 </option>
                        <option value="34" >34 </option>
                        <option value="55" >55 </option>
                        <option value="89" >89 </option>
                    </select>
                </p>
            </div>

            <label for="description"  class="col-lg-5" > Description * : </label>
            <textarea  class="form-control" id="description"  name="description" style="height: 120px; resize: none;" ></textarea>
            <br/>

            <?php echo '<div class="col-lg-4">' . form_label('Task(s) assiocated: ', 'task') . '</div ><div>' . form_multiselect('task[]', $task_list) . '</div>'; ?>

            <br/><br/><br/>

            <div class="text-center">
            <?php
            echo "<p>";
            echo form_submit("create", "Create a US", "class='btn btn-primary'");
            echo "</p>";
            echo form_close();
            ?>
            </div>
        </fieldset> 
    </div>
</html>
