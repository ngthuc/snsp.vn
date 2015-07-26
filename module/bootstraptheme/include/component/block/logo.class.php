<?php

class Bootstraptheme_Component_Block_Logo extends Phpfox_Component 
{
	
	public function process()
	{
		$this->template()->assign(
			array(
				'flickr' =>Phpfox::getParam('bootstraptheme.bootstraptheme_flickr_url'),
				'twitter' =>Phpfox::getParam('bootstraptheme.bootstraptheme_twitter_url'),
				'facebook' =>Phpfox::getParam('bootstraptheme.bootstraptheme_facebook_url'),
				'youtube' =>Phpfox::getParam('bootstraptheme.bootstraptheme_youtube_url'),
				'dribbble' =>Phpfox::getParam('bootstraptheme.bootstraptheme_dribbble_url'),
				'pinterest' =>Phpfox::getParam('bootstraptheme.bootstraptheme_pinterest_url')
				
			)
		);
	}
}