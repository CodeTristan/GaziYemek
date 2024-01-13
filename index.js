function showSidebar() {
  const sidebar = document.querySelector(".sidebar");
  sidebar.style.display = "flex";
}
function hideSidebar() {
  const sidebar = document.querySelector(".sidebar");
  sidebar.style.display = "none";
}

$(function () {
  $("#selectedDate").datepicker({
    dateFormat: "yy-mm-dd", // Tarih formatı
    showButtonPanel: true, // Buton panelini göster
    changeMonth: true, // Ay seçimini aktif et
    changeYear: true, // Yıl seçimini aktif et
  });
});
/*-----------------------------------------duyuru---------------------------------------------------------------*/
let currentIndex = 0;
const duyurular = document.querySelectorAll(".duyuru");
const dotsContainer = document.getElementById("dots-container");

function showDuyuru(index) {
  duyurular.forEach((duyuru, i) => {
    duyuru.style.display = i === index ? "block" : "none";
  });

  updateDots(index);
}

function updateDots(index) {
  dotsContainer.innerHTML = "";
  for (let i = 0; i < duyurular.length; i++) {
    const dot = document.createElement("span");
    dot.classList.add("dot");
    dot.addEventListener("click", () => showDuyuru(i));
    dotsContainer.appendChild(dot);
  }

  dotsContainer.children[index].classList.add("active");
}

function nextDuyuru() {
  currentIndex = (currentIndex + 1) % duyurular.length;
  showDuyuru(currentIndex);
}

setInterval(nextDuyuru, 5000); //Duyurular arası geçiş için süre

showDuyuru(currentIndex);
// -----------------------------------------------------------------------------------------------
function previewMealImage(input) {
  var preview = document.getElementById("previewImage");
  var file = input.files[0];
  var reader = new FileReader();

  reader.onloadend = function () {
    preview.src = reader.result;
  };

  if (file) {
    reader.readAsDataURL(file);
  } else {
    preview.src = "";
  }
}
document.addEventListener("DOMContentLoaded", function () {
  var scrollUpBtn = document.getElementById("scrollUpBtn");

  window.onscroll = function () {
    scrollFunction();
  };

  function scrollFunction() {
    if (
      document.body.scrollTop > 20 ||
      document.documentElement.scrollTop > 20
    ) {
      scrollUpBtn.style.display = "block";
    } else {
      scrollUpBtn.style.display = "none";
    }
  }

  scrollUpBtn.addEventListener("click", function () {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
  });
});
document.addEventListener("DOMContentLoaded", function () {
  // Hammer.js'yi başlatın
  var myCarousel = document.getElementById("myCarousel");
  var hammer = new Hammer(myCarousel);

  // Karusel için sürükleme özelliğini etkinleştirin
  hammer.on("panleft panright", function (e) {
    if (e.type === "panleft") {
      $("#myCarousel").carousel("next");
    } else if (e.type === "panright") {
      $("#myCarousel").carousel("prev");
    }
  });
});
