<?php

// As the BackgroundTask and AsyncTask classes have no "list" zlist and are PHP classes, we init. their zlists using this hack
MetaModel::Init_SetZListItems("list", [
	0 => "status",
	1 => "latest_run_date",
	2 => "next_run_date",
	3 => "average_run_duration",
	4 => "latest_run_duration",
], BackgroundTask::class);

MetaModel::Init_SetZListItems("list", [
	0 => "event_id",
	1 => "status",
	2 => "started",
	3 => "planned",
	4 => "last_error_code",
	5 => "last_error",
	6 => "last_attempt",
	7 => "remaining_retries",
], AsyncTask::class);
