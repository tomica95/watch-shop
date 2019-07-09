<?php 

require_once "../../config/connection.php";
include "functions.php";

$id = $_POST['id'];

$product = getProductWithPictureById($id);

$excel = new COM("Excel.Application");

$excel->Visible = 1;

$excel->DisplayAlerts = 1;

$workbook = $excel->WorkBooks->Open("http://localhost/watch-shop/data/Product.xlsx") or die ('Could not be able to open filename');

$sheet = $workbook->Worksheets('Sheet1');
$sheet->activate;


//header of table
$field = $sheet->Range("A1");
$field->activate;
$field->value = "Id";

$field = $sheet->Range("B1");
$field->activate;
$field->value= "Product Name";

$field = $sheet->Range("C1");
$field->activate;
$field->value = "Code";

$field = $sheet->Range("D1");
$field->activate;
$field->value = "Description";

$field = $sheet->Range("E1");
$field->activate;
$field->value = "Price";

$field = $sheet->Range("F1");
$field->activate;
$field->value = "Category";

//about product

$field = $sheet->Range("A2");
$field->activate;
$field->value = "$product->id";

$field = $sheet->Range("B2");
$field->activate;
$field->value= "$product->productName";

$field = $sheet->Range("C2");
$field->activate;
$field->value = "$ $product->code";

$field = $sheet->Range("D2");
$field->activate;
$field->value = "$product->description";

$field = $sheet->Range("E2");
$field->activate;
$field->value = "$ $product->price";

$field = $sheet->Range("F2");
$field->activate;
$field->value = "$product->name";

// $workbook->_SaveAs("http://localhost/watch-shop/data/Product.xlsx", -4143);
// $workbook->Save();

// $workbook->Saved=true;
// $workbook->Close;

// $excel->Workbooks->Close();
// $excel->Quit();

// unset($sheet);
// unset($workbook);
// unset($excel);

header("Location:../../index.php?page=product&id=$product->product_id");



