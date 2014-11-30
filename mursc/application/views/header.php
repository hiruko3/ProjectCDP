
<fieldset class="col-lg-12">
    <nav class="navbar-inverse" role="navigation">
        <div class="container">
            
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url() . 'user/display_resume'; ?>"><i class="fa fa-home fa-1x"></i></a>
            </div>
            
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href='<?php echo base_url()."user/projectList/";?> '> My projects</a>

                    </li>

                    <li>
                        <a href='<?php echo base_url()."user/list_all/";?> '> Others Projects</a>
                    </li>
                </ul>
                <?php if($this->session->userdata('is_logged_in') == 0){?>
                   <form action="<?php echo base_url("login/sign_up")?>" class="navbar-form navbar-right" role="search">
                    <button type="submit" class="btn btn-default">Sign Up</button>
                    </form>
                    <form action="<?php echo base_url("login/login")?>" class="navbar-form navbar-right" role="search">
                    <button type="submit" class="btn btn-default">Sign In</button>

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