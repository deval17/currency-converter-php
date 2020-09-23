<html>


<script >

var m_names = ["January", "February", "March", 
"April", "May", "June", "July", "August", "September", 
"October", "November", "December"];

var d_names = ["Sunday","Monday", "Tuesday", "Wednesday", 
"Thursday", "Friday", "Saturday"];

var myDate = new Date();
myDate.setDate(myDate.getDate()+7);
var curr_date = myDate.getDate();
var curr_month = myDate.getMonth();
var curr_day  = myDate.getDay();
document.write(d_names[curr_day] + "<br>"+ curr_date + "<br>" + m_names[curr_month] + " 2020");

</script>
<body>
<div class="box-blue"> </div>
 <style>
 .box-blue{
	width:100px;
	height:100px;
    background-color:lightblue;
    opacity:0.5;
}
/* body{
    background-color:lightblue;
    width=100px;
    height=100px;
} */
 </style>
</body>
</html>