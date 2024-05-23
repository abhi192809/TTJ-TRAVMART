
document.addEventListener("DOMContentLoaded", function () {
    const slideInterval = 0.0; // 3 seconds

    const slides = document.querySelectorAll(".slide");
    let currentSlide = 0;

    // Function to show the next slide
    function showNextSlide() {
        slides[currentSlide].style.display = "none"; // Hide the current slide
        currentSlide = (currentSlide + 1) % slides.length; // Move to the next slide
        slides[currentSlide].style.display = "block"; // Show the new current slide
    }

    // Start auto-sliding
    let slideTimer = setInterval(showNextSlide, slideInterval);

    // Pause auto-sliding when the mouse pointer is over the slider
    const slider = document.querySelector(".slider");
    slider.addEventListener("mouseover", function () {
        clearInterval(slideTimer);
    });

    // Resume auto-sliding when the mouse pointer leaves the slider
    slider.addEventListener("mouseout", function () {
        slideTimer = setInterval(showNextSlide, slideInterval);
    });
});

$('.counter-count').each(function () {
    $(this).prop('Counter', 0).animate({
        Counter: $(this).text()
    }, {
        duration: 5000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});








