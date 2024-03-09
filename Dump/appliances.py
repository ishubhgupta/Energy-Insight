import pandas as pd
from sklearn.linear_model import SGDRegressor



def predict_appliances():

    try:
        # Get user input for the features
        date = input("Enter date (in the format year-month-day hour:minute:second): ")
        lights = float(input("Enter energy use of light fixtures in the house in Wh (lights): "))
        T1 = float(input("Enter Temperature in kitchen area, in Celsius (T1): "))
        RH_1 = float(input("Enter Humidity in kitchen area, in % (RH_1): "))
        T2 = float(input("Enter Temperature in living room area, in Celsius (T2): "))
        RH_2 = float(input("Enter Humidity in living room area, in % (RH_2): "))
        T3 = float(input("Enter Temperature in laundry room area, in Celsius (T3): "))
        RH_3 = float(input("Enter Humidity in laundry room area, in % (RH_3): "))
        T4 = float(input("Enter Temperature in office room, in Celsius (T4): "))
        RH_4 = float(input("Enter Humidity in office room, in % (RH_4): "))
        T5 = float(input("Enter Temperature in bathroom, in Celsius (T5): "))
        RH_5 = float(input("Enter Humidity in bathroom, in % (RH_5): "))
        T6 = float(input("Enter Temperature outside the building (north side), in Celsius (T6): "))
        RH_6 = float(input("Enter Humidity outside the building (north side), in % (RH_6): "))
        T7 = float(input("Enter Temperature in ironing room, in Celsius (T7): "))
        RH_7 = float(input("Enter Humidity in ironing room, in % (RH_7): "))
        T8 = float(input("Enter Temperature in teenager room 2, in Celsius (T8): "))
        RH_8 = float(input("Enter Humidity in teenager room 2, in % (RH_8): "))
        T9 = float(input("Enter Temperature in parents' room, in Celsius (T9): "))
        RH_9 = float(input("Enter Humidity in parents' room, in % (RH_9): "))
        T_out = float(input("Enter Temperature outside (from Chièvres weather station), in Celsius (T_out): "))
        Press_mm_hg = float(input("Enter Pressure (from Chièvres weather station), in mm Hg (Press_mm_hg): "))
        RH_out = float(input("Enter Humidity outside (from Chièvres weather station), in % (RH_out): "))
        Windspeed = float(input("Enter Windspeed (from Chièvres weather station), in m/s (Windspeed): "))
        Visibility = float(input("Enter Visibility (from Chièvres weather station), in km (Visibility): "))
        Tdewpoint = float(input("Enter Dewpoint Temperature (from Chièvres weather station), in °C (Tdewpoint): "))
        rv1 = float(input("Enter Random variable 1, nondimensional (rv1): "))
        rv2 = float(input("Enter Random variable 2, nondimensional (rv2): "))
        NSM = float(input("enter NSM Value: "))
    except ValueError:
        print("Please enter numerical values for features.")
        return

    # Create a dictionary with the user-input data
    new_data = {'date': [date], 'lights': [lights], 'T1': [T1], 'RH_1': [RH_1], 'T2': [T2], 'RH_2': [RH_2],
                'T3': [T3], 'RH_3': [RH_3], 'T4': [T4], 'RH_4': [RH_4], 'T5': [T5], 'RH_5': [RH_5],
                'T6': [T6], 'RH_6': [RH_6], 'T7': [T7], 'RH_7': [RH_7], 'T8': [T8], 'RH_8': [RH_8],
                'T9': [T9], 'RH_9': [RH_9], 'T_out': [T_out], 'Press_mm_hg': [Press_mm_hg], 'RH_out': [RH_out],
                'Windspeed': [Windspeed], 'Visibility': [Visibility], 'Tdewpoint': [Tdewpoint],
                'rv1': [rv1], 'rv2': [rv2], 'NSM': [NSM]}

    # Create a DataFrame with the new data
    new_data_df = pd.DataFrame(data=new_data)

    # Drop unnecessary columns
    new_data_df = new_data_df.drop(columns=['date', 'rv1', 'rv2'])

    # Make predictions using the trained model
    prediction = clf.predict(new_data_df)

    print(f"The predicted Appliances value is: {prediction[0]}")

# Call the function to get user input and predict
predict_appliances()
