let exploreBooks = document.getElementById("books-container");
let searchBar = document.getElementById("search-input");


const filterAll = document.getElementById('all')
const filterAva = document.getElementById('ava')
const isBorrowed = document.getElementById('isBorrowed')

filterAll.addEventListener('click', () => {
	isBorrowed.value = '1'
	getAllBooks();
})
filterAva.addEventListener('click', () => {
	isBorrowed.value = '0'
	getAllBooks(true);
})


let getAllBooks = async (x = false) => {
	let api = `/api/Book/ReadAll.php${x ? `?is_borrowed=${isBorrowed.value}` : ""}`;
	let res = await fetch(api, {
		method: "GET",
		header: {
			'Content-Type': 'application/json'
		}
	});
	let row = `<div class="row">
		<div class="col">
			<h5 class="mb-1 ms-1 ms-sm-3 ms-md-4 ms-lg-1 ms-xl-2 fw-bold primary-color">Results Found: </h5>
		</div>
      </div > `;
	if (res.ok) {
		let data = await res.json();
		console.log(data)
		for (record of data["data"]) {
			row += `    <!--book -->
	<div class="col-lg-2 col-md-4 col-sm-6 col-6 mb-4">
		<div class="card h-100 border-0">
			<!-- data-bs-toggle="modal" data-bs-target="#bookModal${record["book_ID"]}" is newly added -->
			<img src="${record[" image"]}" class="card-img-top img-fluid mx-auto d-block border border-light" style="max-width: 150px; margin: 20px auto;" alt="Book Cover" data-bs-toggle="modal" data-bs-target="#bookModal${record["book_ID"]}">
			<!-- justify-content-between align-items-center is newly added -->
			<div class="d-flex pe-2 justify-content-between align-items-center">
				<!-- the span is a newly added line -->
				<span class="badge ms-2">to do!!!</span>
				<div class="ms-auto">
					<span>${record["total_likes"]}</span>
					<button class="btn btn-link" id="like-${record["book_ID"]}"><i class="fa-solid fa-heart"></i></button>
				<button class="btn btn-link ms-2"><i class="fa-solid fa-bookmark"></i></button>
			</div>
		</div>
		<div class="card-body p-2">
			<!-- data-bs-toggle="modal" data-bs-target="#bookModal${record["book_ID"]}" is newly added-->
			<h5 class="card-title" data-bs-toggle="modal" data-bs-target="#bookModal${record[" book_ID"]}">${record["name"]}</h5>
		<p class="card-text">${record["author"]}</p>
	</div>
        </div >
    </div >
    <!--Modal example for the books-->
	<div class="modal fade" id="bookModal${record[" book_ID"]}" tabindex = "-1" aria - labelledby="bookModalLabel${record["book_ID"]}" aria - hidden="true" >
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-body">
					<img src="${record[" image"]}" class="img-fluid rounded mx-auto d-block mt-4" style="max-width: 200px; margin-bottom: 20px;" alt="Book Cover">
					<h5 class="text-center mb-3">${record["name"]}</h5>
					<p class="text-center mb-2">${record["author"]}</p>
					<p class="text-center mb-3 primary-color fw-semibold">to do</p>
					<p class="text-justify">${record["description"]}</p>
				</div>
				<div class="modal-footer justify-content-center">
					<button type="button" class="btn btn-secondary-color px-4 py-2" data-bs-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
            </div > `;
		}
		exploreBooks.innerHTML = row;
		for (let record of data["data"]) {
			handlelike(record["book_ID"], record["likes"]);
		}
	}
	else {
		exploreBooks.innerHTML = `<div class="row">
	<div class="col">
		<h5 class="mb-1 ms-1 ms-sm-3 ms-md-4 ms-lg-1 ms-xl-2 fw-bold primary-color">Results Found: </h5>
	</div>
      </div > `;
	}
}

let handlelike = async (id, likes) => {
	let btn = document.getElementById("like-" + id);
	btn.addEventListener("click", async () => {
		let check = false;
		for (const like of likes) {
			console.log(like);
			if (like["book_ID"] == id) {
				check = true;

				break;
			}
		}

		try {
			if (check == false) {
				let res = await fetch("/api/likes/create.php?id=".concat(id), {
					method: 'GET',
					headers: {
						'Content-Type': 'application/json'
					}
				});
				let data = await res.json();
				console.log(data);
				getAllBooks();
			} else {
				let res = await fetch("/api/likes/delete.php?id=".concat(id), {
					method: 'GET',
					headers: {
						'Content-Type': 'application/json'
					}
				});
				let data = await res.json();
				console.log(data);
				getAllBooks();
			}
		}
		catch (err) {
			console.log(err);
		}
	});
}

document.addEventListener('DOMContentLoaded', async () => await getAllBooks());
// searchBy.Attribute().addEventListener('click',()=>{

// });
searchBar.addEventListener("input", () => {
	let key = "name=";
	// switch(key){
	//   case "2" : key="academy_number=";
	//   break; 
	//   case "3" :key="name=";
	//   break;
	//   case "4" :key="phone=";
	//   break;
	// }
	// if(key!="1"){
	let query = key.concat(searchBar.value);
	console.log(query);
	getAllBooks(query);
	// else{
	//   getStudentsData();
	// }

}
);

// make_like()

