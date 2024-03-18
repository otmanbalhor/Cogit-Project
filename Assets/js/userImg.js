function chooseFile() {
    const input = document.getElementById('avatar');
    input.click();

    input.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            displayImage(file);
        }
    });
}

function displayImage(file) {
    const reader = new FileReader();
    reader.onload = function(event) {
        const imgElement = document.getElementById('profilePic');
        imgElement.src = event.target.result;
        saveImageLocally(event.target.result);
    }
    reader.readAsDataURL(file);
}

function saveImageLocally(imageBase64) {
    localStorage.setItem('profileImage', imageBase64);
}

function loadImageFromStorage() {
    const storedImage = localStorage.getItem('profileImage');
    if (storedImage) {
        document.getElementById('profilePic').src = storedImage;
    }
}

window.onload = loadImageFromStorage;

function clearLocalStorage() {
    localStorage.removeItem('profileImage');
    document.getElementById('profilePic').src = 'Assets/img/user-circle-regular-224.png'; // Rétablir l'image par défaut
}
