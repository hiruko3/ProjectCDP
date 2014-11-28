
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
                <a class="navbar-brand" href="<?php echo base_url() ?>"><i class="fa fa-home fa-1x"></i></a>
            </div>
            
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav ">
                    <?php if($this->session->userdata('is_logged_in') != 0){ ?>
                     <li class="dropdown">
                          <a href='#' class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">My projects <span class="caret"></span></a>
                              <ul class="dropdown-menu" role="menu">
                                 <li><?php echo '<a href=' . base_url() . 'user/list_contributor >'; ?><span>As a contributor</span></a></li>
                                 <li><?php echo '<a href=' . base_url() . 'user/list_follower >'; ?><span>As a follower</span></a></li>
                                 <li class="divider"></li>
                                 <li><?php echo '<a href=' . base_url() . 'user/list_invitation >'; ?><span>Invitations</span></a></li>
                                 <li class='last'><?php echo '<a href=' . base_url() . 'user/list_candidature >'; ?><span>Candidatures</span></a></li>
                              </ul>
                    </li>

                    <li>
                        <a href='<?php echo base_url()."user/list_all/";?> '> Others Projects</a>
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