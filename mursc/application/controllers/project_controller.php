<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

session_start();

class Project_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->Library('form_validation');
        $this->load->library('table');
        $this->load->helper('form');
        $this->load->helper('html');
    }

    ////////////////////////// NEW PROJECT ////////////////////////////

    function new_project() {
        $user_id = 3; //////////////////////////////////////////////////////// recup en session
        $validMsg = array();
        $errorMsg1 = array();
        $errorMsg2 = array();

        if (!empty($_POST)) {

            $p = new Project();

            $p->projectname = $_POST['projectname'];
            $p->description = $_POST['description'];
            $p->type = $_POST['type'];
            $p->giturl = $_POST['giturl'];

            // Save in bdd
            if (!$p->save()) {
                array_push($errorMsg1, $p->error->all);
                $errorMsg1 = $errorMsg1['0'];
            }

            // jointure
            $p = new Project();
            $p->where('projectname', $_POST['projectname'])->get();

            $this->load->model('join_projects_user');
            $j = new Join_Projects_User();
            $j->user_id = $user_id;
            $j->project_id = $p->id;
            $j->user_status = 'project manager';
            $j->relationship_type = 'member';

            if($j->save()){$validMsg['project_created'] = "<p>New project created ! </p>";}
            else
            {
                array_push($errorMsg2, $j->error->all);
                $errorMsg2 = $errorMsg2['0'];
            }
            ////
        }

        $data['validMsg'] = $validMsg;
        $data['errorMsg1'] = $errorMsg1;
        $data['errorMsg2'] = $errorMsg2;

        $this->load->view('header');
        $this->load->view('project_new', $data);
        $this->load->view('footer');
    }

////////////////////////// INDEX PROJECT ////////////////////////////

    function index_project($id) {
        
        $_SESSION['project_id'] = $id;
        $this->session->set_userdata('project_id', $id);

        $p = new Project();

        $p->where('id', $id)->get();
        $data['project'] = $p;
        $data['list_member'] = $this->_list_members($id);
        
        
        $this->load->view('header');

        $header_project_data = array(
            'project_id' => $id,
            'project_name' => $p->projectname);
        $this->load->view('project_header', $header_project_data);

        $this->load->view('project_index', $data);
        $this->load->view('footer');
    }

    /**
    * @brief : renvoie la liste des membres d un projet (contributerus + watchers)
    * @param $p_id : l id du projet
    * @return : un tableau contenant la liste des membres
    */
    function _list_members($p_id)
    {
        $j = new join_projects_user();
        $j->where('project_id', $p_id)->where('relationship_type', 'member')->include_related('user', '*')->order_by('user_status', 'desc')->get(); // tous les members de ce projet

        $list_member = array();
        foreach($j as $m)
        {
            $tab['username'] = $m->user_username;
            $tab['user_status'] = $m->user_status;
            $tab['user_id'] = $m->user_id;

            array_push($list_member, $tab);
        }
        return $list_member;
    }

    /**
    * @brief : envoie une invitation a un user (avec un status)
    * @param $p_id : l id du projet pour lequel on invite
    */
    function send_invitation($p_id)
    {
        // tableau de status
        $j = new join_projects_user();
        $status_array = array();
        $status = $j->_get_user_status();

        $i = 0;
        foreach($status as $s)
        {
            if($s != '')
            {
                $status_array[$i] = $s;
                $i += 1;
            }
        }
        ////

        $data['error'] = '';

        if(!empty($_POST))
        {
            $u = new User();
            $u->where('username', $_POST['username'])->get();
            if($_POST['username'] === ''){$data['error'] = 'Please choose a member.';}
            else if($u->result_count() == 0){$data['error'] .= 'The user ' . $_POST['username'] . ' does not exist.';}
            else
            {
                $j = new Join_Projects_User();
                $j->user_id = $u->id;
                $j->project_id = $p_id;
                $j->user_status = $status_array[$_POST['status_id']];
                $j->relationship_type = 'invitation';

                if($j->save()){$data['success'] = 'Sent invitation';}
                else{$data['error'] .= $j->error->string;}
            }
        }

        $data['project_id'] = $p_id;
        $data['status_array'] = $status_array;

        $this->load->view('header');
        $this->load->view('send_invitation', $data);
        $this->load->view('footer');
    }

    ////////////////////////// EDIT PROJECT ////////////////////////////

    function edit_project($id) {
        $_SESSION['project_id'] = $id;
        $validMsg = array();
        $errorMsg1 = array();
        $errorMsg2 = array();

        // tableau de status
        $j = new join_projects_user();
        $status_array = array();
        $status = $j->_get_user_status();

        $i = 0;
        foreach($status as $s)
        {
            if($s != '')
            {
                $status_array[$i] = $s;
                $i += 1;
            }
        }
        ////

        if (!empty($_POST)) {
            $p = new Project();
            $p->id = $id;
            $p->get_by_id($id);
            $error = 0;

            $p->projectname = $_POST['projectname'];
            $p->description = $_POST['description'];
            $p->type = $_POST['type'];
            $p->giturl = $_POST['giturl'];

            foreach($_POST as $cle=>$post)
            {
                // modification du statut d un membre
                if(substr($cle, 0, 14) === 'status_member_')
                {
                    $j = new Join_Projects_User();
                    $j->where('project_id', $id)->where('user_id', substr($cle, 14))->get();
                    $j->user_status = $status_array[$post];
                    if(!$j->save()){$error = 1; array_push($errorMsg1, $j->error->all); $errorMsg1 = $errorMsg1['0'];}
                }
                ////

                // renvoie d un member
                else if(substr($cle, 0, 15) === 'dismiss_member_')
                {
                    $j = new Join_Projects_User();
                    $j->where('project_id', $id)->where('user_id', substr($cle, 15))->get();
                    if(!$j->delete()){$error = 1; array_push($errorMsg1, $j->error->all); $errorMsg1 = $errorMsg1['0'];}
                }
                ////

                // acceptation / rejet d une candidature
                else if(substr($cle, 0, 12) === 'candidature_')
                {
                    $j = new Join_Projects_User();
                    $j->where('project_id', $id)->where('user_id', substr($cle, 12))->get();
                    if($post === 'accept')
                    {
                        $j->user_status = $status_array[$_POST['status_candidate_' . substr($cle, 12)]];
                        $j->relationship_type = 'member';
                        if(!$j->save()){$error = 1; array_push($errorMsg1, $j->error->all); $errorMsg1 = $errorMsg1['0'];}
                    }
                    else if ($post === 'reject')
                    {
                        if(!$j->delete()){$error = 1; array_push($errorMsg1, $j->error->all); $errorMsg1 = $errorMsg1['0'];}
                    }
                }
                ////

                // modification du status d un invite
                else if(substr($cle, 0, 15) === 'status_invited_')
                {
                    $j = new Join_Projects_User();
                    $j->where('project_id', $id)->where('user_id', substr($cle, 15))->get();
                    $j->user_status = $status_array[$post];
                    if(!$j->save()){$error = 1; array_push($errorMsg1, $j->error->all); $errorMsg1 = $errorMsg1['0'];}
                }
                ////

                // annulation d une invitation
                else if(substr($cle, 0, 17) === 'close_invitation_')
                {
                    $j = new Join_Projects_User();
                    $j->where('project_id', $id)->where('user_id', substr($cle, 17))->get();
                    if(!$j->delete()){$error = 1; array_push($errorMsg1, $j->error->all); $errorMsg1 = $errorMsg1['0'];}
                }
                ////
            }


            // Update in bdd
            if (!$p->save()) {
                if ($p->error->all != '') {
                    $error = 1;
                    array_push($errorMsg1, $p->error->all);
                }
                $errorMsg1 = $errorMsg1['0'];
            }
            if($error == 0)
            {
                $validMsg['project_created'] = "<p> Project modified ! </p>";
            }
        }
        $p = new Project();
        $p->get_by_id($id);

        $list_member = array();
        $list_candidate = array();
        $list_invited = array();

        // liste members (contributeurs + watchers)
        $j = new join_projects_user();
        $j->where('project_id', $id)->where('relationship_type', 'member')->include_related('user', '*')->order_by('user_status', 'desc')->get(); // tous les members de ce projet
        foreach($j as $m)
        {
            $tab['username'] = $m->user_username;
            $tab['user_status'] = $m->user_status;
            $tab['user_id'] = $m->user_id;
            $tab['status_id'] = '';
            foreach($status as $key => $value){if($value === $m->user_status){$tab['status_id'] = $key; continue;}}

            array_push($list_member, $tab);
        }
        ////

        // liste candidats
        $j = new join_projects_user();
        $j->where('project_id', $id)->where('relationship_type', 'candidacy')->include_related('user', '*')->get(); // tous les members de ce projet
        foreach($j as $c)
        {
            $tab['username'] = $c->user_username;
            $tab['user_status'] = $c->user_status;
            $tab['user_id'] = $c->user_id;

            array_push($list_candidate, $tab);
        }
        ////

        // liste invitations
        $j = new join_projects_user();
        $j->where('project_id', $id)->where('relationship_type', 'invitation')->include_related('user', '*')->get(); // tous les members de ce projet
        foreach($j as $i)
        {
            $tab['username'] = $i->user_username;
            $tab['user_status'] = $i->user_status;
            $tab['user_id'] = $i->user_id;
            foreach ($status as $key => $value){if($value === $i->user_status){$tab['status_id'] = $key;continue;}}

            array_push($list_invited, $tab);
        }
        ////


        $data['project'] = $p;

        $data['list_member'] = $list_member;
        $data['list_candidate'] = $list_candidate;
        $data['list_invited'] = $list_invited;
        $data['status_array'] = $status_array;
        $data['validMsg'] = $validMsg;
        $data['errorMsg1'] = $errorMsg1;
        $data['errorMsg2'] = $errorMsg2;

        $this->load->view('header');

        $header_project_data = array(
            'project_id' => $id,
            'project_name' => $p->projectname);
        $this->load->view('project_header', $header_project_data);

        $this->load->view('project_edit', $data);
        $this->load->view('footer');
    }


///////////////////////// DELETE PROJECT ////////////////////////////

    function delete_project($id) {

        $validMsg = array();
        $errorMsg1 = array();
        $errorMsg2 = array();

        $p = new Project();

        if ($p->where('id', $id)->get()->delete()) {
            
        } else {
            if ($p->error->all != '') {
                $validMsg['project_delete'] = "<p> Project deleted ! </p>";
            }
            array_push($errorMsg1, $p->error->all);
            $errorMsg1 = $errorMsg1['0'];

            $data['validMsg'] = $validMsg;
            $data['errorMsg1'] = $errorMsg1;
        }
        
        redirect('user/projectList');
    }

}