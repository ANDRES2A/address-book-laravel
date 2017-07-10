<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
<meta charset="utf-8">
<meta name="csrf-token" content="{{ Session::token() }}">
<title>Andrés Asimbaya</title>
<script src="js/primerLab.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="css/contact.css" rel="stylesheet" type="text/css">
<style media="screen">
.myID{
font-size: 100px;
font-style: italic;
}
/*Strip the ul of padding and list styling*/
ul {
list-style-type:none;
margin:0;
padding:0;
position: absolute;
}

/*Create a horizontal list with spacing*/
li {
display:inline-block;
float: left;
margin-right: 1px;
}

/*Style for menu links*/
li a {
display:block;
min-width:140px;
height: 50px;
text-align: center;
line-height: 50px;
font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
color: #fff;
background: #2f3036;
text-decoration: none;
}

/*Hover state for top level links*/
li:hover a {
background: #19c589;
}

/*Style for dropdown links*/
li:hover ul a {
background: #f3f3f3;
color: #2f3036;
height: 40px;
line-height: 40px;
}

/*Hover state for dropdown links*/
li:hover ul a:hover {
background: #19c589;
color: #fff;
}

/*Hide dropdown links until they are needed*/
li ul {
display: none;
}

/*Make dropdown links vertical*/
li ul li {
display: block;
float: none;
}

/*Prevent text wrapping*/
li ul li a {
width: auto;
min-width: 100px;
padding: 0 20px;
}

/*Display the dropdown on hover*/
ul li a:hover + .hidden, .hidden:hover {
display: block;
}

/*Style 'show menu' label button and hide it by default*/
.show-menu {
font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
text-decoration: none;
color: #fff;
background: #19c589;
text-align: center;
padding: 10px 0;
display: none;
}

/*Hide checkbox*/
input[type=checkbox]{
display: none;
}

/*Show menu when invisible checkbox is checked*/
input[type=checkbox]:checked ~ #menu{
display: block;
}


/*Responsive Styles*/

@media (max-width : 760px){
/*Make dropdown links appear inline*/
ul {
position: static;
display: none;
}
/*Create vertical spacing*/
li {
margin-bottom: 1px;
}
/*Make all menu links full width*/
ul li, li a {
width: 100%;
}
/*Display 'show menu' link*/
.show-menu {
display:block;
}
}





/* Style inputs with type="text", select elements and textareas */
input[type=text], select, textarea {
width: 100%; /* Full width */
padding: 12px; /* Some padding */
border: 1px solid #ccc; /* Gray border */
border-radius: 4px; /* Rounded borders */
box-sizing: border-box; /* Make sure that padding and width stays in place */
margin-top: 6px; /* Add a top margin */
margin-bottom: 16px; /* Bottom margin */
resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
}

/* Style the submit button with a specific background color etc */
input[type=submit] {
background-color: #19c589;
color: white;
padding: 12px 20px;
border: none;
border-radius: 4px;
cursor: pointer;
}

/* When moving the mouse over the submit button, add a darker green color */
input[type=submit]:hover {
background-color: #45a049;
}

/* Add a background color and some padding around the form */
.container {
border-radius: 5px;
background-color: #f2f2f2;
padding: 20px;
}

</style>
</head>
<body>

<header>
  <?php
  require('header.php');
  ?>
</header>
<aside class="">
  <ul class="asideUl">
    <li>Summit Site</li>
    <li>Goober Site</li>
    <li>Shipware Site</li>
    <li>Auris</li>
    <li>EasyTranslation</li>
  </ul>
</aside>
<nav>

<label for="show-menu" class="show-menu">Mostrar Menu</label>
<input type="checkbox" id="show-menu" role="button">
<ul id="menu">
<li><a href="#">Inicio</a></li>
<li>
  <a href="#">Portfolio ￬</a>
  <ul class="hidden">
    <li><a href="#">Photography</a></li>
    <li><a href="#">Web & User Interface Design</a></li>
    <li><a href="#">Illustration</a></li>
  </ul>
</li>
<li><a href="#">Contacto</a></li>
</ul>
</nav>
<br>
<br>
<br>
<br>
<br>


<!--<fieldset>-->
  <img src="{{$user->avatar_original}}" style="width:250px;height:250px;">
  <br>
  <label >Name: {{$user->name}}</label>
  <br>
  <label >Email: {{$user->email}}</label>
  <br>
  <label >Gender: {{$user->user['gender']}}</label>
  <br>

  <!--<input type="submit" value="Save"></input>-->

  <!--{{csrf_field()}}-->
  <!--</fieldset>-->





<div class="" id="mensaje"></div>
<script type="text/javascript">
$( document ).ready(function() {
$('#submit').click(function() {
    $.post('/insert', {nombre: $('#nombre').val(), email: $('#email').val(), country: $('#country').val(), subject: $('#subject').val()})
      .done(function(datos) {
          alert("Se inserto la informacion correctamente!!");
      });
    });
  });
</script>
<footer>
  <br>
  Copyright © 2017 Andrés Asimbaya
</footer>
</body>
</html>
