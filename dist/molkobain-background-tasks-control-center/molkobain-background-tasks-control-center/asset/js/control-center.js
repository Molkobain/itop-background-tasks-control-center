/*
 * Copyright (c) 2015 - 2025 Molkobain.
 *
 * This file is part of a licensed extension.
 *
 * Use of this extension is bound by the license you purchased. A license grants you a non-exclusive and non-transferable right to use and incorporate the item in your personal or commercial projects. There are several licenses available (see https://www.molkobain.com/usage-licenses/ for more information)
 */

const MolkobainBackgroundTasksHelper = {
	css_classes: {
		is_loading: "mbtcc-is-loading",
		loader: "mbtcc-loader"
	},

	/********************/
	/* Background tasks */
	/********************/
	PauseBackgroundTask: function (aRowData, oTrElement) {
		this._UnitaryStatusChange(aRowData, oTrElement, "pause_background_task");
	},
	ResumeBackgroundTask: function (aRowData, oTrElement) {
		this._UnitaryStatusChange(aRowData, oTrElement, "resume_background_task");
	},
	RescheduleBackgroundTask: function (aRowData, oTrElement) {
		const me = this;

		let sEndpoint = this._GenerateEndpointAbsUrl("new", "object");
		let oOptions = {
			title: Dict.S("molkobain-background-tasks-control-center:ControlCenter:Modal:Reschedule:Title"),
			content: {
				endpoint: sEndpoint,
				data: {
					class: "MIOBackgroundTaskReschedule",
					default: {
						backgroundtask_id: aRowData["id"],
						next_run_date: moment().add(5, 'minutes').format('YYYY-MM-DD HH:mm:ss')
					}
				}
			}
		}

		const oModal = CombodoModal.OpenModal(oOptions);
		oModal.on('itop.form.submitted', 'form', () => {
			me._RefreshTable(oTrElement.closest(`[data-role="ibo-datatable"]`))
		});
	},

	PauseAll: function (sListId) {
		const me = this;

		// Send update request
		$.ajax({
				type: "POST",
				url: this._GenerateEndpointAbsUrl("pause_all_background_tasks"),
				cache: false
			})
			// Show feedback
			.done((oData) => {
				if (oData.success === true) {
					CombodoJSConsole.Debug("All background tasks updated");
					me._RefreshTable($(`#${sListId}`).find(`[data-role="ibo-datatable"][id*="${sListId}"]`));
				} else {
					alert("Error");
				}
			})
			.fail(() => alert("Error"));
	},
	ResumeAll: function (sListId) {
		const me = this;

		// Send update request
		$.ajax({
				type: "POST",
				url: this._GenerateEndpointAbsUrl("resume_all_background_tasks"),
				cache: false
			})
			// Show feedback
			.done((oData) => {
				if (oData.success === true) {
					CombodoJSConsole.Debug("All background tasks updated");
					me._RefreshTable($(`#${sListId}`).find(`[data-role="ibo-datatable"][id*="${sListId}"]`));
				} else {
					alert("Error");
				}
			})
			.fail(() => alert("Error"));
	},

	/********************/
	/* Async tasks      */
	/********************/
	RunNowAsyncTask: function (aRowData, oTrElement) {
		this._UnitaryStatusChange(aRowData, oTrElement, "run_now_async_task");
	},
	RescheduleAsyncTask: function(aRowData, oTrElement) {
		const me = this;

		let sEndpoint = this._GenerateEndpointAbsUrl("new", "object");
		let oOptions = {
			title: Dict.S("molkobain-background-tasks-control-center:ControlCenter:Modal:Reschedule:Title"),
			content: {
				endpoint: sEndpoint,
				data: {
					class: "MIOAsyncTaskReschedule",
					default: {
						asynctask_id: aRowData["id"],
						planned: moment().format('YYYY-MM-DD HH:mm:ss')
					}
				}
			}
		}

		const oModal = CombodoModal.OpenModal(oOptions);
		oModal.on('itop.form.submitted', 'form', () => {
			me._RefreshTable(oTrElement.closest(`[data-role="ibo-datatable"]`))
		});
	},

	/***********/
	/* Helpers */
	/***********/
	/**
	 * @param sOperation
	 * @param sNamespace If not passed, will default to "mio_background_tasks_control_center"
	 * @returns {String} Absolute URL to the endpoint for sOperation and sNamespace
	 * @private
	 */
	_GenerateEndpointAbsUrl: function (sOperation, sNamespace) {
		if (sNamespace === undefined) {
			sNamespace = "mio_background_tasks_control_center";
		}

		return GetAbsoluteUrlAppRoot() + `pages/ajax.render.php?route=${sNamespace}.${sOperation}`;
	},
	_UnitaryStatusChange: function (aRowData, oTrElement, sAction) {
		const me = this;

		// Show loader
		this._ShowRowLoader(oTrElement);
		// Send update request
		$.ajax({
			type: "POST",
			url: this._GenerateEndpointAbsUrl(sAction),
			data: {id: aRowData["id"]},
			cache: false
		})
			// Show feedback
			.done((oData) => {
				if (oData.success === true) {
					CombodoJSConsole.Debug("Background task updated");
					me._RefreshTable(oTrElement.closest(`[data-role="ibo-datatable"]`));
				} else {
					alert("Error");
				}
			})
			.fail(() => alert("Error"))
			// Hide loader
			.always(() => me._HideRowLoader(oTrElement));
	},
	/**
	 * Refresh the table and its data
	 * @param {Object} oTableElem jQuery object representing the table to refresh
	 * @private
	 */
	_RefreshTable: function (oTableElem) {
		oTableElem.DataTable().clearPipeline();
		oTableElem.DataTable().ajax.reload(null, false);
	},
	/**
	 * Show a loader on the row actions
	 * @param oTrElement jQuery object representing the row element
	 * @private
	 */
	_ShowRowLoader: function (oTrElement) {
		const oLastTd = oTrElement.find("td:last");

		oLastTd.addClass(this.css_classes.is_loading);
		oLastTd.append(`<span class="fas fa-sync-alt fa-spin ${this.css_classes.loader}"></span>`);
	},
	/**
	 * Hide loader from the row actions
	 * @param oTrElement jQuery object representing the row element
	 * @private
	 */
	_HideRowLoader: function (oTrElement) {
		const oLastTd = oTrElement.find("td:last");

		oLastTd.find(`.${this.css_classes.loader}`).remove();
		oLastTd.removeClass(this.css_classes.is_loading);
	}
};