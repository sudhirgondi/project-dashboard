<?php

class Project_user_model extends CI_Model
{

		function get_project_user_info($email)
		{
			return $this->db->where('email', $email)
						->get("project_users")
						->row();
		}

		function get_project_user_info_id($id)
		{
			return $this->db->where('id', $id)
						->get("project_users")
						->row();
		}

		function insert_project_user($user)
		{
			$this->db->set('created_at', 'NOW()', FALSE);
			$this->db->set('updated_at', 'NOW()', FALSE);
			return $this->db->insert("project_users", $user);
		}

		function load_user_data($user)
		{

		}
}