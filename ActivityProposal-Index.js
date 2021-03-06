
  function openTabs(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
  $(document).ready(function(){
    document.getElementById('show_table').style.display = "block";
//SHOW THE TABLE OF EVENTS THAT ARE RETURNED
function fetchEvents() {
  $.ajax({
    url:"ActivityProposal-ActionPlan-AddedPane-verified.php",
    method:"POST",
    success:function(data){
        $('.table').html(data);
      }
  });
}
fetchEvents();
function fetchAP() {
  $.ajax({
    url:"ActivityProposal-Table-Select.php",
    method:"POST",
    success:function(data){
        $('.activityproposal').html(data);
      }
  });
}
fetchAP();
//FETCH THE OBJECTIVES
function fetchObjectives() {
  var id = $("#btn_add-Objectives").data("id6");
  $.ajax({
    url:"ActivityProposal-Objectives-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-Objectives').html(data);
      }
  });
}
//FETCH THE OBJECTIVES
function fetchSpeakers() {
  var id = $("#btn_add-Speakers").data("id6");
  $.ajax({
    url:"ActivityProposal-Speakers-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-Speakers').html(data);
      }
  });
}
// FETCH FOR DOCUMENTATION
function fetchDocumentation() {
  var id = $("#btn_add-Documentation").data("id6");
  $.ajax({
    url:"ActivityProposal-Documentation-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-Documentation').html(data);
      }
  });
}
// FETCH FOR FOOD
function fetchFood() {
  var id = $("#btn_add-Food").data("id6");
  $.ajax({
    url:"ActivityProposal-Food-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-Food').html(data);
      }
  });
}
// FETCH FOR MATERIALS
function fetchMaterials() {
  var id = $("#btn_add-Publicity").data("id6");
  $.ajax({
    url:"ActivityProposal-Materials-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-Materials').html(data);
      }
  });
}
// FETCH FOR HONORARIUM
function fetchHonorarium() {
  var id = $("#btn_add-Honorarium").data("id6");
  $.ajax({
    url:"ActivityProposal-Honorarium-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-Honorarium').html(data);
      }
  });
}
// FETCH FOR PROGRAM AND INVITATION
function fetchProgramInvi() {
  var id = $("#btn_add-ProgramInvi").data("id6");
  $.ajax({
    url:"ActivityProposal-ProgramInvi-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-ProgramInvi').html(data);
      }
  });
}
// FETCH FOR CERTS
function fetchCerts() {
  var id = $("#btn_add-Certs").data("id6");
  $.ajax({
    url:"ActivityProposal-Certs-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-Certs').html(data);
      }
  });
}
// FETCH FOR TOKEN
function fetchToken() {
  var id = $("#btn_add-Token").data("id6");
  $.ajax({
    url:"ActivityProposal-Token-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-Token').html(data);
      }
  });
}
// FETCH FOR OTHERSTABLE
function fetchOthersTable() {
  var id = $("#btn_add-OthersTable").data("id6");
  $.ajax({
    url:"ActivityProposal-OthersTable-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-OthersTable').html(data);
      }
  });
}
// FETCH FOR VENUE
function fetchVenue() {
  var id = $("#btn_add-Venue").data("id6");
  $.ajax({
    url:"ActivityProposal-Venue-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-Venue').html(data);
      }
  });
}
// FETCH FOR ENERGY
function fetchEnergy() {
  var id = $("#btn_add-Energy").data("id6");
  $.ajax({
    url:"ActivityProposal-Energy-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-Energy').html(data);
      }
  });
}
// FETCH FOR TRANSPORTATION
function fetchTransportation() {
  var id = $("#btn_add-Transportation").data("id6");
  $.ajax({
    url:"ActivityProposal-Transportation-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-Transportation').html(data);
      }
  });
}
// FETCH FOR CONTINGENCY
function fetchContingency() {
  var id = $("#btn_add-Contingency").data("id6");
  $.ajax({
    url:"ActivityProposal-Contingency-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-Contingency').html(data);
      }
  });
}
// FETCH FOR OVERALL COMMITTEES
function fetchCommitteesOverall() {
  var id = $("#btn_add-Committees-Overall").data("id6");
  $.ajax({
    url:"ActivityProposal-Committees-Overall-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-Committees-Overall').html(data);
      }
  });
}
// FETCH FOR COMMITTEES
function fetchCommittees() {
  var id = $("#btn_add-Committees-Food").data("id6");
  $.ajax({
    url:"ActivityProposal-Committees-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-Committees').html(data);
      }
  });
}
function fetchSchedule() {
  var id = $("#btn_add-Schedule").data("id6");
  $.ajax({
    url:"ActivityProposal-Schedule-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-Schedule').html(data);
      }
  });
}
function fetchDistributionBudget() {
  var id = $("#btn_add-DistributionBudgetDocu").data("id6");
  $.ajax({
    url:"ActivityProposal-DistributionBudget-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-DistributionBudget').html(data);
        fetchTotal();
      }
  });
}
// ADDING OF OBJECTIVES
$(document).on('click','#btn_add-Objectives', function (){
    var id = $(this).data("id6");
    var objectives = $('#objectives').val();
    if(objectives == '')
    {
      alert("Enter objectives");
      return false;
    }
    $.ajax({
      url:"ActivityProposal-Objectives-Insert.php",
      method:"POST",
      data:{id:id,objectives:objectives},
      dataType:"text",
      success:function(data){
        alert(data);
        fetchObjectives();
      }
    });
  });
// LIMITED TO ONE CHECKBOX
$(document).on('change', '.checkbox-type', function() {
   $('.checkbox-type').not(this).prop('checked', false);
});
$(document).on('change', '.checkbox-location', function() {
   $('.checkbox-location').not(this).prop('checked', false);
});
$(document).on('change', '.checkbox-approved', function() {
   $('.checkbox-approved').not(this).prop('checked', false);
});
$(document).on('change', '.checkbox-budget', function() {
   $('.checkbox-budget').not(this).prop('checked', false);
});
// FETCH OF TOTAL
function fetchTotal() {
  var id = $("#btn_add-Venue").data("id6");
  $.ajax({
    type:'POST',
    url:'ActivityProposal-make-form-total.php',
    data:{id:id},
    dataType:"text",
    success:function(data){
      $('.table-Total').html(data);
      }
  });
}
// ADDING OF SPEAKERS
$(document).on('click','#btn_add-Speakers', function (){
    var id = $(this).data("id6");
    var name = $('#speakers-name').val();
    var position = $('#speakers-position').val();
    var education = $('#speakers-educ').val();
    var experience = $('#speakers-exp').val();
    if(name == '' || position == "" || education == "" || experience == "")
    {
      alert("Complete the following");
      return false;
    }
    $.ajax({
      url:"ActivityProposal-Speakers-Insert.php",
      method:"POST",
      data:{id:id,name:name,experience:experience,position:position,education:education},
      dataType:"text",
      success:function(data){
        alert(data);
        fetchSpeakers();
      }
    });
  });
  // ADDING OF DOCUMENTATION
  $(document).on('click','#btn_add-Documentation', function (){
    var id = $(this).data("id6");
    var name = $('#documentation-item').val();
    var pcs = $('#documentation-pcs').val();
    var price = $('#documentation-price').val();
    var description = $('#documentation-description').val();
    if(name == '' || pcs == "" || price == "" || description == "")
    {
      alert("Complete the following");
      return false;
    }
    $.ajax({
      url:"ActivityProposal-Documentation-Insert.php",
      method:"POST",
      data:{id:id,name:name,pcs:pcs,price:price,description:description},
      dataType:"text",
      success:function(data){
        alert(data);
        fetchDocumentation();
        fetchDistributionBudget();
      }
    });
  });
  // ADDING OF FOOD
  $(document).on('click','#btn_add-Food', function (){
    var id = $(this).data("id6");
    var name = $('#food-item').val();
    var pcs = $('#food-pcs').val();
    var price = $('#food-price').val();
    var description = $('#food-description').val();
    if(name == '' || pcs == "" || price == "" || description == "")
    {
      alert("Complete the following");
      return false;
    }
    $.ajax({
      url:"ActivityProposal-Food-Insert.php",
      method:"POST",
      data:{id:id,name:name,pcs:pcs,price:price,description:description},
      dataType:"text",
      success:function(data){
        alert(data);
        fetchFood();
        fetchDistributionBudget();
      }
    });
  });
  // ADDING OF PUBLICITY
  $(document).on('click','#btn_add-Publicity', function (){
    var id = $(this).data("id6");
    var name = $('#publicity-item').val();
    var price = $('#publicity-price').val();
    var category = 'Publicity';
    if(name == '' || price == "")
    {
      alert("Complete the following");
      return false;
    }
    $.ajax({
      url:"ActivityProposal-Materials-Insert.php",
      method:"POST",
      data:{id:id,name:name,price:price,category:category},
      dataType:"text",
      success:function(data){
        alert(data);
        fetchMaterials();
        fetchDistributionBudget();
      }
    });
  });
  // ADDING OF REGISTRATION
  $(document).on('click','#btn_add-Registration', function (){
    var id = $(this).data("id6");
    var name = $('#registration-item').val();
    var price = $('#registration-price').val();
    var category = 'Registration';
    if(name == '' || price == "")
    {
      alert("Complete the following");
      return false;
    }
    $.ajax({
      url:"ActivityProposal-Materials-Insert.php",
      method:"POST",
      data:{id:id,name:name,price:price,category:category},
      dataType:"text",
      success:function(data){
        alert(data);
        fetchMaterials();
        fetchDistributionBudget();
      }
    });
  });
  // ADDING OF SEMINAR
  $(document).on('click','#btn_add-Seminar', function (){
    var id = $(this).data("id6");
    var name = $('#seminar-item').val();
    var price = $('#seminar-price').val();
    var category = 'Seminar';
    if(name == '' || price == "")
    {
      alert("Complete the following");
      return false;
    }
    $.ajax({
      url:"ActivityProposal-Materials-Insert.php",
      method:"POST",
      data:{id:id,name:name,price:price,category:category},
      dataType:"text",
      success:function(data){
        alert(data);
        fetchMaterials();
        fetchDistributionBudget();
      }
    });
  });
  // ADDING OF STAGE
  $(document).on('click','#btn_add-Stage', function (){
    var id = $(this).data("id6");
    var name = $('#stage-item').val();
    var price = $('#stage-price').val();
    var category = 'Stage';
    if(name == '' || price == "")
    {
      alert("Complete the following");
      return false;
    }
    $.ajax({
      url:"ActivityProposal-Materials-Insert.php",
      method:"POST",
      data:{id:id,name:name,price:price,category:category},
      dataType:"text",
      success:function(data){
        alert(data);
        fetchMaterials();
        fetchDistributionBudget();
      }
    });
  });
  // ADDING OF OTHERS
  $(document).on('click','#btn_add-Others', function (){
    var id = $(this).data("id6");
    var name = $('#others-item').val();
    var price = $('#others-price').val();
    var category = 'Others';
    if(name == '' || price == "")
    {
      alert("Complete the following");
      return false;
    }
    $.ajax({
      url:"ActivityProposal-Materials-Insert.php",
      method:"POST",
      data:{id:id,name:name,price:price,category:category},
      dataType:"text",
      success:function(data){
        alert(data);
        fetchMaterials();
        fetchDistributionBudget();
      }
    });
  });
  // ADDING HONORARIUM
  $(document).on('click','#btn_add-Honorarium', function (){
    var id = $(this).data("id6");
    var name = $('#honorarium-item').val();
    var pcs = $('#honorarium-pcs').val();
    var price = $('#honorarium-price').val();
    var description = $('#honorarium-description').val();
    if(name == '' || pcs == "" || price == "" || description == "")
    {
      alert("Complete the following");
      return false;
    }
    $.ajax({
      url:"ActivityProposal-Honorarium-Insert.php",
      method:"POST",
      data:{id:id,name:name,price:price,description:description,pcs:pcs},
      dataType:"text",
      success:function(data){
        alert(data);
        fetchHonorarium();
        fetchDistributionBudget();
      }
    });
  });
  // ADDING PROGRAM INVITATION
  $(document).on('click','#btn_add-ProgramInvi', function (){
    var id = $(this).data("id6");
    var name = $('#programinvi-item').val();
    var pcs = $('#programinvi-pcs').val();
    var price = $('#programinvi-price').val();
    var description = $('#programinvi-description').val();
    if(name == '' || pcs == "" || price == "" || description == "")
    {
      alert("Complete the following");
      return false;
    }
    $.ajax({
      url:"ActivityProposal-ProgramInvi-Insert.php",
      method:"POST",
      data:{id:id,name:name,price:price,description:description,pcs:pcs},
      dataType:"text",
      success:function(data){
        alert(data);
        fetchProgramInvi();
        fetchDistributionBudget();
      }
    });
  });
  // FOR CERTIFICATES
  $(document).on('click','#btn_add-Certs', function (){
    var id = $(this).data("id6");
    var name = $('#certs-item').val();
    var pcs = $('#certs-pcs').val();
    var price = $('#certs-price').val();
    var description = $('#certs-description').val();
    if(name == '' || pcs == "" || price == "" || description == "")
    {
      alert("Complete the following");
      return false;
    }
    $.ajax({
      url:"ActivityProposal-Certs-Insert.php",
      method:"POST",
      data:{id:id,name:name,price:price,description:description,pcs:pcs},
      dataType:"text",
      success:function(data){
        alert(data);
        fetchCerts();
        fetchDistributionBudget();
      }
    });
  });
  // FOR TOKEN PRIZES
  $(document).on('click','#btn_add-Token', function (){
    var id = $(this).data("id6");
    var name = $('#token-item').val();
    var pcs = $('#token-pcs').val();
    var price = $('#token-price').val();
    var description = $('#token-description').val();
    if(name == '' || pcs == "" || price == "" || description == "")
    {
      alert("Complete the following");
      return false;
    }
    $.ajax({
      url:"ActivityProposal-Token-Insert.php",
      method:"POST",
      data:{id:id,name:name,price:price,description:description,pcs:pcs},
      dataType:"text",
      success:function(data){
        alert(data);
        fetchToken();
        fetchDistributionBudget();
      }
    });
  });
   // FOR OTHERS TABLE
  $(document).on('click','#btn_add-OthersTable', function (){
    var id = $(this).data("id6");
    var name = $('#otherstable-item').val();
    var pcs = $('#otherstable-pcs').val();
    var price = $('#otherstable-price').val();
    var description = $('#otherstable-description').val();
    if(name == '' || pcs == "" || price == "" || description == "")
    {
      alert("Complete the following");
      return false;
    }
    $.ajax({
      url:"ActivityProposal-OthersTable-Insert.php",
      method:"POST",
      data:{id:id,name:name,price:price,description:description,pcs:pcs},
      dataType:"text",
      success:function(data){
        alert(data);
        fetchOthersTable();
        fetchDistributionBudget();
      }
    });
  });
   // FOR VENUE
  $(document).on('click','#btn_add-Venue', function (){
    var id = $(this).data("id6");
    var name = $('#venue-item').val();
    var pcs = $('#venue-pcs').val(); //PIECES OF HOUR
    var price = $('#venue-price').val();
    var description = $('#venue-description').val();
    if(name == '' || pcs == "" || price == "" || description == "")
    {
      alert("Complete the following");
      return false;
    }
    $.ajax({
      url:"ActivityProposal-Venue-Insert.php",
      method:"POST",
      data:{id:id,name:name,price:price,description:description,pcs:pcs},
      dataType:"text",
      success:function(data){
        alert(data);
        fetchVenue();
        fetchDistributionBudget();
      }
    });
  });
   // FOR ENERGY
  $(document).on('click','#btn_add-Energy', function (){
    var id = $(this).data("id6");
    var name = $('#energy-item').val();
    var pcs = 1;
    var price = $('#energy-price').val();
    var description = $('#energy-description').val();
    if(name == '' || pcs == "" || price == "" || description == "")
    {
      alert("Complete the following");
      return false;
    }
    $.ajax({
      url:"ActivityProposal-Energy-Insert.php",
      method:"POST",
      data:{id:id,name:name,price:price,description:description,pcs:pcs},
      dataType:"text",
      success:function(data){
        alert(data);
        fetchEnergy();
        fetchDistributionBudget();
      }
    });
  });
  // FOR TRANSPORTATION
  $(document).on('click','#btn_add-Transportation', function (){
    var id = $(this).data("id6");
    var name = $('#transportation-item').val();
    var pcs = $('#transportation-pcs').val();
    var price = $('#transportation-price').val();
    var description = $('#transportation-description').val();
    if(name == '' || pcs == "" || price == "" || description == "")
    {
      alert("Complete the following");
      return false;
    }
    $.ajax({
      url:"ActivityProposal-Transportation-Insert.php",
      method:"POST",
      data:{id:id,name:name,price:price,description:description,pcs:pcs},
      dataType:"text",
      success:function(data){
        alert(data);
        fetchTransportation();
        fetchDistributionBudget();
      }
    });
  });
  // FOR CONTINGENCY
  $(document).on('click','#btn_add-Contingency', function (){
    var id = $(this).data("id6");
    var name = $('#contingency-item').val();
    var pcs = 1;
    var price = $('#contingency-price').val();
    var description = $('#contingency-description').val();
    if(name == '' || pcs == "" || price == "" || description == "")
    {
      alert("Complete the following");
      return false;
    }
    $.ajax({
      url:"ActivityProposal-Contingency-Insert.php",
      method:"POST",
      data:{id:id,name:name,price:price,description:description,pcs:pcs},
      dataType:"text",
      success:function(data){
        alert(data);
        fetchContingency();
        fetchDistributionBudget();
      }
    });
  });
  // FOR COMMITTEES OVERALL
  $(document).on('click','#btn_add-Committees-Overall', function (){
    var id = $(this).data("id6");
    var position = $('#committees-overall-position').val();
    var name = $('#committees-overall-person').val();
    var committee = 'Overall';
    $.ajax({
      url:"ActivityProposal-Committees-Insert.php",
      method:"POST",
      data:{id:id,name:name,position:position,committee:committee},
      dataType:"text",
      success:function(data){
        alert(data);
        fetchCommitteesOverall();
      }
    });
  });
  // FOR COMMITTEES FOOD
  $(document).on('click','#btn_add-Committees-Food', function (){
    var id = $(this).data("id6");
    var position = $('#committees-food-position').val();
    var name = $('#committees-food-person').val();
    var committee = 'Food';
    $.ajax({
      url:"ActivityProposal-Committees-Insert.php",
      method:"POST",
      data:{id:id,name:name,position:position,committee:committee},
      dataType:"text",
      success:function(data){
        alert(data);
        fetchCommittees();
      }
    });
  });
  // FOR COMMITTEES REGISTRATION
  $(document).on('click','#btn_add-Committees-Registration', function (){
    var id = $(this).data("id6");
    var position = $('#committees-registration-position').val();
    var name = $('#committees-registration-person').val();
    var committee = 'Registration';
    $.ajax({
      url:"ActivityProposal-Committees-Insert.php",
      method:"POST",
      data:{id:id,name:name,position:position,committee:committee},
      dataType:"text",
      success:function(data){
        alert(data);
        fetchCommittees();
      }
    });
  });
  // FOR COMMITTEES PROGRAM AND INVITATION
  $(document).on('click','#btn_add-Committees-Program', function (){
    var id = $(this).data("id6");
    var position = $('#committees-program-position').val();
    var name = $('#committees-program-person').val();
    var committee = 'Program';
    $.ajax({
      url:"ActivityProposal-Committees-Insert.php",
      method:"POST",
      data:{id:id,name:name,position:position,committee:committee},
      dataType:"text",
      success:function(data){
        alert(data);
        fetchCommittees();
      }
    });
  });
  // FOR COMMITTEES DOCUMENTATION
  $(document).on('click','#btn_add-Committees-Documentation', function (){
    var id = $(this).data("id6");
    var position = $('#committees-documentation-position').val();
    var name = $('#committees-documentation-person').val();
    var committee = 'Documentation';
    alert(committee);
    $.ajax({
      url:"ActivityProposal-Committees-Insert.php",
      method:"POST",
      data:{id:id,name:name,position:position,committee:committee},
      dataType:"text",
      success:function(data){
        alert(data);
        fetchCommittees();
      }
    });
  });
   // FOR COMMITTEES CERTIFICATES
  $(document).on('click','#btn_add-Committees-Certificates', function (){
    var id = $(this).data("id6");
    var position = $('#committees-certificates-position').val();
    var name = $('#committees-certificates-person').val();
    var committee = 'Certificates';
    $.ajax({
      url:"ActivityProposal-Committees-Insert.php",
      method:"POST",
      data:{id:id,name:name,position:position,committee:committee},
      dataType:"text",
      success:function(data){
        alert(data);
        fetchCommittees();
      }
    });
  });
   // FOR COMMITTEES PHYSICAL FACI
  $(document).on('click','#btn_add-Committees-PhysicalFaci', function (){
    var id = $(this).data("id6");
    var position = $('#committees-physicalfaci-position').val();
    var name = $('#committees-physicalfaci-person').val();
    var committee = 'PhysicalFaci';
    $.ajax({
      url:"ActivityProposal-Committees-Insert.php",
      method:"POST",
      data:{id:id,name:name,position:position,committee:committee},
      dataType:"text",
      success:function(data){
        alert(data);
        fetchCommittees();
      }
    });
  });
  // FOR COMMITTEES PEACE AND ORDER
  $(document).on('click','#btn_add-Committees-PeaceOrder', function (){
    var id = $(this).data("id6");
    var position = $('#committees-peaceorder-position').val();
    var name = $('#committees-peaceorder-person').val();
    var committee = 'PeaceOrder';
    $.ajax({
      url:"ActivityProposal-Committees-Insert.php",
      method:"POST",
      data:{id:id,name:name,position:position,committee:committee},
      dataType:"text",
      success:function(data){
        alert(data);
        fetchCommittees();
      }
    });
  });
  // FOR COMMITTEES Evaluation
  $(document).on('click','#btn_add-Committees-Evaluation', function (){
    var id = $(this).data("id6");
    var position = $('#committees-evaluation-position').val();
    var name = $('#committees-evaluation-person').val();
    var committee = 'Evaluation';
    $.ajax({
      url:"ActivityProposal-Committees-Insert.php",
      method:"POST",
      data:{id:id,name:name,position:position,committee:committee},
      dataType:"text",
      success:function(data){
        alert(data);
        fetchCommittees();
      }
    });
  });
  // FOR COMMITTEES Evaluation
  $(document).on('click','#btn_add-Schedule', function (){
    var id = $(this).data("id6");
    var starttime = $('#schedule_starttime').val();
    var endtime = $('#schedule_endtime').val();
    var activity = $('#schedule_activity').val();
    var person = $('#schedule_person').val();
    $.ajax({
      url:"ActivityProposal-Schedule-Insert.php",
      method:"POST",
      data:{id:id,starttime:starttime,endtime:endtime,activity:activity,person:person},
      dataType:"text",
      success:function(data){
        alert(data);
        fetchSchedule();
      }
    });
  });
  // FOR DISTRIBUTION OF BUDGET DOCUMENTATION
  $(document).on('click','#btn_add-DistributionBudgetDocu', function (){
    var id = $(this).data("id6");
    var distributor = $('#distribution_distributor-Docu').val();
    var amount = $('#distribution_amount-Docu').val();
    var description = $('#distribution_description-Docu').val();
    var committee = 'Documentation';
    $.ajax({
      url:"ActivityProposal-DistributionBudget-Insert.php",
      method:"POST",
      data:{id:id,distributor:distributor,amount:amount,description:description,committee:committee},
      dataType:"text",
      success:function(data){
        alert(data);
        fetchDistributionBudget();
      }
    });
  });
  // FOR DISTRIBUTION OF BUDGET FOOD
  $(document).on('click','#btn_add-DistributionBudgetFood', function (){
    var id = $(this).data("id6");
    var distributor = $('#distribution_distributor-food').val();
    var amount = $('#distribution_amount-food').val();
    var description = $('#distribution_description-food').val();
    var committee = 'Food';
    $.ajax({
      url:"ActivityProposal-DistributionBudget-Insert.php",
      method:"POST",
      data:{id:id,distributor:distributor,amount:amount,description:description,committee:committee},
      dataType:"text",
      success:function(data){
        alert(data);
        fetchDistributionBudget();
      }
    });
  });
  // FOR DISTRIBUTION OF BUDGET MATERIALS
  $(document).on('click','#btn_add-DistributionBudgetMaterials', function (){
    var id = $(this).data("id6");
    var distributor = $('#distribution_distributor-Materials').val();
    var amount = $('#distribution_amount-Materials').val();
    var description = $('#distribution_description-Materials').val();
    var committee = 'Materials';
    $.ajax({
      url:"ActivityProposal-DistributionBudget-Insert.php",
      method:"POST",
      data:{id:id,distributor:distributor,amount:amount,description:description,committee:committee},
      dataType:"text",
      success:function(data){
        alert(data);
        fetchDistributionBudget();
      }
    });
  });
  // FOR DISTRIBUTION OF BUDGET HONORARIUM
  $(document).on('click','#btn_add-DistributionBudgetHonorarium', function (){
    var id = $(this).data("id6");
    var distributor = $('#distribution_distributor-Honorarium').val();
    var amount = $('#distribution_amount-Honorarium').val();
    var description = $('#distribution_description-Honorarium').val();
    var committee = 'Honorarium';
    $.ajax({
      url:"ActivityProposal-DistributionBudget-Insert.php",
      method:"POST",
      data:{id:id,distributor:distributor,amount:amount,description:description,committee:committee},
      dataType:"text",
      success:function(data){
        alert(data);
        fetchDistributionBudget();
      }
    });
  });
  // FOR DISTRIBUTION OF BUDGET PROGRAM AND INVITATION
  $(document).on('click','#btn_add-DistributionBudgetProgramInvi', function (){
    var id = $(this).data("id6");
    var distributor = $('#distribution_distributor-ProgramInvi').val();
    var amount = $('#distribution_amount-ProgramInvi').val();
    var description = $('#distribution_description-ProgramInvi').val();
    var committee = 'ProgramInvi';
    $.ajax({
      url:"ActivityProposal-DistributionBudget-Insert.php",
      method:"POST",
      data:{id:id,distributor:distributor,amount:amount,description:description,committee:committee},
      dataType:"text",
      success:function(data){
        alert(data);
        fetchDistributionBudget();
      }
    });
  });
  // FOR DISTRIBUTION OF BUDGET TOKEN/PRIZES
  $(document).on('click','#btn_add-DistributionBudgetToken', function (){
    var id = $(this).data("id6");
    var distributor = $('#distribution_distributor-Token').val();
    var amount = $('#distribution_amount-Token').val();
    var description = $('#distribution_description-Token').val();
    var committee = 'Token';
    $.ajax({
      url:"ActivityProposal-DistributionBudget-Insert.php",
      method:"POST",
      data:{id:id,distributor:distributor,amount:amount,description:description,committee:committee},
      dataType:"text",
      success:function(data){
        alert(data);
        fetchDistributionBudget();
      }
    });
  });
  // FOR DISTRIBUTION OF BUDGET OTHERS
  $(document).on('click','#btn_add-DistributionBudgetOthers', function (){
    var id = $(this).data("id6");
    var distributor = $('#distribution_distributor-Others').val();
    var amount = $('#distribution_amount-Others').val();
    var description = $('#distribution_description-Others').val();
    var committee = 'Others';
    $.ajax({
      url:"ActivityProposal-DistributionBudget-Insert.php",
      method:"POST",
      data:{id:id,distributor:distributor,amount:amount,description:description,committee:committee},
      dataType:"text",
      success:function(data){
        alert(data);
        fetchDistributionBudget();
      }
    });
  });
  // FOR DISTRIBUTION OF BUDGET VENUE
  $(document).on('click','#btn_add-DistributionBudgetVenue', function (){
    var id = $(this).data("id6");
    var distributor = $('#distribution_distributor-Venue').val();
    var amount = $('#distribution_amount-Venue').val();
    var description = $('#distribution_description-Venue').val();
    var committee = 'Venue';
    $.ajax({
      url:"ActivityProposal-DistributionBudget-Insert.php",
      method:"POST",
      data:{id:id,distributor:distributor,amount:amount,description:description,committee:committee},
      dataType:"text",
      success:function(data){
        alert(data);
        fetchDistributionBudget();
      }
    });
  });
  // FOR DISTRIBUTION OF BUDGET ENERGY
  $(document).on('click','#btn_add-DistributionBudgetEnergy', function (){
    var id = $(this).data("id6");
    var distributor = $('#distribution_distributor-Energy').val();
    var amount = $('#distribution_amount-Energy').val();
    var description = $('#distribution_description-Energy').val();
    var committee = 'Energy';
    $.ajax({
      url:"ActivityProposal-DistributionBudget-Insert.php",
      method:"POST",
      data:{id:id,distributor:distributor,amount:amount,description:description,committee:committee},
      dataType:"text",
      success:function(data){
        alert(data);
        fetchDistributionBudget();
      }
    });
  });
  // FOR DISTRIBUTION OF BUDGET TRANSPORTATION
  $(document).on('click','#btn_add-DistributionBudgetTransportation', function (){
    var id = $(this).data("id6");
    var distributor = $('#distribution_distributor-Transportation').val();
    var amount = $('#distribution_amount-Transportation').val();
    var description = $('#distribution_description-Transportation').val();
    var committee = 'Transportation';
    $.ajax({
      url:"ActivityProposal-DistributionBudget-Insert.php",
      method:"POST",
      data:{id:id,distributor:distributor,amount:amount,description:description,committee:committee},
      dataType:"text",
      success:function(data){
        alert(data);
        fetchDistributionBudget();
      }
    });
  });
  // FOR DISTRIBUTION OF BUDGET TRANSPORTATION
  $(document).on('click','#btn_add-DistributionBudgetContingency', function (){
    var id = $(this).data("id6");
    var distributor = $('#distribution_distributor-Contingency').val();
    var amount = $('#distribution_amount-Contingency').val();
    var description = $('#distribution_description-Contingency').val();
    var committee = 'Contingency';
    $.ajax({
      url:"ActivityProposal-DistributionBudget-Insert.php",
      method:"POST",
      data:{id:id,distributor:distributor,amount:amount,description:description,committee:committee},
      dataType:"text",
      success:function(data){
        alert(data);
        fetchDistributionBudget();
      }
    });
  });
   //NAME IN COMMITTEES
  $('#plsLord').typeahead({
      source: function(query, result)
      {
      alert();
       $.ajax({
        url:"ActivityProposal-Committees-fetch.php",
        method:"POST",
        data:{query:query},
        dataType:"json",
        success:function(data)
        {
         result($.map(data, function(item){
          return item;
         }));
        }
       })
      }
     });
//initial start add ACTIVITY PROPOSAL
$(document).on('click','#btn_startAP', function (){
  var id = $(this).data("id5");
  alert(id);
  var status = 'Pending';
  $.ajax({
      url:"ActivityProposal-Initial-Insert.php",
      method:"POST",
      data:{id:id,status:status},
      dataType:"text",
      success:function(data){
        alert(data);
        fetchAP();
        fetchEvents();
      }
    });
});
//function for Add ACTIVITY PROPOSAL
$(document).on('click','#btn_add', function (){
    var title = $('#title').val();
    var description = $('#description').val();
    var date = $('#date').val();
    var starttime = $('#starttime').val();
    var endtime = $('#endtime').val();
    var place = $('#place').val();
    var notes = $('#notes').val();
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
      data:{title:title,description:description,date:date,place:place,starttime:starttime,endtime:endtime},
      dataType:"text",
      success:function(data){
        alert(data);
        fetchEvents();
      }
    });
  });
//TO VIEW POP UP
  $(document).on('click','#btn_view-top', function (){
    var id=$(this).data("id4");
    $.ajax({
      type:'POST',
      url:'actionPlan-pop-up-events-view.php',
      data:{id:id},
      dataType:"text",
      success:function(data){
        $('#actionPlan_table').html(data);
      }
    });
  });
  //TO VIEW POP UP
  $(document).on('click','#btn_view', function (){
    var id=$(this).data("id4");
    $.ajax({
      type:'POST',
      url:'ActivityProposal-view-form.php',
      data:{id:id},
      dataType:"text",
      success:function(data){
        $('#show_table').html(data);
      }
    });
  });
  ///SHOWS MODAL WHEN BUTTON MAKE ACTIVITY PROPOSAL IS CLICKED
  $(document).on('click','#btn_makeAP', function (){
    var id=$(this).data("id5");
    //TAB CONTENT FIRST
    $.ajax({
      type:'POST',
      url:'ActivityProposal-make-form.php',
      data:{id:id},
      dataType:"text",
      success:function(data){
        $('#show_table').html(data);
      }
    });
    //TAB CONTENT EXPENSES
    $.ajax({
      type:'POST',
      url:'ActivityProposal-make-form-expenses.php',
      data:{id:id},
      dataType:"text",
      success:function(data){
        $('#projected-expenses').html(data);
      }
    });
    //TAB CONTENT WORKING COMMITTEES
    $.ajax({
      type:'POST',
      url:'ActivityProposal-make-form-committees.php',
      data:{id:id},
      dataType:"text",
      success:function(data){
        $('#working-committees').html(data);
      }
    });
    //TAB CONTENT ACTIVITY SCHEDULE
    $.ajax({
      type:'POST',
      url:'ActivityProposal-make-form-schedule.php',
      data:{id:id},
      dataType:"text",
      success:function(data){
        $('#activity-program').html(data);
      }
    });
    //TAB CONTENT DISTRIBUTION OF BUDGET
    $.ajax({
      type:'POST',
      url:'ActivityProposal-make-form-distributionbudget.php',
      data:{id:id},
      dataType:"text",
      success:function(data){
        $('#distribution-budget').html(data);
      }
    });
    //FOR OBJECTIVES FETCH
    $.ajax({
    url:"ActivityProposal-Objectives-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-Objectives').html(data);
      }
    });
    // FOR SPEAKERS FETCH
    $.ajax({
    url:"ActivityProposal-Speakers-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-Speakers').html(data);
      }
    });
    // FOR DOCUMENTATION FETCH
    $.ajax({
    url:"ActivityProposal-Documentation-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-Documentation').html(data);
      }
    });
    // FOR FOOD FETCH
    $.ajax({
    url:"ActivityProposal-Food-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-Food').html(data);
      }
    });
    // FOR MATERIALS
    $.ajax({
    url:"ActivityProposal-Materials-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-Materials').html(data);
      }
    });
    // FOR HONORARIUM
    $.ajax({
    url:"ActivityProposal-Honorarium-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-Honorarium').html(data);
      }
    });
    // FOR PROGRAM AND INVITATION
    $.ajax({
    url:"ActivityProposal-ProgramInvi-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-ProgramInvi').html(data);
      }
    });
    // FOR CERTIFICATES
    $.ajax({
    url:"ActivityProposal-Certs-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-Certs').html(data);
      }
    });
    // FOR TOKEN/PRIZES
    $.ajax({
    url:"ActivityProposal-Token-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-Token').html(data);
      }
   });
    // FOR OTHERS
   $.ajax({
    url:"ActivityProposal-OthersTable-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-OthersTable').html(data);
      }
    });
   // FOR VENUE
    $.ajax({
    url:"ActivityProposal-Venue-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-Venue').html(data);
      }
    });
    // FOR ENERGY
    $.ajax({
    url:"ActivityProposal-Energy-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-Energy').html(data);
      }
    });
    // FOR TRANSPORTATION
    $.ajax({
    url:"ActivityProposal-Transportation-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-Transportation').html(data);
      }
    });
    $.ajax({
    url:"ActivityProposal-Contingency-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-Contingency').html(data);
      }
    });
    // TABLE FOR TOTAL
    $.ajax({
      type:'POST',
      url:'ActivityProposal-make-form-total.php',
      data:{id:id},
      dataType:"text",
      success:function(data){
        $('.table-Total').html(data);
        }
    });
    $.ajax({
    url:"ActivityProposal-Committees-Overall-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-Committees-Overall').html(data);
      }
    });
    // FOR ACTIVTY COMMITTEES
    $.ajax({
    url:"ActivityProposal-Committees-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-Committees').html(data);
      }
    });
    // FOR ACTIVTY PROGRAM/SCHEDULE
    $.ajax({
    url:"ActivityProposal-Schedule-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-Schedule').html(data);
      }
    });
    // FOR ACTIVTY DISTRIBUTION OF BUDGET
    $.ajax({
    url:"ActivityProposal-DistributionBudget-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-DistributionBudget').html(data);
      }
    });
  });
  //TO UPDATE ACTIVITY PROPOSAL
  $(document).on('click','#btn_update', function (){
    var id=$(this).data("idunique");
    var checkboxtype = $('input[name="checkbox-type"]:checked').val();
    var checkboxlocation = $('input[name="checkbox-location"]:checked').val();
    var proponent = $('#proponent').val();
    var description = $('#description').val();
    var checkboxapproved = $('input[name="checkbox-approved"]:checked').val();
    var theme = $('#theme').val();
    var place = $('#place').val();
    var rehearsals = $('#rehearsals').val();
    var participants = $('#participants').val();
    var howmany = $('#count').val();
    var objectivespercent = $('#percentage').val();
    var values = $('#values').val();
    var overallmean = $('#mean').val();
    var verbalinterpretation = $('#verbal-interpretation').val();
    var checkboxbudget = $('input[name="checkbox-budget"]:checked').val();
    var fund = $('#fund').val();
    var notes = $('#notes').val();
    var situation = 'Pending';
    if(objectivespercent == "")
    {
      alert('Please fill the blanks');
      return false;
    }
    $.ajax({
      type:'POST',
      url:'ActivityProposal-Update.php',
      data:{id:id,checkboxtype:checkboxtype,checkboxlocation:checkboxlocation,proponent:proponent,description:description,
        checkboxapproved:checkboxapproved,theme:theme,place:place,rehearsals:rehearsals,participants:participants,
        howmany:howmany,objectivespercent:objectivespercent,values:values,overallmean:overallmean,
        verbalinterpretation:verbalinterpretation,checkboxbudget:checkboxbudget,fund:fund,notes:notes,situation:situation},
      dataType:"text",
      success:function(data){
        alert(data);
      }
    });
  });
  // FOR THE EXPENSES TAB UPDATE
  $(document).on('click','#btn_update-expenses', function (){
      var id=$(this).data("idunique");
      var checkboxbudget = $('input[name="checkbox-budget"]:checked').val();
      var takenfrom = '';
      if(checkboxbudget == 'To be taken from the fund of')
      {
        var takenfrom = $('#fund').val();
      }
      $.ajax({
        type:'POST',
        url:'ActivityProposal-Update-Expenses.php',
        data:{id:id,checkboxbudget:checkboxbudget,takenfrom:takenfrom},
        dataType:"text",
        success:function(data){
          alert(data);
        }
      });
    });
    //to UPDATE into VERIFIED
    $(document).on('click','#btn_verifyAP', function (){
      var id = $(this).data("id5");
      var situation = 'Verified by Organization Adviser';
      $.ajax({
        url:"ActivityProposal-Verify.php",
        method:"POST",
        data:{id:id,situation:situation},
        dataType:"text",
        success:function(data){
          alert(data);
          fetchAP();
        }
      });
    });
    // ACTIVITY PROPOSAL
  // DELETING OF RECORDS
  // DELETING OF SPEAKERS
  $(document).on('click','#btn_del-Speakers', function (){
      var id = $(this).data("idunique");
      var pass = 'Speakers';
      var reallyLogout = confirm("Do you really remove this data?");
      if(reallyLogout)
      {
          $.ajax({
          url:"ActivityProposal-Delete.php",
          method:"POST",
          data:{id:id,pass:pass},
          dataType:"text",
          success:function(data){
            alert(data);
            fetchSpeakers();
          }
        });
      }
    });
  // DELETING OF DOCUMENTATION
  $(document).on('click','#btn_del-Documentation', function (){
      var id = $(this).data("idunique");
      var pass = 'Documentation';
      var reallyLogout = confirm("Do you really remove this data?");
      if(reallyLogout)
      {
          $.ajax({
          url:"ActivityProposal-Delete.php",
          method:"POST",
          data:{id:id,pass:pass},
          dataType:"text",
          success:function(data){
            alert(data);
            fetchDocumentation();
            fetchDistributionBudget();
          }
        });
      }
    });
  // DELETING OF FOOD
  $(document).on('click','#btn_del-Food', function (){
      var id = $(this).data("idunique");
      var pass = 'Food';
      var reallyLogout = confirm("Do you really remove this data?");
      if(reallyLogout)
      {
          $.ajax({
          url:"ActivityProposal-Delete.php",
          method:"POST",
          data:{id:id,pass:pass},
          dataType:"text",
          success:function(data){
            alert(data);
            fetchFood();
            fetchDistributionBudget();
          }
        });
      }
    });
  // MATERIALS
  // DELETING OF PUBLICITY
  $(document).on('click','#btn_del-Publicity', function (){
      var id = $(this).data("idunique");
      var pass = 'Publicity';
      var reallyLogout = confirm("Do you really remove this data?");
      if(reallyLogout)
      {
          $.ajax({
          url:"ActivityProposal-Delete.php",
          method:"POST",
          data:{id:id,pass:pass},
          dataType:"text",
          success:function(data){
            alert(data);
            fetchMaterials();
            fetchDistributionBudget();
          }
        });
      }
    });
    // DELETING OF REGISTRATION
  $(document).on('click','#btn_del-Registration', function (){
      var id = $(this).data("idunique");
      var pass = 'Registration';
      var reallyLogout = confirm("Do you really remove this data?");
      if(reallyLogout)
      {
          $.ajax({
          url:"ActivityProposal-Delete.php",
          method:"POST",
          data:{id:id,pass:pass},
          dataType:"text",
          success:function(data){
            alert(data);
            fetchMaterials();
            fetchDistributionBudget();
          }
        });
      }
    });
  // DELETING OF SEMINAR
  $(document).on('click','#btn_del-Seminar', function (){
      var id = $(this).data("idunique");
      var pass = 'Seminar';
      var reallyLogout = confirm("Do you really remove this data?");
      if(reallyLogout)
      {
          $.ajax({
          url:"ActivityProposal-Delete.php",
          method:"POST",
          data:{id:id,pass:pass},
          dataType:"text",
          success:function(data){
            alert(data);
            fetchMaterials();
            fetchDistributionBudget();
          }
        });
      }
    });
  // DELETING OF STAGE DECORATION
  $(document).on('click','#btn_del-Stage', function (){
      var id = $(this).data("idunique");
      var pass = 'Stage Decoration';
      var reallyLogout = confirm("Do you really remove this data?");
      if(reallyLogout)
      {
          $.ajax({
          url:"ActivityProposal-Delete.php",
          method:"POST",
          data:{id:id,pass:pass},
          dataType:"text",
          success:function(data){
            alert(data);
            fetchMaterials();
            fetchDistributionBudget();
          }
        });
      }
    });
  // DELETING OF OTHERS
  $(document).on('click','#btn_del-Others', function (){
      var id = $(this).data("idunique");
      var pass = 'Others Material';
      var reallyLogout = confirm("Do you really remove this data?");
      if(reallyLogout)
      {
          $.ajax({
          url:"ActivityProposal-Delete.php",
          method:"POST",
          data:{id:id,pass:pass},
          dataType:"text",
          success:function(data){
            alert(data);
            fetchMaterials();
            fetchDistributionBudget();
          }
        });
      }
    });
  // DELETING MATERIALS

  // DELETING OF HONORARIUM
  $(document).on('click','#btn_del-Honorarium', function (){
      var id = $(this).data("idunique");
      var pass = 'Honorarium';
      var reallyLogout = confirm("Do you really remove this data?");
      if(reallyLogout)
      {
          $.ajax({
          url:"ActivityProposal-Delete.php",
          method:"POST",
          data:{id:id,pass:pass},
          dataType:"text",
          success:function(data){
            alert(data);
            fetchHonorarium();
            fetchDistributionBudget();
          }
        });
      }
    });
  // DELETING OF PROGRAM
  $(document).on('click','#btn_del-ProgramInvi', function (){
      var id = $(this).data("idunique");
      var pass = 'Program';
      var reallyLogout = confirm("Do you really remove this data?");
      if(reallyLogout)
      {
          $.ajax({
          url:"ActivityProposal-Delete.php",
          method:"POST",
          data:{id:id,pass:pass},
          dataType:"text",
          success:function(data){
            alert(data);
            fetchProgramInvi();
            fetchDistributionBudget();
          }
        });
      }
    });
  // DELETING OF CERTIFICATES
  $(document).on('click','#btn_del-Certs', function (){
      var id = $(this).data("idunique");
      var pass = 'Certificates';
      var reallyLogout = confirm("Do you really remove this data?");
      if(reallyLogout)
      {
          $.ajax({
          url:"ActivityProposal-Delete.php",
          method:"POST",
          data:{id:id,pass:pass},
          dataType:"text",
          success:function(data){
            alert(data);
            fetchCerts();
            fetchDistributionBudget();
          }
        });
      }
    });
  // DELETING OF TOKEN
  $(document).on('click','#btn_del-Token', function (){
      var id = $(this).data("idunique");
      var pass = 'Token';
      var reallyLogout = confirm("Do you really remove this data?");
      if(reallyLogout)
      {
          $.ajax({
          url:"ActivityProposal-Delete.php",
          method:"POST",
          data:{id:id,pass:pass},
          dataType:"text",
          success:function(data){
            alert(data);
            fetchToken();
            fetchDistributionBudget();
          }
        });
      }
    });
  // DELETING OF OTHERS
  $(document).on('click','#btn_del-OthersTable', function (){
      var id = $(this).data("idunique");
      var pass = 'Others';
      var reallyLogout = confirm("Do you really remove this data?");
      if(reallyLogout)
      {
          $.ajax({
          url:"ActivityProposal-Delete.php",
          method:"POST",
          data:{id:id,pass:pass},
          dataType:"text",
          success:function(data){
            alert(data);
            fetchOthersTable();
            fetchDistributionBudget();
          }
        });
      }
    });
  // DELETING OF VENUE
  $(document).on('click','#btn_del-Venue', function (){
      var id = $(this).data("idunique");
      var pass = 'Venue';
      var reallyLogout = confirm("Do you really remove this data?");
      if(reallyLogout)
      {
          $.ajax({
          url:"ActivityProposal-Delete.php",
          method:"POST",
          data:{id:id,pass:pass},
          dataType:"text",
          success:function(data){
            alert(data);
            fetchVenue();
            fetchDistributionBudget();
          }
        });
      }
    });
  // DELETING OF ENERGY
  $(document).on('click','#btn_del-Energy', function (){
      var id = $(this).data("idunique");
      var pass = 'Energy';
      var reallyLogout = confirm("Do you really remove this data?");
      if(reallyLogout)
      {
          $.ajax({
          url:"ActivityProposal-Delete.php",
          method:"POST",
          data:{id:id,pass:pass},
          dataType:"text",
          success:function(data){
            alert(data);
            fetchEnergy();
            fetchDistributionBudget();
          }
        });
      }
    });
  // DELETING OF TRANSPORTATION
  $(document).on('click','#btn_del-Transportation', function (){
      var id = $(this).data("idunique");
      var pass = 'Transportation';
      var reallyLogout = confirm("Do you really remove this data?");
      if(reallyLogout)
      {
          $.ajax({
          url:"ActivityProposal-Delete.php",
          method:"POST",
          data:{id:id,pass:pass},
          dataType:"text",
          success:function(data){
            alert(data);
            fetchTransportation();
            fetchDistributionBudget();
          }
        });
      }
    });
  // DELETING OF CONTINGENCY
  $(document).on('click','#btn_del-Contingency', function (){
      var id = $(this).data("idunique");
      var pass = 'Contingency';
      var reallyLogout = confirm("Do you really remove this data?");
      if(reallyLogout)
      {
          $.ajax({
          url:"ActivityProposal-Delete.php",
          method:"POST",
          data:{id:id,pass:pass},
          dataType:"text",
          success:function(data){
            alert(data);
            fetchContingency();
            fetchDistributionBudget();
          }
        });
      }
    });
  // ACTIVITY PROGRAM/ SCHEDULE
  // DELETING OF SCHEDULE
  $(document).on('click','#btn_del-Schedule', function (){
      var id = $(this).data("idunique");
      var pass = 'Schedule';
      var reallyLogout = confirm("Do you really remove this data?");
      if(reallyLogout)
      {
          $.ajax({
          url:"ActivityProposal-Delete.php",
          method:"POST",
          data:{id:id,pass:pass},
          dataType:"text",
          success:function(data){
            alert(data);
            fetchSchedule();
          }
        });
      }
    });

  // DISTRIBUTION OF BUDGET
  // DELETING OF DISTRIBUTION
  $(document).on('click','#btn_del-DescriptionBudgetDocu', function (){
      var id = $(this).data("idunique");
      var pass = 'Budget Documentation';
      var reallyLogout = confirm("Do you really remove this data?");
      if(reallyLogout)
      {
          $.ajax({
          url:"ActivityProposal-Delete.php",
          method:"POST",
          data:{id:id,pass:pass},
          dataType:"text",
          success:function(data){
            alert(data);
            fetchDistributionBudget();
          }
        });
      }
    });
  // DELETING OF FOOD
  $(document).on('click','#btn_del-DescriptionBudgetFood', function (){
      var id = $(this).data("idunique");
      var pass = 'Budget Food';
      var reallyLogout = confirm("Do you really remove this data?");
      if(reallyLogout)
      {
          $.ajax({
          url:"ActivityProposal-Delete.php",
          method:"POST",
          data:{id:id,pass:pass},
          dataType:"text",
          success:function(data){
            alert(data);
            fetchDistributionBudget();
          }
        });
      }
    });
  // DELETING OF MATERIALS
  $(document).on('click','#btn_del-DescriptionBudgetMaterials', function (){
      var id = $(this).data("idunique");
      var pass = 'Budget Materials';
      var reallyLogout = confirm("Do you really remove this data?");
      if(reallyLogout)
      {
          $.ajax({
          url:"ActivityProposal-Delete.php",
          method:"POST",
          data:{id:id,pass:pass},
          dataType:"text",
          success:function(data){
            alert(data);
            fetchDistributionBudget();
          }
        });
      }
    });
  // DELETING OF HONORARIUM
  $(document).on('click','#btn_del-DescriptionBudgetHonorarium', function (){
      var id = $(this).data("idunique");
      var pass = 'Budget Honorarium';
      var reallyLogout = confirm("Do you really remove this data?");
      if(reallyLogout)
      {
          $.ajax({
          url:"ActivityProposal-Delete.php",
          method:"POST",
          data:{id:id,pass:pass},
          dataType:"text",
          success:function(data){
            alert(data);
            fetchDistributionBudget();
          }
        });
      }
    });
  // DELETING OF PROGRAM AND INVI
  $(document).on('click','#btn_del-DescriptionBudgetProgramInvi', function (){
      var id = $(this).data("idunique");
      var pass = 'Budget Program';
      var reallyLogout = confirm("Do you really remove this data?");
      if(reallyLogout)
      {
          $.ajax({
          url:"ActivityProposal-Delete.php",
          method:"POST",
          data:{id:id,pass:pass},
          dataType:"text",
          success:function(data){
            alert(data);
            fetchDistributionBudget();
          }
        });
      }
    });
  // DELETING OF TOKEN
  $(document).on('click','#btn_del-DescriptionBudgetToken', function (){
      var id = $(this).data("idunique");
      var pass = 'Budget Token';
      var reallyLogout = confirm("Do you really remove this data?");
      if(reallyLogout)
      {
          $.ajax({
          url:"ActivityProposal-Delete.php",
          method:"POST",
          data:{id:id,pass:pass},
          dataType:"text",
          success:function(data){
            alert(data);
            fetchDistributionBudget();
          }
        });
      }
    });
  // DELETING OF OTHERS
  $(document).on('click','#btn_del-DescriptionBudgetOthers', function (){
      var id = $(this).data("idunique");
      var pass = 'Budget Others';
      var reallyLogout = confirm("Do you really remove this data?");
      if(reallyLogout)
      {
          $.ajax({
          url:"ActivityProposal-Delete.php",
          method:"POST",
          data:{id:id,pass:pass},
          dataType:"text",
          success:function(data){
            alert(data);
            fetchDistributionBudget();
          }
        });
      }
    });
  // DELETING OF VENUE
  $(document).on('click','#btn_del-DescriptionBudgetVenue', function (){
      var id = $(this).data("idunique");
      var pass = 'Budget Venue';
      var reallyLogout = confirm("Do you really remove this data?");
      if(reallyLogout)
      {
          $.ajax({
          url:"ActivityProposal-Delete.php",
          method:"POST",
          data:{id:id,pass:pass},
          dataType:"text",
          success:function(data){
            alert(data);
            fetchDistributionBudget();
          }
        });
      }
    });
  // DELETING OF ENERGY
  $(document).on('click','#btn_del-DescriptionBudgetEnergy', function (){
      var id = $(this).data("idunique");
      var pass = 'Budget Energy';
      var reallyLogout = confirm("Do you really remove this data?");
      if(reallyLogout)
      {
          $.ajax({
          url:"ActivityProposal-Delete.php",
          method:"POST",
          data:{id:id,pass:pass},
          dataType:"text",
          success:function(data){
            alert(data);
            fetchDistributionBudget();
          }
        });
      }
    });
  // DELETING OF TRANSPORTATION
  $(document).on('click','#btn_del-DescriptionBudgetTransportation', function (){
      var id = $(this).data("idunique");
      var pass = 'Budget Transportation';
      var reallyLogout = confirm("Do you really remove this data?");
      if(reallyLogout)
      {
          $.ajax({
          url:"ActivityProposal-Delete.php",
          method:"POST",
          data:{id:id,pass:pass},
          dataType:"text",
          success:function(data){
            alert(data);
            fetchDistributionBudget();
          }
        });
      }
    });
  // DELETING OF CONTINGENCY
  $(document).on('click','#btn_del-DescriptionBudgetContingency', function (){
      var id = $(this).data("idunique");
      var pass = 'Budget Contingency';
      var reallyLogout = confirm("Do you really remove this data?");
      if(reallyLogout)
      {
          $.ajax({
          url:"ActivityProposal-Delete.php",
          method:"POST",
          data:{id:id,pass:pass},
          dataType:"text",
          success:function(data){
            alert(data);
            fetchDistributionBudget();
          }
        });
      }
    });
  //ACTIVITY PROPOSAL
});
