<?php
return array(
	'_root_'  => 'home/index',  // The default route
	//'_404_'   => 'welcome/404',    // The main 404 route
        'pages/(:alias)/(:view)' => array('/home/pages/view/', 'name' => 'page'),
);