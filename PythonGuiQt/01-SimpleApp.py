from PySide.QtCore import *
from PySide.QtGui import *

import sys
import time

app = QApplication(sys.argv)

due = QTime.currentTime()
message = "Alert!"


try:

    if len(sys.argv) < 2:
        raise ValueError

    hours, minutes = sys.argv[1].split(":")
    due = QTime(int(hours), int(minutes))

    if not due.isValid():
        raise ValueError

    if len(sys.argv) > 2:
        message = " ".join(sys.argv[2:])

except:
    print "Usage: python SimpleApp.py HH:MM Optional Message"
    sys.exit(0)


while QTime.currentTime() < due:
    time.sleep(5)


label = QLabel("<font color=red size=72>" + message + "</font>")
label.setWindowFlags(Qt.SplashScreen)
label.show()

QTimer.singleShot(10000, app.quit)
app.exec_()