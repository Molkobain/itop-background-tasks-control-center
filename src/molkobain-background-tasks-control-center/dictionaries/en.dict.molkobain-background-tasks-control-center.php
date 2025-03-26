<?php

Dict::Add('EN US', 'English', 'English', array(
	// Menus
	'Menu:BackgroundTasksControlCenter' => 'Background tasks control center',
	'Menu:BackgroundTasksControlCenter+' => 'Manage background tasks (pause, resume, removed), check their execution time. Also visualize async. tasks currently in queue.',

    // Datamodel
    // - MIOBackgroundTaskReschedule
    'Class:MIOBackgroundTaskReschedule' => 'Background task reschedule',
    'Class:MIOBackgroundTaskReschedule/Attribute:backgroundtask_id' => 'Background task',
    'Class:MIOBackgroundTaskReschedule/Attribute:next_run_date' => 'Reschedule to',
    // - MIOAsyncTaskReschedule
    'Class:MIOAsyncTaskReschedule' => 'Async. task reschedule',
    'Class:MIOAsyncTaskReschedule/Attribute:asynctask_id' => 'Async. task',
    'Class:MIOAsyncTaskReschedule/Attribute:planned' => 'Reschedule to',


	// Control center
	'molkobain-background-tasks-control-center:ControlCenter:Title' => 'Background tasks control center',
    'molkobain-background-tasks-control-center:ControlCenter:Modal:Reschedule:Title' => 'Reschedule task\'s next run date',

	// - Background tasks
	'molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:Title' => 'Background tasks (%1$s)',
	'molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:Description' => 'Information on the registered background tasks: status, next run date, run duration, ...',
	'molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:ContextTitle' => 'Help',
	'molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:ContextInformation' => "
<div class=\"ibo-is-html-content\">
	Below are the <b>currently</b> registered background tasks that will be run using " . ITOP_APPLICATION_SHORT . "'s CRON.<br>
	<br>
	A task's status can either be:
	<ul>
		<li><b>Active:</b> Task will be run at planned date.</li>
		<li><b>Paused:</b> Task won't be run until set back to active.</li>
		<li><b>Removed:</b> Task is still registered but no longer present in " . ITOP_APPLICATION_SHORT . ". This can happen when you remove an extension or a customization. Task will resume when the extension will be set back on.</li>
	</ul>
	<br>
	<i>Note: Mind that auto refresh only updates current items information. To display new items, reload the page.</i>
</div>
",
	'molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:Action:Pause:Label' => 'Pause',
	'molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:Action:Pause:Tooltip' => 'Pause task',
	'molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:Action:PauseAll:Label' => 'Pause all tasks',
	'molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:Action:Resume:Label' => 'Resume',
	'molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:Action:Resume:Tooltip' => 'Resume task',
	'molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:Action:ResumeAll:Label' => 'Resume all tasks',
	'molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:Action:Reschedule:Label' => 'Reschedule',
	'molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:Action:Reschedule:Tooltip' => 'Reschedule task\'s next run date',

	// - Async. tasks
	'molkobain-background-tasks-control-center:ControlCenter:Tab:AsyncTasks:Title' => 'Async. tasks (%1$s)',
	'molkobain-background-tasks-control-center:ControlCenter:Tab:AsyncTasks:Description' => 'Async. tasks currently in the queue, waiting to be executed by the "ExecAsync" background task',
	'molkobain-background-tasks-control-center:ControlCenter:Tab:AsyncTasks:ContextTitle' => 'Help',
	'molkobain-background-tasks-control-center:ControlCenter:Tab:AsyncTasks:ContextInformation' => "
<div class=\"ibo-is-html-content\">
	Below are the <b>currently</b> queued async. tasks that will be run using " . ITOP_APPLICATION_SHORT . "'s <b>ExecAsyncTask</b> background task.<br>
	<br>
	A task's status can either be:
	<ul>
		<li><b>Planned:</b> Task will be run at next run date.</li>
		<li><b>Running:</b> Task is being executed.</li>
		<li><b>Idle:</b> Task isn't planned and won't be executed.</li>
		<li><b>Error:</b> Task encountered an error, execution will be tried again until remaining count reaches 0.</li>
	</ul>
	<br>
	<i>Note: Mind that auto refresh only updates current items information. To display new items, reload the page.</i>
</div>
",
    'molkobain-background-tasks-control-center:ControlCenter:Tab:AsyncTasks:Action:RunNow:Label' => 'Run now',
    'molkobain-background-tasks-control-center:ControlCenter:Tab:AsyncTasks:Action:RunNow:Tooltip' => 'Run task on next CRON exécution',
    'molkobain-background-tasks-control-center:ControlCenter:Tab:AsyncTasks:Action:Reschedule:Label' => 'Reschedule',
    'molkobain-background-tasks-control-center:ControlCenter:Tab:AsyncTasks:Action:Reschedule:Tooltip' => 'Reschedule task\'s next run date',
));
