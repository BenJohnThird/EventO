<?php
/*
 * Function requested by Ajax
 */
if(isset($_POST['func']) && !empty($_POST['func'])){
	switch($_POST['func']){
		case 'getCalender':
			getCalender($_POST['year'],$_POST['month']);
			break;
		case 'getEvents':
			getEvents($_POST['date']);
			break;
		default:
			break;
	}
}

/*
 * Get calendar full HTML
 */
function getCalender($year = '',$month = '')
{
	$dateYear = ($year != '')?$year:date("Y");
	$dateMonth = ($month != '')?$month:date("m");
	$date = $dateYear.'-'.$dateMonth.'-01';
	$currentMonthFirstDay = date("N",strtotime($date));
	$totalDaysOfMonth = cal_days_in_month(CAL_GREGORIAN,$dateMonth,$dateYear);
	$totalDaysOfMonthDisplay = ($currentMonthFirstDay == 7)?($totalDaysOfMonth):($totalDaysOfMonth + $currentMonthFirstDay);
	$boxDisplay = ($totalDaysOfMonthDisplay <= 35)?35:42;
?>
	<div id="calender_section" style="background-color:pink;">
		<h2 style="background-color:pink;">
        	<a href="javascript:void(0);" onclick="getCalendar('calendar_div','<?php echo date("Y",strtotime($date.' - 1 Month')); ?>','<?php echo date("m",strtotime($date.' - 1 Month')); ?>');">&lt;&lt;</a>
            <select name="month_dropdown" class="month_dropdown dropdown"><?php echo getAllMonths($dateMonth); ?></select>
			<select name="year_dropdown" class="year_dropdown dropdown"><?php echo getYearList($dateYear); ?></select>
            <a href="javascript:void(0);" onclick="getCalendar('calendar_div','<?php echo date("Y",strtotime($date.' + 1 Month')); ?>','<?php echo date("m",strtotime($date.' + 1 Month')); ?>');">&gt;&gt;</a>
        </h2>
		<div id="event_list" class="none"></div>
		<div id="calender_section_top">
			<ul>
				<li>Sun</li>
				<li>Mon</li>
				<li>Tue</li>
				<li>Wed</li>
				<li>Thu</li>
				<li>Fri</li>
				<li>Sat</li>
			</ul>
		</div>
		<div id="calender_section_bot" style="background-color:pink;">
			<ul id = "list">
			<?php 
				$dayCount = 1; 
				for($cb=1;$cb<=$boxDisplay;$cb++){
					if(($cb >= $currentMonthFirstDay+1 || $currentMonthFirstDay == 7) && $cb <= ($totalDaysOfMonthDisplay)){
						//Current date
						$currentDate = $dateYear.'-'.$dateMonth.'-'.$dayCount;
						$eventNum = 0;
						//Include db configuration file
						include 'dbConfig.php';
						//Get number of events based on the current date
						$result = $db->query("SELECT * FROM events WHERE date = '".$currentDate."' AND status = 1");
						$eventNum = $result->num_rows;
						//Define date cell color
						if(strtotime($currentDate) == strtotime(date("Y-m-d"))){
							echo '<li date="'.$currentDate.'" data-id1= "'.$currentDate.'" class="grey date_cell">';
						}elseif($eventNum > 0){
							echo '<li date="'.$currentDate.'" data-id1= "'.$currentDate.'" class="light_sky date_cell">';
						}else{
							echo '<li date="'.$currentDate.'" data-id1= "'.$currentDate.'" class="date_cell" data-toggle="modal" data-target="#myModal">';
						}
						//Date cell
						echo '<span>';
						echo $dayCount;
						echo '</span>';
						/*
						//Hover event popup
						echo '<div id="date_popup_'.$currentDate.'" class="date_popup_wrap none" style="background-color:cyan;">';
						echo '<div class="date_window">';
						echo '<div class="popup_event">Events ('.$eventNum.')</div>';
						echo ($eventNum > 0)?'<a onclick="getEvents(\''.$currentDate.'\');">View Events</a>':'';
						echo '</div></div>';
						*/
						echo '</li>';
						$dayCount++;
			?>
			<?php }else{ ?>
				<li><span>&nbsp;</span></li>
			<?php } } ?>
			</ul>
		</div>
	</div>

	<script type="text/javascript">
	
		$(document).on('click','.grey date_cell', function (){
				var id=$(this).data("id1");
				getEvents(id);
			});
		$(document).on('click','.date_cell', function (){
				var id=$(this).data("id1");
				getEvents(id);
				$.ajax({
					type:'POST',
					url:'pop-up-select.php',
					data:{id:id},
					dataType:"text",
					success:function(data){
						$('#show_table').html(data);
					}
				});
			});
		$(document).on('click','#EditEvent', function (){
				var id=$(this).data("id1");
				var text = $(event.target).text();
				$.ajax({
					type:'POST',
					url:'pop-up-events-select.php',
					data:{id:id,text:text},
					dataType:"text",
					success:function(data){
						$('#show_table').html(data);
					}
				});
				
			});
		//CHANGING CALENDAR
		function getCalendar(target_div,year,month){
			$.ajax({
				type:'POST',
				url:'functions.php',
				data:'func=getCalender&year='+year+'&month='+month,
				success:function(html){
					$('#'+target_div).html(html);

				}
			});
		}
		function getEvents(date){
			$.ajax({
				type:'POST',
				url:'functions.php',
				data:'func=getEvents&date='+date,
				success:function(html){
					$('#event_list').html(html);
					$('#event_list').slideDown('slow');
				}
			});
		}
		/*
		function addEvent(date){
			$.ajax({
				type:'POST',
				url:'functions.php',
				data:'func=addEvent&date='+date,
				success:function(html){
					$('#event_list').html(html);
					$('#event_list').slideDown('slow');
				}
			});
		}*/
		$(document).ready(function(){
	
			$('.month_dropdown').on('change',function(){
				getCalendar('calendar_div',$('.year_dropdown').val(),$('.month_dropdown').val());
			});
			$('.year_dropdown').on('change',function(){
				getCalendar('calendar_div',$('.year_dropdown').val(),$('.month_dropdown').val());
			});
			$(document).click(function(){
				$('#event_list').slideUp('slow');

			});
		});
	</script>
<?php
}

/*
 * Get months options list.
 */
function getAllMonths($selected = ''){
	$options = '';
	for($i=1;$i<=12;$i++)
	{
		$value = ($i < 10)?'0'.$i:$i;
		$selectedOpt = ($value == $selected)?'selected':'';
		$options .= '<option value="'.$value.'" '.$selectedOpt.' >'.date("F", mktime(0, 0, 0, $i+1, 0, 0)).'</option>';
	}
	return $options;
}

/*
 * Get years options list.
 */
function getYearList($selected = ''){
	$options = '';
	for($i=2015;$i<=2025;$i++)
	{
		$selectedOpt = ($i == $selected)?'selected':'';
		$options .= '<option value="'.$i.'" '.$selectedOpt.' >'.$i.'</option>';
	}
	return $options;
}

/*
 * Get events by date
 */
function getEvents($date = ''){
	//Include db configuration file
	include 'dbConfig.php';
	$eventListHTML = '';
	$date = $date?$date:date("Y-m-d");
	//Get events based on the current date
	$result = $db->query("SELECT title FROM events WHERE date = '".$date."' AND status = 1 order by starttime");
	if($result->num_rows > 0){
		$eventListHTML = '<h2>Events on '.date("l, d M Y",strtotime($date)).'</h2>';
		$eventListHTML .= '<ul>';
		while($row = $result->fetch_assoc()){ 
            $eventListHTML .= '<li id = "EditEvent" data-id1= "'.$date.'" data-toggle="modal" data-target="#myModal">'.$row['title'].'</li>';
        }
		$eventListHTML .= '<li data-toggle="modal" data-target="#myModal">'."Add Event".'</li><br><br></ul>';
	}
	echo $eventListHTML;
}
?>