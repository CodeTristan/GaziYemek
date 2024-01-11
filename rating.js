document.addEventListener('DOMContentLoaded', function() {
  const ratingContainers = document.querySelectorAll('.rating');

  ratingContainers.forEach((ratingContainer) => {
    const stars = ratingContainer.querySelectorAll('input');

    stars.forEach((star, index) => {
      star.addEventListener('click', function() {
        for (let i = 0; i <= index; i++) {
          stars[i].checked = true;
          stars[i].value = index + 1;
        }

        for (let i = index + 1; i < stars.length; i++) {
          stars[i].checked = false;
          stars[i].value = 0;
        }
      });
    });
  });
});


