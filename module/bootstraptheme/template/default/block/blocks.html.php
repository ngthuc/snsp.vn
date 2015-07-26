<div class="bootstraptheme_blocks_holder">
	<div id="fb-root"></div>
	{literal}
	<script>
	(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/ru_RU/all.js#xfbml=1";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
	</script>
	{/literal}
	<div class="bootstraptheme_custom_blocks">
		<div class="bootstraptheme_custom_blocks_span block1">
			<div class="mini-wrapper">
				<h2>{phrase var='bootstraptheme.last_activities'}</h2>
				<ul class="soft-updates">
				{foreach from=$aFeeds item=feed}
					<li>
						<div class="date-img">
							<span class="top-date">{$feed.month}</span>
							<span class="bottom-date">{$feed.date}</span>
						</div>
						<p>{$feed.feed_info|ucfirst|substr:0:-1} <a target="_blank "href="{$feed.feed_link}">{$feed.feed_title}</a></p>
						<p>{if isset($feed.feed_status)}{$feed.feed_status}{/if}</p>
						<p class="bootstraptheme_feed_username"><a href="{url lin = '$feed.full_name'}">{$feed.full_name}</a></p>
					</li>
				{/foreach}
				</ul>
			</div>
		</div>
		<div class="bootstraptheme_custom_blocks_span block2">
			<div class="mini-wrapper">
				<h2>{phrase var='bootstraptheme.what_people_are_saying'}</h2>
				<ul>
					{foreach from=$aStatuses item=status}
					<li>
						<blockquote class="greyb">
							<p>{$status.content}</p>
							<small><strong>{$status.full_name}</strong></small>
						</blockquote>
					</li>
					{/foreach}
				</ul>
			</div>
		</div>
		<div class="bootstraptheme_custom_blocks_span block3">
			<div class="mini-wrapper">
				<h2>{phrase var='bootstraptheme.facebook_like_box'}</h2>
				<div class="fb-like-box" data-href="{$flb}" data-width="300" data-height="320" data-show-faces="true" data-stream="false" data-show-border="false" data-header="false"></div>
			</div>
		</div>
	</div>
</div>
<div class="clear"></div>