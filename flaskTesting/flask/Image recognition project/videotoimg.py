from unittest.loader import VALID_MODULE_NAME
import cv2
import os
import numpy as np
import keyboard
import faceRecognition as fr

cap=cv2.VideoCapture(0)

# pangalan = []
# IDfolder = []

root_dir = "C:/Users/Asus/Downloads/school/flaskTesting/flask/Image recognition project/"
parent_dir = "C:/Users/Asus/Downloads/school/flaskTesting/flask/Image recognition project/"
resizedFolder = "C:/Users/Asus/Downloads/school/flaskTesting/flask/Image recognition project/resizedTrainingImages"



def loop():


    def getname():
        global name
        global scanning 
        global path
        scanning = str(input("Do you want to scan? (y/n): "))
        if scanning != "y":
            IDnumber = str(input("Enter Your ID Number: "))
            name = str(input("Enter Your name before the scan: "))
            path = os.path.join(parent_dir,IDnumber)
            return IDnumber,path,name
        else:
            IDnumber,path,name = ("","","")
            return IDnumber,path,name
        
        
        
    IDnumber,path,name = getname()
    
    if scanning != "y":
        def saveimage():
            global validID
            
            if not os.path.exists(path):
                try:
                
                    int(IDnumber)
                    os.makedirs(path)
                    os.chdir(path)

                    count = 0
                    while True:
                        ret,test_img=cap.read()
                        test_img = cv2.flip(test_img,1)
                        if not ret :
                            continue

                        resized_img = cv2.resize(test_img, (1000, 700))
                        cv2.imshow('face detection Tutorial ',resized_img)

                        if keyboard.is_pressed('k'):
                            cv2.imwrite("%s%d.jpg" % (name,count), test_img)     # save frame as JPG file
                            count += 1
                        
                        if cv2.waitKey(10) == ord('q'):#wait until 'q' key is pressed
                            break
                        validID = IDnumber
                        
                        
                        
                        

                    cap.release()
                    cv2.destroyAllWindows
                    

                except:
                    print("\n----Please use number only in ID Number----")
                    loop()
                    

                
                
            else:
                print("\n-----ID Number already taken-----")
                loop()
                

        saveimage()
    

loop()



    

#----------------------------------tester----------------------------
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

        
            
        

if scanning != "y":
    #Comment belows lines when running this program second time.Since it saves training.yml file in directory
    faces,faceID=fr.labels_for_training_data('TemporaryImages',validID)
    try:
        face_recognizer=fr.update_classifier(faces,faceID)
        face_recognizer.write('trainingData.yml')
    except:
        face_recognizer=fr.train_classifier(faces,faceID)
        face_recognizer.write('trainingData.yml')
    print("\n------done training data-------\n")


#Uncomment below line for subsequent runs
else:
    face_recognizer= cv2.face.LBPHFaceRecognizer_create()
    try:
        face_recognizer.read('trainingData.yml')#use this to load training data for subsequent runs

        global scancapture

        while True:
            ret,scancapture = cap.read()
            scancapture = cv2.flip(scancapture,1)
            if not ret :
                continue
            resized_img = cv2.resize(scancapture, (1000, 700))
            cv2.imshow('face scanning',resized_img)
            cv2.waitKey(1)
            cv2.destroyAllWindows
            if keyboard.is_pressed('p'):
                os.chdir("C:/Users/Hp/Downloads/school/flaskTesting/flask/Image recognition project/TestImages")
                # cv2.imwrite("%s%d.jpg" % (name,count), test_img)
                # count += 1
                # os.chdir(path)
                break

    
        
        #This module takes images  stored in diskand performs face recognition
        #test_img=cv2.imread("C:/Users/Hp/Downloads/school/Image recognition project/khenneth.jpg")#test_img path
        os.chdir(root_dir)
        faces_detected,gray_img=fr.faceDetection(scancapture)
        print("faces_detected:",faces_detected)

        
        cap.release()
        cv2.waitKey(1)
        cv2.destroyAllWindows
        

        for face in faces_detected:
            (x,y,w,h)=face
            roi_gray=gray_img[y:y+h,x:x+h]
            label,confidence= face_recognizer.predict(roi_gray)#predicting the label of given image
            print("confidence:", 100 - confidence , "%")
            print("label:",label)
            fr.draw_rect(scancapture,face)
            predicted_name=records[label]
            if(confidence>37):#If confidence more than 37 then don't print predicted face text on screen
                continue
            fr.put_text(scancapture,predicted_name,x,y)

        resized_img=cv2.resize(scancapture,(500,500))
        cv2.imshow('face scanning' ,resized_img)
        
        while True:
            # if keyboard.is_pressed('n'):
            #     cv2.waitKey(1)
            #     cv2.destroyAllWindows
            #     break
            if cv2.waitKey(10) == ord('q'):#wait until 'q' key is pressed
                    cv2.destroyAllWindows
                    print("\n------ Scanning Finished! Thank you! ------\n")
                    break
        
    except:
        print("\n------ You have no Training data ------\n")





# --------------------------------Resize-------------------------
# count=0

# os.chdir(parent_dir)
# os.makedirs(resizedFolder +"/" + validID)

# for filepath, subdirnames, filenames in os.walk(validID):
#     for filename in filenames:
#       if filename.startswith("."):
#         print("Skipping File:",filename)#Skipping files that startwith .
#         continue
#       img_path=os.path.join(filepath, filename)#fetching image path
#       print("img_path",img_path)
#       #id=os.path.basename(path)#fetching subdirectory names
#       img = cv2.imread(img_path)
#       if img is None:
#         print("Image not loaded properly")
#         continue
#       resized_image = cv2.resize(img, (100, 100))
#       new_path= resizedFolder + "/" + validID #str(id)
#       print("desired path is",os.path.join(new_path, "frame%d.jpg" % count))#write all images to resizedTrainingImages/id directory
#       cv2.imwrite(os.path.join(new_path, "%s%d.jpg" % (validID,count)),resized_image)
#       count += 1




