<?php
	
	require("fpdf.php");
	class PDF extends FPDF
	{
		
		function Header()
		{
			
			$bill = isset($_POST['bill_no']) ? $_POST['bill_no'] : "00";
			$total = isset($_POST['total']) ? $_POST['total'] : "00";
			$date = isset($_POST['date']) ? $_POST['date'] : "No Date";
			$cus = isset($_POST['c_nm']) ? $_POST['c_nm'] : "No Name";
			$customer_add = isset($_POST['c_addr']) ? $_POST['c_addr'] : "No Addr";
			
			$this->Rect( 5, 10,200,275);
		    
			$this->Image('logo.png',7,15,30,0);
			$this->SetFont('Arial','B',40);
			$this->Cell(210,30,'Ronak Ayurvedic Store',0,0,'C');
			$this->Ln(0);
			$this->SetFont('Arial','',15);
			$this->SetTextColor(255,0,0);
			$this->Cell(350,10,'8000828322',0,1,'C');
			$this->Ln(8);
			$this->SetFont('Arial','B',12);
			$this->SetTextColor(255,0,0);
			$this->Cell(210,13,'Ayurvedic Medicin ,Harbal And Cosmetic Retailer & Wholesales Merchant',0,0,'C');
			$this->Ln(10);
			$this->SetFont('Arial','',14);
			$this->SetTextColor(0,0,0);
			$this->Cell(194,8,'Shop No-1, Opp.Sakkarbag, Near Hotel Essel Park, Rajkot Road, Junagadh-362037',0,0,'C');
			$this->Ln(5);
			$this->SetFont('Arial','B',14);
			$this->SetTextColor(255,0,0);
			$this->Cell(194,10,'ronakayurvedic.com',0,0,'C');
			$this->Ln(0);	    
			$this->SetFont('Arial','',12);
			//line
		    $this->Line(5,53,205,53);
			//name
			$this->Cell(10,30,'Mr/Mrs. :',0,0,'C');	    
			//name line 1
		    $this->Line(120,61,25,61);
		    //name line 2
	        $this->Line(120,70,7,70);
	        //date line
	        $this->Line(125, 53, 125, 77);
			//date
			$this->Ln(0);	    
			$this->SetFont('Arial','',12);
			$this->Cell(250,29,'Date :',0,0,'C');
			//date line
			$this->Line(200,60,143,60);
			//date ni nicheni line
			$this->Line(205,64,125,64);
			//Bill no 
			$this->Ln(1);	    
			$this->SetFont('Arial','',12);
			$this->Cell(253,50,'Bill No :',0,0,'C');
			//bill no line
			$this->Line(200,73,144,73);
			//bill nicheni moti line
			$this->Line(5,77,205,77);
			//row line
			$this->Line(5,85,205,85);
			//colmun lines 1
			$this->Line(15, 77, 15, 260);			
			//colmun lines 2
			$this->Line(80, 77, 80, 260);
			//colmun lines 3
			$this->Line(100, 77, 100, 260);
			//column lines 4
			$this->Line(120, 77, 120, 260);
			//column lines 5
			$this->Line(140, 77, 140, 260);
			//column lines 6
			$this->Line(170, 77, 170, 260);
			//data all box 
			$this->Ln(0);	    
			$this->SetFont('Arial','',12);
			$this->Cell(1,74,'No.',0,0,'C');
			//2
			$this->Ln(0);	    
			$this->SetFont('Arial','',12);
			$this->Cell(45,74,'Product Name',0,0,'C');
			//3
			$this->Ln(0);	    
			$this->SetFont('Arial','',12);
			$this->Cell(161,75,'Batch No.',0,0,'C');
			//4
			$this->Ln(0);	    
			$this->SetFont('Arial','',12);
			$this->Cell(190,75,'Qty',0,0,'C');
			//5
			$this->Ln(0);	    
			$this->SetFont('Arial','',12);
			$this->Cell(233,75,'MRP',0,0,'C');
			//6
			$this->Ln(0);	    
			$this->SetFont('Arial','',12);
			$this->Cell(287,75,'Discount(%)',0,0,'C');
			//7
			$this->Ln(0);	    
			$this->SetFont('Arial','',12);
			$this->Cell(340,75,'Amount',0,0,'C');

//
			$i = 15;
			foreach(json_decode($_POST['datas'], true) as $data){
    			$this->Ln(0);	    
    			$this->SetFont('Arial','',12);
    			$this->Cell(1, 74+$i, $data[0], 0, 0, 'C');
    			//2
    			$this->Ln(0);	    
    			$this->SetFont('Arial','',12);
    			$this->Cell(45, 74+$i, $data[1], 0, 0, 'C');
    			//3
    			$this->Ln(0);	    
    			$this->SetFont('Arial','',12);
    			$this->Cell(161, 75+$i, $data[2], 0, 0, 'C');
    			//4
    			$this->Ln(0);	    
    			$this->SetFont('Arial','',12);
    			$this->Cell(190, 75+$i, $data[3], 0, 0, 'C');
    			//5
    			$this->Ln(0);	    
    			$this->SetFont('Arial','',12);
    			$this->Cell(235, 75+$i, $data[4], 0, 0, 'C');
    			//6
    			$this->Ln(0);	    
    			$this->SetFont('Arial','',12);
    			$this->Cell(287, 75+$i, $data[5], 0, 0, 'C');
    			//7
    			$this->Ln(0);	    
    			$this->SetFont('Arial','',12);
    			$this->Cell(340, 75+$i, $data[6], 0, 0, 'C');
			$i += 15;
			}
//

			//line
		    $this->Line(5,260,205,260);
		    //line
		    $this->Line(205,252,140,252);
		    //total
		    $this->Ln(0);	    
			$this->SetFont('Arial','',12);
			$this->Cell(287,425,'Total :   ',0,0,'C');
		    $this->Ln(0);	    
			$this->SetFont('Arial','',12);
			$this->Cell(340, 425, "{$total}",0,0,'C');

			//term and condition
			$this->SetTextColor(20,150,50);
			$this->Ln(0);	    
			$this->SetFont('Arial','B',11);
			$this->Cell(25,440,'Term & Condition',0,0,'C');
			//1
			$this->Ln(0);
			$this->SetFont('Arial','',10);
			$this->SetTextColor(255,0,0);
			$this->Cell(110,450,'1 - Interest 18% p.a will be charged if payment is not made within due date.',0,0,'C');
			//2
			$this->Ln(0);
			$this->SetFont('Arial','',10);
			$this->SetTextColor(255,0,0);
			$this->Cell(118,460,'2 - Our risk and responsibility ceases as soon as the goods leave our premises.',0,0,'C');
			//3
			$this->Ln(0);
			$this->SetFont('Arial','',10);
			$this->SetTextColor(255,0,0);
			$this->Cell(71,470,'3 - Subject to junagadh jurisdiction only .E & O.E.',0,0,'C');
			//fro ronak
			$this->Ln(0);
			$this->SetFont('Arial','B',15);
			$this->SetTextColor(255,0,0);
			$this->Cell(310,440,'For,Ronak Ayurvedic Store',0,0,'C');

			$this->Image('orignal.png',160,267,21,0);

			//customer name
			$this->Ln(0);
			$this->SetFont('Arial','B',11);
			$this->SetTextColor(255,0,0);
			$this->Cell(100,28, "{$cus}",0,0,'C');
			//date 
			$this->Ln(0);
			$this->SetFont('Arial','B',12);
			$this->SetTextColor(255,0,0);
			$this->Cell(285,27,"{$date}",0,0,'C');			
			//bill no
			$this->Ln(0);
			$this->SetFont('Arial','B',12);
			$this->SetTextColor(255,0,0);
			$this->Cell(292,50,"{$bill}",0,0,'C');			
			//array
			// $datas;
			// $data = array("1", "Nirma", "Soap", "NS13", "2", "200", "10%", "360"); 
			// $datas[] = $data;
			// $data = array("1", "Nirma", "Soap", "NS13", "2", "200", "10%", "360"); 
			// $datas[] = $data;
			// $data = array("1", "Nirma", "Soap", "NS13", "2", "200", "10%", "360"); 
			// $datas[] = $data;
			// foreach($datas as $data){
			// 	foreach($data as $item){
			//      	echo $item."&nbsp;&nbsp;&nbsp;&nbsp;";
			//      }
			//      echo "<br/>";
			// }

		}
	}
		$pdf=new PDF('P','mm','A4');
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->Output();	
?>