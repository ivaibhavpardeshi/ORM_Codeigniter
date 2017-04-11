<?php

/**
 *  VERSION 1.0
 * 
 *  MyModel.php
 *  This class act like ORM for codeigniter framework. Methods in this class will help you to call 
 *  like OOP's type method calling.
 *
 *	@package   MyModel
 *  @author    Vaibhav Kishoringh Pardeshi
 *  @copyright ivaibahvpardeshi@gmail.com
 *  @link  	   https://github.com/ivaibhavpardeshi
 *
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model
{
	private $_table = "";

	public function __construct()
	{
		parent :: __construct();
	}

	/**
	 * 	 Table Set related functions
	 */

	public function checkTableExist($table)
	{
		/**
		 *  This function checks wheather given table exist in database ?
		 *  Success : TRUE
		 *  FAILURE : FALSE
		 */
		
		return $this->db->query("SHOW TABLES LIKE '".htmlspecialchars($table)."'");
	}

	public function checkTableIsSet()
	{
		/**
		 * 	This function checks $_table property is set or not ?
		 *  Success : TRUE
		 *  Error   : FALSE
		 */
		
		if(!(isset($this->_table)))
			return;
		else
			return TRUE;
	}

	public function setTable($table)
	{
		/**
		 * This method is called to set table name for performing query operation
		 * Success : TRUE
		 * FAILURE : FALSE
		 */
		
		// First check table exist in database or not
		if(!$this->checkTableExist($table))
			return;

		$this->_table = htmlspecialchars($table);	// Set the $_table propery
		return TRUE;
	}

	/**
	 * 	Select related functions
	 */
	
	public function fetchById($id = 0)
	{
		/**
		 * This method fetch all row from database corrosponding specified ID
		 * Success : Object 
		 * Failure : NULL
		 */
		
		if(!($this->checkTableIsSet()))
			return;

		if(empty($id))
			return;

		return $this->db->where(array('id',$id))
						->get($this->_table)
						->row();
	}

	public function fetchAll()
	{
		/**
		 * This method fetches all rows from given table
		 * Success : Object
		 * Failure : NULL
		 */
		
		if(!($this->checkTableIsSet()))
			return;

		return $this->db->get($this->_table)
						->result();
	}

	public function fetchByArray($where)
	{
		/**
		 * 	This function fetches records based on given where array
		 *  Success : Object
		 *  Failure : FALSE
		 */
		if(!($this->checkTableIsSet()))
			return;

		if(empty($where))
			return;

		return $this->db->where($where)
						->get($this->_table)
						->result();
	}

	/**
	 * 	insert related functions
	 */
	
	public function insert($data)
	{
		/**
		 * 	This function is used to insert the data into the table with the data $data
		 *  Success : last inserted id
		 *  Error   : FALSE/Null
		 */
		
		if(!($this->checkTableIsSet()))
			return;

		if(empty($data))
			return;

		$this->db->insert($this->_table,$data);
		return $this->db->insert_id;
	}

	/**
	 * 	update related functions
	 */
	
	public function update($data,$where)
	{
		/**
		 * 	This function updates the table row satisfying $where array
		 *  Success : TRUE
		 *  FAILURE : FALSE/NULL
		 */
		
		if(!($this->checkTableIsSet()))
			return;

		if(empty($data))
			return;
		
		return $this->db->where($where)
						->update($this->_table,$data);
	}

	/**
	 * 	Delete related functions
	 *  Success : TRUE
	 *  FAILURE : FALSE
	 */

	public function delete($where)
	{
		/**
		 * 	This function deletes particular row from table
		 */
		
		if(!($this->checkTableIsSet()))
			return;

		if(empty($data))
			return;

		return $this->db->where($where)
						->delete($this->_table);
	}
}