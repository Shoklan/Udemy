from PySide.QtGui import *
from PySide.QtCore import *
import sys


class ZeroSpinBox(QSpinBox):

    zeros = 0
    atZero = Signal()

    def __init__(self, parent=None):
        super(ZeroSpinBox, self).__init__(parent)

        self.valueChanged.connect(self.check_zero)


    def check_zero(self, value):
        if value == 0:
            self.zeros += 1
            self.constant = 5
            self.atZero.emit()


class Form(QDialog):

    def __init__(self, parent=None):
        super(Form, self).__init__(parent)


        self.dial = QDial()
        self.dial.setNotchesVisible(True)

        self.spinbox = ZeroSpinBox()

        layout = QVBoxLayout()
        layout.addWidget(self.dial)
        layout.addWidget(self.spinbox)
        self.setLayout(layout)


        self.dial.valueChanged.connect(self.spinbox.setValue)
        self.spinbox.valueChanged.connect(self.dial.setValue)

        self.spinbox.atZero.connect(self.printvalue)


    def printvalue(self):
        print "Caught the signal!"








app = QApplication(sys.argv)
form = Form()
form.show()
app.exec_()
