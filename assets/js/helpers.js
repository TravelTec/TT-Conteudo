/* HELPERS */
	function findArrayInArrayContent(array1, array2) { 
	    // Loop for array1 
	    for(let i = 0; i < array1.length; i++) { 
	        // Loop for array2 
	        for(let j = 0; j < array2.length; j++) { 
	            // Compare the element of each and 
	            // every element from both of the 
	            // arrays 
	            if(array1[i] === array2[j]) {  
	                // Return if common element found 
	                return true; 
	            } 
	        } 
	    } 
	    // Return if no common element exist 
	    return false; 
	} 

	function array_values (input) { // eslint-disable-line camelcase
	  //  discuss at: https://locutus.io/php/array_values/
	  // original by: Kevin van Zonneveld (https://kvz.io)
	  // improved by: Brett Zamir (https://brett-zamir.me)
	  //   example 1: array_values( {firstname: 'Kevin', surname: 'van Zonneveld'} )
	  //   returns 1: [ 'Kevin', 'van Zonneveld' ]
	  	const tmpArr = [];
	  	let key = '';
	  	for (key in input) {
	    	tmpArr[tmpArr.length] = input[key]
	  	}
	  	return tmpArr;
	}

	function replaceSpecialCharsContent(str) { 
	    str = str.replace(/[ÀÁÂÃÄÅ]/, "A"); 
	    str = str.replace(/[àáâãäå]/, "a"); 
	    str = str.replace(/[ÈÉÊË]/, "E"); 
	    str = str.replace(/[ÍÌ]/, "I"); 
	    str = str.replace(/[íì]/, "i"); 
	    str = str.replace(/[ÒÓÔÕ]/, "O"); 
	    str = str.replace(/[òóôõ]/, "o"); 
	    str = str.replace(/[Ú]/, "U"); 
	    str = str.replace(/[ú]/, "u"); 
	    str = str.replace(/[Ç]/, "C"); 
	    str = str.replace(/[ç]/, "c");  

	    return str; 
	} 

	function checkEmailAddress(emailAddress) { 

	    var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);   
	    return pattern.test(emailAddress); 

	}
/* HELPERS */ 