function countChar(str, letter) 
{
 var letter_Count = 0;
 for (var position = 0; position < str.length; position++){
   
    if (str.charAt(position) == letter) {
        
      letter_Count += 1;
      
      }
  }
  if(letter_Count == 0){
    
  	letter_Count = "Not Found!";
    
  }
  return letter_Count;
}
console.log(countChar("arkademy", "a"));
console.log(countChar("javascript", "x"));