<?php

class Bootstraptheme_Component_Ajax_Ajax extends Phpfox_Ajax
{
	public function ordering()
	{
		$aVals = $this->get('val');
		Phpfox::getService('core.process')->updateOrdering(array(
				'table' => 'bootstraptheme_slides',
				'key' => 'slide_id',
				'values' => $aVals['ordering']
			)		
		);
		Phpfox::getLib('cache')->remove('bootstraptheme', 'substr');
	}
	
	public function updateActivity()
	{
		Phpfox::getService('core.process')->updateActivity(array(
				'table' => 'bootstraptheme_slides',
				'key' => 'slide_id',
				'value' => $this->get('id'),
				'active' => $this->get('active')
			)		
		);
		Phpfox::getLib('cache')->remove('bootstraptheme', 'substr');
	}
}