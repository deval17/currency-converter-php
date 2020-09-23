<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="shortcut icon" type="image/png" href="/favicon.png"/>
    <link rel="shortcut icon" type="image/png" href="http://localhost/fixercurrency/favicon.png"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>Currency Converter</title>
</head>
<?php
session_start();
?>

<?php 
if(isset($_SERVER['HTTP_REFERER'])){
if (strstr($_SERVER['HTTP_REFERER'],"inputdata.php"))
{
// echo "<h1>You have access.</h1>";
?>
<style>
          .container {
      height: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
  }
</style>

<header>
<div class="text-center"><br>
<h2>Conversion Result</h2><br>
</div>
</header>
<br>
<body>
<?php
//echo $_POST['amount'].'  '.$_POST['baseCurrency'].'  =  ';
$i=0;
          
          foreach ($_SESSION['json']['rates'] as $key => $value) {
            $currency[$i]=$key;
            $rate[$i]=$value;
            //echo '1 EUR = '.$rate[$i].' '.$currency[$i]; 
            //echo '<br>';

            if($_POST['baseCurrency']==$key){
                $value_of_key_in_1_euro = $value;
                break;
            }


            $i=$i+1;
            
          }
          //echo $value_of_key_in_1_euro;

          //number of Euros of entered value
          $value_of_entered_amount_in_euros = $_POST['amount']/$value_of_key_in_1_euro;
          //echo $value_of_entered_amount_in_euros;

          $i=0;
          foreach ($_SESSION['json']['rates'] as $key => $value) {
            $currency[$i]=$key;
            $rate[$i]=$value;
            //echo '1 EUR = '.$rate[$i].' '.$currency[$i]; 
            //echo '<br>';

            if($_POST['targetCurrency']==$key){
                $value_of_target_currency_for_1_euro = $value;
                break;
            }


            $i=$i+1;
            
          }
          
          $value_of_entered_amount_in_targeted_currency = $value_of_entered_amount_in_euros*$value_of_target_currency_for_1_euro;
          //echo $value_of_entered_amount_in_targeted_currency.'  '.$_POST['targetCurrency'] ;
          $conversionrate = $value_of_entered_amount_in_targeted_currency/$_POST['amount'];
?>
    <div class="container" >
        <h4><?php echo $_POST['amount'].'   '.$_POST['baseCurrency'].'   =   '.$value_of_entered_amount_in_targeted_currency.'   '.$_POST['targetCurrency']; ?></h4>
    </div><br><br>
    <div>
    <p class="text-center">Today's Conversion Rate:</p>
    <h5 class="text-center">1  <?php echo $_POST['baseCurrency'].'   =   '.$conversionrate.'  '.$_POST['targetCurrency'] ?> </h5> 
    </div>
    <div>
    
    </div><br><br>
    <div class="text-center">
    <a class="btn btn-secondary" class="text-center" href="inputdata.php">Back</a>
    </div>





<?php
}
else
{
    echo "<br>";
    echo "<div class='text-center'>";
    echo "<h2> Sorry, you don't have access. Go Back</h2>";
    echo "<br>";
    
    echo "<div class='form-actions'>";
    echo "<a class='btn btn-secondary' href='inputdata.php'>Back</a>";
    echo "</div>";
    echo "</div>";
}
}
else{
    echo "<br>";
    echo "<div class='text-center'>";
    echo "<h2> Sorry, you don't have access. Go Back</h2>";
    echo "<br>";
    
    echo "<div class='form-actions'>";
    echo "<a class='btn btn-secondary' href='inputdata.php'>Back</a>";
    echo "</div>";
    echo "</div>";
}
?>



<?php
session_destroy();
?>
</body>
</html>