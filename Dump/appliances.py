import sys
import pandas as pd
import joblib
from sklearn.linear_model import SGDRegressor

def predict_appliances(lights, T1, RH_1, T2, RH_2, T3, RH_3, T4, RH_4, T5, RH_5, T6, RH_6, T7, RH_7, T8, RH_8, T9, RH_9, T_out, Press_mm_hg, RH_out, Windspeed, Visibility, Tdewpoint, NSM):
    try:
        # Convert inputs to appropriate data types
        lights = float(lights)
        T1 = float(T1)
        RH_1 = float(RH_1)
        T2 = float(T2)
        RH_2 = float(RH_2)
        T3 = float(T3)
        RH_3 = float(RH_3)
        T4 = float(T4)
        RH_4 = float(RH_4)
        T5 = float(T5)
        RH_5 = float(RH_5)
        T6 = float(T6)
        RH_6 = float(RH_6)
        T7 = float(T7)
        RH_7 = float(RH_7)
        T8 = float(T8)
        RH_8 = float(RH_8)
        T9 = float(T9)
        RH_9 = float(RH_9)
        T_out = float(T_out)
        Press_mm_hg = float(Press_mm_hg)
        RH_out = float(RH_out)
        Windspeed = float(Windspeed)
        Visibility = float(Visibility)
        Tdewpoint = float(Tdewpoint)
        NSM = float(NSM)
    except ValueError as e:
        print(f"Error converting input values: {e}")
        return

    try:
        # Create a dictionary with the user-input data
        new_data = {'lights': [lights], 'T1': [T1], 'RH_1': [RH_1], 'T2': [T2], 'RH_2': [RH_2],
                    'T3': [T3], 'RH_3': [RH_3], 'T4': [T4], 'RH_4': [RH_4], 'T5': [T5], 'RH_5': [RH_5],
                    'T6': [T6], 'RH_6': [RH_6], 'T7': [T7], 'RH_7': [RH_7], 'T8': [T8], 'RH_8': [RH_8],
                    'T9': [T9], 'RH_9': [RH_9], 'T_out': [T_out], 'Press_mm_hg': [Press_mm_hg], 'RH_out': [RH_out],
                    'Windspeed': [Windspeed], 'Visibility': [Visibility], 'Tdewpoint': [Tdewpoint],
                    'NSM': [NSM]}

        # Create a DataFrame with the new data
        new_data_df = pd.DataFrame(data=new_data)

        # Load the pre-trained model
        clf = joblib.load(r'D:\Projects\Energy-Insight\Dump\main\appliances.joblib')

        # Make predictions using the trained model
        prediction = clf.predict(new_data_df)

        print(f"The predicted Appliances value is: {prediction[0]}")

    except Exception as e:
        print(f"Error during prediction: {e}")

# Check if the script is being run from the command line
if __name__ == "__main__":
    # Read command-line arguments
    args = sys.argv[1:]

    # Display command-line arguments for debugging
    # print(f"Received arguments: {args}")

    # Check if the correct number of arguments is provided
    if len(args) != 26:
        print("Incorrect number of arguments. Please provide values for all features.")
    else:
        # Call the predict_appliances function with the provided arguments
        predict_appliances(*args)
