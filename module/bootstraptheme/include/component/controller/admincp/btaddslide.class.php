<?php

defined('PHPFOX') or exit('NO DICE!');

class Bootstraptheme_Component_Controller_Admincp_Btaddslide extends Phpfox_Component
{
	public function process()
	{
		$bIsEdit = false;
		/*IF DELETE*/
		if (($iDeleteId = $this->request()->getInt('delete')))
		{
			Phpfox::getService('bootstraptheme.slide')->deleteSlide($iDeleteId);
			$this->url()->send('admincp.bootstraptheme.btslideshow', null, Phpfox::getPhrase('bootstraptheme.slide_deleted'));
		}
		/*IF EDIT*/
		if (($iEditId = $this->request()->getInt('id')))
		{
			$bIsEdit = true;
			$slide = Phpfox::getService('bootstraptheme.slide')->getSlideForEdit($iEditId);
			$this->template()->assign('slide', $slide);
		}
		/*IF ADD*/
		if (($aVals = $this->request()->getArray('val')))
		{
			//var_dump($aVals);
			if ($bIsEdit)
			{
				if (Phpfox::getService('bootstraptheme.slide')->updateSlide($slide['slide_id'], $aVals))
				{
					$this->url()->send('admincp.bootstraptheme.btslideshow', null, Phpfox::getPhrase('bootstraptheme.slide_update'));
				}
			}
			else 
			{
				if (Phpfox::getService('bootstraptheme.slide')->addSlide($aVals))
				{
					$this->url()->send('admincp.bootstraptheme.btslideshow', null, Phpfox::getPhrase('bootstraptheme.slide_add'));
				}
			}
		}

		$this->template()->setHeader(array(
				'jquery.miniColors.js' => 'module_bootstraptheme',
				'jquery.miniColors.css' => 'module_bootstraptheme'
			))
			->setBreadcrumb('Add Slide')
			->assign(array(
				'bIsEdit' => $bIsEdit
		));
	}
}
