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
class Plugin_{module_name_l} extends Plugin
{
	/**
	 * Item List
	 * Usage:
	 *
	 * {{ {module_name_l}:items limit="5" order="asc" }}
	 *      {{ id }} {{ name }} {{ slug }}
	 * {{ /{module_name_l}:items }}
	 *
	 * @return	array
	 */
	function items()
	{
		$this->load->model('{module_name_l}/{module_name_l}_m');
		return $this->{module_name_l}_m->get_all();
	}
}

/* End of file plugin.php */