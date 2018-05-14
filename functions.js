
function openNav() {
    document.getElementById("myNav").style.width = "80%";
}
function closeNav() {
    document.getElementById("myNav").style.width = "0%";
	//window.location.reload();
	
}
$(document).ready(function(){
function fetchEvents() {
	$.ajax({
		url:"AddedPane-select.php",
		method:"POST",
		success:function(data){
				$('.table').html(data);
			}
	});
}
fetchEvents();
//function for Add
$(document).on('click','#btn_add', function (){
		var title = $('#title').val();
		var description = $('#description').val();
		var date = $('#date').val();
		var starttime = $('#starttime').val();
		var endtime = $('#endtime').val();
		if(title == '')
		{
			alert("Enter Title of the Event");
			return false;
		}
		if(description == '')
		{
			alert("Enter Description of the Event");
			return false;
		}
		if(date == '')
		{
			alert("Enter Date");
			return false;
		}
		$.ajax({
			url:"pop-up-insert.php",
			method:"POST",
			data:{title:title,description:description,date:date,starttime:starttime,endtime:endtime},
			dataType:"text",
			success:function(data){
				alert(data);
				getCalender();
			}
		});
		
	});
});
