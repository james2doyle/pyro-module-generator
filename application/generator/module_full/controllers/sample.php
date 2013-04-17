<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * {description}
 *
 * @author      {author}
 * @website     {website}
 * @package     {package}
 * @subpackage  {subpackage}
 * @copyright   {copyright}
 */
class {module_name_l} extends Public_Controller
{

    /**
     * The constructor
     * @access public
     * @return void
     */
    public function __construct()
    {
      parent::__construct();
      $this->lang->load('{module_name_l}');
      $this->load->model('{module_name_l}_m');
      $this->template->append_css('module::{module_name_l}.css');
    }
     /**
     * List all {module_name_l}s
     *
     *
     * @access  public
     * @return  void
     */
     public function index()
     {
      // bind the information to a key
      $data['{module_name_l}'] = (array)$this->{module_name_l}_m->get_all();
      // Build the page
      $this->template->title($this->module_details['name'])
      ->build('index', $data);
    }

  }

/* End of file {module_name_l}.php */