<?php
	require_once 'PrepareText.class.php'; 
	$result_doc1; $result_doc2;


	function read__and__preparation($doc1, $doc2, $type) {
        $fp = fopen("docs/".$doc1.".txt", "r"); 
        $pt = new PrepareText(fread($fp, filesize("docs/".$doc1.".txt")), $type);
        global $result_doc1;
       	$result_doc1 = $pt -> return__vector();
        fclose($fp);
        $fp = fopen("docs/".$doc2.".txt", "r"); 
        $pt = new PrepareText(fread($fp, filesize("docs/".$doc2.".txt")), $type);
        global $result_doc2;
       	$result_doc2 = $pt -> return__vector();
        fclose($fp);
	}

	function calculation($vector1, $vector2, $text) {
		$vector_calculations = array(0, 0, 0);
		for($i = 0; $i < count($vector1); $i++){
            $vector_calculations[0] += ($vector1[$i]*$vector2[$i]);
        }  
        for($i = 0; $i < count($vector1); $i++){
            $vector_calculations[1] += ($vector1[$i]*$vector1[$i]);
            $vector_calculations[2] += ($vector2[$i]*$vector2[$i]);
        }
        var_dump($text." = ".$vector_calculations[0] / (sqrt($vector_calculations[1]) * sqrt($vector_calculations[2])));   
	}

    //read__and__preparation("doc1", "doc6");
    //calculation($result_doc1,$result_doc2, "Similaridade ");

    for($i = 1; $i < 10; $i++) {
        for($y = 1; $y < 10; $y++) {
            if($y != $i) {
                read__and__preparation("doc".$i, "doc".$y, "frequencia");
                calculation($result_doc1,$result_doc2, "Frequencia - Similaridade entre arquivo Doc".$i." e Doc".$y);
                read__and__preparation("doc".$i, "doc".$y, "binary");
                calculation($result_doc1,$result_doc2, "Binary - Similaridade entre arquivo Doc".$i." e Doc".$y);
                echo "------------------------------------";
            }
        }
    }
?>