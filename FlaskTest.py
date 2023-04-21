from flask import Flask, render_template, Response, request, redirect, flash, jsonify, Markup, url_for
from FaceCamera import VideoCamera
import requests 
import os
import time
import cv2
import numpy as np
from deepface import DeepFace
import pandas as pd
import pickle

thesis_path ="C:/xampp/htdocs/thesis"
app = Flask(__name__, template_folder='C:/xampp/htdocs/thesis/flaskTesting/flask/Image recognition project', static_folder='C:/xampp/htdocs/thesis')
#app.run(host='localhost', port=80) 


app.secret_key = 'Pogi Si Gibson'

root_dir = "C:/xampp/htdocs/thesis/flaskTesting/flask/Image recognition project"
parent_dir = "C:/xampp/htdocs/thesis/flaskTesting/flask/Image recognition project/TemporaryImages"
resizedFolder = "C:/xampp/htdocs/thesis/flaskTesting/flask/Image recognition project/resizedTrainingImages"

global model
model = "Facenet512"



#------------------------------------------------------------
@app.route('/')

def index():
    return render_template('dashboard.html')
   


#------------------------------------------------------------
@app.route('/registerface.html' , methods=['GET'] )



def registerface():
    global id_number_Register
    global NameRegister
    global path

    id_number_Register = request.args.get('id')
    sname = request.args.get('sname')
    gname = request.args.get('gname')
    mname = request.args.get('mname')
    fullname = [sname, " ", gname, " ", mname]
    NameRegister = "".join(fullname)
    path = os.path.join(parent_dir,id_number_Register)
    print(f"Name: {NameRegister}")
    print(f"ID Number: {id_number_Register}")
    return render_template('registerface.html')



def gen(camera):
    #os.makedirs(path)
    #os.chdir(path)
    while True:
        frame = camera.get_frame()
        if frame is not None:
            yield (b'--frame\r\n'
                b'Content-Type: image/jpeg\r\n\r\n' + frame + b'\r\n\r\n')
            
        




#------------------------------------------------------------
@app.route('/video_feed')
def video_feed():
    global camera
    camera = VideoCamera()
    return Response(gen(camera),
                    mimetype='multipart/x-mixed-replace; boundary=frame')



#------------------------------------------------------------
@app.route('/capture_images')
def capture_images():
    global CapturingMessage
    CapturingMessage = 'Capturing Images Please Stay still...'
    # Set the number of seconds to capture images
    capture_duration = .4

    end_time = time.time() + capture_duration

    count = 0
    os.makedirs(path)
    os.chdir(path)
    while time.time() < end_time:
        frame = camera.get_frame()
        image_path = os.path.join(path, f'{NameRegister}{count}.jpg')
        with open(image_path, 'wb') as f:
            f.write(frame)
        count += 1
        print(image_path, " Done!")
    CapturingMessage = 'Finished Capturing! Please wait while we try to remember your face. This can take some time...'
    
    return redirect('Training_AI')



#------------------------------------------------------------
@app.route('/scancapture')
def scancapture():
    global CapturingMessageScan
    global MessageIDnumber
    global ScanAgain
    global predicted_name
    global label
    ScanAgain = False
    MessageIDnumber = ''
    

    # os.chdir(root_dir)

    frame_bytes = camera.get_frame()
    frame = cv2.imdecode(np.frombuffer(frame_bytes, np.uint8), cv2.IMREAD_COLOR)
    SingleCapture = thesis_path + '/frame.jpg'
    cv2.imwrite(SingleCapture, frame)
    CapturingMessageScan = 'Image Captured. Recognizing...'
    os.chdir(root_dir)

    records={}
    for path,subdirnames,filenames in os.walk("TemporaryImages"):
        fullword = ""
        if len(filenames) == 0:
            continue
        else:
            containerlist = []
            for filename in filenames:
                if filename.endswith('.pkl'):
                    continue
                else:
                    for f in filename:
                        containerlist.append(f)
                    for i in range(5):
                        containerlist.pop()
                    for elements in containerlist:
                        fullword += elements
                    break
                
            print("ETO ANG PATH " + path)
            if path != 'TemporaryImages':
                IDcontainer = int(os.path.basename(path))
                records[IDcontainer] = fullword


    # Huhulaan na kung sino
    try:
        results = DeepFace.find(img_path= SingleCapture, db_path= parent_dir, model_name= model, distance_metric="cosine", enforce_detection=False)

        pd.options.display.max_colwidth = None
        result_df = pd.DataFrame(columns=['identity', 'confidence'])

        if len(results) != 0:
            for df in results:
                df['confidence'] = (1 - df[model + '_cosine']) * 100  # Convert distance to percentage
                result_df = pd.concat([result_df, df[['identity', 'confidence']]], ignore_index=True)
            
            # Get the first row of result_df using iloc
            first_row = result_df.iloc[0]

            # Access the identity and confidence values of the first row using the column names
            identity = first_row['identity']
            confidence = first_row['confidence']

            label = int(os.path.basename(os.path.dirname(identity)))
            predicted_name = records[label]
            print(label)
            print(predicted_name)

            print(f"Identity: {predicted_name}\n Confidence: {confidence}")
            CapturingMessageScan = ("Name: " + predicted_name )
            MessageIDnumber = ("ID Number: " + str(label))

        else:
                
            CapturingMessageScan = "No Face Detected Please Try again."

    

    except:
        CapturingMessageScan = "No Face Detected Please Try again."
        ScanAgain = True
        
   
    ScanAgain = True
    

    return 'Done'



#------------------------------------------------------------
@app.route('/SearchIDnumber', methods =['POST'])
def SearchIDnumber():
    global CapturingMessageScan
    global MessageIDnumber 
    global ScanAgain
    global predicted_name
    global label

    data = request.get_json()

    os.chdir(root_dir)

    records={}


    for path,subdirnames,filenames in os.walk("TemporaryImages"):
            fullword = ""
            if len(filenames) == 0:
                continue
            else:
                containerlist = []
                for filename in filenames:
                    if filename.endswith('.pkl'):
                        continue
                    else:
                        for f in filename:
                            containerlist.append(f)
                        for i in range(5):
                            containerlist.pop()
                        for elements in containerlist:
                            fullword += elements
                        break
                    
                print("ETO ANG PATH " + path)
                if path != 'TemporaryImages':
                    IDcontainer = int(os.path.basename(path))
                    records[IDcontainer] = fullword

            
           
    

            
    try:
        Search_ID = int(data['Search_ID'])
        predicted_name = str(records[Search_ID])
        label = str(Search_ID)
        CapturingMessageScan = ("Name: " + predicted_name)
        MessageIDnumber = ("ID Number: " + label)
        ScanAgain = True
    except:
        CapturingMessageScan = "No ID Number Found..."
        MessageIDnumber = ''
        ScanAgain = True


            
    
    return 'Done'


#------------------------------------------------------------
@app.route('/CaptureMessage')
def CaptureMessage():
    return CapturingMessage

#------------------------------------------------------------
@app.route('/CaptureMessageScan')
def CaptureMessageScan():
    response = {
        'CapturingMessageScan': CapturingMessageScan,
        'MessageIDnumber': MessageIDnumber,
        'ScanAgain': ScanAgain
    }

    return jsonify(response)

    



#------------------------------------------------------------
@app.route('/Training_AI')
def Training_AI():
    
    global CapturingMessage
    oldpickle = parent_dir + "/representations_" + model.lower() + '.pkl'
    newpickle = path + "/representations_" + model.lower() + '.pkl'
    
    os.chdir(root_dir)


    # Pag meron nang DATA
    try:
        # Old
        with open(oldpickle, 'rb') as f:
            oldmodel = pickle.load(f)    
        results = DeepFace.find(img_path='C:/xampp/htdocs/thesis/keanu.jpg', db_path=path, model_name=model, distance_metric="cosine", enforce_detection=False)
        
        # New
        with open(newpickle, 'rb') as f:
            newmodel = pickle.load(f)
        
        finalmodel = oldmodel + newmodel

        # Saving
        with open(oldpickle, "wb+") as f:
            pickle.dump(finalmodel, f)

    # Pag wala pang DATA
    except:
        results = DeepFace.find(img_path='C:/xampp/htdocs/thesis/keanu.jpg', db_path=parent_dir, model_name=model, distance_metric="cosine", enforce_detection=False)

    CapturingMessage = 'Done Training Data!'
    
    print("\n------done training data-------\n")
    # faces,faceID=fr.labels_for_training_data('TemporaryImages',id_number_Register)
    # try:
    #     face_recognizer=fr.update_classifier(faces,faceID)
    #     face_recognizer.write('trainingData.yml')
    # except:
    #     face_recognizer=fr.train_classifier(faces,faceID)
    #     face_recognizer.write('trainingData.yml')
    # print("\n------done training data-------\n")

    # CapturingMessage = 'Done Training Data!'

    # Pause for 2 seconds
    # sleep(2)

    # Redirect to the /registerform route
    return 'Done'


    


#------------------------------------------------------------
@app.route('/ClosingCamera')
def ClosingCamera():
    try:
        camera.__del__()
    except:
        pass
    return 'Done'


#------------------------------------------------------------
@app.route('/scanface.html')
def scanface():
    return render_template('scanface.html')

def gen(camera):
    #os.makedirs(path)
    #os.chdir(path)
    while True:
        frame = camera.get_frame()
        if frame is not None:
            yield (b'--frame\r\n'
                b'Content-Type: image/jpeg\r\n\r\n' + frame + b'\r\n\r\n')
            
            
#------------------------------------------------------------
@app.route('/ProceedQR')

def ProceedQR():
    url = 'http://localhost/thesis/Testingborrow.php'
    data = {'name': predicted_name, 'label': label}
    response = requests.post(url, data=data)
    return response.content
            
        







if __name__ == '__main__':
    app.run(debug=True)
#if __name__ == '__main__':
#    app.run(host = '0.0.0.0', port = 80, debug = True)