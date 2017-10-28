# Learning Python GUI Programming
## Bogdan Milanovich

# Introduction to Developing wiht Python and Qt
- Reasons and Requirements:
	* Interested in GUI apps
	* Broaden knowledge of Python
	* Curiousity
	* Basic knowledge of Python
	* Computer using OS
	* An IDE, or something.
	* Desire to Learn
- Going to move from simple to advanced UIs
- Based on Book.
- About QT:
	* Developed by Trolltech Ltd
	* Bought by Nokia.
	* Now Digia
	* Originally written for C++, but access to others.
	* Has GPL license.
	* Cross platform.
	* Attempts to be native.
	* Qt is more than a toolkit.
- We will focus on QtCore and QtGui.
- There are a ton more Modules besides those two.
- You'll need the base modules:
```python
from PySide.QtCore import *
from PySide.QtGui import *
```
- To initialize an application, use `QApplication( <args> )`.
- `QTime.currenTime()` to get the current time.
- `split(":")` will split input on `:`.
- To create a QT time object, use `QTime( <hour>, <minute> )`.
- `o.isValid()` will check to make sure time is valid.
- `QLabel()` is how you create static text to display.
- You can pass html to `QLabel()`.
```python
label.setWindow( Qt.SplashScreen )
```
- You then display it with `label.show()`.
- `QTimer.singleShot(10000, app.quit )` to shut down by itself.
- `app.exec_()` to run it.

# Diving In
- You can declare a form using `class Form(QDialog):`
- A *Line Edit* is a single line box you can type text into.
- `QTextBrowser()` will be for the input box.
- `QLineEdit()` for the single line input.
- All Qt forms inherit from the QtWidgit class.
- To pull all the input from the `QLineEdit` use `self.resultsInput.selectAll()`
- There are many layouts you can fall back on.
- We're going to use `layout = QVBoxLayout()`.
- Then, you add widgits using `layout.addWidgit( self.<name_of_widgit> )`
- Don't forget to add the `.selectAll()` after adding the widgits.
- `self.resultsInput.returnPressed.connect( self.compute )` watches for the user to press enter.
- **Signals are basically events**.
- `.setFocus()` does what it says.
- You can access the user's input using `seld.resultsInput.text()`.
- `QComboBox()`
- You can add items to the combo box using `addItems( <rates> )`.
- You can add a **Spin Box** using `QSpinBox()`
- We'll be using `QDoubleSpinBox()` since it accepts floating point values.
- You can limit the inputs using `.setRange(<n>, <m>)`.
- You can set the default value using `.setValue()`.
- Another layout you can use is `QGridLayout()`.
- For the Grid Layout, you can set the indexes when adding widgets.
- We're going to be using QtDesigner to avoid typing out all these boxes.

- QWidgits emit signals.
- **Signals** are events sent by the widgit.
- They vary from `textChanged()` to `clicked()`.
- By default, unhandled signals are thrown away.
- By analogy, you need to catch the signals.
- The other side to signals are **Slots**.
- We connect signals to slots.
- We can also dynamically add predefined slots.
- `QDial()` is a thing, but it's basically never used.

- 




# Dialogs; the QDialog Class

# Using QtDesigner

# More In-Depth

# Building Our First Real-World Application

# Distributing the Application

# References:
- **Rapid GUI Development with Pythong and Qt**
- [Qt Site Home](qt.digia.com)
- [Pyside Home](www.Pyside.org)
- 