<?php  
namespace PDF;
use FPDF\FPDF;
class PDF extends FPDF {
    protected $col = 0;
    protected $y0; 

    function Header() {
        $this->Image('assets/storage/system/home.png',70,6,17);
        $this->SetFont('courier','B',15);
        $this->Cell(15);
        $this->Cell(0,10,'CJCE AUTOPARTS',0,0,'C'); 
        $this->SetCol(2);
        $this->SetCol(0);
    }

    function SetCol($col) {
        $this->col = $col;
        $x = 10+$col*65;
        $this->SetLeftMargin($x);
        $this->SetX($x);
    }

    function purchase($header, $data) { 
        $w = array(50,50,50); 
        $this->SetFont('courier','B',10);
        for($i=0;$i<count($header);$i++)
            $this->Cell($w[$i],7,$header[$i],0,0,'C');
        $this->Ln();
        $this->Cell(array_sum($w),0,'','T');
        $this->Ln();  
        $this->SetFont('courier','',8);
        foreach($data as $row) {
            $price = str_replace([',', '₱'], '', $row['price']);
            $this->Cell($w[0],6,$row['product'],0,0,'LR');
            $this->Cell($w[1],6,'1',0,0,'C');
            $this->Cell($w[2],6,'Php '.number_format((int)$price,2),0,0,'R'); 
            $this->Ln();
        } 
        $this->Cell(array_sum($w),0,'','T');
    }

    public function receipt() {  
        $header = array('Product', 'Quantity', 'Price'); 
        $this->SetFont('Arial','',14);
        $this->AddPage();
        $this->Ln(20);
        $this->SetLeftMargin((210 - 153) / 2);
        $this->SetRightMargin((210 - 153) / 2);
        $this->SetFont('courier','B',12);
        $this->Cell(50,7,'Customer',0,0,'C');
        $this->Cell(50,7,'Vehicle',0,0,'C');
        $this->Cell(50,7,'Schedule',0,0,'C');
        $this->Ln(); 
        $this->Cell(150,0,'','T'); 
        $this->Ln();
        $this->SetFont('courier','',8);
        $this->Cell(50,6,"Name: {$_SESSION['book_name']}",0,0,'LR');
        $this->Cell(50,6,"Brand: {$_SESSION['book_brand']}",0,0,'LR');
        $this->Cell(50,6,date('F, d, Y', strtotime($_SESSION['book_schedule_date'])),0,0,'C');
        $this->Ln(); 
        $this->Cell(50,6,"Email: {$_SESSION['book_email']}",0,0,'LR');
        $this->Cell(50,6,"Model {$_SESSION['book_model']}",0,0,'LR');
        $this->Cell(50,6,$_SESSION['book_service_time'],0,0,'C');
        $this->Ln();  
        $this->Cell(50,6,"Contact no.: {$_SESSION['book_phone']}",0,0,'LR');
        $this->Cell(50,6," ",0,0,'LR');
        $this->Cell(50,6,"",0,0,'LR');  
        $this->Ln(); 
        $this->Cell(150,0,'','T'); 
        $this->Ln(10);
        $total = str_replace([',', '₱'], '', $_SESSION['book_total']);
        $this->purchase($header,$_SESSION['book_data']);
        $this->Ln();  
        $this->SetFont('courier','B',10);
        $this->Cell(50,6,"TOTAL",0,0,'LR');
        $this->SetFont('courier','B',10);
        $this->Cell(50,6,$_SESSION['book_total_items'],0,0,'C');
        $this->Cell(50,6,"Php ". number_format((int)$total,2),0,0,'C');  
        $this->Output();
    }
}   