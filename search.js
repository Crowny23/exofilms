
const searchS = document.getElementById('titleS');
// requête ajax pour communiquer avec la page select posts en php
searchS.addEventListener('keyup', function () {
    const input = searchS.value;
    searchFilmS(input);
    suggAdd();
})

function searchFilmS(dat) {
    const sugg = document.getElementById('sugg');
    const xhr = new XMLHttpRequest();
    xhr.open('POST', './foundFilms.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            let datas = JSON.parse(this.responseText);
            let listDom = '';

            if (dat != '') {
                for (let data of datas) {
                    listDom += '<a href="#" class="suggestion">' + data.title + '</a>';
                }
                sugg.innerHTML = listDom;

            } else {
                listDom = '';
                sugg.innerHTML = listDom;
            }
        }
    }
    xhr.send('title=' + dat);
}

function suggAdd() {
    const searchS = document.getElementById('titleS');
    const btnSugg = document.getElementsByClassName('suggestion');
    console.log(btnSugg);
    alert('coucou');
    for (let btn of btnSugg) {
        alert('coucous');
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            alert('coucou1');
            searchS.value = btn.innerHTML;
        })
    }

}