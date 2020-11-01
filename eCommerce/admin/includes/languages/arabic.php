<?php

	function lang($phrase) {

		static $lang = array(

			// Navbar Links

			'HOME_ADMIN' 	=> 'الرئيسية',
			'CATEGORIES' 	=> 'التصنيفيات',
			'ITEMS' 		=> 'العناصر',
			'MEMBERS' 		=> 'الأعضاء',
			'COMMENTS'		=> 'التعليقات',
			'STATISTICS' 	=> 'الإحصائيات',
			'LOGS' 			=> 'Logs',
			'' => '',
			'' => '',
			'' => '',
			'' => '',
			'' => ''
		);

		return $lang[$phrase];

	}

?>