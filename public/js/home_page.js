

function sezionepost(event){
const sezioneform=document.querySelector(".withpost");

   
    sezioneform.classList.remove("hidden");
  

}






function scriviPost(event){
    
    const titolo=document.querySelector("#titolo");
    const opinion=document.querySelector("#opinion");
    if(titolo.value==0 || opinion.value==0){
        alert("Non hai compilato tutti i campi. Riprova!")
        event.preventDefault()
      
    }
    else if(titolo.value.length>80 ){
        alert("Il campo Titolo supera il limite massimo di caratteri disponibili.")
        event.preventDefault();
        
    }else if(opinion.value.length>4000){
        alert("Il campo opinione supera il limite massimo di caratteri disponibili.")
        event.preventDefault();
        
    }
}




function onJsonresearch(json){
    const canzone=document.querySelector("#canzone");
    canzone.innerHTML='';
     const risults = json.tracks.items;
    let num_risult = risults.length;
    if (num_risult > 3)
        num_risult = 3;
    for (let i = 0; i < num_risult; i++) {
        const dati = risults[i]
        const titolo = dati.name;
        const url = dati.uri;
        var site = document.createElement('a');
        site.setAttribute('href', url);
        site.textContent = 'Ascolta su Spotify';
        const selected_image = dati.album.images[1].url;
        const album = document.createElement('div');
        album.classList.add("album");
        const img = document.createElement('img');
        img.src = selected_image;
        const caption = document.createElement('span');
        caption.textContent = "Titolo:" + titolo;
        const artista = dati.artists[0].name;
        const nome_artista = document.createElement('span');
        nome_artista.textContent = "Artista:" + artista;
        album.appendChild(img);
        album.appendChild(caption);
        album.appendChild(nome_artista);
        album.appendChild(site);
        canzone.appendChild(album);
}
}

function onResponse(response) {
    return response.json()
}
function onError(error) {
    console.log('Error' + error)
}

function ricerca_contenuto(event){
    event.preventDefault()
    const song=document.querySelector('#takeasong')
    const ricercato=encodeURIComponent(song.value)
    console.log("Eseguo la ricerca del brano:" + ricercato)
    fetch("homePage/song/" + ricercato).then(onResponse,onError).then(onJsonresearch)
}


function Oncontroljson(json){
    const post=document.querySelector("#posts")
    let nFetchedPosts = json.length;
for (let i = 0; i < nFetchedPosts; i++) {
    const posts = json[i]
    const contenuto = document.createElement("div")
    const titolo = document.createElement("p")
    titolo.textContent = posts.titolo
    titolo.classList.add("titolo")
    const paragrafo = document.createElement("p")
    paragrafo.textContent = posts.opinion
    paragrafo.classList.add("testo") 
    const orario = document.createElement("span")
    orario.textContent = "Date:"+posts.time
    orario.classList.add("orario")
    const username = document.createElement("p")
    username.textContent = "@" + posts.username
    username.classList.add("username2")
    username.classList.add("userinfo")
    orario.classList.add("userinfo")
    const elimina=document.createElement("div")
    elimina.classList.add("sezione_elimina")
    const eliminazione=document.createElement("button")
    eliminazione.classList.add("eliminazione")
    eliminazione.textContent="Cancella Post"
    eliminazione.dataset.IDpost=json[i].IDpost
    eliminazione.addEventListener("click",eliminaPost)
    contenuto.appendChild(username)
    contenuto.appendChild(orario)
    contenuto.appendChild(titolo)
    contenuto.appendChild(paragrafo)
    contenuto.appendChild(elimina)
    post.appendChild(contenuto)
    elimina.appendChild(eliminazione)

    }
    if(nFetchedPosts ==0){
        const listavuota = document.createElement('div')
        listavuota.textContent = "Nessun post trovato!"
        
    }
}
function eliminaPost(event){
    fetch("homePage/eliminazione/" + event.currentTarget.dataset.IDpost).then(onResponse).then(function(json){
        if(json["eliminato"]==false)return null})
        const elimina=event.currentTarget.parentNode.parentNode
        elimina.remove()
        
    }


function guardaPost(event){
    
    const withpost = document.querySelector(".withpost")
    withpost.classList.add("hidden")
    nPosts = 10
    fetch("homePage/showpost/" + nPosts).then(onResponse).then(Oncontroljson)
    event.currentTarget.textContent = "Aggiorna i post"
    
}



var button = document.getElementById("showpost")
button.addEventListener("click",guardaPost)
const query1=document.forms["spotify"]
query1.addEventListener("submit", ricerca_contenuto)

const form_dati = document.forms['form_post']
document.querySelector("button[data-button='writeit']").addEventListener("click",sezionepost)
document.querySelector(".withpost").addEventListener('submit',scriviPost)
