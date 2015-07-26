<script type="text/javascript" src="{$slider}"></script>
<script type="text/javascript" src="{$js}"></script>
<link rel="stylesheet" type="text/css" href="{$font}">
<link rel="stylesheet" type="text/css" href="{$font_ie}">
<link rel="stylesheet" type="text/css" href="{$css}">
{if $slides}
  <div id="slides">
  	{foreach from=$slides item=slide}
  	<div class="bt_slide_item">
    	<div class="bt_slide_content" {if $slide.slide_position == 'left'} style="float:right" {else} style="float:left" {/if}>
    		<p class="bt_title">{$slide.slide_title}</p>
    		<p class="bt_description">{$slide.slide_description}</p>
    		<a  class="bt_sliderslider_btn" href="{$slide.button_link}" style="color: {$slide.button_text_color}; background-color: {$slide.button_color};">{$slide.button_label}</a>
    	</div>
    	<div class="bt_slide_image" {if $slide.slide_position == 'left'} style="float:left" {else} style="float:right" {/if}>
    		<img alt="" src="{param var = 'core.path'}{$imagedir}{$slide.slide_url}" />
    	</div>
    </div>
    {/foreach}
  </div>
{/if}