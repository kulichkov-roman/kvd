<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(false);

if (!empty($arResult["ERRORS"])) {
	ShowError(implode("<br />", $arResult["ERRORS"]));
}
if (strlen($arResult["MESSAGE"]) > 0) {
	?>
	<div class="modal-block">
		<div class="modal-block-title">Ваша заявка принята</div>
		В ближайшее время с Вами свяжется менеджер <br>
		для уточнения заявки.
	</div>
	<script>
		$(document).ready(function () {
			$.fancybox.open({
				content: $('.modal-block'),
				wrapCSS: 'modal-wrap',
				closeBtn: false
			});
		});
	</script>
	<?
}
?>

<section class="callback-section">
	<form name="iblock_add" action="<?=POST_FORM_ACTION_URI?>" method="post" enctype="multipart/form-data">
		<?=bitrix_sessid_post()?>
		<?if ($arParams["MAX_FILE_SIZE"] > 0){?>
			<input type="hidden" name="MAX_FILE_SIZE" value="<?=$arParams["MAX_FILE_SIZE"]?>" />
		<?}?>
		<div class="wrap">
			<a href="#" class="close"></a>
			<h3>Заказать звонок</h3>
			<div class="field field-inline">
				<label for="">Ваше имя</label>
				<input name="PROPERTY[NAME][0]" type="text">
			</div>
			<div class="field field-inline">
				<label for="">Телефон</label>
				<input name="PROPERTY[4][0]" type="text" class="phone-mask">
			</div>
			<div class="field-select field-inline">
				<label for="">Удобное время для звонка</label>
				<select name="PROPERTY[6][0]">
					<option value="">9.00 – 10.00</option>
					<option value="">9.00 – 10.00</option>
					<option value="">9.00 – 10.00</option>
					<option value="">9.00 – 10.00</option>
				</select>
			</div>
			<div class="field-btn field-inline">
				<input type="submit" name="<?=$arParams['PREFIX_FORM']?>_iblock_submit" value="Позвоните мне" />
			</div>
		</div>
</section>
