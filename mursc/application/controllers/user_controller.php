<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_controller extends CI_Controller {

    private $_id; /** uniq user id : int */
    private $_pseudo; /** uniq user name : string */
    private $_pass; /** user password : string */
    private $_email; /** user email : string */

    
    /**
    * @brief : constructeur
    */
    function __construct() {
        parent::__construct();
        $this->_id = 3;////////////////////////////////

        $this->load->model('user');
        $u = new User();
        $u->get_by_id($this->_id);

        $this->_pseudo = $u->username;
        $this->_pass = $u->password;
        $this->_email = $u->email;
        $this->load->Library('form_validation');
        $this->load->library('table');
        $this->load->helper('form');
        $this->load->helper('html');
    }

    function index() {
        $user = new User();
        $user->where('id', $this->_id)->get();

        $projects_list = array();

        $user->project->get_iterated();

        foreach ($user->project as $project) {
            array_push($projects_list, $project->projectname);
        }

        $data['projects_list'] = $projects_list;
        $data['username'] = $user->username;

        $this->load->view('header');
        $this->load->view('user_index', $data);
        $this->load->view('footer');
    }

///////////////////////// LIST PERSONAL OF PROJECTS ////////////////////////////

    function projectList($data=array()) {

        // Il faudra recuperer l'id du compte user en session
        $user = new User();
        $user->where('id', $this->_id)->get();

        $projects_list_as_contributor = array();
        $projects_list_as_follower = array();

        $projects = $user->project->include_join_fields()->where('relationship_type', 'member')->get(); // seulement les projets dont je suis membre

        $number_projects_as_contributor = 0;
        $number_projects_as_follower = 0;

        foreach ($projects as $project) {
            $project_in_table = array();
            $project_in_table['id'] = $project->id;
            $project_in_table['projectname'] = $project->projectname;
            $project_in_table['status'] = $project->join_user_status;
            $project_in_table['type'] = $project->type;
            $project_in_table['description'] = $project->description;
            $project_in_table['giturl'] = $project->giturl;

            if($project->join_user_status == 'watcher')
            {
                ++$number_projects_as_follower;
                array_push($projects_list_as_follower, $project_in_table);
            }
            else
            {
                ++$number_projects_as_contributor;
                array_push($projects_list_as_contributor, $project_in_table);
            }
        }

        $data['projects_list_as_contributor'] = $projects_list_as_contributor;
        $data['projects_list_as_follower'] = $projects_list_as_follower;
        $data['number_projects_as_contributor'] = $number_projects_as_contributor;
        $data['number_projects_as_follower'] = $number_projects_as_follower;


        $user->project->include_join_fields()->where('relationship_type', 'invitation')->get_iterated(); // seulement les projets dont l invitation est en attente
        $data['number_invitations'] = $user->project->result_count();

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


        $user->project->include_join_fields()->where('relationship_type', 'candidacy')->get_iterated(); // seulement les candidatures
        $data['number_candidacy'] = $user->project->result_count();

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

        $this->load->view('header');
        $this->load->view('user_projects_lists', $data);
        $this->load->view('footer');
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
    * @brief : ajoute un projet a la liste (a appeller lors de la creation de projet ou l acceptation d une invitation par exemple)
    */
    public function add_project()
    {
        /** @todo */
    }
    
    /**
    * @brief : ajoute une invitation a devenir contributeur
    * @param project_id (int) : le projet auquel on est invite
    * @param status (c_st) : le statut propose
    */
    public function add_c_invitation($project_id, $status)
    {
        /** @todo */
    }
    
    /**
    * @brief : ajoute une invitation a devenir watcher
    * @param project_id (int) : le projet auquel on est invite
    * @param status (w_st) : le statut propose
    */
    public function add_w_invitation($project_id, $status)
    {
        /** @todo */
    }
    
    /**
    * @brief : supprime une invitation a un projet
    * @param project_id (int) : le projet auquel on etait invite
    */
    public function delete_invitation($project_id)
    {
        /** @todo (parcourir les 2 tableaux) */
    }
    
    /**
    * @brief : valide une invitation
    * @param project_id (int) : le projet auquel on est invite
    */
    public function validate_invitation($project_id)
    {
        /** @todo (devenir contributeur ou watcher) */
    }
    
    /**
    * @brief : refuse une invitation
    * @param project_id (int) : le projet auquel on est invite
    */
    public function reject_invitation($project_id)
    {
        /** @todo */
    }
    
    /**
    * @brief : envoie d une candidature pour rejoindre un projet (le statut sera decide par celui qui validera)
    */
    public function send_candidacy()
    {
        // exit if project does not exist
        $this->load->model('project');
        $p = new Project();
        $p->where('projectname', $this->input->post('project_name'))->get();
        if($p->result_count() < 1){$data['error'] = 'Project does not exist.';}
        ////
        else
        {
            $this->load->model('join_projects_user');
            $j = new Join_Projects_User();
            $j->user_id = $this->_id;
            $j->project_id = $p->id;
            $j->relationship_type = 'candidacy';

            if($j->save()){$data['succes'] = 'Candidature envoy&eacute;e';}
            else{$data['error'] = $j->error->string;}
        }

        $this->projectList($data);
    }
    
    /**
    * @brief : supprime une candidature a un projet
    * @param id : l id du projet auquel on ne veut plus candidater
    */
    public function delete_candidacy($id)
    {
        // TODO
    }
    
    /**
    * @brief : quitter un projet auquel on contribue ou que l on suit
    * @param project_id (int) : le projet que l on quitte
    */
    public function quit_project($project_id)
    {
        /** @todo */
    }
}
?>

}
