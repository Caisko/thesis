from flask import Flask, render_template, Response, request, redirect, flash, jsonify, Markup, url_for
from FaceCamera import VideoCamera
import os
import time
import cv2
import numpy as np
from deepface import DeepFace
import pandas as pd
import pickle
import urllib.parse
import shutil
from PIL import Image

import sys




thesis_path ="C:/xampp/htdocs/thesis"
app = Flask(__name__, template_folder='C:/xampp/htdocs/thesis/flaskTesting/flask/Image recognition project', static_folder='C:/xampp/htdocs/thesis')
#app.run(host='localhost', port=80) 


app.secret_key = 'Pogi Si Gibson'

root_dir = "C:/xampp/htdocs/thesis/flaskTesting/flask/Image recognition project"
parent_dir = "C:/xampp/htdocs/thesis/flaskTesting/flask/Image recognition project/TemporaryImages"
resizedFolder = "C:/xampp/htdocs/thesis/flaskTesting/flask/Image recognition project/resizedTrainingImages"

global model
global scanningboolean
global returnscanning
returnscanning = False
scanningboolean = False
model = "Facenet512"

blackimage = thesis_path + '/black.jpg'

# #------------------------------------------
# try:
#     results = DeepFace.find(img_path= blackimage, db_path= parent_dir, model_name= model, distance_metric="cosine", enforce_detection=True)
# except:
#     print("Now Ready")



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
    global fullname

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


@app.route('/RegisterPassing')

def RegisterPassing():
    global ibabato
    url = 'http://localhost/thesis/HiddenFunction.php'
    data = {'name': NameRegister, 'label': id_number_Register, 'session': True, 'img' : ibabato }
    query_string = urllib.parse.urlencode(data)
    url_with_query_string = url + '?' + query_string
    return redirect(url_with_query_string)


                
        




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
    global ibabato

    end_time = time.time() + capture_duration

    count = 0
    os.makedirs(path)
    os.chdir(path)
    ibabato = ''
    while time.time() < end_time:
        frame = camera.get_frame()
        image_path = os.path.join(path, f'{NameRegister}{count}.jpg')
        ibabato = './flaskTesting/flask/Image recognition project/TemporaryImages/' + str(id_number_Register) + '/' + NameRegister + '0.jpg'
        with open(image_path, 'wb') as f:
            f.write(frame)
        count += 1
        print(image_path, " Done!")
    CapturingMessage = 'Finished Capturing! Please wait while we try to remember your face. This can take some time...'
    
    return redirect('Training_AI')





#------------------------------------------------------------
@app.route('/SearchIDnumber', methods =['POST'])
def SearchIDnumber():
    global CapturingMessageScan
    global MessageIDnumber 
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

    except:
        CapturingMessageScan = "No ID Number Found..."
        MessageIDnumber = ''



            
    
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
    global printing
    global labelling
    global naming
    printing = request.args.get('print')
    labelling = request.args.get('label')
    naming = request.args.get('name')
    return render_template('scanface.html')

#------------------------------------------------------------
@app.route('/return.html')
def returnface():
    return render_template('return.html')


#------------------------------------------------------------
@app.route('/scancapture')
def scancapture():
    global CapturingMessageScan
    global MessageIDnumber
    global predicted_name
    global label
    global scanningboolean
    global returnscanning
    scanningboolean = True
    MessageIDnumber = ''
    
    

    # os.chdir(root_dir)
    
    SingleCapture = thesis_path + '/frame.jpg'
    blackimage = thesis_path + '/black.jpg'
    CapturingMessageScan = 'Recognizing Image...'
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
                
            
            if path != 'TemporaryImages':
                IDcontainer = int(os.path.basename(path))
                records[IDcontainer] = fullword


    # Huhulaan na kung sino
    while scanningboolean:
        
        try:
            detecting = DeepFace.extract_faces(img_path=SingleCapture, enforce_detection=False)
            results = DeepFace.find(img_path= SingleCapture, db_path= parent_dir, model_name= model, distance_metric="cosine", enforce_detection=False)
            
            pd.options.display.max_colwidth = None
            result_df = pd.DataFrame(columns=['identity', 'confidence'])

            if detecting[0]['facial_area']['x'] != 0:
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

                if confidence < 75:
                    CapturingMessageScan = "No Matched Face."
                    MessageIDnumber = ''
                else:
                    if returnscanning:
                        print("Gumanaaaaaaaaaaaaa")
                        CapturingMessageScan = ("Name: " + predicted_name )
                        MessageIDnumber = ("ID Number: " + str(label))
                        scanningboolean = False
                        returnscanning = False
                    else:
                        if labelling == str(label):
                            CapturingMessageScan = ("Name: " + predicted_name )
                            MessageIDnumber = ("ID Number: " + str(label))
                            scanningboolean = False
                        else:
                            CapturingMessageScan = "No Matched Face."
                            MessageIDnumber = ''

            else:
                
                CapturingMessageScan = "No Face Detected Please Try again."
                MessageIDnumber = ''


        

        except Exception as e:
            CapturingMessageScan = "No Matched Face."
            MessageIDnumber = ''


      
   
    

    return 'Done'


#------------------------------------------------------------
def gen(camera):
    global showingframe_bytes
    global showingframe_np
    black = thesis_path + '/black.jpg'
    SingleCapture = thesis_path + '/frame.jpg'
    while True:
        showingframe_bytes = camera.get_frame() 
                
        try:
            showingframe_np = cv2.imdecode(np.frombuffer(showingframe_bytes, np.uint8), -1)
        except:
            showingframe_bytes = Image.open(black).tobytes()
            showingframe_np = cv2.imdecode(np.frombuffer(showingframe_bytes, np.uint8), -1)

              # Decode byte array to numpy array
        if scanningboolean:
            cv2.imwrite(SingleCapture, showingframe_np)
            try:
                square = DeepFace.extract_faces(img_path=SingleCapture, enforce_detection=False)
                facial_area = square[0]['facial_area']
                x, y, w, h = facial_area['x'], facial_area['y'], facial_area['w'], facial_area['h']
                showingframe_np = cv2.rectangle(showingframe_np, (x, y), (x + w, y + h), (0, 255, 0), 2)

                if showingframe_np is not None:
                    _, showingframe_bytes = cv2.imencode('.jpg', showingframe_np)  # Encode numpy array to JPEG byte array
                    yield (b'--frame\r\n'
                        b'Content-Type: image/jpeg\r\n\r\n' + showingframe_bytes.tobytes() + b'\r\n\r\n')
            except:

                if showingframe_np is not None:
                    _, showingframe_bytes = cv2.imencode('.jpg', showingframe_np)  # Encode numpy array to JPEG byte array
                    yield (b'--frame\r\n'
                        b'Content-Type: image/jpeg\r\n\r\n' + showingframe_bytes.tobytes() + b'\r\n\r\n')
        else:
            if showingframe_bytes is not None:
                widht = 650
                height = 475
                x = 175
                y = 50
                w = widht - (x * 2)
                h = height - (y * 2)
                showingframe_np = cv2.rectangle(showingframe_np, (x, y), (x + w, y + h), (0, 255, 0), 2)
                _, showingframe_bytes = cv2.imencode('.jpg', showingframe_np)
                yield (b'--frame\r\n'
                       b'Content-Type: image/jpeg\r\n\r\n' + showingframe_bytes.tobytes() + b'\r\n\r\n')
           

            
#------------------------------------------------------------
@app.route('/ProceedQR')

def ProceedQR():
    
    url = 'http://localhost/thesis/checkingface.php'
    data = {'name': naming, 'label': labelling, 'print': printing}
    query_string = urllib.parse.urlencode(data)
    url_with_query_string = url + '?' + query_string
    return redirect(url_with_query_string)

##------------------------------------------------------------
@app.route('/ProceedReturn')

def ProceedReturn():
    url = 'http://localhost/thesis/returningitem.php'
    data = {'name': predicted_name, 'label': label}
    query_string = urllib.parse.urlencode(data)
    url_with_query_string = url + '?' + query_string
    return redirect(url_with_query_string)
            
        
#------------------------------------------------------------
@app.route('/booleanfalse')

def booleanfalse():
    global scanningboolean
    global returnscanning
    returnscanning = False
    scanningboolean = False
    print("Naclose")

    return 'Done'


#------------------------------------------------------------
@app.route('/blackimage')

def blackimage():
    src_file = thesis_path + '/black.jpg'
    dst_file = thesis_path + '/frame.jpg'
    shutil.copyfile(src_file, dst_file)

    return 'Done'


#------------------------------------------------------------
@app.route('/returnscanning')

def returnscanning():
    global returnscanning 
    returnscanning = True
    return 'Done'


if __name__ == '__main__':
    app.run(debug=True)
#if __name__ == '__main__':
#    app.run(host = '0.0.0.0', port = 80, debug = True)