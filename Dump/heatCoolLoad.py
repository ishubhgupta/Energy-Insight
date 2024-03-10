import sys
import pandas as pd
import joblib

def predict_heat_cool_load(X1, X2, X3, X4, X5, X6, X7, X8):
    try:
        # Convert inputs to appropriate data types
        X1 = float(X1)
        X2 = float(X2)
        X3 = float(X3)
        X4 = float(X4)
        X5 = float(X5)
        X6 = float(X6)
        X7 = float(X7)
        X8 = float(X8)
    except ValueError as e:
        print(f"Error converting input values: {e}")
        return

    try:
        # Create a dictionary with the user-input data
        new_data = {'X1': [X1], 'X2': [X2], 'X3': [X3], 'X4': [X4],
                    'X5': [X5], 'X6': [X6], 'X7': [X7], 'X8': [X8]}

        # Create a DataFrame with the new data
        new_data_df = pd.DataFrame(data=new_data)

        # Load the pre-trained models for heating and cooling
        clf_heat = joblib.load(r'D:\Projects\Energy-Insight\Dump\main\heatLoad.joblib')
        clf_cool = joblib.load(r'D:\Projects\Energy-Insight\Dump\main\coolLoad.joblib')

        # Make predictions using the trained models
        prediction_heat = clf_heat.predict(new_data_df)
        prediction_cool = clf_cool.predict(new_data_df)

        print(f"The predicted Heating Load value is: {prediction_heat[0]}")
        print(f"The predicted Cooling Load value is: {prediction_cool[0]}")

    except Exception as e:
        print(f"Error during prediction: {e}")

# Check if the script is being run from the command line
if __name__ == "__main__":
    # Read command-line arguments
    args_heat_cool = sys.argv[1:]

    # Display command-line arguments for debugging
    print(f"Received arguments: {args_heat_cool}")

    # Check if the correct number of arguments is provided
    if len(args_heat_cool) != 8:
        print("Incorrect number of arguments. Please provide values for all features (X1-X8).")
    else:
        # Call the predict_heat_cool_load function with the provided arguments
        predict_heat_cool_load(*args_heat_cool)
