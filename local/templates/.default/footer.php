<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
	die();
}
?>
	<footer>
		<div class="wrap">
			<div class="footer-logo">
				<?$APPLICATION->IncludeComponent('bitrix:main.include', '',
					Array(
						'AREA_FILE_SHOW' => 'file',
						'PATH' => '/local/include/site_templates/ft_logo.php',
						'EDIT_TEMPLATE' => ''
					),
					false
				);?>
			</div>
			<?$APPLICATION->IncludeComponent('bitrix:main.include', '',
				Array(
					'AREA_FILE_SHOW' => 'file',
					'PATH' => '/local/include/site_templates/ft_developer.php',
					'EDIT_TEMPLATE' => ''
				),
				false,
				Array('HIDE_ICONS' => 'Y')
			);?>
			<div class="phone">
				<?$APPLICATION->IncludeComponent('bitrix:main.include', '',
					Array(
						'AREA_FILE_SHOW' => 'file',
						'PATH' => '/local/include/site_templates/ft_phone.php',
						'EDIT_TEMPLATE' => ''
					),
					false
				);?>
			</div>
			<div class="contacts">
				<?$APPLICATION->IncludeComponent('bitrix:main.include', '',
					Array(
						'AREA_FILE_SHOW' => 'file',
						'PATH' => '/local/include/site_templates/ft_contacts.php',
						'EDIT_TEMPLATE' => ''
					),
					false
				);?>
			</div>
			<?$APPLICATION->IncludeComponent('bitrix:main.include', '',
				Array(
					'AREA_FILE_SHOW' => 'file',
					'PATH' => '/local/include/site_templates/ft_cooperate.php',
					'EDIT_TEMPLATE' => ''
				),
				false
			);?>
			<div class="social-block">
				<?$APPLICATION->IncludeComponent('bitrix:main.include', '',
					Array(
						'AREA_FILE_SHOW' => 'file',
						'PATH' => '/local/include/site_templates/ft_social.php',
						'EDIT_TEMPLATE' => ''
					),
					false
				);?>
			</div>
		</div>
	</footer>
	<!--footer-->
</body>
