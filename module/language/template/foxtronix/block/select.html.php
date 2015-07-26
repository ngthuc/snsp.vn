{foreach from=$aLanguages item=aLanguage name=languages}
<a href="#" onclick="$('#js_language_package_holder').hide(); $('#js_loading_language').html($.ajaxProcess('{phrase var='language.loading' phpfox_squote=true}')); $.ajaxCall('language.process', 'id={$aLanguage.language_id}'); return false;">{$aLanguage.title}</a>&nbsp;&nbsp;
{/foreach}