document.addEventListener("DOMContentLoaded", function() {
    const questions = document.querySelectorAll(".question");
    const nextBtns = document.querySelectorAll(".next-btn");
    const prevBtns = document.querySelectorAll(".prev-btn");
    const predictBtn = document.getElementById("predict-btn");
    const main = document.querySelector("main"); // Reference to the main section

    let currentQuestionIndex = 0;

    // // Image URLs corresponding to each question
    // const imageUrls = [
    //     "image1.jpg",
    //     "image2.jpg",
    //     "image3.jpg",
    //     "image4.jpg",
    //     "image5.jpg",
    //     "image6.jpg",
    //     "image7.jpg",
    //     "image8.jpg"
    // ];

    // // Show next question and update image
    // function showNextQuestion() {
    //     questions[currentQuestionIndex].classList.add("hidden");
    //     currentQuestionIndex++;
    //     if (currentQuestionIndex < questions.length) {
    //         questions[currentQuestionIndex].classList.remove("hidden");
    //     }

    //     if (currentQuestionIndex === questions.length - 1) {
    //         predictBtn.classList.remove("hidden");
    //         nextBtns[currentQuestionIndex].classList.add("hidden");
    //     }

    //     prevBtns[currentQuestionIndex].classList.remove("hidden");

    //     // Update image source based on current question index
    //     mainImage.src = imageUrls[currentQuestionIndex];
    // }

    // Show next question and hide current one, also change background color
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

        // Change background color based on current question
        main.style.backgroundColor = getBackgroundColor(currentQuestionIndex);
    }

    // Show previous question and hide current one, also change background color
    function showPrevQuestion() {
        questions[currentQuestionIndex].classList.add("hidden");
        currentQuestionIndex--;
        questions[currentQuestionIndex].classList.remove("hidden");

        if (currentQuestionIndex === 0) {
            prevBtns[currentQuestionIndex].classList.add("hidden");
        }

        predictBtn.classList.add("hidden");
        nextBtns[currentQuestionIndex].classList.remove("hidden");

        // Change background color based on current question
        main.style.backgroundColor = getBackgroundColor(currentQuestionIndex);
    }

    // Function to get background color based on question index
    function getBackgroundColor(index) {
        const colors = ['#f8f9fa', '#c8e6c9', '#ffccbc', '#b3e5fc', '#f0f4c3', '#d1c4e9', '#ffecb3', '#b2dfdb'];
        return colors[index];
    }

    // Event listeners for next button clicks
    nextBtns.forEach((btn, index) => {
        btn.addEventListener("click", showNextQuestion);
    });

    // Event listener for previous button click
    prevBtns.forEach((btn, index) => {
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
});


function updateCube() {
    // Get user input values
    var surfaceArea = parseFloat(document.getElementsByName("X2")[0].value);
    var wallArea = parseFloat(document.getElementsByName("X3")[0].value);
    var overallHeight = parseFloat(document.getElementsByName("X5")[0].value);

    // Calculate cube dimensions based on user input
    var length = Math.sqrt(surfaceArea);
    var width = Math.sqrt(surfaceArea);
    var height = overallHeight;

    // Update cube dimensions
    document.getElementById("cube").style.width = length + "px";
    document.getElementById("cube").style.height = height + "px";
    document.getElementById("cube").style.transform = "rotateX(60deg) rotateY(45deg)";
}

// Event listeners to trigger updateCube function on input change
var inputs = document.querySelectorAll("input[type=number]");
inputs.forEach(function(input) {
    input.addEventListener("input", updateCube);
});