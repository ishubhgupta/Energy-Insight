document.addEventListener("DOMContentLoaded", function() {
    const questions = document.querySelectorAll(".question");
    const nextBtns = document.querySelectorAll(".next-btn");
    const prevBtns = document.querySelectorAll(".prev-btn");
    const predictBtn = document.getElementById("predict-btn");

    let currentQuestionIndex = 0;

    // Image URLs corresponding to each question
    const imageUrls = [
        "url(https://www.pexels.com/photo/s-curve-chicago-22858523/700x708)",
        "url(https://via.placeholder.com/1920x1080)",
        "url(https://via.placeholder.com/1920x1080)"
        // Add more image URLs for each question as needed
    ];

    // Show next question
    function showNextQuestion() {
        questions[currentQuestionIndex].classList.add("hidden");
        currentQuestionIndex++;
        if (currentQuestionIndex < questions.length) {
            questions[currentQuestionIndex].classList.remove("hidden");
        }

        if (currentQuestionIndex === questions.length - 1) {
            predictBtn.classList.remove("hidden");
            nextBtns[currentQuestionIndex].classList.add("hidden");
        }

        prevBtns[currentQuestionIndex].classList.remove("hidden");

        // Update background image based on current question index
        document.body.style.backgroundImage = imageUrls[currentQuestionIndex];
    }

    // Show previous question
    function showPrevQuestion() {
        questions[currentQuestionIndex].classList.add("hidden");
        currentQuestionIndex--;
        questions[currentQuestionIndex].classList.remove("hidden");

        if (currentQuestionIndex === 0) {
            prevBtns[currentQuestionIndex].classList.add("hidden");
        }

        predictBtn.classList.add("hidden");
        nextBtns[currentQuestionIndex].classList.remove("hidden");

        // Update background image based on current question index
        document.body.style.backgroundImage = imageUrls[currentQuestionIndex];
    }

    // Event listeners for next button clicks
    nextBtns.forEach(btn => {
        btn.addEventListener("click", showNextQuestion);
    });

    // Event listener for previous button click
    prevBtns.forEach(btn => {
        btn.addEventListener("click", showPrevQuestion);
    });

    // Event listener for input changes
    const inputs = document.querySelectorAll(".question input");
    inputs.forEach(input => {
        input.addEventListener("input", function() {
            const allFilled = Array.from(inputs).every(input => input.value !== "");
            predictBtn.disabled = !allFilled;
        });
    });

    // Set initial background image
    document.body.style.backgroundImage = imageUrls[currentQuestionIndex];
});
