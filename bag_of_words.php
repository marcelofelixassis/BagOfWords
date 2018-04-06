<?php
	require_once 'PrepareText.class.php'; 
	$result_doc1; $result_doc2;	

	function read__and__preparation($doc1, $doc2) {
        $fp = fopen($doc1.".txt", "r"); 
        $pt = new PrepareText(fread($fp, filesize($doc1.".txt")));
        global $result_doc1;
       	$result_doc1 = $pt -> return__vector();
        fclose($fp);
        $fp = fopen($doc2.".txt", "r"); 
        $pt = new PrepareText(fread($fp, filesize($doc2.".txt")));
        global $result_doc2;
       	$result_doc2 = $pt -> return__vector();
        fclose($fp);
	}

	function calculation($vector1, $vector2) {
		$vector_calculations = array(0, 0, 0);
		for($i = 0; $i < count($vector1); $i++){
            $vector_calculations[0] += ($vector1[$i]*$vector2[$i]);
        }  
        for($i = 0; $i < count($vector1); $i++){
            $vector_calculations[1] += ($vector1[$i]*$vector1[$i]);
            $vector_calculations[2] += ($vector2[$i]*$vector2[$i]);
        }
        if((sqrt($vector_calculations[1]) * sqrt($vector_calculations[2])) == 0) {
        	var_dump("Resultado = 0");
        }else{
        	var_dump("Resultado = ".$vector_calculations[0] / (sqrt($vector_calculations[1]) * sqrt($vector_calculations[2])));
        }
	}
	
	read__and__preparation("docA", "docB");
	var_dump($result_doc1);
	var_dump($result_doc2);
	calculation($result_doc1,$result_doc2);
?>