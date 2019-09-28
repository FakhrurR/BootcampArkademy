function validate_username(username){

  var valid = /^[a-zA-Z]{6,}$/ ;
  
  if(valid.test(username)){
  
    console.log(true);    
  
  }else{
    console.log(false);
  }

}

function validate_password(password){

  var valid = /^7(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*-]).{5,10}$/;
  
  if(valid.test(password)){
  
    console.log(true);    
  
  }else{

    console.log(false);
  }

}

validate_username("coba12");
validate_username("devina");
validate_password("p@ssW0rd9");
validate_password("7Ark@demi");