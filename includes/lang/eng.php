<?php 

	function lang($phrase){

		static $lang = array (
			// navbar links    كلامات اعلي الصفحه ناف بار 
			'Home_ADMIN'		 => 'HOME',
			'Edit'				 => 'Edit Profile',
			'Setting'			 => 'Settings',
			'Logout' 	   		 => 'Logout',
			'Categories'		 => 'Categories',
			'ITEMS'				 => 'Items',
			'COMMENTS'   		 => 'Comments',
			'STATISTICS'		 => 'Statistics',
			'LOGS'				 => 'Lgos',
			'MEMBERS'			 => 'Members',
		);
		return $lang[$phrase];

	}