<?php

Dict::Add('RU RU', 'Russian', 'Русский', array(
	// Menus
	'Menu:BackgroundTasksControlCenter' => 'Центр управления фоновыми заданиями',
	'Menu:BackgroundTasksControlCenter+' => 'Управление фоновыми задачами (приостановка, возобновление, удаление), контроль времени их выполнения, а также визуализация асинхронных задач в очереди.',

    // Datamodel
    // - MIOBackgroundTaskReschedule
    'Class:MIOBackgroundTaskReschedule' => 'Перенести фоновое задание',
    'Class:MIOBackgroundTaskReschedule/Attribute:backgroundtask_id' => 'Фоновая задание',
    'Class:MIOBackgroundTaskReschedule/Attribute:next_run_date' => 'Перенести на',
    // - MIOAsyncTaskReschedule
    'Class:MIOAsyncTaskReschedule' => 'Перенести асинхронное задание',
    'Class:MIOAsyncTaskReschedule/Attribute:asynctask_id' => 'Асинхронное задание',
    'Class:MIOAsyncTaskReschedule/Attribute:planned' => 'Перенести на',


	// Control center
	'molkobain-background-tasks-control-center:ControlCenter:Title' => 'Центр управления фоновыми заданиями',
    'molkobain-background-tasks-control-center:ControlCenter:Modal:Reschedule:Title' => 'Перенести следующий запуск задания',

	// - Background tasks
	'molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:Title' => 'Фоновые задания (%1$s)',
	'molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:Description' => 'Сведения о зарегистрированных фоновых задачах: статус, дата следующего запуска, время работы...',
	'molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:ContextTitle' => 'Помощь',
	'molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:ContextInformation' => "
<div class=\"ibo-is-html-content\">
	Ниже указаны фоновые задания, зарегистрированные в <b>настоящее время</b>, для запуска через " . ITOP_APPLICATION_SHORT . " CRON.<br>
	<br>
	Возможные статусы задачи:
	<ul>
		<li><b>Active:</b> Задача запустится автоматически в назначенную дату и время.</li>
		<li><b>Paused:</b> Выполнение остановлено до перевода в активный режим.</li>
		<li><b>Removed:</b> Задача всё ещё зарегистрирована, но больше " . ITOP_APPLICATION_SHORT . ". Такое происходит при отключении модуля или доработки. Задача продолжит работу, как только расширение будет снова включено.</li>
	</ul>
	<br>
	<i>Обратите внимание: Автообновление лишь обновляет информацию об уже имеющихся элементах. Для появления новых записей перезагрузите страницу.</i>
</div>
",
	'molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:Action:Pause:Label' => 'Приостоновить',
	'molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:Action:Pause:Tooltip' => 'Приостоновить задание',
	'molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:Action:PauseAll:Label' => 'Приостоновить все задания',
	'molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:Action:Resume:Label' => 'Возобновить',
	'molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:Action:Resume:Tooltip' => 'Возобновить задание',
	'molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:Action:ResumeAll:Label' => 'Возобновить все задания',
	'molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:Action:Reschedule:Label' => 'Перенести',
	'molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:Action:Reschedule:Tooltip' => 'Перенести следующий запуск задания',

	// - Async. tasks
	'molkobain-background-tasks-control-center:ControlCenter:Tab:AsyncTasks:Title' => 'Async. tasks (%1$s)',
	'molkobain-background-tasks-control-center:ControlCenter:Tab:AsyncTasks:Description' => 'Async. tasks currently in the queue, waiting to be executed by the "ExecAsync" background task',
	'molkobain-background-tasks-control-center:ControlCenter:Tab:AsyncTasks:ContextTitle' => 'Помощь',
	'molkobain-background-tasks-control-center:ControlCenter:Tab:AsyncTasks:ContextInformation' => "
<div class=\"ibo-is-html-content\">
	Ниже указаны фоновые задания, зарегистрированные в <b>настоящее время</b>, для запуска через " . ITOP_APPLICATION_SHORT . " <b>Асинхронное выполнение</b> фоновых заданий.<br>
	<br>
	Возможные статусы задачи:
	<ul>
		<li><b>Запланирована:</b> Задание запустится в запланированное время</li>
		<li><b>Запущена:</b> Идет выполнение.</li>
		<li><b>В ожидании:</b> Не включена в расписание и не выполняться.</li>
		<li><b>Ошибка:</b> Произошла ошибка. Задание будет запускаться повторно, пока количество попыток не достигнет 0.</li>
	</ul>
	<br>
	<i>Обратите внимание: Автообновление лишь обновляет информацию об уже имеющихся элементах. Для появления новых записей перезагрузите страницу.</i>
</div>
",
    'molkobain-background-tasks-control-center:ControlCenter:Tab:AsyncTasks:Action:RunNow:Label' => 'Запустить сейчас',
    'molkobain-background-tasks-control-center:ControlCenter:Tab:AsyncTasks:Action:RunNow:Tooltip' => 'Выполнить задачу при следующем запуске CRON',
    'molkobain-background-tasks-control-center:ControlCenter:Tab:AsyncTasks:Action:Reschedule:Label' => 'Перенести',
    'molkobain-background-tasks-control-center:ControlCenter:Tab:AsyncTasks:Action:Reschedule:Tooltip' => 'Перенести следующий запуск задания',
));
