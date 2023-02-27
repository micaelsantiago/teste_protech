<?php
class Home extends CI_Controller {
	public function index() {
		$data['resultNotes'] = $this->crud_model->getAllNotes();
		$this->load->view("home", $data);
		$this->load->helper('url');	
	}

	public function addNotes() {
	    $this->form_validation->set_rules('titleNote', 'Título do aviso', 'required');
	    $this->form_validation->set_rules('contentNote', 'Conteúdo do aviso', 'required');
	    $this->form_validation->set_rules('typeNote[]', 'Tipo do aviso', 'required');
	    $this->form_validation->set_rules('permissionNote', 'Permissão do aviso', 'required');

	    if ($this->form_validation->run() == false) {
	        $data_error = ['error' => validation_errors()];
	        $this->session->set_flashdata($data_error);
	        redirect(base_url());
	    }

	    $typeNoteArray = $this->input->post('typeNote[]');
	    $typeNote = implode(', ', $typeNoteArray);

	    $this->crud_model->addNotes([
	        'title_boletim' => $this->input->post('titleNote'),
	        'description_boletim' => $this->input->post('contentNote'),
	        'type_user' => $typeNote,
	        'permissions_user' => $this->input->post('permissionNote')
	    ]);

	    redirect(base_url());
	}

	public function removeNotes($id_boletim) {
		$result = $this->crud_model->deleteItem($id_boletim);

		redirect(base_url('home/searchNotes'));
	}

	public function editNotes($id_boletim) {
		$data['singleNote'] = $this->crud_model->editSingleNote($id_boletim);
		$this->load->view('editNote', $data);
	}

	public function updateNote($id_boletim) {
		$this->form_validation->set_rules('titleNote', 'Título do aviso', 'required');
		$this->form_validation->set_rules('contentNote', 'Conteúdo do aviso', 'required');
		$this->form_validation->set_rules('typeNote[]', 'Tipo do aviso', 'required');
		$this->form_validation->set_rules('permissionNote', 'Permissão do aviso', 'required');

		if($this->form_validation->run() == false) {
			$data_error = [ 'error' => validation_errors() ];

			$this->session->set_flashdata($data_error);
		}

		else {
			$typeNoteArray = $this->input->post('typeNote[]');
    		$typeNote = implode(', ', $typeNoteArray);

			$this->crud_model->updateNotes([
				'title_boletim' => $this->input->post('titleNote'),
				'description_boletim' => $this->input->post('contentNote'),
				'type_user' => $typeNote,
				'permissions_user' => $this->input->post('permissionNote')
			], $id_boletim);
		}

		redirect(base_url());
	}

	public function viewNote($id_boletim) {
		$data['note'] = $this->crud_model->viewNotes($id_boletim);
		$this->load->view('viewNote', $data);
	}

	public function searchNotes() {
		$title = $this->input->post('titleNote');
		$type = $this->input->post('typeNote');
		$permission = $this->input->post('permissionNote');
		$permissionDefault = 'Geral';
		$permissionSecondary = '';

		if ($this->input->post('permissionNote') == 'Diretoria') {
			$permissionSecondary = 'Funcionários';
		}

		$resultNotes = $this->crud_model->searchNote($title, $type, $permission, $permissionDefault, $permissionSecondary);;

		$data = array(
		  'resultNotes' => $resultNotes
		);

		$this->load->view('searchNotes', $data);
	}
}