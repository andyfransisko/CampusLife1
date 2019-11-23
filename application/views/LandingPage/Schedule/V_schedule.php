  
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('<?php echo base_url()?>assets/images/background2.jpeg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-end" data-scrollax-parent="true">
            <div class="col-md order-md-first ftco-animate mt-5" data-scrollax=" properties: { translateY: '70%' }">
                
          <!-- partial:index.partial.html -->
<script>
  // fill the month table with column headings
function day_title(day_name) {
    document.write("<div class='c-cal__col'>" + day_name + "</div>");
  }
  // fills the month table with numbers
function fill_table(month, month_length, indexMonth, year) {
    day = 1;
    // begin the new month table
    document.write("<div class='c-main c-main-" + indexMonth + "'>");
    //document.write("<b>"+month+" "+year+"</b>")

    // column headings
    document.write("<div class='c-cal__row'>");
    day_title("Sun");
    day_title("Mon");
    day_title("Tue");
    day_title("Wed");
    day_title("Thu");
    day_title("Fri");
    day_title("Sat");
    document.write("</div>");

    // pad cells before first day of month
    document.write("<div class='c-cal__row'>");
    for (var i = 1; i < start_day; i++) {
      if (start_day > 7) {
      } else {
        document.write("<div class='c-cal__cel'></div>");
      }
    }

    // fill the first week of days
    for (var i = start_day; i < 8; i++) {
      document.write(
        "<div data-day='"+year+ "-" +
          indexMonth +
          "-0" +
          day +
          "'class='c-cal__cel'><p>" +
          day +
          "</p></div>"
      );
      day++;
    }
    document.write("</div>");

    // fill the remaining weeks
    while (day <= month_length) {
      document.write("<div class='c-cal__row'>");
      for (var i = 1; i <= 7 && day <= month_length; i++) {
        if (day >= 1 && day <= 9) {
          document.write(
            "<div data-day='"+year+"-" +
              indexMonth +
              "-0" +
              day +
              "'class='c-cal__cel'><p>" +
              day +
              "</p></div>"
          );
          day++;
        } else {
          document.write(
            "<div data-day='"+year+"-" +
              indexMonth +
              "-" +
              day +
              "' class='c-cal__cel'><p>" +
              day +
              "</p></div>"
          );
          day++;
        }
      }
      document.write("</div>");
      // the first day of the next month
      start_day = i;
    }

    document.write("</div>");
  }
</script>
<header>
  <div class="wrapper">
    <div class="c-monthyear">
    <div class="c-month">
        <span id="prev" class="prev fa fa-angle-left" aria-hidden="true"></span>
        <div id="c-paginator">
          <span class="c-paginator__month">JANUARY</span>
          <span class="c-paginator__month">FEBRUARY</span>
          <span class="c-paginator__month">MARCH</span>
          <span class="c-paginator__month">APRIL</span>
          <span class="c-paginator__month">MAY</span>
          <span class="c-paginator__month">JUNE</span>
          <span class="c-paginator__month">JULY</span>
          <span class="c-paginator__month">AUGUST</span>
          <span class="c-paginator__month">SEPTEMBER</span>
          <span class="c-paginator__month">OCTOBER</span>
          <span class="c-paginator__month">NOVEMBER</span>
          <span class="c-paginator__month">DECEMBER</span>
        </div>
        <span id="next" class="next fa fa-angle-right" aria-hidden="true"></span>
      </div>
      <span class="c-paginator__year">2019</span>
    </div>
    <div class="c-sort" style="position:relative;right:20%;">
      <a class="o-btn c-today__btn" href="javascript:;">TODAY</a>
    </div>
  </div>
</header>
<div class="wrapper">
  <div class="c-calendar">
    <div class="c-calendar__style c-aside">
      <a class="c-add o-btn js-event__add" href="javascript:;">add event <span class="fa fa-plus"></span></a>
      <div class="c-aside__day">
        <span class="c-aside__num"></span> <span class="c-aside__month"></span>
      </div>
      <div class="c-aside__eventList">
      </div>
    </div>
    <div class="c-cal__container c-calendar__style">
      <script>
      
      // CAHNGE the below variable to the CURRENT YEAR
      the_date = new Date();
      year = the_date.getFullYear();
      february_month = "";
      if(year%4 == 0){february_month = 29}else{february_month=28}
      // first day of the week of the new year
      today = new Date("January 1, " + year);
      start_day = today.getDay() + 1;
      fill_table("January", 31, "01", year);
      fill_table("February", february_month, "02", year);
      fill_table("March", 31, "03", year);
      fill_table("April", 30, "04", year);
      fill_table("May", 31, "05", year);
      fill_table("June", 30, "06", year);
      fill_table("July", 31, "07", year);
      fill_table("August", 31, "08", year);
      fill_table("September", 30, "09", year);
      fill_table("October", 31, "10", year);
      fill_table("November", 30, "11", year);
      fill_table("December", 31, "12", year);
      </script>
    </div>
  </div>

  <div class="c-event__creator c-calendar__style js-event__creator">
    <a href="javascript:;" class="o-btn js-event__close">CLOSE <span class="fa fa-close"></span></a>
    <form id="addEvent">
      <input placeholder="Event name" type="text" name="name">
      <input type="date" name="date">
      <textarea placeholder="Notes" name="notes" cols="30" rows="10"></textarea>
      <select name="tags">
          <option value="event">event</option>
          <option value="important">important</option>
          <option value="birthday">birthday</option>
          <option value="festivity">festivity</option>
        </select>
    </form>
    <br>
    <a href="javascript:;" class="o-btn js-event__save">SAVE <span class="fa fa-save"></span></a>
  </div>
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.cycle2/2.1.6/jquery.cycle2.core.min.js'></script><script  src="./script.js"></script>


            </div>
            

        </div>
          
          
        <div class="row ">


        </div>

        
      </div>
    </section>
    
    

    <!-- Script -->
    <script>
//global variables
var monthEl = $(".c-main");
var dataCel = $(".c-cal__cel");
var dateObj = new Date();
var dayNum = dateObj.getUTCDay();
var month = dateObj.getUTCMonth() + 1;
var day = dateObj.getUTCDate();
if(day < 10){
  day = "0"+day;
}
var year = dateObj.getUTCFullYear();
var monthText = [
  "January",
  "February",
  "March",
  "April",
  "May",
  "June",
  "July",
  "August",
  "September",
  "October",
  "November",
  "December"
];
var indexMonth = month;
var todayBtn = $(".c-today__btn");
var addBtn = $(".js-event__add");
var saveBtn = $(".js-event__save");
var closeBtn = $(".js-event__close");
var winCreator = $(".js-event__creator");
var inputDate = $(this).data(); 
today = year+"-"+month+"-"+day;

// ------ set default events -------
function defaultEvents(dataDay,dataName,dataNotes,classTag){
  var date = $('*[data-day='+dataDay+']');
  date.attr("data-name", dataName);
  date.attr("data-notes", dataNotes);
  date.addClass("event");
  date.addClass("event--" + classTag);
}

defaultEvents(today, 'YEAH!','Today is your day','important');
defaultEvents('2019-12-25', 'MERRY CHRISTMAS','A lot of gift!!!!','festivity');
defaultEvents('2019-03-03', "LUCA'S BIRTHDAY",'Another gifts...?','birthday');
defaultEvents('2019-03-03', "MY LADY'S BIRTHDAY",'A lot of money to spent!!!!','birthday');
defaultEvents('2019-11-04', "MY LADY'S BIRTHDAY",'A lot of money to spent!!!!','birthday');

<?php 
  
    
    $start = new DateTime('2019-08-19');
    $end   = new DateTime('2019-12-21');
    
    //$start->modify($dow); // Move to first occurence
    //$end->add(new DateInterval('2019-12-31')); // Move to 1 year from start
    
    $interval = new DateInterval("P1D");
    $period   = new DatePeriod($start, $interval, $end);
    
  
    foreach ($period as $date) {  
      $startDay = date_format($date, 'N');
      $hari  = $date->format('Y-m-d');
      foreach($jadwal as $a){
          if($startDay == $a->hari){

          
    ?>
    //defaultEvents(<?php //echo $date->format('Y-m-d');?>,'KULIAH', $a->nama_mata_kuliah, 'Kuliah jam <?php //echo $a->jam_mulai."-" ?>')
    defaultEvents('<?php echo $hari ?>', 'KULIAH', '<?php echo $a->nama_mata_kuliah?> <br> <?php echo $a->detail_ruangan?> <br> <?php echo $a->jam_mulai. "-" .$a->jam_selesai?>','birthday');

<?php }// tutup if
  }//tutup foreach jadwal
}// tutup foreach  period
?>
// ------ functions control -------

//button of the current day
todayBtn.on("click", function() {
  if (month < indexMonth) {
    var step = indexMonth % month;
    movePrev(step, true);
  } else if (month > indexMonth) {
    var step = month - indexMonth;
    moveNext(step, true);
  }
});

//higlight the cel of current day
dataCel.each(function() {
  if ($(this).data("day") === today) {
    $(this).addClass("isToday");
    fillEventSidebar($(this));
  }
});

//window event creator
addBtn.on("click", function() {
  winCreator.addClass("isVisible");
  $("body").addClass("overlay");
  dataCel.each(function() {
    if ($(this).hasClass("isSelected")) {
      today = $(this).data("day");
      document.querySelector('input[type="date"]').value = today;
    } else {
      document.querySelector('input[type="date"]').value = today;
    }
  });
});
closeBtn.on("click", function() {
  winCreator.removeClass("isVisible");
  $("body").removeClass("overlay");
});
saveBtn.on("click", function() {
  var inputName = $("input[name=name]").val();
  var inputDate = $("input[name=date]").val();
  var inputNotes = $("textarea[name=notes]").val();
  var inputTag = $("select[name=tags]")
    .find(":selected")
    .text();

  dataCel.each(function() {
    if ($(this).data("day") === inputDate) {
      if (inputName != null) {
        $(this).attr("data-name", inputName);
      }
      if (inputNotes != null) {
        $(this).attr("data-notes", inputNotes);
      }
      $(this).addClass("event");
      if (inputTag != null) {
        $(this).addClass("event--" + inputTag);
      }
      fillEventSidebar($(this));
    }
  });

  winCreator.removeClass("isVisible");
  $("body").removeClass("overlay");
  $("#addEvent")[0].reset();
});

//fill sidebar event info
function fillEventSidebar(self) {
  $(".c-aside__event").remove();
  var thisName = self.attr("data-name");
  var thisNotes = self.attr("data-notes");
  var thisImportant = self.hasClass("event--important");
  var thisBirthday = self.hasClass("event--birthday");
  var thisFestivity = self.hasClass("event--festivity");
  var thisEvent = self.hasClass("event");
  
  switch (true) {
    case thisImportant:
      $(".c-aside__eventList").append(
        "<p class='c-aside__event c-aside__event--important'>" +
        thisName +
        " <span> • " +
        thisNotes +
        "</span></p>"
      );
      break;
    case thisBirthday:
      $(".c-aside__eventList").append(
        "<p class='c-aside__event c-aside__event--birthday'>" +
        thisName +
        " <span> • " +
        thisNotes +
        "</span></p>"
      );
      break;
    case thisFestivity:
      $(".c-aside__eventList").append(
        "<p class='c-aside__event c-aside__event--festivity'>" +
        thisName +
        " <span> • " +
        thisNotes +
        "</span></p>"
      );
      break;
    case thisEvent:
      $(".c-aside__eventList").append(
        "<p class='c-aside__event'>" +
        thisName +
        " <span> • " +
        thisNotes +
        "</span></p>"
      );
      break;
   }
};
dataCel.on("click", function() {
  var thisEl = $(this);
  var thisDay = $(this)
  .attr("data-day")
  .slice(8);
  var thisMonth = $(this)
  .attr("data-day")
  .slice(5, 7);

  fillEventSidebar($(this));

  $(".c-aside__num").text(thisDay);
  $(".c-aside__month").text(monthText[thisMonth - 1]);

  dataCel.removeClass("isSelected");
  thisEl.addClass("isSelected");

});

//function for move the months
function moveNext(fakeClick, indexNext) {
  for (var i = 0; i < fakeClick; i++) {
    $(".c-main").css({
      left: "-=100%"
    });
    $(".c-paginator__month").css({
      left: "-=100%"
    });
    switch (true) {
      case indexNext:
        indexMonth += 1;
        break;
    }
  }
}
function movePrev(fakeClick, indexPrev) {
  for (var i = 0; i < fakeClick; i++) {
    $(".c-main").css({
      left: "+=100%"
    });
    $(".c-paginator__month").css({
      left: "+=100%"
    });
    switch (true) {
      case indexPrev:
        indexMonth -= 1;
        break;
    }
  }
}

//months paginator
function buttonsPaginator(buttonId, mainClass, monthClass, next, prev) {
  switch (true) {
    case next:
      $(buttonId).on("click", function() {
        if (indexMonth >= 2) {
          $(mainClass).css({
            left: "+=100%"
          });
          $(monthClass).css({
            left: "+=100%"
          });
          indexMonth -= 1;
        }
        return indexMonth;
      });
      break;
    case prev:
      $(buttonId).on("click", function() {
        if (indexMonth <= 11) {
          $(mainClass).css({
            left: "-=100%"
          });
          $(monthClass).css({
            left: "-=100%"
          });
          indexMonth += 1;
        }
        return indexMonth;
      });
      break;
  }
}

buttonsPaginator("#next", monthEl, ".c-paginator__month", false, true);
buttonsPaginator("#prev", monthEl, ".c-paginator__month", true, false);

//launch function to set the current month
moveNext(indexMonth - 1, false);

//fill the sidebar with current day
$(".c-aside__num").text(day);
$(".c-aside__month").text(monthText[month - 1]);
</script>