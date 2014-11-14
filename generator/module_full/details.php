<?php defined('BASEPATH') or exit('No direct script access allowed');

class Module_{generator_name} extends Module {

	public $version = '1.0';

	public function info()
	{
		return array(
			'name' => array(
				'en' => '{generator_name}'
				),
			'description' => array(
				'en' => '{description}'
				),
			'frontend' => {frontend},
			'backend' => {backend},
			'menu' => 'content', // You can also place modules in their top level menu. For example try: 'menu' => '{generator_name}',
			'sections' => array(
				'items' => array(
					'name' 	=> '{module_name_l}:items', // These are translated from your language file
					'uri' 	=> 'admin/{module_name_l}',
					'shortcuts' => array(
						'create' => array(
							'name' 	=> '{module_name_l}:create',
							'uri' 	=> 'admin/{module_name_l}/create',
							'class' => 'add'
							)
						)
					)
				)
			);
	}

	public function install()
	{
		$this->dbforge->drop_table('{module_name_l}');
		//$this->db->delete('settings', array('module' => '{module_name_l}'));

		// $this->load->library('files/files');
		// Files::create_folder(0, '{module_name_l}');

		${module_name_l} = array(
			'id' => array(
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE
				),
			'order' => array(
				'type' => 'INT',
				'constraint' => '11',
				'null' => true
				),
			{details_fields}
			);

		// ${module_name_l}_setting = array(
		// 	'slug' => '{module_name_l}_setting',
		// 	'title' => '{generator_name} Setting',
		// 	'description' => 'A Yes or No option for the {generator_name} module',
		// 	'`default`' => '1',
		// 	'`value`' => '1',
		// 	'type' => 'select',
		// 	'`options`' => '1=Yes|0=No',
		// 	'is_required' => 1,
		// 	'is_gui' => 1,
		// 	'module' => '{module_name_l}'
		// 	);

		$this->dbforge->add_field(${module_name_l});
		$this->dbforge->add_key('id', TRUE);

		if($this->dbforge->create_table('{module_name_l}') AND
		   //$this->db->insert('settings', ${module_name_l}_setting) AND
			is_dir($this->upload_path.'{module_name_l}') OR @mkdir($this->upload_path.'{module_name_l}',0777,TRUE))
		{
			return TRUE;
		}
	}

	public function uninstall()
	{
		// $this->load->library('files/files');
		// $this->load->model('files/file_folders_m');
		// $folder = $this->file_folders_m->get_by('name', '{module_name_l}');
		// Files::delete_folder($folder->id);
		$this->dbforge->drop_table('{module_name_l}');
		//$this->db->delete('settings', array('module' => '{module_name_l}'));
		{
			return TRUE;
		}
	}


	public function upgrade($old_version)
	{
		// Your Upgrade Logic
		return TRUE;
	}

	public function help()
	{
		// Return a string containing help info
		// You could include a file and return it here.
		return "No documentation has been added for this module.<br />Contact the module developer for assistance.";
	}
}
/* End of file details.php */
