<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_controller extends My_Controller {

    private $_id; /** uniq user id : int */
    private $_pseudo; /** uniq user name : string */
    private $_pass; /** user password : string */
    private $_email; /** user email : string */

    
    /**
    * @brief : constructeur
    */
    function __construct() {
        parent::__construct();
        $this->_id = $this->session->userdata('user_id');

        $this->load->model('user');
        $u = new User();
        $u->get_by_id($this->_id);

        $this->_pseudo = $u->username;
        $this->_pass = $u->password;
        $this->_email = $u->email;
        $this->load->library('table');
        $this->load->helper('html');
    }

    function index($data = array()) {
        if($this->session->userdata('is_logged_in') == 1){
            $this->display_project_list_contributor();
        } else $this->display_resume();
    }

    function display_resume(){
        $this->load->view('header');
        $this->load->view('resume_project');
        $this->load->view('footer');
    }

    function display_project_list_contributor($data = array())
    {
        $data = array_merge($data, $this->_projectList());

        $this->load->view('header');
        $this->load->view('user_projects_list_contributor', $data);
        $this->load->view('footer');

    }
    
       function display_project_list_follower($data = array())
    {
        $data = array_merge($data, $this->_projectList());

        $this->load->view('header');
        $this->load->view('user_projects_list_follower', $data);
        $this->load->view('footer');

    }
    
       function display_project_list_candidature($data = array())
    {
        $data = array_merge($data, $this->_projectList());

        $this->load->view('header');
        $this->load->view('user_projects_list_candidature', $data);
        $this->load->view('footer');

    }
    
       function display_project_list_invitation($data = array())
    {
        $data = array_merge($data, $this->_projectList());

        $this->load->view('header');
        $this->load->view('user_projects_list_invitation', $data);
        $this->load->view('footer');

    }

///////////////////////// LISTS PERSONAL OF PROJECTS ////////////////////////////

    /**
    * @brief : la liste des project dont je suis membre
    * @return : $data (tableau) contenant :
    *           'projects_list_as_contributor' : la liste des projets dont je suis contributeur ('id', 'projectname', 'type', 'description', 'giturl')
    *           'projects_list_as_follower' :  la liste des projets dont je suis contributeur ('id', 'projectname', 'type', 'description', 'giturl')
    *           'invitations_list' : la liste des projets auquels on m'invite ('id', 'projectname', 'proposed_status', 'type', 'description', 'giturl')
    *           'candidacy_list' : la liste des projets auquels je candidate ('id', 'projectname', 'type', 'description', 'giturl')
    */
    function _projectList() {

        $user = new User();
        $user->where('id', $this->_id)->get();
        $projects_list_as_contributor = array();
        $projects_list_as_follower = array();

        $projects = $user->project->include_join_fields()->where('relationship_type', 'member')->get(); // seulement les projets dont je suis membre
        foreach ($projects as $project) {
            $project_in_table = array();
            $project_in_table['id'] = $project->id;
            $project_in_table['projectname'] = $project->projectname;
            $project_in_table['status'] = $project->join_user_status;
            $project_in_table['type'] = $project->type;
            $project_in_table['description'] = $project->description;
            $project_in_table['giturl'] = $project->giturl;
            $count_project_manager = $project->user->include_join_fields()->where('relationship_type', 'member')->where('user_status', 'project manager')->get(); // liste des membres du projet qui sont manager
            $project_in_table['nb_manager'] = $count_project_manager->result_count(); // compte le nombre de managers

            if($project->join_user_status == 'watcher'){
                array_push($projects_list_as_follower, $project_in_table);
              }
            else{
                array_push($projects_list_as_contributor, $project_in_table);
                }
        }

        $data['projects_list_as_contributor'] = $projects_list_as_contributor;
        $data['projects_list_as_follower'] = $projects_list_as_follower;

        $user->project->include_join_fields()->where('relationship_type', 'invitation')->get(); // seulement les projets dont l invitation est en attente

        $invitations_list = array();
        foreach($user->projects as $p)
        {
            $p_attributs = array();
            $p_attributs['id'] = $p->id;
            $p_attributs['projectname'] = $p->projectname;
            $p_attributs['proposed_status'] = $p->join_user_status;
            $p_attributs['type'] = $p->type;
            $p_attributs['description'] = $p->description;
            $p_attributs['giturl'] = $p->giturl;

            array_push($invitations_list, $p_attributs);
        }
        $data['invitations_list'] = $invitations_list;


        $user->project->include_join_fields()->where('relationship_type', 'candidacy')->get(); // seulement les candidatures

        $candidacy_list = array();
        foreach($user->projects as $p)
        {
            $p_attributs = array();
            $p_attributs['id'] = $p->id;
            $p_attributs['projectname'] = $p->projectname;
            $p_attributs['type'] = $p->type;
            $p_attributs['description'] = $p->description;
            $p_attributs['giturl'] = $p->giturl;

            array_push($candidacy_list, $p_attributs);
        }

        $data['candidacy_list'] = $candidacy_list;

        return $data;
    }
    
    /**
    * @brief : detruit un user
    */
    public function delete()
    {
        /** @todo (confirmation / rediriger vers accueil visiteur a la fin)*/
    }
    
    /**
    * @brief : modifie le pseudo
    * @param pseudo (string) : nouveau pseudo
    */
    public function _set_pseudo($pseudo)
    {
        $_pseudo = $pseudo;
    }
    
    /**
    * @brief : modifie l email
    * @param email (string) : nouvel email
    */
    public function _set_email($email)
    {
        $_email = $email;
    }
    
    /**
    * @brief : retourne l id
    * @return (int) : l id
    */
    public function _get_id()
    {
        return $_id;
    }
    
    /**
    * @brief : retourne le pseudo
    * @return (string) : le pseudo
    */  
    public function _get_pseudo()
    {
        return $_pseudo;
    }

    /**
    * @brief : retourne l email
    * @return (string) : l email
    */  
    public function _get_email()
    {
        return $_email;
    }
    
    /**
    * @brief : valide une invitation
    * @param project_id (int) : le projet auquel on est invite
    */
    public function validate_invitation($project_id)
    {
        $this->load->model('join_projects_user');
        $j = new Join_projects_user();

        $j->where('user_id', $this->_id)->where('project_id', $project_id)->where('relationship_type', 'invitation')->get();

        if($j->result_count() < 1)
        {
            $data['error'] = 'This invitation does not exist.';
        }
        else
        {
            $j->relationship_type = 'member';
            if($j->save()){ $data['succes'] = 'Invitation accepted.'; }
            else{ $data['error'] = 'Acception error.'; }
        }

        $this->display_project_list($data);
    }
    
    /**
    * @brief : refuse une invitation
    * @param project_id (int) : le projet auquel on est invite
    */
    public function reject_invitation($project_id)
    {
        $this->load->model('join_projects_user');
        $j = new Join_projects_user();

        $j->where('user_id', $this->_id)->where('project_id', $project_id)->where('relationship_type', 'invitation')->get();

        if($j->result_count() < 1)
        {
            $data['error'] = 'This invitation does not exist.';
        }
        else
        {
            if($j->delete()){ $data['succes'] = 'Invitation deleted.'; }
            else{ $data['error'] = 'Suppression error.'; }
        }

        $this->display_project_list($data);
    }
    
    /**
    * @brief : envoie d une candidature pour rejoindre un projet (le statut sera decide par celui qui validera)
    * @param project_id : l id du projet auquel on candidate
    */
    public function send_candidacy($project_id)
    {
        $p = new Project();        
        if($p->get_by_id($project_id)->result_count() < 1){ $data['error'] = 'Project does not exist.'; } // verifie si le projet existe
        else
        {
            $j = new Join_projects_user();
            
            $j->user_id = $this->session->userdata('user_id');
            $j->project_id = $project_id;
            $j->relationship_type = 'candidacy';

            if($j->save()){ $data['succes'] = 'Candidacy sent.'; }
            else{$data['error'] = $j->error->string;}
        }

        $this->all_projects_list($data);
    }
    
    /**
    * @brief : supprime une candidature a un projet
    * @param project_id : l id du projet auquel on ne veut plus candidater
    */
    public function delete_candidacy($project_id)
    {
        $this->load->model('join_projects_user');
        $j = new Join_projects_user();

        $j->where('user_id', $this->_id)->where('project_id', $project_id)->where('relationship_type', 'candidacy')->get();

        if($j->result_count() < 1)
        {
            $data['error'] = 'This candidacy does not exist.';
        }
        else
        {
            if($j->delete()){ $data['succes'] = 'Candidacy deleted.'; }
            else{ $data['error'] = 'Suppression error.'; }
        }

        $this->display_project_list($data);
    }
    
    /**
    * @brief : quitter un projet auquel on contribue ou que l on suit
    * @param project_id (int) : le projet que l on quitte
    */
    public function quit_project($project_id)
    {
        $this->load->model('join_projects_user');
        $j = new Join_projects_user();

        $j->where('user_id', $this->_id)->where('project_id', $project_id)->where('relationship_type', 'member')->get();

        if($j->result_count() < 1)
        {
            $data['error'] = 'You are no member..';
        }
        else
        {
            if($j->delete()){ $data['succes'] = 'You are no longer member.'; }
            else{ $data['error'] = 'Quit error.'; }
        }

        $this->display_project_list($data);
    }


////////////////////////// LIST ALL PROJECT ////////////////////////////
    function all_projects_list($data = array())
    {
        $p = new Project();
        $data['projects'] = $p->get();

        foreach($data['projects'] as $p)
        {
            $j = new Join_Projects_User();
            $p->contributor_count = $j->where('project_id', $p->id)->where('relationship_type', 'member')->where_not_in('user_status', 'watcher')->get()->result_count();
        }


        $this->load->view('header');
        $this->load->view('all_projects_list', $data);
        $this->load->view('footer');
    }
}
?>
