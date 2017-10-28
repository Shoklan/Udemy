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