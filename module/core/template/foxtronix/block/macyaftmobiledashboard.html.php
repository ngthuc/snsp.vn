<div class="mobile_main_menu">
<a href="{url link='feed'}">
<i class="icon-list-alt"></i>
<strong>Feed</strong>
</a>
</div>

{if Phpfox::isUser()}
<div class="mobile_main_menu">
<a href="{url link='profile.my'}">
<i class="icon-user"></i>
<strong>Profile</strong>
</a>
</div>
{/if}

{if Phpfox::isUser()}
<div class="mobile_main_menu">
<a href="{url link='mail'}">
<i class="icon-comments-alt"></i>
<strong>Message</strong>
</a>
</div>
{/if}

<div class="mobile_main_menu">
<a href="{url link='user'}">
<i class="icon-group"></i>
<strong>User</strong>
</a>
</div>

<div class="mobile_main_menu">
<a href="{url link='pages'}">
<i class="icon-star"></i>
<strong>Pages</strong>
</a>
</div>

<div class="mobile_main_menu">
<a href="{url link='photo'}">
<i class="icon-camera"></i>
<strong>Photo</strong>
</a>
</div>

<div class="mobile_main_menu">
<a href="{url link='video'}">
<i class="icon-facetime-video"></i>
<strong>Video</strong>
</a>
</div>

<div class="mobile_main_menu">
<a href="{url link='blog'}">
<i class="icon-edit"></i>
<strong>Blog</strong>
</a>
</div>

<div class="mobile_main_menu">
<a href="{url link='poll'}">
<i class="icon-tasks"></i>
<strong>Poll</strong>
</div>

<div class="mobile_main_menu">
<a href="{url link='quiz'}">
<i class="icon-question-sign"></i>
<strong>Quiz</strong>
</a>
</div>

<div class="mobile_main_menu">
<a href="{url link='marketplace'}">
<i class="icon-shopping-cart"></i>
<strong>Marketplace</strong>
</a>
</div>

<div class="mobile_main_menu">
<a href="{url link='forum'}">
<i class="icon-bullhorn"></i>
<strong>Forum</strong>
</a>
</div>

<div class="mobile_main_menu">
<a href="{url link='event'}">
<i class="icon-calendar"></i>
<strong>Event</strong>
</a>
</div>

{if !Phpfox::isUser()}
<div class="mobile_main_menu">
<a href="{url link='user.register'}">
<i class="icon-signin"></i>
<strong>Signup</strong>
</a>
</div>
{/if}