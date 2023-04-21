import os
import shutil
import pickle


root_dir = "C:/xampp/htdocs/thesis/flaskTesting/flask/Image recognition project"
parent_dir = "C:/xampp/htdocs/thesis/flaskTesting/flask/Image recognition project/TemporaryImages"
picklepath = parent_dir + "/representations_facenet512.pkl"

def main():
    def deletion():
        os.chdir(parent_dir)

        ChooseDelete = str(input("Insert the ID of the folder you want to delete: "))

        path = os.path.join(parent_dir,ChooseDelete)

        if ChooseDelete != "":
            if os.path.exists(path):
                shutil.rmtree(path)
                print("\n------ Deletion of folder done! Now Retraining Ai. This can take a while... ------")
                
                with open(picklepath, 'rb') as f:
                    oldmodel = pickle.load(f)   
                
                newmodel = [lst for lst in oldmodel if ChooseDelete + '/' not in lst[0]]
                
                with open(picklepath, "wb+") as f:
                    pickle.dump(newmodel, f)
                
                print("\n------ Retraining AI Done! -------\n")


            else:
                print("\n------ No existing folder found. Please try again ------")
                main()
        else:
            print("\n------ Error: You have not inputted any ID! ------")
            main()
    deletion()
main()

