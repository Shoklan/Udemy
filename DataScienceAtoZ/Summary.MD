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
- Convert Meaures in a calculated field using `STR()`.
- Slice strings from the right using `Right(STR, count )`.

- You can have multiple charts in one 'graph.'

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
- Also called the gain chart.
- "Customer Segmentation Model"
- CAP is not ROC.

- I guess I need to know about excel.

- Take the area under the good model, then divide that by the area under the perfect model.
- AR = aR / aP.
- As AR -> 1, better model.

- Training vs Testing
- Take 10%-20% to create a training/testing dataset.
- I've seen this before.
- Train on 80%; Testing on 20% to test for bias.

### Odds Ratio
- What does this mean?
- If odds are $11, then you're winning $10 + $1 that you spent.
- Losing to winning odds: 10:1; reverse them.
- Win:Lose odds = p / ( 1 - p)
- Increasing and independant variable xi by one unit will increase the odds by a multiplicative factor of e^(bi)

### Model Maintenance
- Models will deteriorate over time as the underlying reality changes.
	1. Additional Factors
	2. Changes in behavior.
	3. Changes in Process.
	4. Changes in Existing Factors
	5. Competitors.
	6. Changes in the Industry
	7. Chnages in regulation.
	8. Changes in Product.
	9. Depletion
	10. Spontaneous changes.

- Assess -> Retrain -> Rebuild


## Data Preparation
- Raw Data -> ETL -> Database -> Analyze -> Visualize -> Insights
- "Data Warehousing"
- " means storing data in relational Database.
- What is Relational* Database?
- A Database where the relationship between data matters.
- Advantages over spreadsheets:
	1. Integrity.
	2. Combinations are easy.
	3. Easily scalable.

- SQL stands for Structured Query Languages
- *Install SQL*
- `CREATE TABLE TestTable{ Name VARCHAR( 100 ), AGE INT }` to create a two column table
- Insert data using code below:
```
INSERT INTO TestTable {Name, Age}
VALUES("Matt", 35), ("James", 45), ("Helan", 26)
```

- What is ETL?
- ETL stands for Extract - Transform - Load
- Move data from source to Warehouse via this process.
- "SSIS via SSDT-BI with MSVS Shell" what?
- MSVS = Microsfot Visual Studio Shell.
- Only using BI package
- SSDT-BI = SQL Server Data Tools - Business Intelligence.
- Used to be called "Business intelligence Studio"
- SSAS = SQL Server Analysis Services.
- SSIS = SQL Server Integration Services.
- SSRS = SQL Server Reporting Services

- Data Wrangling just means data preparation

- Project folder structure:
	1. Original Data.
	2. Prepared Data.
	3. Uploaded Data.
	4. Analysis
	5. Insights.
	6. Final

- Sublime Text 3 FTW.
- Excel will hide changes to dates.
- The conversions are based on local date settings and will sometimes make mistakes
- Excel also alters numbers that could be irreversable!
- Setting extension type to .txt and then force Excel to use Data Import Wizard via open.
- Have Excel interperate data as Text to protect data integrity.
- To Safely alter column, select column and go to `Data Ribbon > Text to Column`.
- Text Qualifier is what is treated as a container for text to be treated as a block.
- Set A	SQL do the heavy lifting of the analysis.

- % is a wildcard inside of a string in a SQL query.
- `F5` to run a typed query.
- _ stands for exactly one character.
- SQL regex is a LOT different than normal regex.
- Make sure to use `LIKE` when using regex; else, wont work.
- Comments are normal block comments: `/* comment block */`
- Single line comment with `--`

- Data Types:
	1. Int
	2. Flaot
	3. Varchar(n); s.t. n = max length // max == 8K
	4. Date       // canonical date format yyyy-mm-dd
	5. Datetime   //
	6. Bit
	7. Money

- Type Conversions: implicit or explicit.
- Cast vs Convert?
- `cast( SALES as FLOAT )`
- `convert( float, [SALES] )
- Is there a difference in speed?

- NULL is SQL means empty cell: placeholder
- `SET Discount = NULL WHERE Discount = .5`
- `<>` means not equal
- You cannot use = for NULL; use `is` instead.


### Types of Joins
- Inner join uses only intersection.
- Left Outer Join keeps non-matching left table.
- Right Outer Join keeps non-matching right table.
- Full Outer Join just keps everything.

- If there are multiple matches, then it will duplicate them.
- Joining on more than one column is much safer.
- You can give your tables aliases using `x as A`

- You can save Queries.
- These are called Procs.
- Expand "Programabilty > Stored Procedures > Right CLCK > Store Procedure..."
```
CREATE PROC [BLD_WRK_OfficeSupplies_CustomerList]
AS
BEGIN
	SELECT * FROM [dbo].[RAW_OfficeSupplies_CustomerList_20150810]
END
```

```
IF OBJECT_ID('WRK_OfficeSupplies_CustomerList') IS NOT NULL
DROP TABLE [WRK_OfficeSupplies_CustomerList]
```
- Store results into a new table using `INTO`.

- Checks if values are numeric `ISNUMERIC( [BALANCE]) <> 1`

- Use `FILTER` to filter rows.
- Use `DELETE` to delete rows.


## Communication
- Crowdsource anything you don't need to be directly involved in.
- Gladwell would be proud; arbitrary boundaries apply.
- Learn to say No.
- Don't rely on slides.
- Turn it onto a story.

### Dealing with Execs
- They care about $ first, foremost.
- Be ready for questions.
- Leave out one obvious detail for a leading question.

- Answer is not always simple; not always pretty.
