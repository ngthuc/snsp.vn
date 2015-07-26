{foreach from=$aQuestions item=aQuestion}
	<div class="table">
		<div class="table_left">
			{$aQuestion.question_phrase|convert}:
		</div>
		<div class="table_right">
			{if isset($aQuestion.image_path) && !empty($aQuestion.image_path)}
				<img src="{$aQuestion.image_path}" />
			{/if}
			<div>
				<input type="text" name="val[spam][{$aQuestion.question_id}]" value="" />
			</div>
		</div>
	</div>
{/foreach}