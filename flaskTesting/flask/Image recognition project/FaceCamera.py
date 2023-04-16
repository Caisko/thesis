import cv2
class VideoCamera(object):
    def __init__(self):
        self.video =  cv2.VideoCapture(0, cv2.CAP_DSHOW)
        #self.video =  cv2.VideoCapture(0)
    
    def __del__(self):
        self.video.release()
        
    def get_frame(self):
        if self.video.isOpened():
            ret, frame = self.video.read()
            frame = cv2.flip(frame,1)
            #resized_img = cv2.resize(frame, (1000, 700))
            ret, jpeg = cv2.imencode('.jpg', frame)
            return jpeg.tobytes()


    
        
        
