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
<section class="form-section">
	<div class="wrap">
		<h2>Оставить заявку</h2>
		<form name="iblock_add" action="<?=POST_FORM_ACTION_URI?>" method="post" enctype="multipart/form-data">
			<?=bitrix_sessid_post()?>
			<?if ($arParams["MAX_FILE_SIZE"] > 0){?>
				<input type="hidden" name="MAX_FILE_SIZE" value="<?=$arParams["MAX_FILE_SIZE"]?>" />
			<?}?>
			<div class="form-block">
				<div class="row">
					<div class="col-3">
						<div class="field">
							<label for="">Имя</label>
							<input name="PROPERTY[NAME][0]" type="text">
						</div>
					</div>
					<div class="col-3">
						<div class="field">
							<label for="">Телефон</label>
							<input name="PROPERTY[<?=$environment->get('feedbackPropPhoneId')?>][0]" type="text" class="phone-mask">
						</div>
					</div>
					<div class="col-3">
						<div class="field ">
							<label for="">Эл.почта</label>
							<input name="PROPERTY[<?=$environment->get('feedbackPropEmailId')?>][0]" type="text">
						</div>
					</div>
				</div>
				<div class="field">
					<label for="">Комментарий</label>
					<textarea name="PROPERTY[PREVIEW_TEXT][0]" cols="30" rows="10"></textarea>
				</div>
				<div class="field-btn">
					<input type="submit" name="<?=$arParams['PREFIX_FORM']?>_iblock_submit" value="Отправить" />
				</div>
			</div>
		</form>
	</div>
</section>
