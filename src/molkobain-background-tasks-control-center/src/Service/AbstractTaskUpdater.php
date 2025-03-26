<?php
/*
 * Copyright (c) 2015 - 2025 Molkobain.
 *
 * This file is part of a licensed extension.
 *
 * Use of this extension is bound by the license you purchased. A license grants you a non-exclusive and non-transferable right to use and incorporate the item in your personal or commercial projects. There are several licenses available (see https://www.molkobain.com/usage-licenses/ for more information)
 */

namespace Molkobain\iTop\Extension\BackgroundTasksControlCenter\Service;

use DBObject;
use DBObjectSet;

/**
 * Class AbstractTaskUpdater
 *
 * @package Molkobain\iTop\Extension\BackgroundTasksControlCenter\Service
 * @since v1.0.0
 */
abstract class AbstractTaskUpdater
{
    /** @var string Attribute code carrying the status of the task */
    protected const TASK_STATUS_ATTCODE = "status";
    /** @var string Attribute code carrying the execution date of the task */
    protected const TASK_DATE_ATTCODE = "date";

    /** @var static */
    protected static $instance;

    /**
     * @return static Singleton instance of the service
     */
    public static function GetInstance(): static
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    /**
     * Singleton pattern, can't use the constructor. Use {@see static::GetInstance()} to instantiate
     */
    private function __construct()
    {
    }

    /**
     * Updates the status and optionally date time for the task identified by $sTaskID
     *
     * @param string $sTaskID ID of the task to update
     * @param string $sNewTaskStatus New status for the task
     * @param string|null $sNewTaskDateTime Optional new date time for the task
     * @return void
     * @noinspection PhpDocMissingThrowsInspection
     */
    public function UpdateStatusAndDate(string $sTaskID, string $sNewTaskStatus, ?string $sNewTaskDateTime = null): void
    {
        $this->Update($this->GetTask($sTaskID), $sNewTaskStatus, $sNewTaskDateTime);
    }

    /**
     * Updates the status and optionally date time for all tasks concerned by the service
     *
     * @param string $sNewTaskStatus New status for the task
     * @param string|null $sNewTaskDateTime Optional new date time for the task
     * @return void
     * @noinspection PhpDocMissingThrowsInspection
     */
    public function UpdateStatusAndDateForAll(string $sNewTaskStatus, ?string $sNewTaskDateTime = null): void
    {
        $oSet = $this->GetTaskSet();
        while ($oTask = $oSet->Fetch()) {
            $this->Update($oTask, $sNewTaskStatus, $sNewTaskDateTime);
        }
    }

    /**
     * Does the actual update of $oTask status and optionally date time
     *
     * @param DBObject $oTask Task to udpate
     * @param string $sNewTaskStatus New status for the task
     * @param string|null $sNewTaskDateTime Optional new date time for the task
     * @return void
     * @noinspection PhpDocMissingThrowsInspection
     */
    protected function Update(DBObject $oTask, string $sNewTaskStatus, ?string $sNewTaskDateTime = null): void
    {
        $oTask->Set(static::TASK_STATUS_ATTCODE, $sNewTaskStatus);
        if ($sNewTaskDateTime !== null) {
            $oTask->Set(static::TASK_DATE_ATTCODE, $sNewTaskDateTime);
        }

        $oTask->DBUpdate();
    }

    /**
     * @param string $sTaskID ID of the task
     * @return DBObject Task identified by $sTaskID
     * @overwritable-hook
     */
    abstract protected function GetTask(string $sTaskID): DBObject;

    /**
     * @return DBObjectSet Set of all tasks concerned by the service
     * @overwritable-hook
     */
    abstract protected function GetTaskSet(): DBObjectSet;
}