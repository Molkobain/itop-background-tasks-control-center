<?php
/*
 * Copyright (c) 2015 - 2025 Molkobain.
 *
 * This file is part of a licensed extension.
 *
 * Use of this extension is bound by the license you purchased. A license grants you a non-exclusive and non-transferable right to use and incorporate the item in your personal or commercial projects. There are several licenses available (see https://www.molkobain.com/usage-licenses/ for more information)
 */

namespace Molkobain\iTop\Extension\BackgroundTasksControlCenter\Service;

use AsyncTask;
use DBObjectSet;
use DBSearch;
use MetaModel;

/**
 * Class AsyncTaskUpdater
 *
 * @package Molkobain\iTop\Extension\BackgroundTasksControlCenter\Service
 * @since v1.0.0
 */
class AsyncTaskUpdater extends AbstractTaskUpdater
{
    /** @inheritDoc */
    protected const TASK_DATE_ATTCODE = "planned";

    /**
     * @inheritDoc
     */
    protected function GetTask(string $sTaskID): AsyncTask
    {
        /** @var AsyncTask */
        return MetaModel::GetObject(AsyncTask::class, $sTaskID);
    }

    /**
     * @inheritDoc
     */
    protected function GetTaskSet(): DBObjectSet
    {
        $oSearch = DBSearch::FromOQL("SELECT ".AsyncTask::class);
        return new DBObjectSet($oSearch);
    }
}