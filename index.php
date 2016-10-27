<?php
	session_start(); 
	if (!isset( $_SESSION['count'])) 
	$_SESSION['count'] = 0;
?>

<!--==============================--><html><!--==============================-->
<!--==============================--><head><!--==============================-->
<!--=========================================================================-->
	<title> Witam panstwa </title>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8">	
</head>
<!--==============================--><body><!--==============================-->
<!--=========================================================================-->


		<!--============================->BUTTON<!-===========================-->
		<!--==================================================================-->
	<table style="height:100%; width: 100%;">
		<tr style="padding 0px;">
			<th style="width:50%;   padding:0; margin:0;">
				<form method="post" style="float:left; height:100%; width: 100%; padding:0px;">
					<input type="submit" name="count" 
						   value="Witam Panstwa"
						   style="height:100%; width: 100%;font-size:3vw;" />
				</form>
			</th>
			<th style="width:50%;   padding:0; margin:0;">
				<form method="post" style="float:left; height:100%; width: 100%;  padding:0; ">
					<input type="submit" name="n" 
						   value="Nie witam"
						   style="height:100%; width: 100%;font-size:3vw;"	/>
				</form>
			</th>
		</tr>
		<tr>	
			<th style="width:50%;   padding:0; margin:0;">
				<form method="post" style="float:left; height:100%; width: 100%;  margin-top: -1%; " >
					<input type="submit" name="zeruj" 
						   value="Wyzeruj wynik" 
						   style="height:100%; width: 100%;font-size:3vw;"/>
				</form>
			</th>			
			<th style="width:25%;   padding:0; margin:0;">
				<form method="post" style="float:left; height:100%; width: 50%;  margin-top: -1%; " >
					<input type="submit" name="wyslij" 
						   value="Wyslij do bazy" 
						   style="height:100%; width: 100%;font-size:3vw;"/>
				</form>
				<form method="post" style="float:left; height:100%; width: 50%;  margin-top: -1%; " >
					<input type="submit" name="odb"
						   value="Zobacz wyniki" 
						   style="height:100%; width: 100%;font-size:3vw;"/>
				</form>
			</th>
		</tr>	
	</table>	

	<div style="width:10%; height:auto; position:absolute;
			background:black;  color:white; font-size:3vw; text-align:center; 
			margin-top:-40%; margin-left:20px;  ">
			
		<?php echo $_SESSION['count'] ?>
	</div>	
			
		<!--============================->PHPFNC<!-===========================-->
		<!--==================================================================-->			
			
			
 <?php
    
	//===========================================DODAJ_+1
    if(isset($_POST['count'])){
     
            $count = $_SESSION['count'] + 1;
            $_SESSION['count'] = $count;
			header("Location:index.php");
    }
	//===========================================ODEJMIJ_-1   
    if(isset($_POST['n'])){
			if($_SESSION['count'] > 0){
            $count = $_SESSION['count'] - 1;
            $_SESSION['count'] = $count; }
			header("Location:index.php");
    }
	//===========================================ZERUJ_=0  
	if(isset($_POST['zeruj'])){
                  
           $_SESSION['count'] = 0;
		header("Location:index.php");

    }
	//===========================================WYSLIJ>>DB   
	
	if(isset($_POST['wyslij'])){
		
		$conn =  mysqli_connect('localhost', 'root', '', 'witam');
			if (!$conn) die('Not connected : ' . mysql_error());
			
			$sql = "select kiedy from wyniki where kiedy = CURRENT_DATE ";
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
				$sql = "UPDATE wyniki SET ilosc='".$_SESSION['count']."' where kiedy=CURRENT_DATE ";
				
				if (mysqli_query($conn, $sql)) {} 
				else echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			
			}else {
				$sql = "INSERT INTO wyniki (kiedy, ilosc) VALUES (CURRENT_DATE,'".$_SESSION['count']."')";

				if (mysqli_query($conn, $sql)) {} 
				else echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}

		mysqli_close($conn);

	
	header("Location:index.php"); }
	//===========================================POBIERZ<<db  

	
 ?>	




	
</body>
</html>