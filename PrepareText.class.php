<?php
	Class PrepareText {
		var $txt_prep;
		var $type;
		var $words = array("galo","doido","cabeca","quatro","fala","palavras","aluno","rumo","braco","dois","pe","rei","roma","roeu","atletico","seis","ipatinga","jota","menisco","frangas","tremeram","mineirao","bigode","proerd","camisa","quarto","quadro");
		var $remove_words = array("e","ou","o","a","os","as","ao","aos","do","da","dos","das","no","na","nos","nas","pelo","pela","pelos","pelas","um","uma","uns","umas","dum","duma","duns","dumas","num","numa","nuns","numas", "a","ante","apos","ate","com","conforme","contra","consoante","de","desde","durante","em","excepto","entre","mediante","para","perante","por","salvo","sem","segundo","sob","sobre","tras");
		var $result = array();

		function __construct($text, $type){
			$this -> txt_prep = $text;
			$this -> type = $type;
			$this -> all__preparations();
		}

		function all__preparations() {
			$this -> txt_prep = explode(' ', $this -> txt_prep);
			$this -> txt_prep = array_diff($this -> txt_prep, $this -> remove_words);
			if($this -> type == "binary") {
				$this -> txt_prep = array_unique($this -> txt_prep);
				sort($this -> txt_prep);
				$this -> txt_prep = implode(' ', $this -> txt_prep);
				for($i = 0; $i < count($this -> words); $i++){
		            $this -> result[$i] = substr_count($this -> txt_prep, $this -> words[$i]);
	         	}
			}else {
				$this -> txt_prep = implode(' ', $this -> txt_prep);
				for($i = 0; $i < count($this -> words); $i++){
		            $this -> result[$i] = substr_count($this -> txt_prep, $this -> words[$i]);
	         	}
			}
		} 
			
		function return__vector() {
			return $this -> result;
		}
	}
?>