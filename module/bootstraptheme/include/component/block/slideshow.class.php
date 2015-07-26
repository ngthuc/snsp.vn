<?php

class Bootstraptheme_Component_Block_Slideshow extends Phpfox_Component 
{
	
	public function process()
	{
		$slides = Phpfox::getService('bootstraptheme.slide')->getActiveSlides();
		$this->template()->assign(array(
			'slides' => $slides,
			'slider' =>Phpfox::getLib('template')->getStyle('jscript', 'jquery.slides.min.js', 'bootstraptheme'),
			'js' =>Phpfox::getLib('template')->getStyle('jscript', 'script.js', 'bootstraptheme'),
			'font' =>Phpfox::getLib('template')->getStyle('css', 'font-awesome.css', 'bootstraptheme'),
			'font_ie' =>Phpfox::getLib('template')->getStyle('css', 'font-awesome-ie7.css', 'bootstraptheme'),
			'css' =>Phpfox::getLib('template')->getStyle('css', 'slider.css', 'bootstraptheme'),
			'imagedir' =>Phpfox::getParam('bootstraptheme.bootstraptheme_dir_image')
		)); 
	}
}