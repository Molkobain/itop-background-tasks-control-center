<?php

/*
 * Copyright (c) 2015 - 2024 Molkobain.
 *
 * This file is part of licensed extension.
 *
 * Use of this extension is bound by the license you purchased. A license grants you a non-exclusive and non-transferable right to use and incorporate the item in your personal or commercial projects. There are several licenses available (see https://www.molkobain.com/usage-licenses/ for more information)
 */

namespace Molkobain\iTop\Extension\BackgroundTasksControlCenter\Controller;


use AjaxPage;
use AsyncTask;
use BackgroundTask;
use Combodo\iTop\Application\UI\Base\Component\Alert\AlertUIBlockFactory;
use Combodo\iTop\Application\UI\Base\Component\Panel\PanelUIBlockFactory;
use Combodo\iTop\Controller\AbstractController;
use DateTime;
use DBObjectSet;
use DBSearch;
use Dict;
use DisplayBlock;
use Exception;
use iTopWebPage;
use JsonPage;
use MetaModel;
use Molkobain\iTop\Extension\BackgroundTasksControlCenter\Service\AbstractTaskUpdater;
use Molkobain\iTop\Extension\BackgroundTasksControlCenter\Service\AsyncTaskUpdater;
use Molkobain\iTop\Extension\BackgroundTasksControlCenter\Service\BackgroundTaskUpdater;
use utils;

/**
 * Class ControlCenterController
 *
 * @package Molkobain\iTop\Extension\BackgroundTasksControlCenter\Controller
 * @since v1.0.0
 */
class ControlCenterController extends AbstractController {
	const ROUTE_NAMESPACE = "mio_background_tasks_control_center";

	/** @var string Code of the current module */
	protected const MODULE_CODE = "molkobain-background-tasks-control-center";
	/** @var int Default interval for the async. tasks list refresh */
	protected const DEFAULT_TASK_LISTS_REFRESH_INTERVAL = 10;

	/**
	 * Displays the control center page
	 *
	 * @return \iTopWebPage
     * @noinspection PhpDocMissingThrowsInspection
     */
	public function OperationDisplay(): iTopWebPage
	{
		$oPage = new iTopWebPage(Dict::S("molkobain-background-tasks-control-center:ControlCenter:Title"));
        $oPage->LinkScriptFromAppRoot("js/wizardhelper.js");
        $oPage->LinkScriptFromModule("molkobain-background-tasks-control-center/asset/js/control-center.js");
        $oPage->add_dict_entries("molkobain-background-tasks-control-center:ControlCenter");

        // Prepare main panel
		$oPanel = PanelUIBlockFactory::MakeNeutral(Dict::S("molkobain-background-tasks-control-center:ControlCenter:Title"))
			->SetIcon(utils::GetAbsoluteUrlModulesRoot() . "molkobain-background-tasks-control-center/asset/img/icons8-administrative-tools-48.png");
		$oPage->AddUiBlock($oPanel);

		// - Prepare its tabs container
		$oPage->AddTabContainer("mbtcc_tabs", "", $oPanel);
		$oPage->SetCurrentTabContainer("mbtcc_tabs");

		//------------------------------------------------------------------------
		// Background tasks
		//------------------------------------------------------------------------
		// - Retrieve data
		$oSearch = DBSearch::FromOQL("SELECT BackgroundTask AS BT");
		$oSearch->AllowAllData(true);
		$oSet = new DBObjectSet($oSearch);

		// - Prepare tab
		$oPage->SetCurrentTab("background_tasks", Dict::Format("molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:Title", $oSet->Count()), Dict::S("molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:Description"));

		// - Context information
		$oAlert = AlertUIBlockFactory::MakeForInformation(Dict::S("molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:ContextTitle"), Dict::S("molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:ContextInformation"), "mbtcc_bt_context_information")
			->SetIsClosable(true)
			->SetIsCollapsible(true)
			->EnableSaveCollapsibleState("mbtcc_bt_context_information");
		$oPage->AddUiBlock($oAlert);

		// - Prepare list
		$oDisplayBlock = DisplayBlock::FromObjectSet($oSet, DisplayBlock::ENUM_STYLE_LIST, [
            "auto_reload" => utils::GetConfig()->GetModuleSetting(static::MODULE_CODE, "task_lists_refresh_interval", static::DEFAULT_TASK_LISTS_REFRESH_INTERVAL),
            "row_actions" => [
				[
					'label'         => Dict::S("molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:Action:Resume:Label"),
					'name'          => 'resume',
					'tooltip'       => Dict::S("molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:Action:Resume:Tooltip"),
					'icon_classes'  => 'fas fa-play',
					'js_row_action' => "MolkobainBackgroundTasksHelper.ResumeBackgroundTask(aRowData, oTrElement)",
				],
				[
					'label'         => Dict::S("molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:Action:Pause:Label"),
					'name'          => 'pause',
					'tooltip'       => Dict::S("molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:Action:Pause:Tooltip"),
					'icon_classes'  => 'fas fa-pause',
					'js_row_action' => "MolkobainBackgroundTasksHelper.PauseBackgroundTask(aRowData, oTrElement)",
				],
				[
					'label'         => Dict::S("molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:Action:Reschedule:Label"),
					'name'          => 'reschedule',
					'tooltip'       => Dict::S("molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:Action:Reschedule:Tooltip"),
					'icon_classes'  => 'fas fa-history',
					'js_row_action' => "MolkobainBackgroundTasksHelper.RescheduleBackgroundTask(aRowData, oTrElement)",
				],
			]
		]);
		$oDisplayBlock->Display($oPage, "mbtcc_bt_list");

		//------------------------------------------------------------------------
		// Async tasks
		//------------------------------------------------------------------------
		// - Retrieve data
		$oSearch = DBSearch::FromOQL("SELECT AsyncTask AS AT");
		$oSearch->AllowAllData(true);
		$oSet = new DBObjectSet($oSearch);

		// - Prepare tab
		$oPage->SetCurrentTab("async_tasks", Dict::Format("molkobain-background-tasks-control-center:ControlCenter:Tab:AsyncTasks:Title", $oSet->Count()), Dict::S("molkobain-background-tasks-control-center:ControlCenter:Tab:AsyncTasks:Description"));

		// - Context information
		$oAlert = AlertUIBlockFactory::MakeForInformation(Dict::S("molkobain-background-tasks-control-center:ControlCenter:Tab:AsyncTasks:ContextTitle"), Dict::S("molkobain-background-tasks-control-center:ControlCenter:Tab:AsyncTasks:ContextInformation"), "mbtcc_at_context_information")
			->SetIsClosable(true)
			->SetIsCollapsible(true)
			->EnableSaveCollapsibleState("mbtcc_at_context_information");
		$oPage->AddUiBlock($oAlert);

		// - Prepare list
		$oDisplayBlock = DisplayBlock::FromObjectSet($oSet, DisplayBlock::ENUM_STYLE_LIST, [
            "auto_reload" => utils::GetConfig()->GetModuleSetting(static::MODULE_CODE, "task_lists_refresh_interval", static::DEFAULT_TASK_LISTS_REFRESH_INTERVAL),
            "row_actions" => [
                [
                    'label'         => Dict::S("molkobain-background-tasks-control-center:ControlCenter:Tab:AsyncTasks:Action:RunNow:Label"),
                    'name'          => 'run_now',
                    'tooltip'       => Dict::S("molkobain-background-tasks-control-center:ControlCenter:Tab:AsyncTasks:Action:RunNow:Tooltip"),
                    'icon_classes'  => 'fas fa-play',
                    'js_row_action' => "MolkobainBackgroundTasksHelper.RunNowAsyncTask(aRowData, oTrElement)",
                ],
                [
                    'label'         => Dict::S("molkobain-background-tasks-control-center:ControlCenter:Tab:AsyncTasks:Action:Reschedule:Label"),
                    'name'          => 'name',
                    'tooltip'       => Dict::S("molkobain-background-tasks-control-center:ControlCenter:Tab:AsyncTasks:Action:Reschedule:Tooltip"),
                    'icon_classes'  => 'fas fa-history',
                    'js_row_action' => "MolkobainBackgroundTasksHelper.RescheduleAsyncTask(aRowData, oTrElement)",
                ],
            ],
		]);
		$oDisplayBlock->Display($oPage, "mbtcc_at_list");


		return $oPage;
	}

    /********************/
    /* Background tasks */
    /********************/

    /**
     * Pauses background task identified by "id" HTTP parameter
     *
     * @return \JsonPage
     */
    public function OperationPauseBackgroundTask(): JsonPage
    {
        $sTaskID = utils::ReadPostedParam("id", null, utils::ENUM_SANITIZATION_FILTER_ELEMENT_IDENTIFIER);

        return $this->UpdateOneObjectAndPrepareResponse(BackgroundTask::class, $sTaskID, "paused");
    }

    /**
     * Resumes background task identified by "id" HTTP parameter
     *
     * @return \JsonPage
     */
    public function OperationResumeBackgroundTask(): JsonPage
    {
        $sTaskID = utils::ReadPostedParam("id", null, utils::ENUM_SANITIZATION_FILTER_ELEMENT_IDENTIFIER);

        return $this->UpdateOneObjectAndPrepareResponse(BackgroundTask::class, $sTaskID, "active");
    }

    /**
     * Pauses all background tasks identified no matter their current status
     *
     * @return \JsonPage
     */
    public function OperationPauseAllBackgroundTasks(): JsonPage
    {
        return $this->UpdateAllObjectsAndPrepareResponse(BackgroundTask::class, "paused");
    }

    /**
     * Resumes all background tasks identified no matter their current status
     *
     * @return \JsonPage
     */
    public function OperationResumeAllBackgroundTasks(): JsonPage
    {
        return $this->UpdateAllObjectsAndPrepareResponse(BackgroundTask::class, "active");
    }

    /***************/
    /* Async tasks */
    /***************/

    public function OperationRunNowAsyncTask(): JsonPage
    {
        $sTaskID = utils::ReadPostedParam("id", null, utils::ENUM_SANITIZATION_FILTER_ELEMENT_IDENTIFIER);
        $sDateTime = (new DateTime())->format("Y-m-d H:i:s");

        return $this->UpdateOneObjectAndPrepareResponse(AsyncTask::class, $sTaskID, "planned", $sDateTime);
    }

    /***********/
    /* Helpers */
    /***********/

    /**
     * Updates one object and prepares the response page
     *
     * @param string $sObjectClass Class of the DM object (e.g. "\BackgroundTask")
     * @param string $sObjectID ID of the object
     * @param string $sNewStatus New status to set on the object
     * @param string|null $sNewDateTime New date/time to set on the object (format Y-m-d H:i:s)
     * @return \JsonPage
     */
	protected function UpdateOneObjectAndPrepareResponse(string $sObjectClass, string $sObjectID, string $sNewStatus, ?string $sNewDateTime = null): JsonPage
	{
		$oPage = new JsonPage();

		try {
            $oTaskUpdater = $this->GetTaskService($sObjectClass);
            $oTaskUpdater->UpdateStatusAndDate($sObjectID, $sNewStatus, $sNewDateTime);

			$aResult = [
				"success" => true,
			];
		} catch (Exception $oException) {
			$aResult = [
				"success"       => false,
				"error_message" => $oException->getMessage(),
			];
		}

		$oPage->SetData($aResult);
		$oPage->SetOutputDataOnly(true);
		return $oPage;
	}

    /**
     * Updates all objects and prepares the response page
     *
     * @param string $sObjectClass Class of the DM objects (e.g. "\BackgroundTask")
     * @param string $sNewStatus New status to set on the objects
     * @param string|null $sNewDateTime New date/time to set on the object (format Y-m-d H:i:s)
     * @return \JsonPage
     */
	protected function UpdateAllObjectsAndPrepareResponse(string $sObjectClass, string $sNewStatus, ?string $sNewDateTime = null): JsonPage
	{
		$oPage = new JsonPage();

		try {
            $oTaskUpdater = $this->GetTaskService($sObjectClass);
            $oTaskUpdater->UpdateStatusAndDateForAll($sNewStatus, $sNewDateTime);

			$aResult = [
				"success" => true,
			];
		} catch (Exception $oException) {
			$aResult = [
				"success"       => false,
				"error_message" => $oException->getMessage(),
			];
		}

		$oPage->SetData($aResult);
		$oPage->SetOutputDataOnly(true);
		return $oPage;
	}

    /**
     * @param string $sTaskClass Class of the DM object (e.g. "\BackgroundTask")
     * @return AbstractTaskUpdater The update service corresponding for the $sTaskClass class
     * @throws Exception
     */
    protected function GetTaskService(string $sTaskClass): AbstractTaskUpdater
    {
        switch ($sTaskClass) {
            case BackgroundTask::class:
                return BackgroundTaskUpdater::GetInstance();
            case AsyncTask::class:
                return AsyncTaskUpdater::GetInstance();
            default:
                throw new Exception("Could not find a task manipulator service service for class $sTaskClass");
        }
    }
}