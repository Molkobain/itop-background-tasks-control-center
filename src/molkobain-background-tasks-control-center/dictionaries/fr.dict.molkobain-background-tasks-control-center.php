<?php

Dict::Add('FR FR', 'French', 'Français', array(
	// Menus
	'Menu:BackgroundTasksControlCenter' => 'Tâches de fond',
	'Menu:BackgroundTasksControlCenter+' => 'Gérez les tâches de fond (pause, reprise, suppression), vérifiez leur temps d\'exécution. Visualisez également les tâches asynchrones en attente ou en erreur.',

    // Datamodel
    // - MIOBackgroundTaskReschedule
    'Class:MIOBackgroundTaskReschedule' => 'Replanification de tâche de fond',
    'Class:MIOBackgroundTaskReschedule/Attribute:backgroundtask_id' => 'Tâche de fond',
    'Class:MIOBackgroundTaskReschedule/Attribute:next_run_date' => 'Replanifier au',
    // - MIOAsyncTaskReschedule
    'Class:MIOAsyncTaskReschedule' => 'Async. task reschedule',
    'Class:MIOAsyncTaskReschedule/Attribute:asynctask_id' => 'Async. task',
    'Class:MIOAsyncTaskReschedule/Attribute:planned' => 'Replanifier au',


	// Control center
	'molkobain-background-tasks-control-center:ControlCenter:Title' => 'Centre de contrôle des tâches de fond',
    'molkobain-background-tasks-control-center:ControlCenter:Modal:Reschedule:Title' => 'Replanifier la date de prochaine exécution',

	// - Background tasks
	'molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:Title' => 'Tâches de fond (%1$s)',
	'molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:Description' => 'Informations sur les tâches de fond enregistrées : statut, date de prochaine exécution, durée d\'exécution, ...',
	'molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:ContextTitle' => 'Aide',
	'molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:ContextInformation' => "
<div class=\"ibo-is-html-content\">
	Ci-dessous, les tâches de fond <b>actuellement</b> enregistrées qui seront exécutées par le CRON " . ITOP_APPLICATION_SHORT . ".<br>
	<br>
	Le statut d'une tâche peut être :
	<ul>
		<li><b>Active :</b> La tâche sera exécutée à la date de prochaine exécution.</li>
		<li><b>Paused :</b> La tâche ne sera pas exécutée tant qu'elle ne sera pas remise en active.</li>
		<li><b>Removed :</b> La tâche est toujours enregistrée mais n'est plus présente dans " . ITOP_APPLICATION_SHORT . ". Celà peut arriver quand vous retirez une extension ou une personnalisation. La tâche reprendra quand l'extension sera remise.</li>
	</ul>
	<br>
	<i>Note : Le rafraîchissement automatique ne met à jour que les informations des objets déjà affichés. Pour afficher les nouveaux objets, recharger la page.</i>
</div>
",
	'molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:Action:Pause:Label' => 'Pause',
	'molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:Action:Pause:Tooltip' => 'Mettre la tâche en pause',
	'molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:Action:PauseAll:Label' => 'Mettre en pause toutes les tâches',
	'molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:Action:Resume:Label' => 'Reprendre',
	'molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:Action:Resume:Tooltip' => 'Reprendre la tâche lors de la prochaine exécution',
	'molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:Action:ResumeAll:Label' => 'Reprendre toutes les tâches',
	'molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:Action:Reschedule:Label' => 'Replanifier',
	'molkobain-background-tasks-control-center:ControlCenter:Tab:BackgroundTasks:Action:Reschedule:Tooltip' => 'Replanifier la date de prochaine exécution de la tâche',

	// - Async. tasks
	'molkobain-background-tasks-control-center:ControlCenter:Tab:AsyncTasks:Title' => 'Tâches asynchrones (%1$s)',
	'molkobain-background-tasks-control-center:ControlCenter:Tab:AsyncTasks:Description' => 'Tâches asynchrones actuellement en attente, prêtes à être exécuter par la tâche de fond "ExecAsync"',
	'molkobain-background-tasks-control-center:ControlCenter:Tab:AsyncTasks:ContextTitle' => 'Aide',
	'molkobain-background-tasks-control-center:ControlCenter:Tab:AsyncTasks:ContextInformation' => "
<div class=\"ibo-is-html-content\">
	Ci-dessous, les tâches asynchrones <b>actuellement</b> en attente qui seront exécutées par la tâche de fond <b>ExecAsyncTask</b> du CRON " . ITOP_APPLICATION_SHORT . ".<br>
	<br>
	Le statut d'une tâche peut être :
	<ul>
		<li><b>Planned :</b> La tâche sera exécutée à la date plannifée.</li>
		<li><b>Running :</b> La tâche est en cours d'exécution.</li>
		<li><b>Idle :</b> La tâche n'est pas plannifée et ne sera pas exécutée.</li>
		<li><b>Error :</b> La tâche a rencontrée une erreur, elle sera ré-exécutée jusqu'à ce que le nombre d'essais restants atteigne 0.</li>
	</ul>
	<br>
	<i>Note : Le rafraîchissement automatique ne met à jour que les informations des objets déjà affichés. Pour afficher les nouveaux objets, recharger la page.</i>
</div>
",
    'molkobain-background-tasks-control-center:ControlCenter:Tab:AsyncTasks:Action:RunNow:Label' => 'Exécuter maintenant',
    'molkobain-background-tasks-control-center:ControlCenter:Tab:AsyncTasks:Action:RunNow:Tooltip' => 'Exécuter la tâche dès le prochain passage du CRON',
    'molkobain-background-tasks-control-center:ControlCenter:Tab:AsyncTasks:Action:Reschedule:Label' => 'Replanifier',
    'molkobain-background-tasks-control-center:ControlCenter:Tab:AsyncTasks:Action:Reschedule:Tooltip' => 'Replanifier la date de prochaine exécution de la tâche',
));
