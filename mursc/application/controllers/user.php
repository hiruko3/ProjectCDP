<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
{
	private $_id; /** uniq user id : int */
	private $_pseudo; /** uniq user name : string */
	private $_pass; /** user password : string */
	private $_projects_id = array(); /** contient les projects id des projets suivis (contributeur ou watcher) : *int */
	private $_c_invitations = array(); /** contient les contributor invitations : *C_Invitation */
	private $_w_invitations = array(); /** contient les watcher invitations : *W_Invitation */

	/**
	* @brief : cree un nouvel user (inscription)
	*/
	public function construct()
	{
		/** @todo : inscription (creer vue) */
		/** DOING */
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
	public function set_pseudo($pseudo)
	{
		/** @todo */
	}
	
	/**
	* @brief : retourne l id
	* @return (int) : l id
	*/
	public function get_id()
	{
		/** @todo */
	}
	
	/**
	* @brief : retourne le pseudo
	* @return (string) : le pseudo
	*/	
	public function get_pseudo()
	{
		/** @todo */
	}
	
	/**
	* @brief : afficher la liste des projets (vue projects)
	*/
	public function list_projects()
	{
		/** @todo (creer une vue)*/
	}
	
	/**
	* @brief : ajoute un projet a la liste (a appeller lors de la creation de projet ou l acceptation d une invitation par exemple)
	*/
	public function add_project()
	{
		/** @todo */
	}
	
	/**
	* @brief : liste les invitations
	*/
	public function list_invitations()
	{
		/** @todo (creer une vue) */
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
	* @param project_id (int) : le projet auquel on candidate
	*/
	public function send_candidacy($project_id)
	{
		/** @todo */
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
