function alpineInstance() {
    return {
        laws: [],
        search: '',
        searchedLaws: [],
        searchResults: 0,
        getData() {
            fetch('http://localhost:3000/src/api/getAll.php')
                .then(response => response.json())
                .then((data) => {
                    //console.log(data);
                    this.laws = data;
                })
        },
        searchCase() {
            fetch('http://localhost:3000/src/api/search.php?search=' + this.search, {
                    method: 'POST',
                    body: this.search,
                })
                .then(response => response.json())
                .then(data => {
                   // console.log(data);
                    this.searchedLaws = data.search;
                    this.searchResults = data.total;
                    this.noresult = data.noresult;
                })
                .catch((error) => {
                    console.error('Error:', error);
                });
        }
       
    }
}


document.getElementById('metadata-btn').addEventListener('click', function (event) {

    var formElement = document.getElementById('metadataForm');
    let formData = new FormData(formElement);
    formData.append("file", case_doc.files[0]);

    var request = new XMLHttpRequest();

    request.open("POST", "src/api/create.php", true);

    request.onload = function (event) {
        if (request.status == 200) {
            document.getElementById('modal').style.display = 'none';
            location.reload();
            document.getElementById('flash').innerHTML = this.responseText;
        } else {
            console.log("error!");
        }
    }
    request.send(formData);
    event.preventDefault();
});