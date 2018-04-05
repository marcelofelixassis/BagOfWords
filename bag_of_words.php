<?php
	require_once 'PrepareText.class.php'; 
	$remove_words = array("e","ou","o","a","os","as","ao","aos","do","da","dos","das","no","na","nos","nas","pelo","pela","pelos","pelas","um","uma","uns","umas","dum","duma","duns","dumas","num","numa","nuns","numas", "a","ante","apos","ate","com","conforme","contra","consoante","de","desde","durante","em","excepto","entre","mediante","para","perante","por","salvo","sem","segundo","sob","sobre","tras");
	$words = array("galo","doido","cabeca","quatro","fala","palavras","aluno","rumo","braco","dois","pe","rei","roma","roeu","atletico","seis","ipatinga","jota","menisco","frangas","tremeram","mineirao","bigode","proerd","camisa","quarto","quadro");
	
	
	read("docA", "docB");

	function read($doc1, $doc2) {
        $fp = fopen($doc1.".txt", "r"); 
        $pt = new PrepareText(fread($fp, filesize($doc1.".txt")));
        fclose($fp);
        $fp = fopen($doc2.".txt", "r"); 
        $pt = new PrepareText(fread($fp, filesize($doc2.".txt")));
        fclose($fp);
	}
?>