{extends file="main.tpl"}

{block name=footer}Kalkulator kredytowy{/block}

{block name=content}

<h3>Kalkulator</h3>


	<form action="{$conf->action_root}calcCompute" method="post" >
		<div class="row mb-3">
			<label for="id_x" class="col-sm-2 col-form-label">Wartość kredytu:</label>
			<div class="col-sm-3">
				<input type="text" class="form-control" name="x" id="id_x" value="{$form->x}"/>
			</div>
		</div>
		<div class="row mb-3">
			<label for="id_liczbaMiesiecy" class="col-sm-2 col-form-label">Ilość miesięcy:</label>
			<div class="col-sm-3">
                            <input type="text" class="form-control" name="liczbaMiesiecy" id="id_liczbaMiesiecy" value="{$form->liczbaMiesiecy}"/>
			</div>
		</div>
		<div class="row mb-3">
			<label for="id_oprocentowanie" class="col-sm-2 col-form-label">Stopa oprocentowania:</label>
			<div class="col-sm-3">
                            <input type="text" class="form-control" name="oprocentowanie" id="id_oprocentowanie" value="{$form->oprocentowanie}"/>
			</div>
		</div>
		<input  type="submit" class="button primary" value="Oblicz" />
		<br>
	</form>


<div class="messages">

{* wyświeltenie listy błędów, jeśli istnieją *}
{if $msgs->isError()} 
	<h4>Wystąpiły błędy: </h4>
	<ol class="err">
	{foreach $msgs->getErrors() as $err}
	{strip}
		<li>{$err}</li>
	{/strip}
	{/foreach}
	</ol>
{/if}

{* wyświeltenie listy informacji, jeśli istnieją *}
{if $msgs->isInfo()}
	<h4>Informacje: </h4>
	<ol class="inf">
	{foreach $msgs->getInfos() as $inf}
	{strip}
		<li>{$inf}</li>
	{/strip}
	{/foreach}
	</ol>
{/if}

{if isset($res->result)}
	<h4>Miesięczna rata kredytu</h4>
	<p class="res">
		Twoja miesięczna rata kredytu wynosi {$res->result} zł.
	</p>
{/if}

</div>
<!-- Scripts -->
			<script src="{$conf->app_url}/js/jquery.min.js"></script>
			<script src="{$conf->app_url}/js/jquery.scrolly.min.js"></script>
			<script src="{$conf->app_url}/js/jquery.dropotron.min.js"></script>
			<script src="{$conf->app_url}/js/jquery.scrollex.min.js"></script>
			<script src="{$conf->app_url}/js/browser.min.js"></script>
			<script src="{$conf->app_url}/js/breakpoints.min.js"></script>
			<script src="{$conf->app_url}/js/util.js"></script>
			<script src="{$conf->app_url}/js/main.js"></script>
	
{/block}