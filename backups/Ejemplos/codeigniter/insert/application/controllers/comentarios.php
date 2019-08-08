<?php
class Comentarios extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('comentarios_model');
	}
	
	function index()
	{
        $this->load->view('comentarios_view');
	}
	
	//funcion para procesar el formulario
	function insertar_comentarios()
    {
    	//si se ha pulsado el botón submit validamos el formulario con codeIgniter
		if($this->input->post('submit'))
		{
			//hacemos las comprobaciones que deseemos en nuestro formulario
			$this->form_validation->set_rules('nombre','nombre','trim|required|xss_clean|max_lenght[50]|min_length[2]');
			$this->form_validation->set_rules('email','email','trim|valid_email|required|xss_clean');
			$this->form_validation->set_rules('asunto','asunto','trim|required|xss_clean|max_lenght[250]|min_length[10]');
			$this->form_validation->set_rules('mensaje','mensaje','trim|required|xss_clean');
			
			//validamos que se introduzcan los campos requeridos con la función de ci required
			$this->form_validation->set_message('required', 'Campo %s es obligatorio');
			//validamos el email con la función de ci valid_email
			$this->form_validation->set_message('valid_email', 'El %s no es v&aacute;lido');
			//comprobamos que se cumpla el mínimo de caracteres introducidos
			$this->form_validation->set_message('min_length', 'Campo %s debe tener al menos %s car&aacute;cteres');
			//comprobamos que se cumpla el máximo de caracteres introducidos
			$this->form_validation->set_message('max_length', 'Campo %s debe tener menos %s car&aacute;cteres');
			
			if (!$this->form_validation->run())
			{
				//si no pasamos la validación volvemos al formulario mostrando los errores
				$this->index();
			}
			//si pasamos la validación correctamente pasamos a hacer la inserción en la base de datos
			else 
			{
				$nombre = $this->input->post('nombre');	
				$email = $this->input->post('email');		
				$asunto = $this->input->post('asunto');							
				$mensaje = $this->input->post('mensaje');
				//conseguimos la hora de nuestro país, en mi caso españa
				date_default_timezone_set("Europe/Madrid");
	        	$fecha = date('Y-m-d');
	         	$hora= date("H:i:s");
				//ahora procesamos los datos hacía el modelo que debemos crear
				$nueva_insercion = $this->comentarios_model->nuevo_comentario(
					$nombre,
					$email,
					$asunto,
					$mensaje,
					$fecha,$hora
				);
				redirect(base_url("comentarios"), "refresh");
			}
		}
    }
}

/*fin del archivo comentarios*/