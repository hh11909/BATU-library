const params = new URLSearchParams(window.location.search);

  let loginHandle=(time)=>{

   new Promise((resolve,reject)=>{
      if(params.get("err")=="emptyEmail"){
        document.querySelector("#email-error").innerHTML="Enter your email!";
        setTimeout(()=>{
          document.querySelector("#email-error").innerHTML="";
          resolve();
        }
        ,time);
      }
      else if(params.get("err")=="notRegistered"){
        document.querySelector("#email-error").innerHTML="you are not Registered!";
        setTimeout(()=>{
          document.querySelector("#email-error").innerHTML="";
          resolve();
        }
        ,time);
      }
      else if(params.get("err")=="emptyPass"){
        document.querySelector("#pass-error").innerHTML="Enter your password!";
        setTimeout(()=>{
          document.querySelector("#pass-error").innerHTML="";
          resolve();
        }
        ,time);
      }
      else{
        reject();
      }
    })};
    async function p() {
      try{
        await loginHandle(3000);
      }
      catch(err){
        
      }
      
    }

    p();

  
  
  // document.getElementById("email-error").innerHTML="Enter invalid email!";
  

  

