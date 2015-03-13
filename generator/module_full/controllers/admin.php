<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * {description}
 *
 * @author       {author}
 * @website      {website}
 * @package      {package}
 * @subpackage   {subpackage}
 * @copyright    {copyright}
 */
class Admin extends Admin_Controller
{
	protected $section = 'items';

	public function __construct()
	{
		parent::__construct();

		// Load all the required classes
		$this->load->model('{module_name_l}_m');
		$this->load->library('form_validation');
		$this->lang->load('{module_name_l}');

		// $this->load->library('files/files');
		// $this->load->model('files/file_folders_m');

		// Set the validation rules
		$this->item_validation_rules = array(
			{validation_fields}
		);

		// We'll set the partials and metadata here since they're used everywhere
		$this->template->append_js('module::admin.js')
						->append_css('module::admin.css');
	}

	/**
	 * List all items
	 */
	public function index()
	{
		${module_name_l} = $this->{module_name_l}_m->order_by('order')->get_all();
			$this->template
		->title($this->module_details['name'])
		->set('{module_name_l}', ${module_name_l})
		->build('admin/index');
	}

	public function create()
	{
		${module_name_l} = new StdClass();
		// $folder = $this->file_folders_m->get_by('name', '{module_name_l}');
		// $this->data->files = Files::folder_contents($folder->id);
		// Set the validation rules from the array above
		$this->form_validation->set_rules($this->item_validation_rules);

		// check if the form validation passed
		if($this->form_validation->run())
		{
			// See if the model can create the record
			if($this->{module_name_l}_m->create($this->input->post()))
			{
				// All good...
				$this->session->set_flashdata('success', lang('{module_name_l}.success'));
				redirect('admin/{module_name_l}');
			}
			// Something went wrong. Show them an error
			else
			{
				$this->session->set_flashdata('error', lang('{module_name_l}.error'));
				redirect('admin/{module_name_l}/create');
			}
		}
		${module_name_l}->data = new StdClass();
		foreach ($this->item_validation_rules AS $rule)
		{
			${module_name_l}->data->{$rule['field']} = $this->input->post($rule['field']);
		}
		$this->_form_data();
		// Build the view using sample/views/admin/form.php
		$this->template->title($this->module_details['name'], lang('{module_name_l}.new_item'))
						->build('admin/form', ${module_name_l}->data);
	}

	public function edit($id = 0)
	{
		$this->data = $this->{module_name_l}_m->get($id);

		// $this->load->model('files/file_folders_m');
		// $folder = $this->file_folders_m->get_by('name', '{module_name_l}');
		// $this->data->files = Files::folder_contents($folder->id);

		// Set the validation rules from the array above
		$this->form_validation->set_rules($this->item_validation_rules);

		// check if the form validation passed
		if($this->form_validation->run())
		{
			// get rid of the btnAction item that tells us which button was clicked.
			// If we don't unset it MY_Model will try to insert it
			unset($_POST['btnAction']);

			// See if the model can create the record
			if($this->{module_name_l}_m->edit($id, $this->input->post()))
			{
				// All good...
				$this->session->set_flashdata('success', lang('{module_name_l}.success'));
				redirect('admin/{module_name_l}');
			}
			// Something went wrong. Show them an error
			else
			{
				$this->session->set_flashdata('error', lang('{module_name_l}.error'));
				redirect('admin/{module_name_l}/create');
			}
		}
		// starting point for file uploads
		// $this->data->fileinput = json_decode($this->data->fileinput);
		$this->_form_data();
		// Build the view using sample/views/admin/form.php
		$this->template->title($this->module_details['name'], lang('{module_name_l}.edit'))
						->build('admin/form', $this->data);
	}

	public function _form_data()
	{
		// $this->load->model('pages/page_m');
		// $this->template->pages = array_for_select($this->page_m->get_page_tree(), 'id', 'title');
	}

	public function delete($id = 0)
	{
		// make sure the button was clicked and that there is an array of ids
		if (isset($_POST['btnAction']) AND is_array($_POST['action_to']))
		{
			// pass the ids and let MY_Model delete the items
			$this->{module_name_l}_m->delete_many($this->input->post('action_to'));
		}
		elseif (is_numeric($id))
		{
			// they just clicked the link so we'll delete that one
			$this->{module_name_l}_m->delete($id);
		}
		redirect('admin/{module_name_l}');
	}
	public function order() {
		$items = $this->input->post('items');
		$i = 0;
		foreach($items as $item) {
			$item = substr($item, 5);
			$this->{module_name_l}_m->update($item, array('order' => $i));
			$i++;
		}
	}
}
