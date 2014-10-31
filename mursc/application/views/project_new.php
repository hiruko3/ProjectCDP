<html lang="fr">
    <meta charset="utf-8">
    <div id="container">

        <h1> New project </h1>

        <br/>
        
        <?php
        echo anchor('user/projectList', ' Return to the projects list', 'class="btn btn-default fa fa-arrow-left "');
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

        <?php
        foreach ($errorMsg2 as $msg) {
            echo "<i class='fa fa-times-circle text-danger'" . $msg . "</i>";
        }
        ?>
        <br/>


        <?php
        //echo validation_errors();
        echo form_open('project/new_project', "class='col-lg-6 form-horizontal'");
        ?>

        <label  class="col-lg-5" for="projectname">Project name * : </label>
        <div class="col-lg-5">
            <p>
                <input class="form-control" type="text" name="projectname" id="projectname" </input>
            </p>
        </div>

        <label for="type" class="col-lg-5" > Type * : </label>
        <div class="col-lg-5">
            <p>
                <select  class="form-control" id="type" name="type">
                    <option value="public" > Public </option>
                    <option value="private"  > Private </option>
                </select>
            </p>
        </div>

        <label  class="col-lg-5" for="giturl">Git url : </label>
        <div class="col-lg-5">
            <p>
                <input class="form-control" type="text" name="giturl" id="giturl" </input>
            </p>
        </div>

        <label for="description"  class="col-lg-5" > Description * : </label>
        <textarea  class="form-control" id="description"  name="description" style="width: 390px; height: 111px; resize: none;" ></textarea>

        <br/>
        <br/>

        <?php
        echo "<p>";
        echo form_submit("create", "Create", "class='btn btn-primary col-md-offset-7'");
        echo "</p>";

        echo form_close();
        ?>

    </div>

</body>

</html>
