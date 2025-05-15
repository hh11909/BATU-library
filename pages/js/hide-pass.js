
function toggleIcon(password,icon1,icon2){
  if(password.type === 'password'){
    password.type = 'text';
    icon1.style.display = 'none';
    icon2.style.display = 'inline-block';
  }else{
    password.type = 'password';
    icon1.style.display = 'inline-block';
    icon2.style.display = 'none';
  }
}
  
