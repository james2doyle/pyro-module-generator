<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * {module_name_l} Events Class
 *
 * @author      {author}
 * @website     {website}
 * @package     {package}
 * @subpackage  {subpackage}
 * @copyright   {copyright}
 */
class Events_{module_name_l} {

	protected $ci;

	public function __construct()
	{
		$this->ci =& get_instance();

		// load up the basic tools for the search index
		$this->ci->load->model('search/search_index_m');
		$this->ci->load->model('keywords/keyword_m');
		$this->ci->load->library('keywords/keywords');

		// load up module model
		$this->ci->load->model('{module_name_l}/{module_name_l}_m');

		// Triggers are already in the admin controller, but commented
		// To execute the methods below you would use:
		// Events::trigger('{module_name_l}_created', $id);

		Events::register('{module_name_l}_created', array($this, 'index_{module_name_l}'));
		Events::register('{module_name_l}_updated', array($this, 'index_{module_name_l}'));
		Events::register('{module_name_l}_deleted', array($this, 'drop_{module_name_l}'));
	}

	public function index_{module_name_l}($id)
	{

		$item = $this->ci->{module_name_l}_m->get($id);

		$keywords = Keywords::process("{$item->title},{generator_name}");

		$description = "Entry in {generator_name} called {$item->title}.";

		$this->ci->search_index_m->index(
			'{module_name_l}',
			'{module_name_l}:{module_name_l}',
			'{module_name_l}:{module_name_l}',
			$id,
			$item->slug,
			$item->title,
			$description,
			array(
				'cp_edit_uri'   => 'admin/{module_name_l}/edit/'.$id,
				'cp_delete_uri' => 'admin/{module_name_l}/delete/'.$id,
				'keywords'      => $keywords,
				)
			);
	}

	public function drop_{module_name_l}($ids)
	{
		foreach ($ids as $id)
		{
			$this->ci->search_index_m->drop_index('{module_name_l}', '{module_name_l}:{module_name_l}', $id);
		}
	}

}
/* End of file events.php */