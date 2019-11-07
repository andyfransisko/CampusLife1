  
    
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
    <div class="c-sort">
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
    
    <div id = "bawah" style="position:inherit;">
      
          <div class="container1">
            <center>
              <ul>
                <li><span></span>
                  <div>
                    <div class="title">Codify</div>
                    <div class="info">Let&apos;s make coolest things in css</div>
                    <div class="type">Presentation</div>
                  </div> <span class="number"><span>10:00</span> <span>12:00</span></span>
                </li>
                <li>
                  <div><span></span>
                    <div class="title">Codify</div>
                    <div class="info">Let&apos;s make coolest things in javascript</div>
                    <div class="type">Presentation</div>
                  </div> <span class="number"><span>13:00</span> <span>14:00</span></span>
                </li>
                <li>
                  <div><span></span>
                    <div class="title">Codify</div>
                    <div class="info">Let&apos;s make coolest things in css</div>
                    <div class="type">Review</div>
                  </div> <span class="number"><span>15:00</span> <span>17:45</span></span>
                </li>
                <li>
                    <div><span></span>
                      <div class="title">Codify</div>
                      <div class="info">Let&apos;s make coolest things in css</div>
                      <div class="type">Review</div>
                    </div> <span class="number"><span>15:00</span> <span>17:45</span></span>
                  </li>
                  <li>
                      <div><span></span>
                        <div class="title">Codify</div>
                        <div class="info">Let&apos;s make coolest things in css</div>
                        <div class="type">Review</div>
                      </div> <span class="number"><span>15:00</span> <span>17:45</span></span>
                    </li>
                    <li>
                        <div><span></span>
                          <div class="title">Codify</div>
                          <div class="info">Let&apos;s make coolest things in css</div>
                          <div class="type">Review</div>
                        </div> <span class="number"><span>15:00</span> <span>17:45</span></span>
                      </li>
              </ul>
          </div>
      </center>  
    </div> 

    <!-- Script -->