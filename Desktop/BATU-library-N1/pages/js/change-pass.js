 const form = document.getElementById('chpass');
    const oldPass = document.getElementById('current-password');
    const alertOldPass=document.getElementById('alert-current-pass');
    const newPass = document.getElementById('new-password');
    const alertNewPass=document.getElementById('alert-new-pass');
    const confirmPass = document.getElementById('confirm-password');
    const alertConfPass=document.getElementById('alert-confirm-pass');
    newPass.addEventListener('input', ()=>{
      if(newPass.value!==confirmPass.value && newPass.value!=""){
        alertConfPass.innerHTML="<span style='color:red'> new and confirm passwords have to be the same!</span>";
        alertNewPass.innerHTML="<span style='color:red'> new and confirm passwords have to be the same!</span>";
      }
      else if(newPass.value==""){
        alertConfPass.innerHTML="";
        alertNewPass.innerHTML="";
      }
      else{
        alertConfPass.innerHTML="<span style='color:green'>new and confirm passwords are same!</span>";
        alertNewPass.innerHTML="<span style='color:green'>new and  pconfirm passwords are same!</span>";
      }
    }
    );
    confirmPass.addEventListener('input', ()=>{
      if(newPass.value!==confirmPass.value&&newPass.value!=""){
        alertConfPass.innerHTML="<span style='color:red'> new and confirm passwords have to be the same!</span>";
        alertNewPass.innerHTML="<span style='color:red'> new and confirm passwords have to be the same!</span>";
      }
      else if(newPass.value==""){
        alertConfPass.innerHTML="";
        alertNewPass.innerHTML="";
      }
      else{
        alertConfPass.innerHTML="<span style='color:green'>new and old passwords are same!</span>";
        alertNewPass.innerHTML="<span style='color:green'>new and old passwords are same!</span>";
      }
    });

    form.addEventListener('submit', async event => {
      event.preventDefault();
        if(newPass.value!==confirmPass.value){
          console.log("new and confirm passwords are not the same!");
          return; 
        }
        else{
          const formData = new FormData();
          formData.append('cup', oldPass.value);
          formData.append('np', newPass.value);
          formData.append('cop', confirmPass.value);
          const searchParams=new URLSearchParams(formData);
          try {
            const res = await fetch(
              'http://localhost/Batu%20library/api/student/password/update.php',
              {
                method: 'PUT',
                body: JSON.stringify(Object.fromEntries(searchParams)),
              },
            );

            const resData = await res.json();

            alertOldPass.innerHTML="<span style='color:red;'>"+resData["Message"]+"</span>";
          } catch (err) {
            console.log(err.message);
          }

        }
      }
    );