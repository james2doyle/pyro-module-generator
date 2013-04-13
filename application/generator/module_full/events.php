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

        //register the public_controller event
        Events::register('public_controller', array($this, 'run'));

		//register a second event that can be called any time.
		// To execute the "run" method below you would use: Events::trigger('{module_name_l}_event');
		// in any php file within PyroCMS, even another module.
		Events::register('{module_name_l}_event', array($this, 'run'));
    }

    public function run()
    {
        $this->ci->load->model('{module_name_l}/{module_name_l}_m');

        // we're fetching this data on each front-end load. You'd probably want to do something with it IRL
        $this->ci->{module_name_l}_m->limit(5)->get_all();
    }

}
/* End of file events.php */