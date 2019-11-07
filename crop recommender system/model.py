# -*- coding: utf-8 -*-
"""
Created on Thu Oct 17 23:24:39 2019

@author: TanviR
"""

import pandas as pd  
import numpy as np  
import matplotlib.pyplot as plt   
from sklearn.model_selection import train_test_split 
from sklearn.linear_model import LinearRegression
import pickle


#define a function that operates all of the task

def apply():
    pickle_in = open("feature.pickle","rb")
    feature = pickle.load(pickle_in)
    
    print(feature)
    
    #print("Enter Day,Month and Location:")
    Day = int(feature[0])
    Month = int(feature[1])
    District = feature[2]
    
    #first filtering process 
    
    df_crops = pd.read_csv("cropdb.csv")
    
    crops = set()
    available_crops = set()
    
    
    
    for index, row in df_crops.iterrows():
        #diff = abs(Day - row['Day'])
        
        if(Month==row['Month'] and (row['Day']>=Day or row['Day']==0)):
            if(row['Crop']=='Aus' or row['Crop']=='Aman' or row['Crop']=='Boro'):
                available_crops.add(row['Crop'])
                crops.add('Rice')
            else:
                available_crops.add(row['Crop'])
                crops.add(row['Crop'])
    
    #print(crops)
    
    
    df_climate = pd.read_csv("climate.csv")
    #print(df_climate.keys())
    Ph = df_climate[(df_climate.City == District) & (df_climate.Month == Month)]["PH"].values
    Avg_temp = 0
    Avg_rainfall = 0
    n = 5
    
    for i in range(n):
        Rainfall = df_climate[(df_climate.City == District) & (df_climate.Month == Month)]["Rainfall"].values
        Max_temp = df_climate[(df_climate.City == District) & (df_climate.Month == Month)]["Max Temp"].values
        Min_temp = df_climate[(df_climate.City == District) & (df_climate.Month == Month)]["Min Temp"].values
        Avg_temp = Avg_temp + (Max_temp + Min_temp)/2
        Avg_rainfall = Avg_rainfall + Rainfall
        Month = Month + 1
        if(Month>12): Month = Month%12 + 1
    #print(Avg_temp)
    Avg_temp = Avg_temp / n
    
    
    data = {'Rainfall':[Avg_rainfall], 'Temp':[Avg_temp], 'Ph':[Ph]} 
    
    df_user = pd.DataFrame(data)
    
    #print(df_user.head())
    
    
    dataset = pd.read_csv("regressiondb.csv")
    
    #print(dataset.head())
    
    #filtering results
    highly_rec = []
    rec = []
    not_rec = []
    
    
    
    yield_crop = []
    
    for crop in crops:
        print(crop)
        temp_df = dataset[dataset['Crop'] == crop]
        #print(temp_df.keys())
        
        X = temp_df[['Rainfall','Temperature','Ph']].values
        y = temp_df[['Production']].values
        
        X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.1, random_state=0)
        
        regressor = LinearRegression()
        regressor.fit(X_train, y_train) #training the algorithm
        
        y_pred = regressor.predict(df_user)
        #print(regressor.predict(X_test))
        #d_f = pd.DataFrame({'Actual': y_test.flatten(), 'Predicted': y_pred.flatten()})
        #print(d_f)
        res = (float)(y_pred)
        print(res)
        if(res>3):
            highly_rec.append(crop)
        elif(res<=3 and res>0):
            rec.append(crop)
        else:
            not_rec.append(crop)
        
        yield_crop.append(y_pred)
        
    #print(yield_crop)
    
    print(available_crops)
    print(highly_rec)
    print(rec)
    print(not_rec)
    Month = int(feature[1])
    
    final_output = [available_crops,highly_rec,rec,not_rec,Day,Month,District]
    
    pickle_out = open("model_output.pickle","wb")
    pickle.dump(final_output, pickle_out)
    pickle_out.close()    
    
    return
apply()


#taking input and extract

