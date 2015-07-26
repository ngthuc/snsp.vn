<?php

defined('PHPFOX') or exit('NO DICE!');

class Bootstraptheme_Component_Controller_Admincp_Btslideshow extends Phpfox_Component
{
	public function process()
	{
		$slides = Phpfox::getService('bootstraptheme.slide')->getSlides();
		$this->template()
			->setBreadcrumb('Slideshow Manage')
			->setHeader('cache', array(
					'drag.js' => 'static_script',
					'<script type="text/javascript">$Behavior.coreDragInit = function() { Core_drag.init({table: \'#js_drag_drop\', ajax: \'bootstraptheme.ordering\'}); }</script>'
				))
			->assign(array(
			'slides' => $slides,
			'imagedir' =>Phpfox::getParam('bootstraptheme.bootstraptheme_dir_image')
		));
	}
}
