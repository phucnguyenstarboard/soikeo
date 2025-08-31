/* Japanese initialisation for the jQuery UI date picker plugin. */
/* Written by Kentaro SATO (kentaro@ranvis.com). */
( function( factory ) {
	if ( typeof define === "function" && define.amd ) {

		// AMD. Register as an anonymous module.
		define( [ "../widgets/datepicker" ], factory );
	} else {

		// Browser globals
		factory( jQuery.datepicker );
	}
}( function( datepicker ) {

datepicker.regional.en = {
	dateFormat: "dd/mm/yy",
	firstDay: 0,
	isRTL: false,
    showMonthAfterYear: true,
    showButtonPanel: true,
    changeMonth: true,
    changeYear: true,
    numberOfMonths: 1,
};
datepicker.setDefaults( datepicker.regional.en );

return datepicker.regional.en;

} ) );
