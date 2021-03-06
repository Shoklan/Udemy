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

- You can define your own signals using `atZero = Signal( int )`.
- You can then send with `.emit()`.
- `.emit()` does not need to send values to transmit.


# Dialogs; the QDialog Class
- Dialogs are conceptually like popups.
- We can categorize them into two categories: Intelligence and Modality.
- Intelligence:
	1. Dumb
	2. Standard
	3. Smart
- Modality:
	1. Application modal: limited to only dialog.
	2. Window modal: limited to anything put it's parents.
	3. Modeless: free.
- For Dumb dialogs:
	* widgits are set by initial call
	* is data unaware.
- For Standard dialogs:
	* initialized by methods.
	* values are obtained via instance variables
- For Smart dialogs:
	* initialized based on data
	* can update that data in real time
	* Usually Modeless.
- To create a button, use `QPushButton(<text_label>)`.
- To request the file open dialog box use `QFileDialog.getOpenFilename(self, <label>, dir = <dir> )`.
- You can also pass `filter = "Text files (*.txt)"` to limit what files show up.
- It returns a tuple.
- You can save files using a similar format, but replace `getOpenFilename` with `getSaveFilename`.
- You can set the window name using `self.setWindowName( <name> )`.
- An alternative layout is the `QGridLayout()`.
- Since this allows you to specify how many, and where you place dialogs, it has more parameters.
- So, `.addWidget( <obj>, 0, 0)` will place object in top left corner.
- You can check is a checkbox is checked using `.isChecked()`.

- You can create a checkbox using `QCheckBox()`.
- To create a smart dialog, you just pass values to the constructor.


# Using QtDesigner
- Most other frameworks don't have this, and it makes your like much easier.
- It doesn't come independent and you'll need to install the full Qt SDK.
- QtDesigner savs its output as *<filename>.ui*.
- The files are actualy XML files.
- `pyside-uic.exe <file_name.ui> -o showGui.py` or `pyuic4.exe <file_name.ui> -o showGui.py` to create the pythong version.
- You can then import the ui using `class MainDialog( QDialog, showGui.Ui_mainDialog)`.
- The Main Window is the normal format we're accustom to when using windowed applications.
- To use the shortcut and buttons, then you use `.triggered()` instead.
- a `.qrc` file is just a text file that tells Qt where to find resources.
- It has a structure:
```
<DOCTYPE RCC><RCC version="1.0">
<qresource>
	<file>...</file>
</qresource>
</RCC>
```
- qrc is short for **Qt Resource Complied**.
- Microsoft recommnds 48x48 resolution images for icons.
- You going to need to use `pyside-rcc.exe <file_name>.qrc` to allow PySide to use them.
- The file must be named `icons_rc.py`.
- You can adjust the ordering off buttons based on OS by inserting a **Button box**.
- This will change the design.
- Qt allows you to style buttons based on Cascading Style Sheets.


# More In-Depth
- Multithreading can use the space between waiting for responses to run other tasks.
- `class WorkerThread( QThread )` can be used to initialize a thread for Qt.
- Since it's a class, then you'll need to initialize it.
- To use it, you use `self.workerThread.start()`.
- You can define your own signal using `self.emit( SIGNAL( "<custom_name()"))`.
- It is possible to miss responses from the worker thread.
- To solve that, use a fourth parameter to a `connection()` call `Qt.DirectConnection`.
- You could also use `QRunnable()` but it does not inherit from QObject.
- QString is analogous to the Pyton String type.
- To pass parameters messages, include QString like: `self.emit( SIGNAL( "threadDone(QString)"), "Confirmation that ...")`.

# Building Our First Real-World Application
- We're now going to build an actual application with a puropse
- We're going to call it PyDataMan.
- Purpose: Store user data in a database and display in a table.
- Creation steps:
	1. Sketch the GUI.
	2. Create the UI in QtDesigner.
	3. Add some basic Python Code.
	4. Add more code - complete your application.
	5. Kill the bugs.
	6. Package and distribute.
- Make sure to use comments!
- You should make sure to log what's happening in your application to troubleshoot it.
- You use the base package `logger`.
- You can connect to a SQlite3 database using the sqlite3 pacakge.
- You initailize the connection using `sqlite3.connect(<filename>)`.
- Please note that the filename should be a full path.
- This class isn't really about databases; I already know about this, mostly.
- I know what virtualEnv is.
- Qt has a table widget.
- To work with it, you need to tell it what row to insert in first.
- Find current total rows: `currentRowCount = self.mainTable.rowCount()`.
- Then, you have to insert the blank row using `self.mainTable.insertRow( currentRowCount )`.
- Then you can set item values using `self.mainTable.setItem( currentRowCount, <n>, QTableWidgetItem(value))`.
-



# Distributing the Application
- X


# References:
- **Rapid GUI Development with Pythong and Qt**
- [Qt Site Home](qt.digia.com)
- [Pyside Home](www.Pyside.org)
-
