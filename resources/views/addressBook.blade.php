<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
<meta charset="utf-8">
<meta name="csrf-token" content="{{ Session::token() }}">
<title>Address Book Andres Asimbaya</title>
<script src="js/primerLab.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link href="css/contact.css" rel="stylesheet" type="text/css">
</head>
<body>

<header>
  <h1 class="text-center">Address Book</h1
</header>

<div class="container">
          <div class="row">
              <div class="col-md-6">
                <div class="form-group has-feedback">
                 <label for="search" class="sr-only">Search</label>
                 <input type="text" id="searchBox" class="form-control" name="search" id="search" placeholder="search">
                 <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
                <div class="list-group"  id="listContacts">
                  @foreach ($contacts as $contact)
                  <div class="list-group-item">
                    <p>{{$contact->firstName}}
                      <button id="deleteBtn" class="btn btn-danger btn-xs deleteBtn" style="float:right" data-title="Delete" data-toggle="modal" data-target="#delete" >
                      <span class="glyphicon glyphicon-trash"></span>
                      <p style="display:none">{{$contact->_id}}</p>
                      </button></p>
                    <p>{{$contact->lastName}}</p>
                    <p>{{$contact->phone}}</p>
                  </div>
                  @endforeach
                </div>

              </div>
              <div class="col-md-6">
                <form class="well form-horizontal" id="formInsert" action=" " method="post"  id="contact_form">
                    <fieldset>

                    <!-- Form Name -->
                    <legend>Insert new contact</legend>

                    <!-- Text input-->

                    <div class="form-group">
                     <label class="col-md-4 control-label">First Name</label>
                     <div class="col-md-6 inputGroupContainer">
                     <div class="input-group">
                     <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                     <input  name="firstName" id="firstName" placeholder="First Name" class="form-control"  type="text">
                       </div>
                     </div>
                    </div>

                    <!-- Text input-->

                    <div class="form-group">
                     <label class="col-md-4 control-label" >Last Name</label>
                       <div class="col-md-6 inputGroupContainer">
                       <div class="input-group">
                     <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                     <input name="lastName" id="lastName" placeholder="Last Name" class="form-control"  type="text">
                       </div>
                     </div>
                    </div>


                    <!-- Text input-->

                    <div class="form-group">
                     <label class="col-md-4 control-label">Phone #</label>
                       <div class="col-md-6 inputGroupContainer">
                       <div class="input-group">
                           <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                     <input name="phone" id="phone" placeholder="(845)555-1212" class="form-control" type="text">
                       </div>
                     </div>
                    </div>


                    </fieldset>
                    <div id="formInsertInfo"></div>
                  </form>
                  <!-- Button -->
                  <div class="form-group">
                   <label class="col-md-5 control-label"></label>
                   <div class="col-md-4">
                     <button type="submit" id="submit" class="btn btn-primary" >Save <span class="glyphicon glyphicon-save"></span></button>
                   </div>
                  </div>
                </div>
          </div>
</div>

<script type="text/javascript">
$( document ).ready(function() {
$('#submit').click(function() {
    $.post('/api/contacts', {firstName: $('#firstName').val(), lastName: $('#lastName').val(), phone: $('#phone').val()})
      .done(function(datos) {
          $('#formInsertInfo').html("");
          $('#formInsertInfo').append('<div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Your new contact has been added.</div>');
          $('#success_message').fadeTo(2000, 500).slideUp(500, function(){
            $("#success_message").slideUp(500);
          });
          $.get('/api/contacts', function(response){
            lastContact=response[response.length-1];
            console.log(response[response.length-1]);
            $('#listContacts').append('<div class="list-group-item"> <p>'
            + lastContact.firstName +'<button id="deleteBtn" class="btn btn-danger btn-xs deleteBtn" style="float:right" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span><p style="display:none">'
            + lastContact._id+'</p></button></p> <p>'
            + lastContact.lastName +'</p> <p>'
            + lastContact.phone +'</p> </div>');
            });
      });
    });
$('#searchBox').keydown(function() {
  // Check input( $( this ).val() ) for validity here
  //console.log($('#searchBox').val());
  $.get('/api/contacts', function(response){
    contacts=response;
    contacts = contacts.filter((contact, index)=>{
    //  if(this.state.searchText === contact.firstName){
    //    return true;
    //  }
     if(contact.firstName.indexOf($('#searchBox').val()) > -1){
       return true;
     }
     if(contact.lastName.indexOf($('#searchBox').val()) > -1){
       return true;
     }
     return false;
    });
    console.log(contacts);
    $('#listContacts').html("");
    for(var i=0; i< contacts.length; i++){
    $('#listContacts').append('<div class="list-group-item"> <p>'
    + contacts[i].firstName +'<button id="deleteBtn" class="btn btn-danger btn-xs deleteBtn" style="float:right" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span><p style="display:none">'
    + contacts[i]._id+'</p></button></p> <p>'
    + contacts[i].lastName +'</p> <p>'
    + contacts[i].phone +'</p> </div>');
    }
    });
});

$(".deleteBtn").click(function() {
  console.log($(this).find("p").text());
  $.post('/api/contactDelete', {id: $(this).find("p").text()})
  .done(function(datos) {
    $.get('/api/contacts', function(response){
      contacts=response;
      console.log(contacts);
      $('#listContacts').html("");
      for(var i=0; i< contacts.length; i++){
      $('#listContacts').append('<div class="list-group-item"> <p>'
      + contacts[i].firstName +'<button id="deleteBtn" class="btn btn-danger btn-xs deleteBtn" style="float:right" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span><p style="display:none">'
      + contacts[i]._id+'</p></button></p> <p>'
      + contacts[i].lastName +'</p> <p>'
      + contacts[i].phone +'</p> </div>');
      }
      });
    });
});

$('#listContacts').on('click', '.deleteBtn', function() {

  console.log($(this).find("p").text());
  $.post('/api/contactDelete', {id: $(this).find("p").text()})
  .done(function(datos) {
    $.get('/api/contacts', function(response){
      contacts=response;
      console.log(contacts);
      $('#listContacts').html("");
      for(var i=0; i< contacts.length; i++){
      $('#listContacts').append('<div class="list-group-item"> <p>'
      + contacts[i].firstName +'<button id="deleteBtn" class="btn btn-danger btn-xs deleteBtn" style="float:right" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span><p style="display:none">'
      + contacts[i]._id+'</p></button></p> <p>'
      + contacts[i].lastName +'</p> <p>'
      + contacts[i].phone +'</p> </div>');
      }
      });
    });

});

  });
</script>
<footer class="text-center">
  Copyright © 2017 Andrés Asimbaya
</footer>
</body>
</html>
