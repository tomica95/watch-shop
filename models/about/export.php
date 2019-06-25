<?php 
    include "../../config/connection.php";
    include "author_functions.php";
    $author = author_of_site();

   
    $word = new COM("word.application");
   
    $word->Visible = 0;

    $word->Documents->Add();

    $word->Selection->PageSetup->LeftMargin = '2';
    $word->Selection->PageSetup->RightMargin = '2';

    $word->Selection->Font->Name = 'Arial';
    $word->Selection->Font->Size = 10;

    $word->Selection->TypeText("$author->name_surname \n $author->description");
   
    $filename = tempnam(sys_get_temp_dir(), "word");
    $word->Documents[1]->SaveAs($filename);

    $word->quit();
    unset($word);
    header("Content-type: application/vnd.ms-word");
    header("Content-Disposition: attachment;Filename=Aboutauthor.doc");

    readfile($filename);
    unlink($filename);
?>