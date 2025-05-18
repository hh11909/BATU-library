const profileInput = document.getElementById('profileInput');
const profileDisplay=document.getElementById("profileImageDisplay");
const bannerInput = document.getElementById('bannerInput');
const bannerDisplay=document.getElementById("BigImageDisplay");

profileInput.addEventListener("change",async()=>{
  const file = profileInput.files[0];
  const formData = new FormData();
  formData.append('profileImage', file);
  try{
    const res = await fetch('../api/student/profile/update.php',{
      method:'POST',
      body:formData,
      headers: {     
        'Accept': 'application/json'
      }
    })
    const data = await res.json();
    console.log(data);
    
     profileDisplay.src = data["data"];
  }
  catch (error) {
    console.log("Error uploading image:", error);
    alert("An error occurred while uploading the image.");
  }
});


bannerInput.addEventListener("change",async()=>{
  const file = bannerInput.files[0];
  const formData = new FormData();
  formData.append('bannerImage', file);
  try{
    const res = await fetch('../api/student/banner/update.php',{
      method:'PUT',
      body:formData,
      headers: {     
        'Accept': 'application/json'
      }
    })
    const data = await res.json();
    console.log(data);
    
     bannerDisplay.src = data["data"];
  }
  catch (error) {
    console.log("Error uploading image:", error);
    alert("An error occurred while uploading the image.");
  }
});