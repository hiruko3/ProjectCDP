
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
                <?php if($this->session->userdata('is_logged_in') == 0){?>
                    <form action="<?php echo base_url()."login/sign_up" ?>" class="navbar-form navbar-right" role="search">
                        <button type="submit" class="btn btn-default">Sign Up</button>
                    </form>
                    <form action="<?php echo base_url()."login" ?>" class="navbar-form navbar-right" role="search">
                        <button type="submit" class="btn btn-default">Sign In</button>
                    </form>
                <?php } else { ?>
                     <form action="<?php echo base_url()."login/logout" ?>" class="navbar-form navbar-right" role="search">
                        <button type="submit" class="btn btn-default">Logout</button>
                    </form>
                    <form action="<?php echo base_url()."login/member" ?>" class="navbar-form navbar-right" role="search">
                        <button type="submit" class="btn btn-default">My Profile</button>
                    </form>
                <?php } ?>
            </div>
        </div>
    </nav>
</fieldset>

<?php echo br(3); ?> 