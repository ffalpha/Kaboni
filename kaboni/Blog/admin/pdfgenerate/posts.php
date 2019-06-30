<?php 

require('./fpdf.php');
include "NotORM.php";

$pdo=new PDO("mysql:host=localhost;dbname=kaboni","root","");
$db=new NotORM($pdo);
$data=$db->posts();

class PDF extends FPDF{


    function Header(){
        global $title;
        $w = $this->GetStringWidth($title)+6;
        $this->SetX((210-$w)/2);
        $this->Image('logo.png',10,6,30);
        $this->SetFont('Arial','B',15);
        $this->SetLineWidth(1);
        $this->Cell($w,10,$title,0,0,'C');
        $this->Ln(20);
    }
    function Chapter($num,$label){
        $this->SetFont('Arial','',12);
        $this->SetFillColor(200,255,255);
        $this->Cell(0,6,"Chapter $num : $label",0,1,'L',true);
        $this->Ln(4);
    }
    function MyBody($type,$data){
        if($type=='database'){
            $image1 = "./4.jpg";
            $this->SetFont('Arial','B',12);
            $this->Cell(20,7,'Post Id ',1,0,'C');
            $this->Cell(40,7,'Post tile',1,0,'C');
            $this->Cell(30,7,'Post Author',1,0,'C');
            $this->Cell(30,7,'Post Date',1,0,'C');
            $this->Cell(30,7,'Post tag',1,0,'C');
            $this->Cell(30,7,'Post Status',1,0,'C');
            $this->Ln();
            $this->SetFont('Arial','B',10);
            foreach($data as $row){
                $this->Cell(20,7,$row['pid'],1,0,'C');
                $this->Cell(40,7,$row['ptitle'],1,0,'C');
                $this->Cell(30,7,$row['pauthor'],1,0,'C');
                $this->Cell(30,7,$row['pdate'],1,0,'C');
                $this->Cell(30,7,$row['ptag'],1,0,'C');
                $this->Cell(30,7,$row['pstatus'],1,0,'C');
                $this->Ln();
            }

        }else{
            for($i=1;$i<=40;$i++)
                $pdf->Cell(0,10,'Printing line number '.$i,0,1);
        }

    }
    function Layout($num, $label, $type,$data){
        $this->AddPage();
        $this->Chapter($num,$label);
        $this->MyBody($type,$data);
    }

    function footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
    }
}
$pdf = new PDF();
$title = 'Post Details';
$pdf->SetTitle($title);
$pdf->SetAuthor('Jules Verne');
$pdf->SetFont('Arial','',14);
$pdf->Layout(4,'Post Details of Kaboni','database',$data);
$pdf->Output();


?>