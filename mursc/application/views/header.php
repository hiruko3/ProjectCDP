
<fieldset class="col-lg-12">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Mursc</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href='<?php echo base_url()."user/projectList/";?> '> Projects Lists</a>
                    </li>
                    <li>
                        <a href="#">Management</a>
                    </li>
                    <li>
                        <a href="#">Backlog</a>
                    </li>
                    <li>
                        <a href="#">Tasks</a>
                    </li>
                    <li>
                        <a href="#">Tests</a>
                    </li>
                    <li>
                        <a href="#">Versions</a>
                    </li>
                </ul>

                <form class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-default">Sign In</button>
                </form>
            </div>
        </div>
    </nav>
</fieldset>

<?php echo br(3); ?> 