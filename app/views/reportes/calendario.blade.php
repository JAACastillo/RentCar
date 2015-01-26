

               <script type="text/javascript">
               $(document).ready(function() {

                  var cb = function(start, end, label) {
                    console.log(start.toISOString(), end.toISOString(), label);
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                    //alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + ", label = " + label + "]");
                  }

                  var optionSet = {
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment(),
                    minDate: '01/01/2013',
                    dateLimit: { days: 60 },
                    showDropdowns: true,
                    timePicker: false,
                    timePickerIncrement: 1,
                    timePicker12Hour: true,
                    ranges: {
                       'Ahora': [moment(), moment()],
                       'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                       'Ultimos 7 días': [moment().subtract(6, 'days'), moment()],
                       'Ultimos 30 días': [moment().subtract(29, 'days'), moment()],
                       'Este mes': [moment().startOf('month'), moment().endOf('month')],
                       'Mes pasado': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    opens: 'left',
                    buttonClasses: ['btn btn-default'],
                    applyClass: 'btn-small btn-primary',
                    cancelClass: 'btn-small',
                    format: 'MM/DD/YYYY',
                    separator: ' a ',
                    locale: {
                        applyLabel: 'Aceptar',
                        cancelLabel: 'Limpiar',
                        fromLabel: 'De',
                        toLabel: 'a',
                        customRangeLabel: 'Personalizada',
                        daysOfWeek: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi','Sa'],
                        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octobre', 'Noviembre', 'Diciembre'],
                        firstDay: 1
                    }
                  };

                  $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

                  $('#reportrange').daterangepicker(optionSet, cb);

                  $('#reportrange').on('show.daterangepicker', function() { console.log("show event fired"); });
                  $('#reportrange').on('hide.daterangepicker', function() { console.log("hide event fired"); });
                  $('#reportrange').on('apply.daterangepicker', function(ev, picker) { 

                    $('#start').val(picker.startDate.format('YYYY/MM/D'))
                    $('#end').val(picker.endDate.format('YYYY/MM/D') )

                    console.log("apply event fired, start/end dates are " 
                      + picker.startDate.format('MMMM D, YYYY') 
                      + " to " 
                      + picker.endDate.format('MMMM D, YYYY')
                    ); 
                  });
                  $('#reportrange').on('cancel.daterangepicker', function(ev, picker) { console.log("cancel event fired"); });

                  $('#start').val(moment().subtract(29, 'days').format('YYYY/MM/D') )
                  $('#end').val(moment().format('YYYY/MM/D') )

               });
               </script>

            </div>
