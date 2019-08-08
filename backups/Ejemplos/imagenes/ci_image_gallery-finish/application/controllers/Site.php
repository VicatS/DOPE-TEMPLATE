<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {

	private $limit = 4;

	public function __construct()
	{
		parent::__construct();

		$this->load->model('image_model', 'image');
	}

	public function index()
	{
		$query      = $this->image->visible()->all($this->limit);
		$total_rows = $this->image->visible()->count();		
		$links      = pagination($total_rows, $this->limit);

		$this->load->view("site/index", compact('query', 'total_rows', 'links'));
	}

	public function latest()
	{
		$query      = $this->image->latest()->visible()->all($this->limit);
		$total_rows = $this->image->visible()->count();		
		$links      = pagination($total_rows, $this->limit);

		$this->load->view("site/index", compact('query', 'total_rows', 'links'));
	}

	public function popular()
	{
		$query      = $this->image->popular()->visible()->all($this->limit);
		$total_rows = $this->image->visible()->count();		
		$links      = pagination($total_rows, $this->limit);

		$this->load->view("site/index", compact('query', 'total_rows', 'links'));
	}

	public function detail($id)
	{
		$row = $this->image->find($id);
		if (empty($row)) {
			show_404();
		}

		$this->image->view_count($id);

		$random_images = $this->image->random_images($id);
		$left_image = $random_images->first_row();
		$right_image = $random_images->last_row();
		$this->load->view("site/detail", compact('row', 'left_image', 'right_image'));
	}

	public function download()
	{
		if ( ! empty($_POST['image_id'])) 
		{
			$id = $this->input->post('image_id');	
			$row = $this->image->find($id);
			$this->image->download_count($id);
			$this->load->helper('download');
			force_download("./assets/uploads/" . $row->filename, NULL);
		}
	}

	// public function generate()
	// {
	// 	for ($i = 1; $i <= 8; $i++) 
	// 	{
	// 		$title = "Image " . $i;

	// 		$this->db->insert("images", array(
	// 			'title' => $title,
	// 			'filename' => urlencode($title) . ".jpg",
	// 			'created_at' => date("Y-m-d H:i:s"),
	// 			'view_count' => rand(0, 10),
	// 			'download_count' => rand(0, 10)
	// 		));

	// 		echo $this->db->last_query();
	// 	}
	// }

}