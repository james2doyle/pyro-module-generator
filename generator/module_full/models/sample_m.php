<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * {description}
 *
 * @author 		{author}
 * @website		{website}
 * @package 	{package}
 * @subpackage 	{subpackage}
 * @copyright 	{copyright}
 */
class {module_name_l}_m extends MY_Model {

	private $folder;

	public function __construct()
	{
		parent::__construct();
		$this->_table = '{module_name_l}';
		// $this->load->model('files/file_folders_m');
		// $this->load->library('files/files');
		// $this->folder = $this->file_folders_m->get_by('name', '{module_name_l}');
	}

	//create a new item
	public function create($input)
	{
		// $fileinput = Files::upload($this->folder->id, FALSE, 'fileinput');
		$to_insert = array(
			// 'fileinput' => json_encode($fileinput);
			{model_fields}
		);

		return $this->db->insert('{module_name_l}', $to_insert);
	}

	//edit a new item
	public function edit($id = 0, $input)
	{
		// $fileinput = Files::upload($this->folder->id, FALSE, 'fileinput');
		$to_insert = array(
			{model_fields}
		);

		// if ($fileinput['status']) {
		// 	$to_insert['fileinput'] = json_encode($fileinput);
		// }

		return $this->db->where('id', $id)->update('{module_name_l}', $to_insert);
	}
}
