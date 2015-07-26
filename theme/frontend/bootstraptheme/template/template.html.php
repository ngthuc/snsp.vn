{if !PHPFOX_IS_AJAX_PAGE}
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="{$sLocaleDirection}" lang="{$sLocaleCode}">
	<head>
		<title>{title}</title>
		{header}
		<link href="{param var='core.path'}theme/frontend/bootstraptheme/style/bootstraptheme/css/font-awesome.css" rel="stylesheet" type="text/css"/>
		<link href="{param var='core.path'}theme/frontend/bootstraptheme/style/bootstraptheme/css/font-awesome-ie7.css" rel="stylesheet" type="text/css"/>
	</head>
	<body>
		{body}	
		
		<div id="header">
			<div class="holder">
				{block location='10'}
				<div id="header_holder" {if !Phpfox::isUser()} class="header_logo"{/if}>
					<div id="header_left">
					{module name= 'bootstraptheme.minimenu'}
						
					</div>
					<div id="header_right">
					{module name = 'bootstraptheme.logo'}
					</div>
					{block location='6'}
				</div>
			</div>
						
			{if Phpfox::getParam('user.hide_main_menu') && !Phpfox::isUser()}
			
			{else}
			<div id="header_menu_page_holder">	
				<div class="holder">
					<div id="header_menu">	
						<nav>			
							{module name = 'bootstraptheme.mainmenu'}
						</nav>
						<div class="clear"></div>
					</div>		
				</div>			
			</div>	
			{/if}
		</div>
		
		<div id="{if Phpfox::isUser()}main_core_body_holder{else}main_core_body_holder_guest{/if}">
			{if Phpfox::getLib('module')->getFullControllerName() != 'core.index-visitor'}
				{block location='11'}
			{/if}

			<div id="main_content_holder">
			{/if}
			{if Phpfox::getLib('module')->getFullControllerName() != 'core.index-visitor'}
				<div {holder_name}>
					<div {is_page_view} class="holder">	
						
						{module name='profile.logo'}
						
						<div id="content_holder"{if isset($sMicroPropType)} itemscope itemtype="http://schema.org/{$sMicroPropType}"{/if}>		
							{block location='13'}
							{block location='7'}				
							{if !defined('PHPFOX_IS_USER_PROFILE') && !defined('PHPFOX_IS_PAGES_VIEW')}
							{breadcrumb}
							{block location='12'}
							{/if}

							{if !$bUseFullSite && (count($aBlocks1) || count($aAdBlocks1)) || (isset($aFilterMenus) && is_array($aFilterMenus) && count($aFilterMenus))}					
							<div id="left">
								{menu_sub}
								{block location='1'}
							</div>					
							{/if}

							<div id="main_content">
								{if !defined('PHPFOX_IS_USER_PROFILE') && !defined('PHPFOX_IS_PAGES_VIEW')}
								{search}
								{/if}
								<div id="main_content_padding">

									{if defined('PHPFOX_IS_USER_PROFILE') || defined('PHPFOX_IS_PAGES_VIEW') || (isset($aPage) && isset($aPage.use_timeline) && $aPage.use_timeline)}
									    {if $bLoadedProfileHeader = true}{/if}
									    {module name='profile.header'}
									{/if}
									{if defined('PHPFOX_IS_PAGES_VIEW') && !isset($bLoadedProfileHeader)}
									    {block location='12'}
									    {module name='pages.header'}
									{/if}							

									<div id="content_load_data">
										{if isset($bIsAjaxLoader) || defined('PHPFOX_IS_USER_PROFILE') || defined('PHPFOX_IS_PAGES_VIEW')}
										{search}
										{/if}								

										{if isset($aBreadCrumbTitle) && count($aBreadCrumbTitle)}
										<h1{if isset($sMicroPropType)} itemprop="name"{/if}><a href="{$aBreadCrumbTitle[1]}"{if isset($sMicroPropType)} itemprop="url"{/if}>{$aBreadCrumbTitle[0]|clean|split:30}</a></h1>
										{/if}

										<div id="content" {content_class}>
											{error}
											{block location='2'}
											{content}
											{block location='4'}
										</div>

										{if !$bUseFullSite && (count($aBlocks3) || count($aAdBlocks3))}
										<div id="right">								
											{block location='3'}
										</div>
										{/if}

										<div class="clear"></div>							
									</div>												
								</div>				
							</div>
							<div class="clear"></div>			
						</div>		
						{block location='8'}
					</div>							
				</div>
				{else}
				{module name = 'bootstraptheme.slideshow'}
				{module name = 'bootstraptheme.features'}
				{module name = 'bootstraptheme.signup'}
				{module name = 'bootstraptheme.blocks'}
				{/if}			
			{if !PHPFOX_IS_AJAX_PAGE}
			</div>		
			<div id="main_footer_holder">
				<div class="holder">
					<div id="footer">
						{module name = 'bootstraptheme.footer'}
					</div>				
				</div>
				<div id="copyright">
					<div class="bootstraptheme_copyright_holder">
						{copyright}
					</div>
				</div>			
			</div>		
			{footer}		
		</div>        
    </body>
</html>
{/if}