
let totalStudents = document.getElementById("total-students");
let totalFriends = document.getElementById("total-friends");
let stuTable = document.getElementById("stu-table");
let stuSelectSearch = document.getElementById("select-read");
let stuSearch = document.getElementById("search-students");
let getStudentsData = async (x) => {
  let api="../../api/student/read.php?".concat(x);
  console.log(api);
  let res = await fetch(api, {
    method: 'GET',
    header: {
      'Content-Type': 'application/json'
    },
  });
  let data = await res.json();
  console.log(data);
  let totalCount = (data["data"]&&data["data"]["total-count"])?data["data"]["total-count"]:0;
  let totalFriend = (data["data"]&&data["data"]["total-friends"])?data["data"]["total-friends"]:0;
  let stuData = data["data"];
  let stuRows = "";
  totalStudents.innerHTML = totalCount;
  totalFriends.innerHTML = totalFriend;
  for (let i = 0; i < data["count"]; i++) {
    stuRows += `<tr>
                  <td>${stuData[i]["academy_number"]}</td>
                  <td>${stuData[i]["name"]}</td>
                  <td>${stuData[i]["email"]}</td>
                  <td>${stuData[i]["phone"]}</td>
                  <td>${(stuData[i]["is_friend"] == 1) ? "Yes" : "No"}</td>
                  <td class="text-center">${stuData[i]["department_name"]}</td>
                  <td class="text-center">${stuData[i]["academic_year"]}</td>
                  <td>
                    <button class="btn btn-sm btn-danger" id="student-${stuData[i]["student_ID"]}"><i class="fa-solid fa-trash"></i></i></button>
                  </td>
                </tr>`;
  }
  stuTable.innerHTML = stuRows;
  for (let i = 0; i < data["count"]; i++) {
    handleDelBtn(stuData[i]["student_ID"]);
  }

}
let handleDelBtn = (id) => {
  let btn = document.getElementById("student-".concat(id));
  btn.addEventListener("click", async () => {
      try{let res=await fetch("../../api/student/delete.php?student_ID=".concat(id), {
        method: 'DELETE',
        headers: {
          'Content-Type': 'application/json'
        }
      });
      let data= await res.json();
      console.log(data);
      getStudentsData();
    }
    catch(err){
      console.log("");
    }
  });
}
getStudentsData("");
stuSearch.addEventListener("input",()=>{
  let key=stuSelectSearch.value;
  switch(key){
    case "2" : key="academy_number=";
    break; 
    case "3" :key="name=";
    break;
    case "4" :key="phone=";
    break;
  }
  if(key!="1"){
    let query=key.concat(stuSearch.value);
    console.log(query);
    getStudentsData(query);
  }
  else{
    getStudentsData();
  }
  
});
