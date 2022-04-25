function alpineInstance() {
    return {
        laws: [],
        search: '',
        getData() {
            fetch('http://localhost:3000/src/api/getAll.php')
                .then(response => response.json())
                .then((data) => {
                    this.laws = data;
                })
        },
        filteredLaws() {
            return this.laws.filter(
                law => law.toLowerCase().includes(this.search.toLowerCase())
            );
        },
        highlightSearch(s) {
            if (this.search === '') return s;

            return s.replaceAll(
                new RegExp(`(${this.search.toLowerCase()})`, 'ig'),
                '<strong class="font-semibold bg-blue-200">$1</strong>'
            )
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