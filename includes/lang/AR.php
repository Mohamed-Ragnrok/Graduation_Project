<?php

	function lang($phrase){

		static $lang = array (

			'HOME' 		    => 'الرئيسية',
				
				'Categories' 			    => 'الأقسام',
				'Edit' 				      => 'تحرير',
				'Setting' 			    => 'الاعدادات',
				'Logout' 			      => 'تسجيل خروج',

		);
		return $lang[$phrase];

	}