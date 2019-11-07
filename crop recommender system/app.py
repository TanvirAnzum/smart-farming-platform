import numpy as np
from flask import Flask, request, jsonify, render_template
import pickle
import calendar

app = Flask(__name__)
#model = pickle.load(open('model.pkl', 'rb'))

@app.route('/')
def home():
    return render_template('index.html')

@app.route('/predict',methods=['POST'])
def predict():
    '''
    For rendering results on HTML GUI
    '''
    feature = []
    for x in request.form.values():
        feature.append(x)
    
    pickle_out = open("feature.pickle","wb")
    pickle.dump(feature, pickle_out)
    pickle_out.close()
        
    #final_features = [np.array(int_features)]
    #prediction = model.predict(final_features)

    import model
    
    model.apply()    
    pickle_in = open("model_output.pickle","rb")
    output = pickle.load(pickle_in)
    avail = str(output[0])
    high = str(output[1])
    rec = str(output[2])
    low = str(output[3])
    day = str(output[4])
    month = int(output[5])
    if(month == 1):
        month = "January."
    elif(month==2):
        month = "February."
    elif(month==3):
        month = "March."
    elif(month==4):
        month = "April."
    elif(month==5):
        month = "May."
    elif(month==6):
        month = "June."
    elif(month==7):
        month = "July."
    elif(month==8):
        month = "August."
    elif(month==9):
        month = "September."
    elif(month==10):
        month = "October."
    elif(month==11):
        month = "November."
    else:
        month = "December."
    
    day = day + ', '+ month
    loc = str(output[6])
    avail = avail.translate({ord(i): None for i in "{}''"})
    high = high.translate({ord(i): None for i in "[]''"})
    rec = rec.translate({ord(i): None for i in "[]''"})
    low = low.translate({ord(i): None for i in "[]''"})


    #return render_template('index.html', Avail='AC: {}'.format(output[0]), High ='H: {}'.format(output[1]), avg ='A: {}'.format(output[2], low ='N: {}'.format(output[3])))
    return render_template('index.html', Avail=avail, Low=low, High=high, Rec=rec,Day = day,Loc = loc)
    
@app.route('/predict_api',methods=['POST'])
def predict_api():
    '''
    For direct API calls trought request
    '''
    data = request.get_json(force=True)
    prediction = model.predict([np.array(list(data.values()))])

    output = prediction[0]
    return jsonify(output)

if __name__ == "__main__":
    app.run(debug=True)