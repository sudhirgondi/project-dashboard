<?php

class User_model extends CI_Model
{

		function get_user_info($email)
		{
			return $this->db->where('email', $email)
						->get("users")
						->row();
		}

		function get_user_info_id($id)
		{
			return $this->db->where('id', $id)
						->get("users")
						->row();
		}

		function register_user($user)
		{
			$this->db->set('created_at', 'NOW()', FALSE);
			$this->db->set('updated_at', 'NOW()', FALSE);
			return $this->db->insert("users", $user);
		}

		function is_user_tabel_empty()
		{
			return $this->db->get("users")
						->row();
		}

		function get_last_user_id()
		{
			return mysql_insert_id();
		}
}