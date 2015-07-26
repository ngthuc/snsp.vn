<?php

class Bootstraptheme_Component_Block_Mainmenu extends Phpfox_Component
{
	public function process()
	{
		$menu_count = Phpfox::getParam('bootstraptheme.bootstraptheme_mainmenu_count');
		$this->template()->assign(
			array(
				'btMenuCount' => $menu_count,
				'isAjax' => PhpFox::getParam('core.site_wide_ajax_browsing')
			)
		);
	}
}

?>