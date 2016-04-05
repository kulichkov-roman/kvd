<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
	die();
}

IncludeTemplateLangFile(__FILE__);
?>
<!DOCTYPE html>
<html class="no-js" lang="<?=LANGUAGE_ID?>">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE">
	<meta name="viewport" content="width=1260">
	<title><?$APPLICATION->ShowTitle()?></title>
	<?
	CJSCore::Init();

	$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/css/reset.css');
	$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/css/libs/libs.css');
	$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/css/template_styles.css');
	$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/css/css/styles.css');

	$APPLICATION->AddHeadString('
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	');

	$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/libs/libs.js');
	$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/main.js');
	?>
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<?$APPLICATION->ShowHead()?>
</head>
<body>
	<?$APPLICATION->ShowPanel();?>
	<div id="home" class="wrapper">
		<header>
			<div class="wrap">
				<div class="logo">
					<?$APPLICATION->IncludeComponent('bitrix:main.include', '',
						Array(
							'AREA_FILE_SHOW' => 'file',
							'PATH' => '/local/include/site_templates/hd_logo.php',
							'EDIT_TEMPLATE' => ''
						),
						false
					);?>
				</div>
				<?$APPLICATION->IncludeComponent('bitrix:main.include', '',
					Array(
						'AREA_FILE_SHOW' => 'file',
						'PATH' => '/local/include/site_templates/hd_main_menu.php',
						'EDIT_TEMPLATE' => ''
					),
					false
				);?>
				<div class="phone">
					<?$APPLICATION->IncludeComponent('bitrix:main.include', '',
						Array(
							'AREA_FILE_SHOW' => 'file',
							'PATH' => '/local/include/site_templates/hd_phone.php',
							'EDIT_TEMPLATE' => ''
						),
						false
					);?>
				</div>
				<a href="#" class="callback-btn">Заказать звонок <i class="fa fa-angle-down"></i></a>
			</div>
		</header>
		<!-- header-->
		<?$APPLICATION->IncludeComponent('bitrix:main.include', '',
			Array(
				'AREA_FILE_SHOW' => 'file',
				'PATH' => '/local/include/site_templates/hd_callback.php',
				'EDIT_TEMPLATE' => ''
			),
			false
		);?>
		<?$APPLICATION->IncludeComponent('bitrix:main.include', '',
			Array(
				'AREA_FILE_SHOW' => 'file',
				'PATH' => '/local/include/site_templates/hd_main_slider.php',
				'EDIT_TEMPLATE' => ''
			),
			false
		);?>
		<?$APPLICATION->IncludeComponent('bitrix:main.include', '',
			Array(
				'AREA_FILE_SHOW' => 'file',
				'PATH' => '/local/include/site_templates/hd_main_products.php',
				'EDIT_TEMPLATE' => ''
			),
			false
		);?>
		<section class="about-section">
			<div class="about-arrow"></div>
			<div class="about-flag"></div>
			<div id="about" class="wrap">
				<div class="about-body">
					<?$APPLICATION->IncludeComponent('bitrix:main.include', '',
						Array(
							'AREA_FILE_SHOW' => 'file',
							'PATH' => '/local/include/site_templates/hd_about.php',
							'EDIT_TEMPLATE' => ''
						),
						false
					);?>
				</div>
			</div>
		</section>
		<?$APPLICATION->IncludeComponent('bitrix:main.include', '',
			Array(
				'AREA_FILE_SHOW' => 'file',
				'PATH' => '/local/include/site_templates/hd_use.php',
				'EDIT_TEMPLATE' => ''
			),
			false
		);?>
		<?$APPLICATION->IncludeComponent('bitrix:main.include', '',
			Array(
				'AREA_FILE_SHOW' => 'file',
				'PATH' => '/local/include/site_templates/hd_projects.php',
				'EDIT_TEMPLATE' => ''
			),
			false
		);?>
		<?$APPLICATION->IncludeComponent('bitrix:main.include', '',
			Array(
				'AREA_FILE_SHOW' => 'file',
				'PATH' => '/local/include/site_templates/hd_advantages.php',
				'EDIT_TEMPLATE' => ''
			),
			false
		);?>
		<?$APPLICATION->IncludeComponent('bitrix:main.include', '',
			Array(
				'AREA_FILE_SHOW' => 'file',
				'PATH' => '/local/include/site_templates/hd_reviews.php',
				'EDIT_TEMPLATE' => ''
			),
			false
		);?>
		<?$APPLICATION->IncludeComponent('bitrix:main.include', '',
			Array(
				'AREA_FILE_SHOW' => 'file',
				'PATH' => '/local/include/site_templates/hd_form_app.php',
				'EDIT_TEMPLATE' => ''
			),
			false
		);?>
	</div>
	<!-- .wrapper -->
