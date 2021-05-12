<html>
<head>
   <title>Tax Calculation</title>
   <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
   <style>
     html, body {
     min-height: 100%;
     }
		 .testbox {
     display: flex;
     justify-content: center;
     align-items: center;
     height: inherit;
     padding: 20px;
     }
     form {
     width: 100%;
     padding: 20px;
     border-radius: 6px;
     background: #fff;
     box-shadow: 0 0 20px 0 #095484;
     }
     input {
     width: calc(100% - 10px);
     padding: 5px;
     }

     .item:hover p, .item:hover i, .question:hover p, .question label:hover, input:hover::placeholder, a {
     color: #095484;
     }
     .item input:hover, .item select:hover, .item textarea:hover {
     border: 1px solid transparent;
     box-shadow: 0 0 6px 0 #095484;
     color: #095484;
     }
     .item {
     position: relative;
     margin: 10px 0;
     }
     input[type="date"]::-webkit-inner-spin-button {
     display: none;
     }

     .item i {
     right: 2%;
     top: 30px;
     z-index: 1;
     }
     .btn-block {
     margin-top: 10px;
     text-align: center;
     }
     button {
     width: 150px;
     padding: 10px;
     border: none;
     border-radius: 5px;
     background: #095484;
     font-size: 16px;
     color: #fff;
     cursor: pointer;
     }
     button:hover {
     background: #0666a3;
     }

   </style>
 </head>
	<body >
		<div class="testbox">
		<form method="post" >
			<div class="item">
			 <p >Enter the Gross Income :</p>
			 <input type="number" name="grossValue" /><br><br>
		 </div>


			<input  type="submit" name="submit" value="Submit">
		</form>
	</div>
	<?php
	trait TaxA {
	  public function A($grossIncome) {
			$cTax=($grossIncome-300000)/10;
			$aTax=(150000*2.5)/100;
			$taxAmount=$aTax+$cTax;
			return ($taxAmount);
	  }
	}
	trait TaxB {
	  public function B($grossIncome) {
			return ((($grossIncome-800000)*25)/100);
	  }
	}
	trait TaxC {
	  public function C($grossIncome) {
			return ((($grossIncome-10000000)*30)/100);
	  }
	}
	class Tax {
	  public $grossIncome;
		// public $grossIncome;
		use TaxA,TaxB,TaxC;

		public function calculate($grossIncome) {
			if($grossIncome<=400000){
				return(0);
			}elseif($grossIncome<=800000){
				return($this->A($grossIncome));
			}elseif ($grossIncome<=10000000) {
				return($this->A(800000)+$this->B($grossIncome));
			}else {
					return($this->A(800000)+$this->B(10000000)+$this->C($grossIncome));
			}

		}

	  public function display($grossIncome) {
	    echo "Tax amount amount for $grossIncome : ".$this->calculate($grossIncome);
	  }
	}

	$Tax = new Tax;
	$grossValue = $_POST['grossValue'];
	$Tax->display($grossValue);

	?>
	</body>
</html>
