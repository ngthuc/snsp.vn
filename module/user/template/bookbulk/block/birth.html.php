{if $aUser.dob_setting == '3'}
	<div class="message js_no_feed_to_show">{phrase var='feed.there_are_no_new_feeds_to_view_at_this_time'}</div>
{else}
    {if !defined('PHPFOX_IS_PAGES_VIEW')}
        <div class="timeline_holder">    
            <div class="timeline_birth_title">
            {img theme='layout/timeline_birthday.png' style="margin: auto; display: -webkit-box;"}
                {phrase var='profile.born_on_birthday' birthday=$sBirthDisplay}
            </div>

        </div>
    {/if}
{/if}