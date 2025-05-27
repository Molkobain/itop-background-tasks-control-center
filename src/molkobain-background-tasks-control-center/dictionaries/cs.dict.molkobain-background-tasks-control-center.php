<?php

Dict::Add('CS CZ', 'Czech', 'Čeština', array(
	// Menus
	'Menu:BackgroundTasksControlCenter' => 'Ovládací centrum běžících úloh',
	'Menu:BackgroundTasksControlCenter+' => 'Umožňuje správu úloh běžících na pozadí (např. zastavení, spuštění, odstaranění)a kontrolu doby běhu. Zobrazuje aktuální frontu asynchronních úloh.',

    // Datamodel
    // - MIOBackgroundTaskReschedule
    'Class:MIOBackgroundTaskReschedule' => 'Přeplánování úlohy na pozadí',
    'Class:MIOBackgroundTaskReschedule/Attribute:backgroundtask_id' => 'Úloha na pozadí',
    'Class:MIOBackgroundTaskReschedule/Attribute:next_run_date' => 'Přeplánováno na',
    // - MIOAsyncTaskReschedule
    'Class:MIOAsyncTaskReschedule' => 'Přeplánování asynchronní úlohy',
    'Class:MIOAsyncTaskReschedule/Attribute:asynctask_id' => 'Asynchronní úloha',
    'Class:MIOAsyncTaskReschedule/Attribute:planned' => 'Přeplánováno na',


	// Control center
	'molkobain-background-tasks-control-center:ControlCenter:Title' => 'Ovládací centrum běžících úloh',
  'molkobain-background-tasks-control-center:ControlCenter:Modal:Reschedule:Title' => 'Přeplánovat úlohy',

	// - Background tasks
	'molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:Title' => 'Úlohy na pozadí (%1$s)',
	'molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:Description' => 'Informace o běžících úlohách na pozadí, jejich status, době běhu, atd.',
	'molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:ContextTitle' => 'Pomoc',
	'molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:ContextInformation' => "
<div class=\"ibo-is-html-content\">	
 
 Níže jsou uvedeny <b>aktuálně</b> registrované úlohy na pozadí, které využívají " . ITOP_APPLICATION_SHORT . "'s CRON job.<br>
 	<br>
	Úlohy mohou mít tyto stavy:
	<ul>
		<li><b>Active:</b> Úloha bude spuštěna v plánovaný termín.</li>
		<li><b>Paused:</b> Úloha nepoběží, dokud nebude aktivována.</li>
		<li><b>Removed:</b> Úloha je stále registrována, ale již není spouštěna v " . ITOP_APPLICATION_SHORT . ". Toto se může stát po odstranění rozšíření/úpravy, které tuto úlohu obsahovalo. Úloha bude znovu spuštěna po nainstaluje příslušného rozšíření, nebo úpravy aplikace.</li>
	</ul>
	<br>
	<i>Poznámka: Nezapomeňte, že automatické obnovení aktualizuje pouze informace o aktuálních položkách. Chcete-li zobrazit nové položky, načtěte stránku znovu.</i>
</div>
",
	'molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:Action:Pause:Label' => 'Pozastavit',
	'molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:Action:Pause:Tooltip' => 'Pozastavit úlohu',
	'molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:Action:PauseAll:Label' => 'Pozastavit všechny úlohy',
	'molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:Action:Resume:Label' => 'Obnovit',
	'molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:Action:Resume:Tooltip' => 'Spustit úlohu',
	'molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:Action:ResumeAll:Label' => 'Spustit všechny úlohy',
	'molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:Action:Reschedule:Label' => 'Přeplánovat',
	'molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:Action:Reschedule:Tooltip' => 'Přeplánovat úlohu\y na nový termín spuštění',

	// - Async. tasks
	'molkobain-background-tasks-control-center:ControlCenter:Tab:AsyncTasks:Title' => 'Asynchronní úlohy (%1$s)',
	'molkobain-background-tasks-control-center:ControlCenter:Tab:AsyncTasks:Description' => 'Asynchronní úlohy aktuálně zařazené ve frontě a čekající na spuštění s další během "ExecAsync" úlohy na pozadí',
	'molkobain-background-tasks-control-center:ControlCenter:Tab:AsyncTasks:ContextTitle' => 'Pomoc',
	'molkobain-background-tasks-control-center:ControlCenter:Tab:AsyncTasks:ContextInformation' => "
<div class=\"ibo-is-html-content\">
	Níže jsou uvedeny <b>aktuálně</b> zařazené ve frontě a čekající na spuštění s další během " . ITOP_APPLICATION_SHORT . "'s <b>ExecAsyncTask</b> úlohy na pozadí.<br>
	<br>
	Úlohy mohou mít tyto stavy:
	<ul>
		<li><b>Planned:</b> Úloha bude spuštěna v dalším termínu spuštění.</li>
		<li><b>Running:</b> Úloha je aktuálně prováděna.</li>
		<li><b>Idle:</b> Úloha není naplánována a nebude provedena.</li>
		<li><b>Error:</b> Úloha narazila na chybu, její provedení bude znovu spuštěno, dokud zbývající počet pokusů nedosáhne 0.</li>
	</ul>
	<br>
	<i>Note: Nezapomeňte, že automatické obnovení aktualizuje pouze informace o aktuálních položkách. Chcete-li zobrazit nové položky, načtěte stránku znovu.</i>
</div>
",
    'molkobain-background-tasks-control-center:ControlCenter:Tab:AsyncTasks:Action:RunNow:Label' => 'Spusť nyní',
    'molkobain-background-tasks-control-center:ControlCenter:Tab:AsyncTasks:Action:RunNow:Tooltip' => 'Spustit úlohu při následujícím běhu Cron',
    'molkobain-background-tasks-control-center:ControlCenter:Tab:AsyncTasks:Action:Reschedule:Label' => 'Přeplánovat',
    'molkobain-background-tasks-control-center:ControlCenter:Tab:AsyncTasks:Action:Reschedule:Tooltip' => 'Přeplánovat úlohu\y na nový termín spuštění',
));
