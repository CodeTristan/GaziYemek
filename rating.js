document.addEventListener('DOMContentLoaded', function() {
    const stars = document.querySelectorAll('.rating input');

    stars.forEach((star, index) => {
      star.addEventListener('click', function() {
        for (let i = 0; i <= index; i++) {
          stars[i].checked = true;
          stars[i].value = index + 1;
          console.log(stars[i].value);
        }

        for (let i = index + 1; i < stars.length; i++) {
          stars[i].checked = false;
          stars[i].value = 0;
        }
      });
    });
  });