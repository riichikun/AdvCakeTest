<?php

namespace Script;

mb_internal_encoding('UTF-8');



class StringMethod {
	static protected function reverseWord(string $word): string {
		$rev = '';
		$wordArray = preg_split("//u", $word, -1, PREG_SPLIT_NO_EMPTY); 
	    $length = count($wordArray); 		  
	    foreach($wordArray as $key => $letter) {
	    	if($letter === mb_strtolower($letter)) {	
				$rev .= mb_strtolower($wordArray[$length-1-$key], 'UTF-8');
	        }
	        else {
	        	$rev .= mb_strtoupper($wordArray[$length-1-$key], 'UTF-8');
	        }
	    }
        return $rev;		
	}
	
    static public function method(string $input): string {
		if($input !== '') {
			$words = preg_split("/[\d\._\-\/\*\(\)!?%$]/", $input, -1, PREG_SPLIT_NO_EMPTY);
			$symbols = preg_split("/[^\d\._\-\/\*\(\)!?%$]/", $input, -1, PREG_SPLIT_NO_EMPTY);
			$result = '';
			$l1 = count($words);
			$l2 = count($symbols); 
			$firstSymbol = preg_match("/[\d\._\-\/\*\(\)]/", $input[0][0]);			
			for($j=0; $j<max($l1, $l2); $j++) {
				$addWord = '';
				if(isset($words[$j])) {				
					$addWord = self::reverseWord($words[$j]);

				}
				$addSymbols = '';
				if(isset($symbols[$j])) {
					$addSymbols = $symbols[$j];           	
				}     
				if(!$firstSymbol) {
					$result .= $addWord . $addSymbols;
				}
				else {
					$result .= $addSymbols . $addWord;	
				}
			}			
		}
		else $result = $input;
        return $result;
    }
    
}
