<?php
//Fixer API Access Key: 08b585a91c6433a7c75acf0d3a085df9

//There are 5 main API Endpoints (listed below) through which you can access different kinds of data, 
//all starting out with this Base URL:

// http://data.fixer.io/api/

// Simply attach your unique Access Key to one of the endpoints as a query parameter:

// http://data.fixer.io/api/latest?access_key=08b585a91c6433a7c75acf0d3a085df9

$api="08b585a91c6433a7c75acf0d3a085df9";   // Provide your fixer.io api key here
session_start();
//declare session variables
$string = file_get_contents("http://data.fixer.io/api/latest?access_key=$api&format=1");
$_SESSION['json'] = json_decode($string, true);

?>
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
<h2>Currency Converter</h2><br>
</div>
</header>
<br>
<body>
<div class="container" >
<form action="getshowdata.php" name="form"  method="post" >
    <div class="text-center">

    <div class="row">
      <div class="col">
        <input type="number" class="form-control" name="amount" placeholder="Enter Amount" required>
      </div>
    </div>
  <br><br>
  <h4>Select:</h4><br>
  <div class="row">
    <div class="col">
      <select name="baseCurrency" id="baseCurrency"  class="browser-default custom-select">
        <?php
          
          $i=0;
          
          foreach ($_SESSION['json']['rates'] as $key => $value) {
            $currency[$i]=$key;
            $rate[$i]=$value;
            if($key!== 'USD'){
            echo  "<option value=".$currency[$i].">".$currency[$i]."</option>";
            }
            if ($key == 'USD'){
              echo "<option value=".$currency[$i]." selected>".$currency[$i]."</option>";
              //continue;
            }
            //echo '1 EUR = '.$rate[$i].' '.$currency[$i]; 
            //echo '<br>';
            $i=$i+1;
            
          }
        ?>
      </select>
    </div>
    <div class="col">
      <select name="targetCurrency" id="targetCurrency" class="browser-default custom-select">
        <?php
          
          $i=0;
          
          foreach ($_SESSION['json']['rates'] as $key => $value) {
            $currency[$i]=$key;
            $rate[$i]=$value;
            if($key!== 'INR'){
              echo  "<option value=".$currency[$i].">".$currency[$i]."</option>";
              }
              if ($key == 'INR'){
                echo "<option value=".$currency[$i]." selected>".$currency[$i]."</option>";
                //continue;
              }
            //echo '1 EUR = '.$rate[$i].' '.$currency[$i]; 
            //echo '<br>';
            $i=$i+1;
            
          }
        ?>
      </select>
    </div>
</div>
  <br><br>
    <div class="text-center">
        <div class="form-actions">
            <button type="submit" class="btn btn-primary" style="margin-right:25px;" >Convert</button>
            <!-- <a class="btn btn-secondary" href="index.php">Back</a> -->
        </div>
    </div>
  </div>
</form> 
</div>

</body>
</html>