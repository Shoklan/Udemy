from PySide.QtGui import *
from PySide.QtCore import *
import sys

class Form(QDialog):

    def __init__(self, parent=None):
        super(Form, self).__init__(parent)


        self.dial = QDial()
        self.dial.setNotchesVisible(True)

        self.spinbox = QSpinBox()

        layout = QVBoxLayout()
        layout.addWidget(self.dial)
        layout.addWidget(self.spinbox)
        self.setLayout(layout)


        self.dial.valueChanged.connect(self.spinbox.setValue)
        self.spinbox.valueChanged.connect(self.dial.setValue)








app = QApplication(sys.argv)
form = Form()
form.show()
app.exec_()

