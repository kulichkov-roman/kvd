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

$environment = \Quetzal\Environment\EnvironmentManager::getInstance();

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
				<input name="PROPERTY[<?=$environment->get('feedbackPropPhoneId')?>][0]" type="text" class="phone-mask">
			</div>
			<?
			if(sizeof($arResult['PROPERTY_LIST_FULL'][$environment->get('feedbackPropTimeId')]['ENUM']))
			{
				?>
				<div class="field-select field-inline">
					<label for="">Удобное время для звонка</label>
					<select name="PROPERTY[<?=$environment->get('feedbackPropTimeId')?>]">
						<?foreach($arResult['PROPERTY_LIST_FULL'][$environment->get('feedbackPropTimeId')]['ENUM'] as $arItem){?>
							<option value="<?=$arItem['ID']?>"><?=$arItem['VALUE']?></option>
						<?}?>
					</select>
				</div>
				<?
			}
			?>
			<div class="field-btn field-inline">
				<input type="submit" name="<?=$arParams['PREFIX_FORM']?>_iblock_submit" value="Позвоните мне" />
			</div>
		</div>
	</form>
</section>
