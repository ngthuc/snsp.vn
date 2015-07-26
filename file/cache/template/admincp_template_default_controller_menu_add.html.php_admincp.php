<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: July 25, 2015, 9:06 pm */ ?>
<?php 
/**
 * [NULLED BY DARKGOTH 2014]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Admincp
 * @version 		$Id: add.html.php 7230 2014-03-26 21:14:12Z Fern $
 */
 
 

?>
<form enctype="multipart/form-data" method="post" action="<?php if ($this->_aVars['bIsEdit']):  echo Phpfox::getLib('phpfox.url')->makeUrl("admincp.menu.add", array('id' => $this->_aVars['aForms']['menu_id']));  else:  echo Phpfox::getLib('phpfox.url')->makeUrl("admincp.menu.add");  endif; ?>">
<?php echo '<div><input type="hidden" name="' . Phpfox::getTokenName() . '[security_token]" value="' . Phpfox::getService('log.session')->getToken() . '" /></div>'; ?>
<?php if ($this->_aVars['bIsEdit']): ?>
	<div><input type="hidden" name="menu_id" value="<?php echo $this->_aVars['aForms']['menu_id']; ?>" /></div>
<?php endif; ?>
<?php if ($this->_aVars['bIsPage']): ?>
	<div><input type="hidden" name="val[page_id]" value="<?php echo $this->_aVars['aPage']['page_id']; ?>" /></div>
	<div><input type="hidden" name="val[product_id]" value="<?php echo $this->_aVars['aPage']['product_id']; ?>" /></div>
	<div><input type="hidden" name="val[module_id]" value="<?php echo $this->_aVars['sModuleValue']; ?>" /></div>
	<div><input type="hidden" name="val[url_value]" value="<?php echo $this->_aVars['aPage']['title_url']; ?>" /></div>
	<div><input type="hidden" name="val[is_page]" value="true" /></div>
<?php endif; ?>
	<div class="table_header">
<?php echo Phpfox::getPhrase('admincp.menu_details'); ?>
	</div>
<?php if (! $this->_aVars['bIsPage']): ?>
	<div class="table">
		<div class="table_left">
<?php echo Phpfox::getPhrase('admincp.product'); ?>:
		</div>
		<div class="table_right">
			<select name="val[product_id]">
<?php if (count((array)$this->_aVars['aProducts'])):  foreach ((array) $this->_aVars['aProducts'] as $this->_aVars['aProduct']): ?>
				<option value="<?php echo $this->_aVars['aProduct']['product_id']; ?>"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('product_id') && in_array('product_id', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['product_id'])
								&& $aParams['product_id'] == $this->_aVars['aProduct']['product_id'])

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['product_id'])
									&& !isset($aParams['product_id'])
									&& $this->_aVars['aForms']['product_id'] == $this->_aVars['aProduct']['product_id'])
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo $this->_aVars['aProduct']['title']; ?></option>
<?php endforeach; endif; ?>
			</select>
<?php Phpfox::getBlock('help.popup', array('phrase' => 'admincp.menu_add_product')); ?>
		</div>
		<div class="clear"></div>
	</div>
	<div class="table">
		<div class="table_left">
<?php echo Phpfox::getPhrase('admincp.module'); ?>:
		</div>
		<div class="table_right">			
			<select name="val[module_id]">
			<option value=""><?php echo Phpfox::getPhrase('admincp.select'); ?>:</option>
<?php if (count((array)$this->_aVars['aModules'])):  foreach ((array) $this->_aVars['aModules'] as $this->_aVars['sModule'] => $this->_aVars['iModuleId']): ?>
				<option value="<?php echo $this->_aVars['iModuleId']; ?>|<?php echo $this->_aVars['sModule']; ?>"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('module_id') && in_array('module_id', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['module_id'])
								&& $aParams['module_id'] == $this->_aVars['iModuleId'])

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['module_id'])
									&& !isset($aParams['module_id'])
									&& $this->_aVars['aForms']['module_id'] == $this->_aVars['iModuleId'])
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo Phpfox::getLib('phpfox.locale')->translate($this->_aVars['sModule'], 'module'); ?></option>
<?php endforeach; endif; ?>
			</select>
<?php Phpfox::getBlock('help.popup', array('phrase' => 'admincp.menu_add_module')); ?>
		</div>
		<div class="clear"></div>
	</div>
<?php endif; ?>
	<div class="table">
		<div class="table_left">
<?php echo Phpfox::getPhrase('admincp.connection'); ?>:
		</div>
		<div class="table_right">
			<select name="val[m_connection]">
			<option value=""><?php echo Phpfox::getPhrase('admincp.select'); ?>:</option>
			<optgroup label="<?php echo Phpfox::getPhrase('admincp.menu_block'); ?>">
<?php if (count((array)$this->_aVars['aTypes'])):  foreach ((array) $this->_aVars['aTypes'] as $this->_aVars['sType']): ?>
				<option value="<?php echo $this->_aVars['sType']; ?>"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('m_connection') && in_array('m_connection', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['m_connection'])
								&& $aParams['m_connection'] == $this->_aVars['sType'])

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['m_connection'])
									&& !isset($aParams['m_connection'])
									&& $this->_aVars['aForms']['m_connection'] == $this->_aVars['sType'])
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo $this->_aVars['sType']; ?></option>
<?php endforeach; endif; ?>
			</optgroup>
			<optgroup label="<?php echo Phpfox::getPhrase('admincp.parent_menu'); ?>">
<?php if (count((array)$this->_aVars['aParents'])):  foreach ((array) $this->_aVars['aParents'] as $this->_aVars['aParent']): ?>
				<option value="child|<?php echo $this->_aVars['aParent']['menu_id']; ?>"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('m_connection') && in_array('m_connection', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['m_connection'])
								&& $aParams['m_connection'] == $this->_aVars['aParent']['menu_id'])

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['m_connection'])
									&& !isset($aParams['m_connection'])
									&& $this->_aVars['aForms']['m_connection'] == $this->_aVars['aParent']['menu_id'])
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo Phpfox::getPhrase(''.$this->_aVars['aParent']['module_id'].'.'.$this->_aVars['aParent']['var_name'].''); ?></option>
<?php endforeach; endif; ?>
			</optgroup>
<?php if (! $this->_aVars['bIsPage']): ?>
			<optgroup label="<?php echo Phpfox::getPhrase('admincp.modules'); ?>">
<?php if (count((array)$this->_aVars['aControllers'])):  foreach ((array) $this->_aVars['aControllers'] as $this->_aVars['sModule'] => $this->_aVars['aModules']): ?>
				<option value="<?php echo $this->_aVars['sModule']; ?>" style="font-weight:bold;"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('m_connection') && in_array('m_connection', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['m_connection'])
								&& $aParams['m_connection'] == $this->_aVars['sModule'])

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['m_connection'])
									&& !isset($aParams['m_connection'])
									&& $this->_aVars['aForms']['m_connection'] == $this->_aVars['sModule'])
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo Phpfox::getLib('phpfox.locale')->translate($this->_aVars['sModule'], 'module'); ?></option>
<?php if (count((array)$this->_aVars['aModules'])):  foreach ((array) $this->_aVars['aModules'] as $this->_aVars['aController']): ?>
				<option value="<?php echo $this->_aVars['aController']['m_connection']; ?>"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('m_connection') && in_array('m_connection', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['m_connection'])
								&& $aParams['m_connection'] == $this->_aVars['aController']['m_connection'])

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['m_connection'])
									&& !isset($aParams['m_connection'])
									&& $this->_aVars['aForms']['m_connection'] == $this->_aVars['aController']['m_connection'])
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
>--- <?php echo $this->_aVars['aController']['m_connection']; ?></option>
<?php endforeach; endif; ?>
<?php endforeach; endif; ?>
			</optgroup>
<?php endif; ?>
			</select>
<?php Phpfox::getBlock('help.popup', array('phrase' => 'admincp.menu_add_connection')); ?>
		</div>
		<div class="clear"></div>
	</div>
<?php if (! $this->_aVars['bIsPage']): ?>
	<div class="table">
		<div class="table_left">
<?php echo Phpfox::getPhrase('admincp.url'); ?>:
		</div>
		<div class="table_right">
			<input type="text" name="val[url_value]" id="url_value" value="<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val')); echo (isset($aParams['url_value']) ? Phpfox::getLib('phpfox.parse.output')->clean($aParams['url_value']) : (isset($this->_aVars['aForms']['url_value']) ? Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aForms']['url_value']) : '')); ?>
" size="40" maxlength="250" />
<?php if (! $this->_aVars['bIsEdit'] && count ( $this->_aVars['aPages'] )): ?>
			<div class="p_4">
<?php echo Phpfox::getPhrase('admincp.or_select_a_page'); ?>
			<select name="val[url_value_page]" onchange="$('#url_value').val(this.value);">
				<option value=""><?php echo Phpfox::getPhrase('admincp.select'); ?>:</option>
<?php if (count((array)$this->_aVars['aPages'])):  foreach ((array) $this->_aVars['aPages'] as $this->_aVars['sPage'] => $this->_aVars['iId']): ?>
				<option value="<?php echo $this->_aVars['sPage']; ?>"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('m_connection') && in_array('m_connection', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['m_connection'])
								&& $aParams['m_connection'] == $this->_aVars['sType'])

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['m_connection'])
									&& !isset($aParams['m_connection'])
									&& $this->_aVars['aForms']['m_connection'] == $this->_aVars['sType'])
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo $this->_aVars['sPage']; ?></option>
<?php endforeach; endif; ?>
			</select>
			</div>
<?php endif; ?>
<?php Phpfox::getBlock('help.popup', array('phrase' => 'admincp.menu_add_url')); ?>
		</div>
		<div class="clear"></div>
	</div>
<?php endif; ?>
	
<?php if (Phpfox ::isModule('mobile')): ?>
	<div class="table">
		<div class="table_left">
<?php echo Phpfox::getPhrase('mobile.mobile_icon'); ?>:
		</div>
		<div class="table_right">
			<input type="text" name="val[mobile_icon]" value="<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val')); echo (isset($aParams['mobile_icon']) ? Phpfox::getLib('phpfox.parse.output')->clean($aParams['mobile_icon']) : (isset($this->_aVars['aForms']['mobile_icon']) ? Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aForms']['mobile_icon']) : '')); ?>
" />
		</div>
	</div>
<?php endif; ?>
	
	<div class="table_header">
<?php echo Phpfox::getPhrase('admincp.language_package_details'); ?>
	</div>
	<div class="table">
		<div class="table_left">
<?php echo Phpfox::getPhrase('admincp.menu'); ?>:
		</div>
		<div class="table_right_text">
<?php if (count((array)$this->_aVars['aLanguages'])):  foreach ((array) $this->_aVars['aLanguages'] as $this->_aVars['aLanguage']): ?>
			<b><?php echo $this->_aVars['aLanguage']['title']; ?></b>
			<div class="p_4">
				<textarea cols="50" rows="5" name="val[text][<?php if (isset ( $this->_aVars['aLanguage']['phrase_id'] )):  echo $this->_aVars['aLanguage']['phrase_id'];  else:  echo $this->_aVars['aLanguage']['language_id'];  endif; ?>]"><?php if (isset ( $this->_aVars['aLanguage']['text'] )):  echo Phpfox::getLib('parse.output')->htmlspecialchars($this->_aVars['aLanguage']['text']);  endif; ?></textarea>
			</div>
<?php endforeach; endif; ?>
<?php Phpfox::getBlock('help.popup', array('phrase' => 'admincp.menu_add_menu')); ?>
		</div>
		<div class="clear"></div>
	</div>
	<div class="table_header">
<?php echo Phpfox::getPhrase('admincp.user_group_access'); ?>
	</div>
	<div class="table">
		<div class="table_left">
<?php echo Phpfox::getPhrase('admincp.allow_access'); ?>:
		</div>
		<div class="table_right">
<?php if (count((array)$this->_aVars['aUserGroups'])):  foreach ((array) $this->_aVars['aUserGroups'] as $this->_aVars['aUserGroup']): ?>
			<div class="p_4">
				<label><input type="checkbox" name="val[allow_access][]" value="<?php echo $this->_aVars['aUserGroup']['user_group_id']; ?>"<?php if (isset ( $this->_aVars['aAccess'] ) && is_array ( $this->_aVars['aAccess'] )):  if (! in_array ( $this->_aVars['aUserGroup']['user_group_id'] , $this->_aVars['aAccess'] )): ?> checked="checked" <?php endif;  else: ?> checked="checked" <?php endif; ?>/> <?php echo Phpfox::getLib('phpfox.parse.output')->clean(Phpfox::getLib('locale')->convert($this->_aVars['aUserGroup']['title'])); ?></label>
			</div>
<?php endforeach; endif; ?>
<?php Phpfox::getBlock('help.popup', array('phrase' => 'admincp.menu_add_access')); ?>
		</div>
		<div class="clear"></div>
	</div>
	<div class="table_clear">
		<div><input type="hidden" name="send_path" value="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('admincp.menu'); ?>" /></div>
<?php if ($this->_aVars['bIsEdit']): ?>
		<input type="submit" value="<?php echo Phpfox::getPhrase('admincp.save'); ?>" class="button" />
<?php else: ?>
		<input type="submit" value="<?php echo Phpfox::getPhrase('core.submit'); ?>" class="button" />
<?php endif; ?>
	</div>

</form>


