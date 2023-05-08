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
            if ret:
                frame = cv2.flip(frame,1)
                ret, jpeg = cv2.imencode('.jpg', frame)
                return jpeg.tobytes()


    
        
        
