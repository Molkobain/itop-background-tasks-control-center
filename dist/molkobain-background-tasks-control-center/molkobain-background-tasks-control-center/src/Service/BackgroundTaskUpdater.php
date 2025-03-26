<?php
/*
 * Copyright (c) 2015 - 2025 Molkobain.
 *
 * This file is part of a licensed extension.
 *
 * Use of this extension is bound by the license you purchased. A license grants you a non-exclusive and non-transferable right to use and incorporate the item in your personal or commercial projects. There are several licenses available (see https://www.molkobain.com/usage-licenses/ for more information)
 */

namespace Molkobain\iTop\Extension\BackgroundTasksControlCenter\Service;

use BackgroundTask;
use DBObjectSet;
use DBSearch;
use MetaModel;

/**
 * Class BackgroundTaskUpdater
 *
 * @package Molkobain\iTop\Extension\BackgroundTasksControlCenter\Service
 * @since v1.0.0
 */
class BackgroundTaskUpdater extends AbstractTaskUpdater
{
    /** @inheritDoc */
    protected const TASK_DATE_ATTCODE = "next_run_date";

    /**
     * @inheritDoc
     */
    protected function GetTask(string $sTaskID): BackgroundTask
    {
        /** @var BackgroundTask */
        return MetaModel::GetObject(BackgroundTask::class, $sTaskID);
    }

    /**
     * @inheritDoc
     */
    protected function GetTaskSet(): DBObjectSet
    {
        $oSearch = DBSearch::FromOQL("SELECT ".BackgroundTask::class);
        return new DBObjectSet($oSearch);
    }
}