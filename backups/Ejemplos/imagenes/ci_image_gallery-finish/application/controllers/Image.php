<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Image extends CI_Controller {

	private $limit = 4;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('image_model', 'image');
	}

	public function index()
	{
		$query      = $this->image->all($this->limit);
		$total_rows = $this->image->count();		
		$links      = pagination($total_rows, $this->limit);
		
		$this->load->view("image/index", compact('query', 'total_rows', 'links'));
	}

	public function create()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules("title", "Judul", "trim|required");
		
		if ($this->form_validation->run() == true) 
		{
			$status = $this->image->save();
			if ($status) {
				$this->session->set_flashdata("message", "Data sukses disimpan");
				redirect("image");
			}
		}

		$this->load->view("image/form");
	}

	public function update($id)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules("title", "Judul", "trim|required");
		
		if ($this->form_validation->run() == true) 
		{
			$status = $this->image->save($id);
			if ($status) {
				$this->session->set_flashdata("message", "Data sukses diupdate");
				redirect("image");
			}
		}

		$row = $this->image->find($id);
		$this->load->view("image/form", compact('row'));
	}

	public function delete($id)
	{
		$status = $this->image->delete($id);
		if ($status) {
			$this->session->set_flashdata("message", "Data sukses dihapus");
			redirect("image");
		}
	}

}