<?php
class Bootstraptheme_Service_Slide extends Phpfox_Service 
{
	public function __construct()
	{
		$this->_sTable = Phpfox::getT('bootstraptheme_slides');
	}
	public function getSlides()
	{
		return $this->database()->select('*')->from($this->_sTable)->order('ordering ASC')->execute('getRows');
	}
	public function getActiveSlides()
	{
		return $this->database()->select('*')->from($this->_sTable)->where('is_active = 1')->order('ordering ASC')->execute('getRows');
	}
	public function getSlideForEdit($slide_id = null)
	{
		return $this->database()->select('*')->from($this->_sTable)->where('slide_id = '.$slide_id)->execute('getRow');
	}
	public function addSlide($aVals, $iEditId = null)
	{
		$aForm = array(
			'slide_title' => array(
				'type' => 'string:required',
				'message' =>Phpfox::getPhrase('bootstraptheme.slide_title_fill')
			),
			'slide_description' => array(
				'type' => 'string:required',
				'message' => Phpfox::getPhrase('bootstraptheme.slide_description_fill')
			),
			'slide_position' => array(
				'type' => 'string'
			),
			'button_label' => array(
				'type' => 'string:required',
				'message' => Phpfox::getPhrase('bootstraptheme.slide_button_label_fill')
			),
			'button_color' => array(
				'type' => 'string'
			),
			'button_text_color' => array(
				'type' => 'string'
			),
			'button_link' => array(
				'type' => 'string'
			),
			'is_active' => array(
				'type' => 'int'
			)
		);
		
		$aVals = $this->validator()->process($aForm, $aVals);

		
		if (!Phpfox_Error::isPassed())
		{
			return false;
		}
		$aVals['slide_title'] = $this->preParse()->clean($aVals['slide_title']);
		$aVals['slide_description'] = $this->preParse()->clean($aVals['slide_description']);
		
		if ($iEditId === null)
		{
			
			$aVals['slide_url'] = Phpfox::getLib('parse.input')->cleanFileName(uniqid());
			
			if (!($aVals['slide_url'] = $this->_uploadImage($aVals['slide_url'])))
			{
				return false;
			}
			
			$this->database()->insert($this->_sTable, $aVals);
		}
		else 
		{
			if (!empty($_FILES['slide_url']['name']))
			{
				$aVals['slide_url'] = Phpfox::getLib('parse.input')->cleanFileName(uniqid());
				
				$aOld = $this->getSlideForEdit($iEditId);
				if (file_exists(Phpfox::getParam('bootstraptheme.bootstraptheme_dir_image') . $aOld['slide_url']))
				{
					Phpfox::getLib('file')->unlink(Phpfox::getParam('bootstraptheme.bootstraptheme_dir_image') . $aOld['slide_url']);
				}
				
				if (!($aVals['slide_url'] = $this->_uploadImage($aVals['slide_url'])))
				{
					return false;
				}
			}
			
			$this->database()->update($this->_sTable, $aVals, 'slide_id = ' . (int) $iEditId);
		}
		
		$this->cache()->remove('bootstraptheme', 'substr');
		
		return true;
	}
	public function deleteSlide($iId)
	{
		$slide = $this->getSlideForEdit($iId);
		
		if (!isset($slide['slide_id']))
		{
			return Phpfox_Error::set(Phpfox::getPhrase('bootstraptheme.the_slide_cannot_be_found'));
		}
		
		if (file_exists(Phpfox::getParam('bootstraptheme.bootstraptheme_dir_image') . $slide['slide_url']))
		{
			Phpfox::getLib('file')->unlink(Phpfox::getParam('bootstraptheme.bootstraptheme_dir_image') . $slide['slide_url']);
		}		
		
		$this->database()->delete($this->_sTable, 'slide_id = ' . $slide['slide_id']);
		
		$this->cache()->remove('bootstraptheme', 'substr');
		
		return true;
	}
	public function updateSlide($iEditId, $aVals)
	{
		return $this->addSlide($aVals, $iEditId);
	}
	private function _uploadImage($sName)
	{
		if (!empty($_FILES['slide_url']['name']))
		{
			$aImage = Phpfox::getLib('file')->load('slide_url', array('jpg', 'gif', 'png'));
			if ($aImage === false)
			{
				return false;
			}
			
			return Phpfox::getLib('file')->upload('slide_url', Phpfox::getParam('bootstraptheme.bootstraptheme_dir_image'), $sName, false, 0644, false);
		}
		
		return Phpfox_Error::set(Phpfox::getPhrase('bootstraptheme.slide_url_fill'));
	}
}