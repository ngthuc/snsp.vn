<?php

class Bootstraptheme_Component_Block_Blocks extends Phpfox_Component 
{
	
	public function process()
	{
		$aFeeds = Phpfox::getService('feed')->get();
		$aStatuses = Phpfox::getService('bootstraptheme.user')->getStatuses();
		foreach($aFeeds as $key => &$feed)
		{
			if($feed['type_id'] == 'user_status')
			{
				unset($aFeeds[$key]);
			}
			else
			{
				if (is_numeric($aFeeds[$key]['time_stamp']))
				{
					$feed['time_stamp'] =  date('d-M-Y',$aFeeds[$key]['time_stamp']);
				}
				else
				{
					$feed['time_stamp'] =  $aFeeds[$key]['time_stamp'];
				}				
				$date = explode("-", $feed['time_stamp']);
				$feed['date'] = $date[0];
				$feed['month'] = $date[1];
			
			}
				
		}
		array_splice($aFeeds, 3);
		$this->template()->assign(
			array(
				'aFeeds' => $aFeeds,
				'aStatuses' => $aStatuses,
				'flb' =>Phpfox::getParam('bootstraptheme.bootstraptheme_facebooklikebox')
			)
		);
	}
}