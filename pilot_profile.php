<?php

/*
 *Edit Pilot
 */

require_once'header.php';

$error = "";

if(isset($_SESSION['user'])){

$user = $_SESSION['user'];
$query1=  queryMysql("SELECT * FROM pilot_info WHERE pilot_name='$user'");
$query2 = mysqli_fetch_array($query1);

}

else {
  header('Location:login.html');
	exit;
}

?>

<html>
    <head>
        <title>Pilot Profile</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="profile.css" type="text/css" rel="stylesheet"/>
	      <link href="form_style.css" type="text/css" rel="stylesheet"/>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <!-- Datepicker section -->


        <script>
	    //hide the non applicable dates

            $(function() {
            $(".datepicker").datepicker({dateFormat:"dd/mm/yy"});
            });

	    $(function () {
   		 if ($.trim($(".c208-check").text()) == '0000-00-00') {
       		 $(".c208").hide();
    		 }
	    });

	    $(function () {
   		 if ($.trim($(".kodi-check").text()) == '0000-00-00') {
       		 $(".kodi").hide();
    		 }
	    });

	    $(function () {
   		 if ($.trim($(".bots-lic-check").text()) == '') {
       		 $(".bots-lic").hide();
    		 }
	    });

	    $(function () {
   		 if ($.trim($(".val-check").text()) == '') {
       		 $(".val_no").hide();
           $(".val_exp").hide();
    		 }
	    });

	    $(function () {
   		 if ($.trim($(".checkpilot-check").text()) == '0') {
       		 $(".checkpilot").hide();
    		 }
	    });

	    $(function () {
   		 if ($.trim($(".bots-instructor-check").text()) == '0000-00-00') {
       		 $(".bots-instructor").hide();
    		 }
	    });

	    $(function () {
   		 if ($.trim($(".dpe-check").text()) == '0000-00-00') {
       		 $(".dpe").hide();
    		 }
	    });


	    //hide the relevant flight and duty screens

	    $(document).ready(function() {
	    	$('.create-flight').hide();
	        $('.edit-flight').hide();

      		$("#createFlight").click(function() {	//show create flight when button is clicked
      		$(".create-flight").show();
      		$("#createFlight").hide();

    	  	});

          $("#edit-flight").click(function() {	//show create flight when button is clicked
          $(".open-flights").hide();
          $(".edit-flight").show();

        });
	    });

	    //submit create flight data to create_flight.php to add to database






$(function(){
    $('body').on('click', '#createFlightButton', function(event){
        event.preventDefault();

        $(".open-flights").hide();
       // alert("a button was pressed");
	    var date = $('#flight_date').val();
    	var duty_start = $('#duty_start').val();
	    var nightstop = $('#nightstop').val();

	    $.ajax({
    		type: 'POST',
    		url: 'create_flight.php',
    		data: { date: date, duty_start: duty_start ,nightstop: nightstop},
    		success: function(response) {
    		    $('#result').html(response);
    		    $(".create-flight").hide();
            $(".open-flights").show();
            show_open();

    		}
    });


    });
});


</script>

<script>
  $( function() {
    $( "#menu" ).menu({
      items: "> :not(.ui-widget-header)"
    });
  } );
  </script>
  <style>
  .ui-menu { width: 200px; }
  .ui-widget-header { padding: 0.2em; }
  </style>

	</head>
    <body>

      <ul id="menu">
  <li class="ui-widget-header"><div>Personnel Reports</div></li>
  <li><div id="28DaySummary">28 Day Summary</div></li>
  <li><div id="365DaySummary">365 Day Summary</div></li>
  <li><div><a href="logout.php">Logout</a></div></li>

  <li><div><a href="all_pilots.php">Admin</a></div></li>

</ul>



        <div class="row">
	   <div class="column">

                <h1 align="center">Pilot Profile</h1>
		<form id='pilot_details'>


		            <p>
                    <label for="pilot_name" class="label_width">
                    <span>Pilot Name: </span>
                    </label>
                    <span>
                        <?php echo $query2['pilot_name'];?>
                      </div>
		                </span>
                </p>

                <p>
                    <label for="pilot_surname" class="label_width" >
                    <span>Pilot Surname: </span>
                    </label>
                    <span>
			                   <?php echo $query2['pilot_surname'];?>
		                </span>
                </p>

		             <p>
                    <label for="dob" class="label_width">
                    <span>Date of Birth:</span>
                    </label>
                    <span>
			                   <?php echo $query2['dob'];?>
		                </span>
                </p>

		             <p>
                    <label for="bots_medical" class="label_width">
                    <span>Date of Botswana Medical:</span>
                    </label>
                    <span>
			                   <div class="date"><?php echo $query2['bots_medical'];?></div>
		                </span>
                </p>

		             <p>
                    <label for="ga8_lpc_exp" class="label_width">
                    <span>GA-8 LPC Expiry:</span>
                    </label>
                    <span>
			                   <div class="date"><?php echo $query2['ga8_lpc_exp'];?></div>
		                </span>
                </p>

		       <div class="c208">
		             <p>
                    <label for="c208_lpc_exp" class="label_width">
                    <span>C208 LPC Expiry:</span>
                    </label>

		                <span class="c208-check date"><?php echo $query2['c208_lpc_exp'];?></span>

                </p>
		       </div>

		       <div class="kodi">
		             <p>
                    <label for="kodi_lpc_exp" class="label_width">
                    <span>KODI LPC Expiry:</span>
                    </label>
                    <span class="kodi-check date"><?php echo $query2['kodi_lpc_exp'];?></span>
                </p>
		       </div>

		            <p>
                    <label for="opc_expiry" class="label_width">
                    <span>OPC Expiry:</span>
                    </label>
                    <span>
			                  <div class="date"><?php echo $query2['opc_expiry'];?></div>
		                </span>
                </p>

		            <p>
                    <label for="route_check_exp" class="label_width">
                    <span>Route Check Expiry:</span>
                    </label>
                    <span>
			                   <div class="date"><?php echo $query2['route_check_exp'];?></div>
		                </span>
                </p>

		        <div class="bots-lic">
			          <p>
    		            <label for="bots_licno" class="label_width">
    		            <span>Botswana License Number:</span>
    		            </label>
    		            <span class="bots-lic-check">
    				              <?php echo $query2['bots_licno'];?>
    		  	        </span>
		            </p>
		        </div>


		       <div class="val_no">
			          <p>
    		            <label for="val_no" class="label_width">
    		            <span>Validation Number:</span>
    		            </label>
    		            <span class="val-check">
				                  <?php echo $query2['val_no'];?>
		  	            </span>
		            </p>
		       </div>


		       <div class="val_exp">
			         <p>
    		            <label for="val_exp" class="label_width">
    		            <span>Validation Expiry Date:</span>
    		            </label>
    		            <span>
				              <div class="date"><?php echo $query2['val_exp'];?></div>
		  	            </span>
		          </p>
           </div>


		        <div class="checkpilot">
			         <p>
    		            <label for="check_pilot" class="label_width">
    		            <span>Check Pilot:</span>
    		            </label>
    		            <span class="checkpilot-check">
				                  <?php echo $query2['check_pilot'];?>
			              </span>
		           </p>
		        </div>


		        <div class="checkpilot">
			         <p>
    		            <label for="check_pilot_exp" class="label_width">
    		            <span>Check Pilot Expiry:</span>
    		            </label>
    		            <span>
				                  <?php echo $query2['check_pilot_exp'];?>
			              </span>
		           </p>
		        </div>


		       <div class="bots-instructor">
			         <p>
    		            <label for="bots_inst_rating" class="label_width">
    		            <span>Botswana Instructors Rating Expiry:</span>
    		            </label>
    		            <span class="bots-instructor-check date"><?php echo $query2['bots_inst_rating'];?></span>
		           </p>
		       </div>


		       <div class="dpe">
			          <p>
    		            <label for="dpe_exp" class="label_width">
    		            <span>DPE Expiry Date:</span>
    		            </label>
    		            <span class="dpe-check date"><?php echo $query2['dpe_exp'];?></span>
		            </p>
		       </div>

                <p>
                    <label for="crm_exp" class="label_width">
                    <span>CRM Expiry Date:</span>
                    </label>
                    <span>
			                  <div class="date"><?php echo $query2['crm_exp'];?></div>
		                </span>
                </p>

                <p>
                    <label for="dg_exp" class="label_width">
                    <span>DG Expiry Date:</span>
                    </label>
                    <span>
			                 <div class="date"><?php echo $query2['dg_exp'];?></div>
		                </span>
                </p>

                <p>
                    <label for="sept_exp" class="label_width">
                    <span>SEPT Expiry Date:</span>
                    </label>
                    <span>
			                  <div class="date"><?php echo $query2['sept_exp'];?></div>
		                </span>
                </p>
             </form>

         <script>

             function toDate(dateStr) {
                const [year, month, day] = dateStr.split("-")
                return new Date(year, month - 1, day)
              }

             function dateDiff(date1,date2){
               var diffDays = parseInt((toDate(date2) - toDate(date1)) / (1000 * 60 * 60 * 24));

               return(diffDays);

               }


             function dateNow() {
                var d = new Date();

                var month = d.getMonth()+1;
                var day = d.getDate();

                var output = d.getFullYear() + '-' +
                    ((''+month).length<2 ? '0' : '') + month + '-' +
                    ((''+day).length<2 ? '0' : '') + day;

                return(output);
             };

             $(".date").each(function(index){

               var expDate = $(this).text();
               var now = dateNow();


               if(now > expDate) {
                 $(this).css('color','red');
                 $(this).css('font-weight','bold');
               }
               else { $(this).css('color','black');}

               if ((dateDiff(now,expDate) < 30) && (dateDiff(now,expDate) > 0)) {
                 $(this).css('color','orange');
                 $(this).css('font-weight','bold');
               }

             });

         </script>

	  </div>

	  <div class="column">
		<h1 align="center">Flight And Duty</h1>
		<div id="result"></div>


		<div class="create-flight">
			<form id="create-flight-form" action="" method="POST">
		        <h2 align="center">Create Flight</h2>
			<div id="result"></div>


				<p>
				    <label for="flight_date" class="label_width">
				        <span>Flight Date: </span>
				    </label>
				    <input type="text" id="flight_date" name="flight_date" class="datepicker">
				</p>

				<p>
				    <label for="duty_start" class="label_width">
				        <span>Duty Start: </span>
				    </label>
				    <input type="text" id="duty_start" name="duty_start" >
				</p>

				<p>
				    <label for="nightstop" class="label_width">
				        <span>Nightstop:</span>
				    </label>
				    <input type="checkbox" id="nightstop" name="nightstop" class="label_width" value="0">
				</p>



		        <p> <button id="createFlightButton">Create Flight</button></p>
			</form>

		</div>


    <div class="edit-flight">
      <form id="edit-flight-form" action="" method="POST">
            <h2 align="center">Close Flight</h2>
      <div id="result"></div>

      <p>
          <label for="id" class="label_width">
              <span>ID: </span>
          </label>
          <input type="text" id="id" name="id_edit" >
      </p>


        <p>
            <label for="flight_date" class="label_width">
                <span>Flight Date: </span>
            </label>
            <input type="text" id="flight_date" name="flight_date_edit" class="datepicker">
        </p>

        <p>
            <label for="duty_start" class="label_width">
                <span>Duty Start: </span>
            </label>
            <input type="text" id="duty_start" name="duty_start_edit" value="">
        </p>

        <p>
            <label for="duty_end" class="label_width">
                <span>Duty End: </span>
            </label>
            <input type="text" id="duty_end" name="duty_end_edit" value="" >
        </p>

        <p>
            <label for="total_end" class="label_width">
                <span>Total Duty: </span>
            </label>
            <input type="text" id="total_duty" name="total_duty_edit" value="" >
        </p>

        <p>
            <label for="flightpic" class="label_width">
                <span>Flight PIC: </span>
            </label>
            <input type="text" id="flightpic" name="flightpic_edit" value="" >
        </p>

        <p>
            <label for="picus" class="label_width">
                <span>PICUS: </span>
            </label>
            <input type="text" id="PICUS" name="picus_edit" value="">
        </p>

        <p>
            <label for="deltao" class="label_width">
                <span>Delta Orientation: </span>
            </label>
            <input type="text" id="deltao" name="deltao_edit" value="">
        </p>

        <p>
            <label for="nightstop" class="label_width">
                <span>Nightstop:</span>
            </label>
            <input type="checkbox" id="nightstop" name="nightstop_edit" class="label_width" value="1">
        </p>



            <p> <button id="close-flight-button">Close Flight</button></p>
      </form>


    </div>


		</div>

		<div class="open-flights">
   <!--Change into tabulator or datatable so that  -->
   <div id="output">
     <table>
       <thead>
         <th>ID</th>
         <th>Date</th>
         <th>Duty Start</th>
         <th>Duty End</th>
         <th>Flight PIC</th>
         <th>PICUS</th>
         <th>Delta O</th>
         <th>Nightstop</th>
         <th>Status</th>

       </thead>
       <tbody id='tbody'>
       </tbody>
     </table>
   </div>


   <script>

     $(document).ready(function() {
       show_open();
     });


     function show_open(){


     $.ajax({
       type:'POST',
       url:'open_flights.php',
       data:{user:"<?php echo $_SESSION['user']; ?>"},

       dataType: 'json',
       success: function(data){

         $(data).each(function(){
           $('#tbody').append('<tr><td>'+this.id+'</td><td>'
                               +this.date+'</td><td>'
                               +this.dutystart+'</td><td>'
                               +this.dutyend+'</td><td>'
                               +this.flightpic+'</td><td>'
                               +this.picus+'</td><td>'
                               +this.deltao+'</td><td>'
                               +this.nightstop+'</td><td>'
                               +this.status+'</td><td>'
                               +'<button id="edit-flight-button" data-id="'+this.id+'"">Edit/Close</button></td></tr>'

            )

         });
       }

     });
   };


      $("#tbody").on("click","#edit-flight-button",function(){

        var id = $(this).attr('data-id');
        $(".edit-flight").show();
        $(".open-flights").hide();
        $("#createFlight").hide();

        $.ajax({
  		type: 'POST',
  		url: 'edit_flight.php',
  		data: { id: id},
      dataType:'json',
  		success: function(data) {


           id = data[0];
           date = data[1];
           dutystart = data[2];
           dutyend = data[3];
           flightpic =data[4];
           picus = data[5];
           deltao = data[6];
           nightstop = data[7];
           status = data[8];

          $("input[name=id_edit]").val(id);
          $("input[name=flight_date_edit]").val(date);
          $("input[name=duty_start_edit]").val(dutystart);
        //  $("input[name=duty_end_edit]").val(dutyend);
        //  $("input[name=flightpic_edit]").val(flightpic);
      //    $("input[name=picus_edit]").val(picus);
      //    $("input[name=deltao_edit]").val(deltao);
          $("input[name=nightstop_edit]").val(nightstop);

    		}

      });

    });

    $('input[name=duty_end_edit]').on('change', function(){
      var start = $("input[name=duty_start_edit]").val();
      var end = $("input[name=duty_end_edit]").val();

      s = start.split(':');
          e = end.split(':');

          min = e[1]-s[1];
          hour_carry = 0;
          if(min < 0){
              min += 60;
              hour_carry += 1;
          }
          hour = e[0]-s[0]-hour_carry;
          diff = hour + ":" + min;


      $("input[name=total_duty_edit]").val(diff);

    });

    $("#edit-flight-form").on("click","#close-flight-button",function(event){

      //alert("a button was pressed");

      event.preventDefault();

      var id = $("input[name=id_edit]").val();
      var date = $("input[name=flight_date_edit]").val();
      var duty_start = $("input[name=duty_start_edit]").val();
      var duty_end = $("input[name=duty_end_edit]").val();
      var total_duty = $("input[name=total_duty_edit]").val();
      var flightpic = $("input[name=flightpic_edit]").val();
      var picus = $("input[name=deltao_edit]").val();
      var deltao = $("input[name=deltao_edit]").val();

      var nightstop = $("input[name=nightstop_edit]").val();


      $.ajax({
        type: 'POST',
        url: 'close_flight.php',
        data: { id:id,
                date: date,
                duty_start: duty_start,
                duty_end:duty_end,
                total_duty:total_duty,
                flightpic:flightpic,
                picus:picus,
                deltao:deltao,
                nightstop: nightstop},

        success: function(response) {
            $('#result').html(response);
            $(".edit-flight").hide();


            document.getElementById("tbody").deleteRow(0);

            show_open();
            $(".open-flights").show();
            $("#createFlight").show();


        }
      });


    });


    //Alerts 28 day summary
    $("#menu").on("click","#28DaySummary",function(){

      $.ajax({
    type: 'POST',
    url: 's28DaySum.php',
    data: {'searchname':"<?php echo $_SESSION['user']; ?>"},
    dataType:'json',

    success: function(data) {

        alert('Duty: '+data[0]+'\r\n'+'PIC: '+data[1]+'\r\n'+'PICUS: '+data[2]+'\r\n'+'Delta Orientation: '+data[3]);
   }

    });

  });

  //Alerts 365 day summary
  $("#menu").on("click","#365DaySummary",function(){

    $.ajax({
  type: 'POST',
  url: 's365DaySum.php',
  data: {'searchname':"<?php echo $_SESSION['user']; ?>"},
  dataType:'json',

  success: function(data) {

      alert('Duty: '+data[0]+'\r\n'+'PIC: '+data[1]+'\r\n'+'PICUS: '+data[2]+'\r\n'+'Delta Orientation: '+data[3]);
 }

  });

});


//    });
    </script>


		</div>

		<br>


		<button id="createFlight">Create Flight</button>






	  </div>
        </div>




    </body>
</html>
