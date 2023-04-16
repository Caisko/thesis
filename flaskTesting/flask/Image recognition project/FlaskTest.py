from flask import Flask, render_template, Response, request, redirect, flash, jsonify, Markup
from FaceCamera import VideoCamera
import os
import time
import faceRecognition as fr
import cv2
import numpy as np

app = Flask(__name__, template_folder='C:/xampp/htdocs/thesis', static_folder='C:/xampp/htdocs/thesis')
#app.run(host='localhost', port=80) 

location = "C:/xampp/htdocs/thesis/"
app.secret_key = 'Pogi Si Gibson'

root_dir = "C:/xampp/htdocs/thesis/flaskTesting/flask/Image recognition project"
parent_dir = "C:/xampp/htdocs/thesis/flaskTesting/flask/Image recognition project/TemporaryImages"
resizedFolder = "C:/xampp/htdocs/thesis/flaskTesting/flask/Image recognition project/resizedTrainingImages"




#------------------------------------------------------------
@app.route('/')

def index():
    return render_template('index.php')
   





#------------------------------------------------------------
@app.route('/check_ID', methods=['POST'])
def process_form():
  global id_number_Register
  global NameRegister
  global path
  
  id_number_Register = str(request.form.get('id_number'))
  NameRegister = str(request.form.get('name'))
  path = os.path.join(parent_dir,id_number_Register)

  print(path)
  if not os.path.exists(path):
      return redirect('/registerface.html')
      
  else:
      flash("ID NUMBER ALREADY TAKEN")
      return redirect('/registerform.html')
  
  



#------------------------------------------------------------
@app.route('/registerface.html')

def registerface():
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
    capture_duration = 7
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
    ScanAgain = False
    MessageIDnumber = ''
    os.chdir(root_dir)

    # os.chdir(root_dir)
    records={}


    for path,subdirnames,filenames in os.walk("TemporaryImages"):
        fullword = ""
        if len(filenames) == 0:
            continue
        else:
            containerlist = []
            for f in filenames[0]:
                containerlist.append(f)
            for i in range(5):
                containerlist.pop()
            for elements in containerlist:
                fullword += elements

            # pangalan.append(fullword)
            IDcontainer = int(os.path.basename(path))
            # IDfolder.append(IDcontainer)
            records[IDcontainer] = fullword

    CapturingMessageScan = 'Image Captured. Recognizing...'
    
    face_recognizer= cv2.face.LBPHFaceRecognizer_create()
    
    try:
        os.chdir(root_dir)
        face_recognizer.read('trainingData.yml')#use this to load training data for subsequent runs
        frame_bytes = camera.get_frame()
        frame = cv2.imdecode(np.frombuffer(frame_bytes, np.uint8), cv2.IMREAD_COLOR)
        faces_detected,gray_img= fr.faceDetection(frame)

        if len(faces_detected) > 0:
            
            for face in faces_detected:
                (x,y,w,h)=face
                roi_gray=gray_img[y:y+h,x:x+h]
                label,confidence= face_recognizer.predict(roi_gray)#predicting the label of given image
                print("confidence:", 100 - confidence , "%")
                print("label:",label)
                predicted_name = records[label]

                CapturingMessageScan = ("Name: " + predicted_name )
                MessageIDnumber = ("ID Number: " + str(label))
                
        else:
            
            CapturingMessageScan = "No Face Detected Please Try again."

        ScanAgain = True
            
            
            
        

    except Exception as e:
         CapturingMessageScan = str(e)
    #CapturingMessageScan = ''
    return 'Done'

#------------------------------------------------------------
@app.route('/SearchIDnumber', methods =['POST'])
def SearchIDnumber():
    global CapturingMessageScan
    global MessageIDnumber 
    global ScanAgain

    data = request.get_json()
    Search_ID = int(data['Search_ID'])

    os.chdir(root_dir)

    # os.chdir(root_dir)
    records={}


    for path,subdirnames,filenames in os.walk("TemporaryImages"):
        fullword = ""
        if len(filenames) == 0:
            continue
        else:
            containerlist = []
            for f in filenames[0]:
                containerlist.append(f)
            for i in range(5):
                containerlist.pop()
            for elements in containerlist:
                fullword += elements

            # pangalan.append(fullword)
            IDcontainer = int(os.path.basename(path))
            # IDfolder.append(IDcontainer)
            records[IDcontainer] = fullword
            
           
    

            
    try:
        CapturingMessageScan = ("Name: " + str(records[Search_ID]))
        MessageIDnumber = ("ID Number: " + str(Search_ID))
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

    os.chdir(root_dir)
    faces,faceID=fr.labels_for_training_data('TemporaryImages',id_number_Register)
    try:
        face_recognizer=fr.update_classifier(faces,faceID)
        face_recognizer.write('trainingData.yml')
    except:
        face_recognizer=fr.train_classifier(faces,faceID)
        face_recognizer.write('trainingData.yml')
    print("\n------done training data-------\n")

    CapturingMessage = 'Done Training Data!'

    # Pause for 2 seconds
    #sleep(2)

    # Redirect to the /registerform route
    return 'Done'


    


#------------------------------------------------------------
@app.route('/registerform.html', methods=['GET'])
def registerform():
    return render_template('registerform.html')



@app.route('/dashboard.html')
def dashboard():
    return render_template('dashboard.html')






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
        
            
        







#if __name__ == '__main__':
#    app.run(debug=True)
if __name__ == '__main__':
    app.run(host = '0.0.0.0', port = 80, debug = True)