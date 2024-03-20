if(document.querySelector("#sortName")) {
    let sortName = document.querySelector("#sortName");
    const urlParams = new URLSearchParams(window.location.search);

    if(urlParams.get("name")){
        if(urlParams.get('name') == 'asc'){
            sortName.innerHTML = "Name ▲";
        } else {
            sortName.innerHTML = "Name ▼";
        }
    }

    sortName.addEventListener('click', (e) =>{
        if(urlParams.get('date')){
            urlParams.delete('date');
        }
        if(urlParams.get('name') == 'asc'){
            urlParams.set('name', 'desc');
            window.location.search = urlParams;
            
        } else {
            urlParams.set('name', 'asc');
            window.location.search = urlParams;
        }
    });
}
if(document.querySelector("#sortDate")) {
    let sortDate = document.querySelector("#sortDate");
    const urlParams = new URLSearchParams(window.location.search);

    if(urlParams.get("date")){
        if(urlParams.get('date') == 'asc'){
            sortDate.innerHTML = "Created at ▲";
        } else {
            sortDate.innerHTML = "Created at ▼";
        }
    }

    sortDate.addEventListener('click', (e) =>{
        if(urlParams.get('name')){
            urlParams.delete('name');
        }
        if(urlParams.get('date') == 'asc'){
            urlParams.set('date', 'desc');
            window.location.search = urlParams;
        } else {
            urlParams.set('date', 'asc');
            window.location.search = urlParams;
        }
    });
}

let pageLinks = document.querySelectorAll(".pageLink");

for(let i = 0; i < pageLinks.length; i++){
    pageLinks[i].addEventListener('click', (e) =>{
        const urlParams = new URLSearchParams(window.location.search);
        urlParams.set('page', pageLinks[i].innerHTML);
        window.location.search = urlParams;
    });
}