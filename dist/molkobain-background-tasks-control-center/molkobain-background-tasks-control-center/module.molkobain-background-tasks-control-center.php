<?php

SetupWebPage::AddModule(
	__FILE__, // Path to the current file, all other file names are relative to the directory containing this file
	'molkobain-background-tasks-control-center/1.0.0', [
		// Identification
		'label' => 'Background tasks control center',
		'category' => 'Administration',
		// Setup
		'dependencies' => [
            'itop-structure/3.2.0',
		],
		'mandatory' => false,
		'visible' => true,
		// Components
		'datamodel' => [
			'vendor/autoload.php',
			// Hooks must be loaded manually
			'src/Hook/MetaModelInjector.php',
			'src/Hook/BackgroundTasksPopupMenuExtension.php',
		],
		'webservice' => [
		//'webservices.itop-portal-base.php',
		],
		'dictionary' => [
		],
		'data.struct' => [
		//'data.struct.itop-portal-base.xml',
		],
		'data.sample' => [
		//'data.sample.itop-portal-base.xml',
		],
		// Documentation
		'doc.manual_setup' => '',
		'doc.more_information' => '',
		// Default settings
		'settings' => [
		],
	]
);
