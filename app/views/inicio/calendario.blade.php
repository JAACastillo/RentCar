<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.6/fullcalendar.min.js" /> 
<link href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.6/fullcalendar.min.css" />
<link href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.6/fullcalendar.print.css " />



 -->





<!DOCTYPE html>
<html>
<head>
   <title>Twitter Bootstrap jQuery Calendar component</title>

   <meta name="description" content="Full view calendar component for twitter bootstrap with year, month, week, day views.">
   <meta name="keywords" content="jQuery,Bootstrap,Calendar,HTML,CSS,JavaScript,responsive,month,week,year,day">
   <meta name="author" content="Serhioromano">
   <meta charset="UTF-8">

   
   {{ HTML::style('/assets/css/bootstrap.min.css', array('media' => 'screen')) }}
   
   {{ HTML::style('/assets/css/calendar.min.css', array('media' => 'screen')) }}

  
</head>
<body>
<div class="container">
   <div class="page-header col-md-8">

      <div class="pull-right form-inline">
         <div class="btn-group">
            <button class="btn btn-primary" data-calendar-nav="prev"><< </button>
            <button class="btn btn-primary" data-calendar-nav="next"> >></button>
         </div>
         <div class="btn-group">
            <button class="btn btn-warning" data-calendar-view="year">Año</button>
            <button class="btn btn-warning active" data-calendar-view="month">Mes</button>
            <button class="btn btn-warning" data-calendar-view="week">Semana</button>
         </div>
      </div>

      <h3></h3>
   </div>

   <div class="row">
      <div class="col-md-9">
         <div id="calendar"></div>
      </div>
   </div>


   
   {{ HTML::script('/assets/js/calendar.min.js') }}
   {{ HTML::script('/assets/js/underscore.min.js') }}
   {{ HTML::script('/assets/js/calendarApp.js') }}


</div>
</body>
</html>
