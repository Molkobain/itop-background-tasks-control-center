<?php

/*
 * Copyright (c) 2015 - 2024 Molkobain.
 *
 * This file is part of licensed extension.
 *
 * Use of this extension is bound by the license you purchased. A license grants you a non-exclusive and non-transferable right to use and incorporate the item in your personal or commercial projects. There are several licenses available (see https://www.molkobain.com/usage-licenses/ for more information)
 */

namespace Molkobain\iTop\Extension\BackgroundTasksControlCenter\Hook;

use BackgroundTask;
use center\src\Controller\ControlCenterController;
use Combodo\iTop\Service\Router\Router;
use Dict;
use iPopupMenuExtension;
use JSButtonItem;

/**
 * Class BackgroundTasksPopupMenuExtension
 *
 * @package Molkobain\iTop\Extension\BackgroundTasksControlCenter\Hook
 * @since v1.0.0
 */
class BackgroundTasksPopupMenuExtension implements iPopupMenuExtension {

	/**
	 * @inheritDoc
	 *
	 * Display bulk actions for background tasks on lists
	 */
	public static function EnumItems($iMenuId, $param) {
		$aResults = [];

		// Only handling list actions for now
		if ($iMenuId !== iPopupMenuExtension::MENU_OBJLIST_ACTIONS) {
			return $aResults;
		}

		/** @var \DBObjectSet $oSet */
		$oSet = $param;

		// Check list objects type
		if (BackgroundTask::class !== $oSet->GetClass()) {
			return $aResults;
		}

		$oRouter = Router::GetInstance();

		$oResumeAllButton = new JSButtonItem(
			"mbtcc_bt_resume_all",
			Dict::S('molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:Action:ResumeAll:Label'),
			"MolkobainBackgroundTasksHelper.ResumeAll('mbtcc_bt_list');"
		);
		$oResumeAllButton->SetIconClass("fas fa-play");
		$aResults[] = $oResumeAllButton;

		$oPauseAllButton = new JSButtonItem(
			"mbtcc_bt_pause_all",
			Dict::S('molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:Action:PauseAll:Label'),
			"MolkobainBackgroundTasksHelper.PauseAll('mbtcc_bt_list');"
		);
		$oPauseAllButton->SetIconClass("fas fa-pause");
		$aResults[] = $oPauseAllButton;

		return $aResults;
	}
}