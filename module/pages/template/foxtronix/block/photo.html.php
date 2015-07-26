<div class="profile_image">
    <div class="profile_image_holder">
	{* This is called only when Not in timeline *}
		{if $aPage.is_app}
		{img server_id=0 path='app.url_image' file=$aPage.aApp.image_path suffix='_200' max_width='175' max_height='300' title=$aPage.aApp.app_title}
		{else}
		{img thickbox=true server_id=$aPage.image_server_id title=$aPage.title path='core.url_user' file=$aPage.image_path suffix='_200' max_width='175' max_height='300'}
		{/if}
	</div>
</div>
{if $bCanViewPage}
<div class="sub_section_menu">  
	<ul>		                   
		{foreach from=$aPageLinks item=aPageLink}
			<li class="{if isset($aPageLink.is_selected)} active{/if}">
				<a href="{$aPageLink.url}" class="ajax_link">
        
      {if strpos($aPageLink.icon, 'video')!==false}
       <i class="icon-facetime-video"></i>
       {elseif strpos($aPageLink.icon, 'comment')!==false}
       <i class="icon-comments"></i>
       {elseif strpos($aPageLink.icon, 'application_view_list')!==false}
       <i class="icon-info-sign"></i>
       {elseif strpos($aPageLink.icon, 'blog')!==false}
       <i class="icon-edit"></i>
       {elseif strpos($aPageLink.icon, 'event')!==false}
       <i class="icon-calendar"></i>
       {elseif strpos($aPageLink.icon, 'photo')!==false}
       <i class="icon-camera"></i>
       {elseif strpos($aPageLink.icon, 'music')!==false}
       <i class="icon-question-sign"></i>
       {elseif strpos($aPageLink.icon, 'forum')!==false}
       <i class="icon-bullhorn"></i>	   
	   {else}
	   <i class="icon-circle"></i>
       {/if}
       
        
        {$aPageLink.phrase}{if isset($aPageLink.total)}<span>({$aPageLink.total|number_format})</span>{/if}
        
        </a>				
				{if isset($aPageLink.sub_menu) && is_array($aPageLink.sub_menu) && count($aPageLink.sub_menu)}
				<ul>
				{foreach from=$aPageLink.sub_menu item=aProfileLinkSub}
					<li class="{if isset($aProfileLinkSub.is_selected)} active{/if}"><a href="{url link=$aPageLink.url}{$aProfileLinkSub.url}">{$aProfileLinkSub.phrase}{if isset($aProfileLinkSub.total) && $aProfileLinkSub.total > 0}<span class="pending">{$aProfileLinkSub.total|number_format}</span>{/if}</a></li>
				{/foreach}
				</ul>
				{/if}				
			</li>
		{/foreach}
	</ul>
    <div class="clear"></div>
</div>
{/if}