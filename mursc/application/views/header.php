
<fieldset class="col-lg-12">
    <nav class="navbar navbar-inverse" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url() ?>">Mursc</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php if($this->session->userdata('is_logged_in') != 0){ ?>
                    <li>
                        <a href='<?php echo base_url()."user/projectList/";?> '> My projects</a>
                    </li>
                    <li>
                        <a href='<?php echo base_url()."user/list_all/";?> '> Projects list</a>
                    </li>
                    <?php } ?>
                </ul>
                <?php if($this->session->userdata('is_logged_in') == 0){
                    echo form_open('login/login_validation', array('class'=>"navbar-form navbar-right", 'role'=>"search"));
                    echo form_input(array('name'=>"email", 'value'=>$this->input->post('email'), 'class'=>"form-control", 'placeholder'=>'email'));
                    echo form_password(array('name'=>"password", 'value'=>$this->input->post(md5('password')), 'class'=>"form-control", 'placeholder'=>'password'));
                    echo form_submit(array('name'=>"login_submit", 'value'=>"Sign in", 'class'=>"btn btn-default"));
                    echo '<a href=' . base_url() . 'login/sign_up class="btn btn-default">Sign Up</a>';
                    echo form_close();
                ?>

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