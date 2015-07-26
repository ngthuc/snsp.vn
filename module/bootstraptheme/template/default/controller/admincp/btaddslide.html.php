{literal}
<script>
$Behavior.addslidejs = function()
{
	$('.color-picker').miniColors({
			change: function(hex, rgba){
				$('#console').prepend('change: ' + hex + ', rgba(' + rgba.r + ', ' + rgba.g + ', ' + rgba.b + ', ' + rgba.a + ')<br>');
			},
			open: function(hex, rgba){
				$('#console').prepend('open: ' + hex + ', rgba(' + rgba.r + ', ' + rgba.g + ', ' + rgba.b + ', ' + rgba.a + ')<br>');
			},
			close: function(hex, rgba){
				$('#console').prepend('close: ' + hex + ', rgba(' + rgba.r + ', ' + rgba.g + ', ' + rgba.b + ', ' + rgba.a + ')<br>');
			}
		});
}
</script>
{/literal}
<div class="table_header">
	{if $bIsEdit} {phrase var='bootstraptheme.edit_slide'} {else} {phrase var='bootstraptheme.add_slide'} {/if}
</div>
<form method="post" action="{url link='admincp.bootstraptheme.btaddslide'}" enctype="multipart/form-data">
	{if $bIsEdit}
		<div><input type="hidden" name="id" value="{$slide.slide_id}" /></div>
	{/if}
	<div class="table" >
		<div class="table_left">
			{required} {phrase var='bootstraptheme.slide_title'}:
		</div>
		<div class="table_right">
			<input type="text"  name="val[slide_title]" {if $bIsEdit} value="{$slide.slide_title}" {else} value="{value id='slide_title' type='input'}" {/if} size="68" />
		</div>
		<div class="clear"></div>
	</div>
	<div class="table" >
		<div class="table_left">
			{required} {phrase var='bootstraptheme.slide_description'}:
		</div>
		<div class="table_right">
			<textarea cols="50" rows="10" name="val[slide_description]" >{if $bIsEdit}{$slide.slide_description}{else}{value id='slide_description' type='input'}{/if}</textarea>
		</div>
		<div class="clear"></div>
	</div>
	<div class="table" >
		<div class="table_left">
			{phrase var='bootstraptheme.slide_link'}:
		</div>
		<div class="table_right">
			<input type="text"   name="val[button_link]" {if $bIsEdit} value="{$slide.button_link}" {else}value="{value id='button_link' type='input'}"{/if} size="68" />
		</div>
		<div class="clear"></div>
	</div>
	<div class="table">
		<div class="table_left">
		{required} {phrase var='bootstraptheme.slide_image'}:
		</div>
		<div class="table_right">
		{if $bIsEdit}
			<div id="js_current_pic">
				<img class="icon" src="{param var = 'core.path'}{param var='bootstraptheme.bootstraptheme_dir_image'}{$slide.slide_url}"  width='200' />
				<div class="extra_info">
					<a href="#" onclick="$('#js_change_pic').show(); $('#js_current_pic').hide(); return false;">{phrase var='bootstraptheme.change_slide_info'}</a>
				</div>
			</div>
		{/if}
			<div id="js_change_pic"{if $bIsEdit} style="display:none;"{/if}>
				<input type="file" name="slide_url" size="30" />{if $bIsEdit} - <a href="#" onclick="$('#js_change_pic').hide(); $('#js_current_pic').show(); return false;">cancel</a>{/if}
				<div class="extra_info">
					{phrase var='bootstraptheme.image_extra_info'}
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="table" >
		<div class="table_left">
			{phrase var='bootstraptheme.slide_position'}:
		</div>
		<div class="table_right">
			<input type="radio" {if isset($slide) && $slide.slide_position eq "left"} checked="true" {/if} name="val[slide_position]" value="left"/> {phrase var='bootstraptheme.slide_position_left'}
			<input type="radio" {if isset($slide) && $slide.slide_position eq "right"} checked="true" {/if} name="val[slide_position]" value="right"/> {phrase var='bootstraptheme.slide_position_right'}
		</div>
		<div class="clear"></div>
	</div>
	<div class="table" >
		<div class="table_left">
			{required} {phrase var='bootstraptheme.slide_button_label'}:
		</div>
		<div class="table_right">
			<input type="text"  name="val[button_label]" {if $bIsEdit} value="{$slide.button_label}" {else} value="{value id='button_label' type='input'}" {/if}  size="68" />
		</div>
		<div class="clear"></div>
	</div>
	<div class="table">
		<div class="table_left">
			{phrase var='bootstraptheme.slide_button_bgcolor'}:
		</div>
		<div class="table_right">
			<div style="padding-top: 5px;">
				<input type="text" name="val[button_color]" class="color-picker" size="7" autocomplete="on" {if $bIsEdit} value="{$slide.button_color}" {else} value="{value id='button_color' type='input'}" {/if} />
				<div class="extra_info">
					{phrase var='bootstraptheme.enter_gauge_color_in_hex'}
				</div>
			</div>
		</div>
	</div>
	<div class="table">
		<div class="table_left">
			{phrase var='bootstraptheme.slide_button_txtcolor'}:
		</div>
		<div class="table_right">
			<div style="padding-top: 5px;">
				<input type="text" name="val[button_text_color]" class="color-picker" size="7" autocomplete="on" {if $bIsEdit} value="{$slide.button_text_color}" {else} value="{value id='button_text_color' type='input'}" {/if} />
				<div class="extra_info">
					{phrase var='bootstraptheme.enter_gauge_color_in_hex'}
				</div>
			</div>
		</div>
	</div>
	<div class="table">
		<div class="table_left">
			{phrase var='bootstraptheme.slide_is_active'}:
		</div>
		<div class="table_right">	
			<div class="item_is_active_holder">		
				<span class="js_item_active item_is_active"><input type="radio" name="val[is_active]" value="1" {value type='radio' id='is_active' default='1' selected='true'}/> {phrase var='bootstraptheme.slide_is_active_yes'}</span>
				<span class="js_item_active item_is_not_active"><input type="radio" name="val[is_active]" value="0" {value type='radio' id='is_active' default='0'}/> {phrase var='bootstraptheme.slide_is_active_no'}</span>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<div style="padding-top: 10px;text-align:right">
		<input type="submit" class="button" id="bootstrapthemesavechanges" name="bootstrapthemesavechanges" {if $bIsEdit} value = "{phrase var='bootstraptheme.slide_update_button'}" {else} value="{phrase var='bootstraptheme.slide_save'}" {/if}/>
	</div>
</form>