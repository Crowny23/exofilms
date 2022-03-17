
const searchS = document.getElementById('titleS');
// requête ajax pour communiquer avec la page select posts en php
searchS.addEventListener('keyup', function () {
    const input = searchS.value;
    console.log(input)
    if(input.length > 2){
        searchFilmS(input);   
    }
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
                    listDom += '<div class="suggestion">' + data.title + '</div>';
                }
                sugg.innerHTML = listDom;
                suggAdd();
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
    for (let btn of btnSugg) {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            searchS.value = btn.innerHTML;
        })
    }
}