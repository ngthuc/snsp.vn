{if $sReq3 == 'albums'}
{template file='photo.controller.albums'}
{else}
{template file='photo.controller.index'}
{/if}