var accordion = document.getElementsByClassName('content-container');

for(i = 0; i < accordion.length; i++){
    accordion[i].addEventListener('click',  function(){
        this.classList.toggle('active');
    })
}

const search = document.getElementById("searchInput");
search.addEventListener('keyup', (e) => {
    const searchValue = e.target.value.toLowerCase()
    const cars = document.querySelectorAll(".vehicle")
    cars.forEach((car) => {
        const name = car.querySelector('.name').innerText.toLowerCase()
        const category = car.querySelector('.category').innerText.toLowerCase()
        console.log(name, category)
        if(name.includes(searchValue) || category.includes(searchValue)){
            car.style.display = ""
        } else{
            car.style.display = "none"
        }
    })
})