document.addEventListener("DOMContentLoaded", function() {
    const questions = document.querySelectorAll(".question");
    const nextBtns = document.querySelectorAll(".next-btn");
    const prevBtn = document.getElementById("prev-btn");
    const predictBtn = document.getElementById("predict-btn");

    let currentQuestionIndex = 0;

    // Show next question and hide current one
    function showNextQuestion() {
        questions[currentQuestionIndex].classList.add("hidden");
        currentQuestionIndex++;
        if (currentQuestionIndex < questions.length) {
            questions[currentQuestionIndex].classList.remove("hidden");
        }

        if (currentQuestionIndex === questions.length - 1) {
            predictBtn.classList.remove("hidden");
        }

        prevBtn.classList.remove("hidden");
    }

    // Show previous question and hide current one
    function showPrevQuestion() {
        questions[currentQuestionIndex].classList.add("hidden");
        currentQuestionIndex--;
        questions[currentQuestionIndex].classList.remove("hidden");

        if (currentQuestionIndex === 0) {
            prevBtn.classList.add("hidden");
        }

        predictBtn.classList.add("hidden");
    }

    // Event listeners for next button clicks
    nextBtns.forEach(btn => {
        btn.addEventListener("click", showNextQuestion);
    });

    // Event listener for previous button click
    prevBtn.addEventListener("click", showPrevQuestion);

    // Event listener for input changes
    const inputs = document.querySelectorAll(".question input");
    inputs.forEach(input => {
        input.addEventListener("input", function() {
            const allFilled = Array.from(inputs).every(input => input.value !== "");
            predictBtn.disabled = !allFilled;
        });
    });
});
