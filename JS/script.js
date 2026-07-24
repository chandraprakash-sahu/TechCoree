function validateForm(){
		var pw1 = document.getElementById("Password-input").value;
		var pw2 = document.getElementById("repeatpassword-input").value;
		var fullname = document.getElementById("fullname-input").value;
		var email = document.getElementById("email-input").value;
};
let index = 0;
let slideInterval;

function moveSlide(step) {
    const slides = document.querySelectorAll('.carousel-item');
    const totalSlides = slides.length;

    index += step;

    if (index >= totalSlides) {
        index = 0;
    } else if (index < 0) {
        index = totalSlides - 1;
    }

    const carousel = document.querySelector('.carousel-slide');
    const slideWidth = slides[0].clientWidth;

    carousel.style.transform = `translateX(-${index * slideWidth}px)`;
}

function startAutoSlide() {
    slideInterval = setInterval(() => {
        moveSlide(1);
    }, 3000); // Change slide every 3 seconds
}

function stopAutoSlide() {
    clearInterval(slideInterval);
}

document.addEventListener('DOMContentLoaded', () => {
    startAutoSlide();
    
    // Pause auto sliding when mouse hovers over the carousel
    document.querySelector('.carousel-container').addEventListener('mouseenter', stopAutoSlide);
    document.querySelector('.carousel-container').addEventListener('mouseleave', startAutoSlide);
});

const intelBoards = ["ASUS Z690", "Gigabyte B660", "MSI Z790"];
const amdBoards = ["MSI B550", "ASRock X570", "Gigabyte B450"];

function filterMotherboards() {
  const cpu = document.getElementById("processor").value.toLowerCase();
  const mbList = document.getElementById("motherboards");
  mbList.innerHTML = "";

  let boards = [];
  if (cpu.includes("intel")) boards = intelBoards;
  else if (cpu.includes("ryzen") || cpu.includes("amd")) boards = amdBoards;

  boards.forEach(b => {
    const opt = document.createElement("option");
    opt.value = b;
    mbList.appendChild(opt);
  });

  updateSummary();
}

function updateSummary() {
  const ids = ["processor", "motherboard", "ram", "ssd", "gpu", "psu", "mouse", "keyboard"];
  const summary = document.getElementById("summaryBox");
  let html = "";

  ids.forEach(id => {
    const val = document.getElementById(id).value;
    if (val) html += `<p><strong>${capitalize(id)}:</strong> ${val}</p>`;
  });

  summary.innerHTML = html || "<p>No items selected.</p>";
}

function submitBuild() {
  updateSummary();
  Swal.fire({
    title: 'PC Build Submitted!',
    text: 'Your custom build has been saved. Thank you!',
    icon: 'success',
    confirmButtonText: 'Done'
  });
}

function capitalize(str) {
  return str.charAt(0).toUpperCase() + str.slice(1);
}

document.querySelectorAll("input[list]").forEach(el => {
  el.addEventListener("change", updateSummary);
});



