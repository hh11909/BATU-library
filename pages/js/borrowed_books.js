let borrowedBooks=document.getElementById("borrowed-books");
let searcBar=document.getElementById("search-input");
let getBorrowedBooks= async()=>{
  let res= await  fetch("http://localhost/Batu_library/api/Book/ReadStuBBooks.php",{
      method:"GET",
      header:{
        'Content-Type':'application/json'
      }
    });
  let row="";
  let data = await res.json();
  console.log(data);
  for(record of data["data"]){
    row+=`      <div class="col-lg-6 mb-3">
        <div class="card border rounded mx-auto">
          <div class="row g-0">
            <div class="col-lg-4 col-md-4 col-sm-4 col-4">
              <img src="${record["image"]}" class="img-fluid mx-auto d-block rounded"
                style="max-width: 150px; margin: 20px auto;" alt="Book Cover">
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-8">
              <div class="card-body p-2 align-items-center">
                
                
                <div class="mb-3 row align-items-center pt-sm-5 pt-3">
                  <label for="takenDate" class="col-sm-4 col-form-label">Taken Date:</label>
                  <div class="col-sm-8">
                    <p class="fs-5 fw-medium">${record["borrow_date"]}</p>
                  </div>
                </div>
                <div class="mb-1 row">
                  <label for="returnedDate" class="col-sm-4 col-form-label">Returned Date:</label>
                  <div class="col-sm-8">
                    <p class="fs-5 fw-medium">${record["return_date"]}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="text-center p-2 mb-2">
            ${record["name"]}
          </div>
        </div>
      </div>`;
  }
  borrowedBooks.innerHTML+=row;
}

getBorrowedBooks();
