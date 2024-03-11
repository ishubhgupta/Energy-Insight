document.addEventListener("DOMContentLoaded", function() {
    var formQuestions = document.querySelectorAll('.form-group');
    var currentIndex = 0;

    function showQuestion(index) {
        formQuestions.forEach(function(question, i) {
            question.style.display = (i === index) ? 'block' : 'none';
        });
    }

    document.getElementById("predictionForm").addEventListener("submit", function(event) {
        event.preventDefault();

        // Get form data
        var formData = new FormData(this);

        // Prepare the command to run the Python script with user inputs
        var command = "python -u D:\\Projects\\Energy-Insight\\Dump\\heatCoolLoad.py";

        // Append user inputs to the command
        for (var pair of formData.entries()) {
            command += " " + escapeshellarg(pair[1]);
        }

        // Execute the command and capture the output
        var output = shell_exec(command);

        // Display the result
        document.getElementById("resultContainer").innerHTML = "<p>The predicted Heating Load and Cooling Load values are: " + output + "</p>";
    });

    function escapeshellarg(arg) {
        // Implement your own logic for escaping shell arguments if needed
        return arg;
    }
});
