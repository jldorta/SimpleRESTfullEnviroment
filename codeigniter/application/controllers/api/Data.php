<?php
	
use chriskacerguis\RestServer\RestController;

class Data extends RestController {
	
	private $tables = [];
	
	private $fields = [];
	
	function __construct() {
		parent::__construct();
		
		$this->load->database();
		$this->db->query("SET time_zone='".date('P')."'");

		$this->tables = $this->db->list_tables();
		
		if (empty($method = $this->router->method) || $method == 'index')
			$this->response("Bad Request", 400);
			
		if (!in_array($method, $this->tables))
			$this->response("Not Found", 404);
			
		if (empty($this->fields = $this->db->list_fields($method)))
			$this->response("Method Not Allowed", 405);
	
	}
	
	public function index_get($object = '', $id = 0, $relations = []) {

		if (!empty($relations)) {
			
		}
		
		foreach ($this->get() as $key => $value) {
			if (in_array($key, $this->fields)) {
				$this->db->where("`{$object}`.{$key}", $value, true);
			}
			
			if (($end = strpos($key, "_like")) && ($key = substr($key, 0, $end))) {
				$this->db->like("`{$object}`.{$key}", $value,);
			}
		}
		
		if ($id)
			$this->db->where("`{$object}`.id", (int)$id, FALSE);
		if($query = $this->db->get($object)) 
			$this->response(empty($id) ? $query->result() : $query->row());
		else
			$this->response("Not Found", 404);
		
	}
	
	public function index_post($object = '') {
		$request = (object)$this->post();
		
		$data = [];
		foreach ($fields as $field) {
			if (isset($request->{$field}))
				$data[$field] = $request->{$field};
		}
		
		if ($this->db->insert($object, $data)) {
			$this->index_get($object, $this->db->insert_id(), 201);
		}
	}
	
	public function index_put($object = '', $id = 0) {
		if (empty($id)) {
			$this->response("Bad Request", 400);
		}
		
		$request = (object)$this->put();
		
		$data = [];
		foreach ($fields as $field) {
			if (isset($request->{$field}))
				$data[$field] = $request->{$field};
		}
		
		$this->db->where("`{$object}`.id", (int)$id, FALSE);
		if ($this->db->update($object, $data)) {
			$this->index_get($object, $id, 202);
			
		}
	}
	
	public function index_delete($object = '', $id = 0) {
		if (empty($id)) {
			$this->response("Bad Request", 400);
		}
		
		$this->db->where("`{$object}`.id", (int)$id, FALSE);
		if ($this->db->delete($object))
			$this->response(true);
		else
			$this->response("Not Found", 404);
	}
	
}