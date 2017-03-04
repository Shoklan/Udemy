# Data Science A-Z

## Introduction
- Course by Kirill Eremenko

- 4 Parts to the Course
	1. Tableau
	2. Modeling
	3. Data Preparation
	4. Communication

### Why Is Data Science the Profession of the Future?
- The rate at which data is being created is exponential - and we need to find a way to deal with it.
- IDC Digital Universe Study?
- Machines cannot store nor compute the data we're creating.
- You can make mega 'uge amounts of $$.

- Domains:
	1. Computer Science
	2. Math/Statistics
	3. Domain Knowledge
- This problem has only gotten worse; need more skills:
	1. Statistics.
	2. Visualizations
	3. Data Mining.
	4. Databases & Data Process.
	5. Neurocomputing?
	6. Machine Learning.
	7. Pattern Recognition.

- Even this is not enough:
	1. Communication.
	2. Presentation.
	3. Domain Knowledge.
	4. Real-Life Practice.
	5. Programming.
	6. Creativity.

- Covering most topics in 21 hours of content?

## Tableau
- Tableau is drag and drop.
- Tableau Public is free, but requires all code to be open.
- [Course Public Files](http://www.superdatascience.com/training)
- Open a .CSV file `Left Side > Text File > Select File`
- If you add more than one file, Tableau will try to join them.

- Dimensions are Independant Variables; Measures are Dependant Variables.

Going to be really hard to translate visual data into textual data.

### Problem: Who gets a bonus?
- Kirill is correct; UI is amazingly intuitive.
- You can use `Right Click > Calculated Fields` to create new variables in Tableau
- Dragging a variable onto marks will allow you apply that mark to the variable and it will be added.
- If you `CTRL + drag` the variable onto the mark, that will work too.
- "Tableau has the capacity to make visualizations, but also to make them reasy to understand."
- If you `Right CLK Worksheet > Copy > Image` then you can export the image; only if paid version though.

- Type can be changed on a 'Dimension' using `Right CLK`.
- Tableau is AMAZING at dealing with geo data.

### Chi-Squared.
- Data MUST be in aboslute terms: not percentage.
- Build an expected table; using the 20% as the multiplier.
- Multiplier is based on left_percentage / total_count in data.
- If leaving company is independant of gender, then ~20% of both should leave.
- Chi-Squared is a test designed to test the prop. of independence.

- ALT ++  for excel ?
- Minimum of 5 observations in each cell.



## Modeling
- 50 lectures; HERE WE GO!
- Not to teach you how to use R or Python.
- This is about correct model building.

- I've gone over all this regression stuff before.

### Stats Refresher
- Types of variables:
	1. Categorical
		i. Nominal: non-orderable.
		ii. Ordinal: Can order, but no computations.
	2. Numeric
		i. Discrete.
		ii. Continuous.

- Regression: estimate of the relationship between variables.
- Two Types:
	1. Linear.
		i. Simple Linear Regression.
		ii. Multiple Linear Regression.
	2. Logistic.
		i. Simple Logistic Regression.
		ii. Multiple Logistic Regression.

- y = b0 + b1*x1

- y = dependent variable
- b0 = y intercept of the line.
- b1 = coefficient of change.
- x1 = independent variable

- y = b0 + b1*x1 + b2*x2 ... bn*xn
- y = dependent variable
- b0 = y intercept of the line.
- b1 = coefficient of change.
- x1 = independent variable
- b2 = coefficient of change.
- x2 = independent variable


- Ordinary Least Square.
- The model line tells us were they should be, as per the model.
- Actual point is yi.
- yi^ is the Predeicted point

- Line is Sum of (yi-yi^)^2.

- R Squared: 1 - ( Residuals Sum of Squares / Total Sum of Squares)
- Adjusted R Squared: 1 - (1 - R^2)( n-1 / n - p - 1), s.t. p = parameters; n = sample size.


### Linear Regression
- What is Gretl? ( GNU Regression, Econometrics and Time-series Library)
- I'm not installing Gretl; R is king.
- Assumptions:
	1. Linearity
	2. Homoscedasticity
	3. Multivariate normality
	4. Idependence of errors
	5. Lack of Multicollinearity

- Goe-demographic Segmentaition Model? (Logistic Regression) // Different Assumptions
- Logistic most used.

- Dummy Variables are features encoded as interporable values.

- If mosre than one dummy variablke are included causes multicollinearity.
- I know about forward, backword step-wise model building.

- False positive is when you predict something is true, but it's not.
- False Negative is when you predict something is false, but it's not.

### Assessing models
- Cumulative Accuracy Profile (CAP)
- "Customer Segmentation Model"
- 



## Data Preparation

## Communication
