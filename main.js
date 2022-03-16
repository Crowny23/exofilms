initData();

//function permettant d'initialiser le ul des données du serveur et de les afficher
function initData() {
    const listUl = document.getElementById('list-film');
    //requête ajax pour communiquer avec la page select posts en php
    const xhr = new XMLHttpRequest();

    xhr.open('GET', './select-film.php', true);

    xhr.onreadystatechange = function () {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            
            let datas = JSON.parse(this.responseText);
            let listDom = '';
            for (let data of datas) {
                listDom += '<li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"><h2 class="h4 m-0">' + data.title + '</h2><div class="d-flex justify-content-between align-items-center"><div><a href="edit-film.php?id=' + data.id_film + '" title="Edit"><img src="./edit.svg" alt="" height="30px"></a> </div></li>';
            }

            listUl.innerHTML = listDom;
            const searchs = document.getElementById('search');
            searchs.addEventListener('click', ()=>{
                const title = document.getElementById('titleS').value;
                search(title)
            })
        }
    }
    xhr.send();
}
function search(data){
    const listUl = document.getElementById('list-film');
    const xhr = new XMLHttpRequest();
    xhr.open('POST', './foundFilms.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            let datas = JSON.parse(this.responseText);
            let listDom = '';
            for (let data of datas) {
                listDom += '<li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"><h2 class="h4 m-0">' + data.title + '</h2><div class="d-flex justify-content-between align-items-center"><div><a href="edit-film.php?id=' + data.id_film + '" title="Edit"><img src="./edit.svg" alt="" height="30px"></a> </div></li>';
            }

            listUl.innerHTML = listDom;
        }
    }
    xhr.send('title='+ data);
}