from PySide.QtGui import *
from PySide.QtCore import *
import sys

import urllib


class Form(QDialog):

    def __init__(self, parent=None):
        super(Form, self).__init__(parent)

        date = self.get_data()
        rates = sorted(self.rates.keys())

        dateLabel = QLabel(date)

        self.fromComboBox = QComboBox()
        self.toComboBox = QComboBox()

        self.fromComboBox.addItems(rates)
        self.toComboBox.addItems(rates)

        self.fromSpinBox = QDoubleSpinBox()
        self.fromSpinBox.setRange(0.01, 1000)
        self.fromSpinBox.setValue(1.00)

        self.toLabel = QLabel("1.00")

        layout = QGridLayout()
        layout.addWidget(dateLabel, 0, 0)
        layout.addWidget(self.fromComboBox, 1, 0)
        layout.addWidget(self.toComboBox, 2, 0)
        layout.addWidget(self.fromSpinBox, 1, 1)
        layout.addWidget(self.toLabel, 2, 1)
        self.setLayout(layout)


        self.fromComboBox.currentIndexChanged.connect(self.update_ui)
        self.toComboBox.currentIndexChanged.connect(self.update_ui)
        self.fromSpinBox.valueChanged.connect(self.update_ui)



    def get_data(self):
        self.rates = {}

        try:
            date = "Unknown"

            fh = urllib.urlopen("http://www.bankofcanada.ca/en/markets/csv/exchange_eng.csv")

            for line in fh:
                line = line.rstrip()
                if not line or line.startswith(("#", "Closing")):
                    continue

                fields = line.split(",")
                if line.startswith("Date "):
                    date = fields[-1]

                else:
                    try:
                        value = float(fields[-1])
                        self.rates[fields[0]] = value
                    except ValueError:
                        pass

            return "Exchange rates date: " + date
        except Exception, e:
            return "Failued to download:\n%s" % e

    def update_ui(self):

        from_ = self.fromComboBox.currentText()
        to = self.toComboBox.currentText()

        results = (self.rates[from_] / self.rates[to]) * self.fromSpinBox.value()

        self.toLabel.setText("%0.2f" % results)


app = QApplication(sys.argv)
form = Form()
form.show()
app.exec_()






