<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Permission extends MY_Controller
{
	protected $crud;
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('tools','permission'));
		if (!$this->ion_auth->is_admin()) {
			redirect('dashboard/index','refresh');
		}
	}

	public function index($controller_name='',$group_id='')
	{
		$this->load->model(array('permissions','groups'));

		if (!empty($controller_name)) {
			$site_url 	= site_url($controller_name.'/json_get_methods');
			if (function_exists('get_http_response_code')) {
				if (get_http_response_code($site_url) == '200') {
					$json 			= file_get_contents($site_url);
					$data['actions']= json_decode($json);
				}
			}
			
		}
		$controllers 	= array();
		if (function_exists('get_controllers_names')) {
			$controllers = get_controllers_names();
		}

		$app_controllers = array();
		if ($controllers) {
			foreach ($controllers as $key => $value) {
				
				if (stripos($value, 'app') !== false) {
					
					$app_controllers[] = $value;
				}
				
			}
		}
		$data['controller_name'] = $controller_name;
		
		$data['group_id']		 = $group_id;

		$data['actions_selected'] = $this->permissions->get_actions_by_modul_and_group_id($controller_name,$group_id);

		$data['modules'] = $app_controllers;
		$data['groups']	 = $this->groups->get_all();
		
		$this->layout->set_template('dashboard_template')
			->add_breadcrumb_item('Home',site_url('dashboard/index'))
			->add_breadcrumb_item('Permission',site_url('permission/index'))
            ->set_title('Set permissions')
            ->render_action_view($data);
	}

}