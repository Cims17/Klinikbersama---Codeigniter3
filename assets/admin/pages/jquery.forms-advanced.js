/**
 * Theme: Dastone - Responsive Bootstrap 5 Admin Dashboard
 * Author: Mannatthemes
 * Form Advanced Js
 */

!function($) {

  var AdvancedForm = function() {};
  
  AdvancedForm.prototype.init = function() {
    
      // Select2
      $(".select2").select2({
        	width: '100%'
      });

			// Material Date picker    
      $('#mdate').bootstrapMaterialDatePicker({
				 weekStart : 0, time: false, maxDate : new Date()  
			});
			$('#mdateperiksa').bootstrapMaterialDatePicker({
				weekStart : 0, time: false, minDate : new Date()  
		 });
			$('#timepicker').bootstrapMaterialDatePicker({ 
					format : 'HH:mm', time: true, date: false 
			});
			$('#timepicker2').bootstrapMaterialDatePicker({ 
					format : 'HH:mm', time: true, date: false 
			});
			$('#date-format').bootstrapMaterialDatePicker({ 
					format : 'dddd DD MMMM YYYY - HH:mm' 
			});  
			$('#min-date').bootstrapMaterialDatePicker({ 
					format : 'DD/MM/YYYY HH:mm', minDate : new Date() 
			});
			
			$('#date-end').bootstrapMaterialDatePicker
			({
					weekStart: 0, format: 'DD/MM/YYYY HH:mm'
			});
			$('#date-start').bootstrapMaterialDatePicker
			({
					weekStart: 0, format: 'DD/MM/YYYY HH:mm', shortTime : true
			}).on('change', function(e, date)
			{
					$('#date-end').bootstrapMaterialDatePicker('setMinDate', date);
			});

			// Date range picker
			$('input[name="dates"]').daterangepicker({
        "alwaysShowCalendars": true,
      });
      $('.open_picker').show();
      
      $('input[name="daterange"]').daterangepicker({
        opens: 'left'
      }, function(start, end, label) {
        console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
      });
    
      $('input[name="datetimes"]').daterangepicker({
        timePicker: true,
        startDate: moment().startOf('hour'),
        endDate: moment().startOf('hour').add(32, 'hour'),
        locale: {
          format: 'M/DD hh:mm A'
        }
      });
    
      $('input[name="birthday"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 1901,
        maxYear: parseInt(moment().format('YYYY'),10)
      }, function(start, end, label) {
        var years = moment().diff(start, 'years');
        alert("You are " + years + " years old!");
      });
    
      var start = moment().subtract(29, 'days');
      var end = moment();
    
      function cb(start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
      }
    
      $('#reportrange').daterangepicker({
          startDate: start,
          endDate: end,
          ranges: {
             'Today': [moment(), moment()],
             'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
             'Last 7 Days': [moment().subtract(6, 'days'), moment()],
             'Last 30 Days': [moment().subtract(29, 'days'), moment()],
             'This Month': [moment().startOf('month'), moment().endOf('month')],
             'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          }
      }, cb);
  },
  //init
  $.AdvancedForm = new AdvancedForm, $.AdvancedForm.Constructor = AdvancedForm
}(window.jQuery),

//initializing
function ($) {
  "use strict";
  $.AdvancedForm.init();
}(window.jQuery);
