import os
import numpy as np
import faceRecognition as fr
import cv2
import shutil

root_dir = "C:/xampp/htdocs/thesis/flaskTesting/flask/Image recognition project"
parent_dir = "C:/xampp/htdocs/thesis/flaskTesting/flask/Image recognition project/TemporaryImages"
# blackpicture = cv2.imread('Black.jpg')

def main():
    def deletion():
        os.chdir(parent_dir)

        ChooseDelete = str(input("Insert the ID of the folder you want to delete: "))

        path = os.path.join(parent_dir,ChooseDelete)

        if ChooseDelete != "":
            if os.path.exists(path):
                shutil.rmtree(path)
                print("\n------ Deletion of folder done! Now Retraining Ai. This can take a while... ------")
                os.chdir(root_dir)
                try:
                    faces,faceID=fr.train_everything_again('TemporaryImages')
                    face_recognizer =fr.train_classifier(faces,faceID)
                    face_recognizer.write('trainingData.yml')
                    print("\n------ Deletion of folder and retraining Ai Done! ------\n")
                except Exception as e:
                     print("\n------ There are no more folders here. Process done! ------\n")
                     os.remove("trainingData.yml")


            else:
                print("\n------ No existing folder found. Please try again ------")
                main()
        else:
            print("\n------ Error: You have not inputted any ID! ------")
            main()
    deletion()
main()

