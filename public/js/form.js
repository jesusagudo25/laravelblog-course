
const form = document.querySelectorAll('form')[1],
file = document.querySelectorAll('input[type="file"]');

if(file.length > 1){
    file.forEach(element => {
        element.addEventListener('change', evt => {
            evt.target.parentElement.parentElement.parentElement.submit();
        });
    });
}
else{
    file[0].addEventListener('change', e =>{
        let re = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
        if (!re.exec(e.target.value)) {
            alert("File extension not supported!");
        }
        else{
            document.querySelector('img').src = window.URL.createObjectURL(e.target.files[0]);
        }
    });
}
