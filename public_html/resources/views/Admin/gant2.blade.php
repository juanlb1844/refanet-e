
@extends('Admin.layout')


<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>  
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script> 
 
    <title>Ventas</title>
    <link rel="stylesheet" href="{{asset('tui-calendar/dist/toastui-calendar.css')}}"/>
    <link rel="stylesheet" href="{{asset('tui-calendar/styles/reset.css')}}"/>
    <link rel="stylesheet" href="{{asset('tui-calendar/styles/app.css')}}" />
    <link rel="stylesheet" href="{{asset('tui-calendar/styles/icons.css')}}" />
    <style>
      .navbar {
        padding: 0;
      }
    </style>
  
<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
    <div class="panel-right">  
        <div class="app-container code-html">
          <header class="header">
            <nav class="navbar">
              <button class="button is-rounded today">Hoy</button>
              <button class="button is-rounded prev">
                <img
                  alt="prev"
                  src="{{asset('tui-calendar/styles/ic-arrow-line-left.png')}}"
                  srcset="./images/ic-arrow-line-left@2x.png 2x, ./images/ic-arrow-line-left@3x.png 3x"
                />
              </button>
              <button class="button is-rounded next">
                <img
                  alt="prev"
                  src="{{asset('tui-calendar/styles/ic-arrow-line-right.png')}}"
                  srcset="
                    ./images/ic-arrow-line-right@2x.png 2x,
                    ./images/ic-arrow-line-right@3x.png 3x
                  "
                />
              </button>
              <span class="navbar--range"></span>
            </nav>
          </header>
          <main id="app"></main>
        </div>
    </div>
</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.3/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chance/1.1.8/chance.min.js"></script>
    <script src="{{asset('tui-calendar/dist/toastui-calendar.ie11.min.js')}}"></script>
    <script src="{{asset('tui-calendar/scripts/mock-data.js')}}"></script>
    <script src="{{asset('tui-calendar/scripts/utils.js')}}"></script>
    <script type="text/javascript" class="code-js">
      var Calendar = window.tui.Calendar;

      var cal = new Calendar('#app', {
        defaultView: 'month',
        calendars: MOCK_CALENDARS,
      });
    </script>
    <script type="text/javascript">
      var todayButton = $('.today');
      var prevButton = $('.prev');
      var nextButton = $('.next');
      var range = $('.navbar--range');

      function displayEvents() {
        var events = generateRandomEvents(
          cal.getViewName(),
          cal.getDateRangeStart(),
          cal.getDateRangeEnd()
        );
        cal.clear();
        cal.createEvents(events);
      }

      function displayRenderRange() {
        range.textContent = getNavbarRange(cal.getDateRangeStart(), cal.getDateRangeEnd(), 'month');
      }

      todayButton.addEventListener('click', function () {
        cal.today();
        displayEvents();
        displayRenderRange();
      });
      prevButton.addEventListener('click', function () {
        cal.prev();
        displayEvents();
        displayRenderRange();
      });
      nextButton.addEventListener('click', function () {
        cal.next();
        displayEvents();
        displayRenderRange();
      });

      displayEvents();
      displayRenderRange();
    </script>
 
