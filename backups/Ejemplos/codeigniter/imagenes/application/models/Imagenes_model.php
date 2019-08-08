<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Imagenes_model extends CI_Model {

	private $table = "accesorio";

	public function all($limit = 8)
	{
		$this->db->limit($limit);
		$this->db->offset( $this->uri->segment(3) );
		return $this->db->get($this->table);
	}

	public function count()
	{
		return $this->db->count_all_results($this->table);
	}

	public function latest()
	{
		$this->db->order_by("fechaUpdate", "desc");

		return $this;
	}

	
	public function find($id)
	{
		$this->db->where("id", $id);
		$query = $this->db->get($this->table);
		return $query->num_rows() ? $query->row() : null;
	}

	public function random_images($except, $limit = 2)
	{
		return $this->db->query("SELECT * FROM {$this->table} WHERE idAccesorio != ? ORDER BY RAND() LIMIT ?", array($except, $limit));
	}


	public function save($idAccesorio = null)
	{
		$post['idModelo'] = $this->input->post('idModelo');
		$post['color'] = $this->input->post("color");
		$post['precio'] = $this->input->post('precio');
		$post['cantidad'] = $this->input->post('cantidad');


		$config['upload_path'] = "./assets/uploads/";
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_width'] = "1920";
		$config['max_height'] = "1080";

		$this->load->library('upload', $config);
		if ($this->upload->do_upload("filename")) 
		{
			$data = $this->upload->data();
			$post['filename'] = $data['file_name'];

			// create thumbnail
			$config['image_library'] = 'gd2';
			$config['source_image'] = $config['upload_path'] . $data['file_name'];
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['width']         = 250;
			$config['height']       = 150;
			$this->load->library('image_lib', $config);

			$this->image_lib->resize();

			$post['thumbnail'] = str_replace($data['file_ext'], "_thumb" . $data['file_ext'], $data['file_name']);
		}

		if ($id) 
		{
			$this->db->where("idAccesorio", $idAccesorio);
			$this->db->update($this->table, $post);
			return $this->db->affected_rows();
		}
		else 
		{
			$this->db->insert($this->table, $post);
			return $this->db->insert_id();
		}
	}

	public function delete($idAccesorio)
	{
		$row = $this->find($idAccesorio);
		if ( ! empty($row)) 
		{
			if (file_exists("./assets/uploads/" . $row->filename))
				unlink("./assets/uploads/" . $row->filename);	
			if (file_exists("./assets/uploads/" . $row->thumbnail)) 
					unlink("./assets/uploads/" . $row->thumbnail);	
		}

		$this->db->where("idAccesorio", $idAccesorio);
		$this->db->delete($this->table);
		return $this->db->affected_rows();
	}

	public function visible()
	{
		$this->db->where("estado", 1);
		return $this;
	}

}