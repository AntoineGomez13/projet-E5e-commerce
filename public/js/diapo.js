const images = [
    "./images/imgBackground1.png",
    "./images/imgBackground2.png",
    "./images/imgBackground3.png",
    "./images/imgBackground4.png",
    "./images/imgBackground5.png"
]; 

let currentImageIndex = 0;
const hero = document.getElementById("hero");

function changeBackground() {
    hero.classList.add("fade-out");
    setTimeout(() => {
        currentImageIndex = (currentImageIndex + 1) % images.length;
        hero.style.backgroundImage = `linear-gradient(rgba(0, 0, 0, 0.377), rgba(0, 0, 0, 0.337)), url(${images[currentImageIndex]})`;
        hero.classList.remove("fade-out"); 
    }, 1000);
}

// Change l'image toutes les 5 secondes
setInterval(changeBackground, 10000);
