<html lang="fr">
    <meta charset="utf-8">
    <div id="container">

        <h1> New user story </h1>

        <br/>

        <?php
        echo anchor('project/index_project/'.$project_id ,'Return to the project index', 'class="btn btn-default fa fa-arrow-left "');
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
        echo form_open('userstory/new_userstory', "class='col-lg-6 form-horizontal'");
        ?>

        <label  class="col-lg-5" for="userstoryname">Name * : </label>
        <div class="col-lg-5">
            <p>
                <input class="form-control" type="text" name="userstoryname" id="userstoryname" </input>
            </p>
        </div>

        <br/>

        <label  class="col-lg-5" for="cost">Cost * : </label>
        <div class="col-lg-5">
            <p>
                <input class="form-control" type="number" min="1" max="20" name="cost" id="cost" </input>
            </p>
        </div>

        <br/>

        <label for="date_begin"  class="col-lg-5" > Date start * : </label>
        <div class="col-lg-5">
            <p>
                <input type="date" name="datestart">
            </p>
        </div>

        <br/>

        <label for="date_end"  class="col-lg-5" > Date end * : </label>
        <div class="col-lg-5">
            <p>
                <input type="date" name="dateend">
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
