# The Complete Financial Analyst Course 2017
## 365 Careers, Org

# Welcome! Course Introduction
- First we'll be working with Microsoft Excel.
- Then, we'll learning about Accounting.
- Then, we'll be going over Finance 101 topics.
- Finally, we'll discuss Powerpoint.
- Prizes, or whatever.

# Mimcrosoft Excel - Quick Introduction
- The top part of the excel screen is called **The Ribbon**.
- On the bottom is **The Workspace**.
- The default number of columns is 16384.
- The default number of rows is 1048576.
- The plus button adds 'as many sheets as we like'.
- Below the *ribbon* and above the *workspace* are the **Name Box** and the **Formula Bar**.
- The *formula bar* will give you suggestions.
- Entering data requires selecting it, obv.
- To tell Excel that you're done entering data you can use *Tab*, *Enter*, or the *arrow keys*.
- Text is aligned left; numbers to the right.
- You can cancel an entry by pressing `ESC`.
- Pressing *F2* will move you to the *formula bar*.
- Pressing *DEL* will delete the contents of the selection.
- You can find **Formating** either by rightt clicking or in the *Ribbon*.
- You can press *CTRL+SPCBAR* to select a whole column.
- You can press *SHFT+SPCBAR* to select a whole row.
- Excel can also act as a calculator.
- To start a formula, you must start the box with eihter `=` or `+`.
- You can use **Cell References** to make formulas easier to understand.
- A window opens when you click on the **Function Button** which lists all functions broken down by category.
- **Paste Special** allows for detialed configuration of what precisely you want to copy.
- You can press *ALT+E+S* to do this.

# Microsoft Excel - Useful Tools
- You can push text onto a new row but inside the same cell using *ALT+ENTER*.
- **Text-Tto-Columns** *Data Tabular > Text To Columns*
- You can set up a **Print Selection Area** under the *Print Tabular*.
- To insert a *hyperlink* you'll navigate to *Insert > Hyperlink*.
- You can link to a location in the same document as an option.
- A **Freeze Pane** will hold some rows or columns in place while you scroll.
- Excel 2016 contains a search bar to seek functions, etc.
- A **Pivot Table** is used to summarize or simplify a table in a sheet.
- You can access this feature by navigating to *Insert > Pivot Table*.

# Microsoft Excel - Best Practices
- I hate their formatting.
- To enable the **Developer Tab**, you navigate to *Right click View > Select "Customize the Ribbon"* and add it.
- An **Excel Macro** is a set of instructions that can be triggered by a shortcut, toolbar button or an icon.
- After naming and enacting it, you can rerun it by navigating to *Developer Tab > Macros* and selecting the one you want.
- To Enable **Fast Scrolling** use *CTRL + ARROW_KEYS*.
- You can **Quick Select** by doing that but also holding down *shift*.
- If you want the reference to remain fixed, then add `$` before it.
- This needs to be applied per row/column if you never want it to move.
- **Special Select** allows you to select based on conditions.
- To use it, you select an area and then press *F5*.
- **Dynamic Naming** allows one field and have it updated elsewhere.
- You can do this using `="Text_here" & <Cell_Name>`
- You can name cells by selecting a set and then typing the reference name in the *Name Box*.
- Then, you can use that name in formulas.
- To create a **Drop Down Menu** you navigate to *Data Tab > Data Validation*.
- To create sorting on all columns in a table, navigate to *Sort & Filter > Custom Sort*.
- You can nagivate the *Ribbon* by first pressing *ALT*; letters will be listed for each option.
- Example: *ALT+A+T* creates a filter.
- The **Quick ACtion Toolbar** allows you to add common commands to the title bar.
- You can also access that same bar using *ALT+[n]*, where n is the icons position in the title bar.

# Microsoft Excel - Beginner, Intermediate, Adv. Functions
- The function `SUM()` is self evident.
- The function `SUMIF(range; criteria; [range])` uses the range to check, the criteria as the condition, and range to sum.
- The function `SUMIFS([range], range_1, criteria_1, ...)` is like `sumif()` but it accepts more than one condition or set of cells.
- The fucntion `COUNT()` counts which cells are numbers.
- The fucntion `COUNTA()` counts which cells have text.
- The fucntion `COUNTIF([range]; condition)` will conditionally count items in the range.
- The fucntion `COUNTIFS()` counts cells that meet conditions where the input is of form `[range]; condition; ...`.
- The function `AVERAGE()` does what you think it does.
- The function `AVERAGEIF()` does what you think it does but with a condition.
- You can slice a string and take only the first `<n>` characters using teh function `LEFT(Cell, Letters)`.
- The function `RIGHT()` does the same thing but from the end of the string.
- The function `MID(Cell, Start, N)` splices the text from `Cell` starting at `Start` and copies `N` characters.
- The function `UPPER()` will convert a string to all upper case letters.
- The function `LOWER()` will convert a string to all lower case letters.
- The function `PROPER()` will convert a string to proper case letters.
- The symbol `&` is the string concatination function in excel.
- The function `MAX()` does what you think it does.
- The function `MIN()` does what you think it does.
- The function `ROUND()` does what you think it does.
- The function `VLOOKUP()` filters data based on what is passed first.
- The arguments are:
  1. `value`; what to find.
  2. `table`; table to pull data from.
  3. `index`; the column index to get the data from.
  4. `regex_bool`; Should the lookup allow for similar values.
- The function `HLOOKUP()` does the same thing but for rows instead of columns.
- The function `INDEX()` takes a selection area and returns the `x`,`y` values in relation to the table.
- The function `MATCH()` takes a value and a selection table to return the row location.
- The function `IFERROR()` will substitute a value when an error is detected.
- The function `CHOOSE()` allows us to pass which row to substitute values for.
- **Sensitivity Analysis** allows you to explore the effects of multiple different parameters on a result.
- Fill in the hypotheitcal numbers and then navigate to *Data Tab > "What-If Analysis" > Data Table*.

# Microsoft Excel - Financial Functions
- A Dollar earned now is not the same as a dollar earned in the future.
- The **Net Present Value** is `Present_Value1 + .... Present_ValueN - Initial_Investment`.
- Excel has a function `NPV(interst_rate, [cashflow_range], )` to do this for you.
- Make sure to take the `SUM( init_invest, NPV(..))` to correctly calculate it.
- The **Internal Rate of Return** is a discount rate used for measuring the profitability of a potential investment.
- The acronym for **Internal Rate of Return** is IRR.
- The function `IRR()` is how you would do that.
- The **Future Value** is `Present_Value x (1 + i)`.
- The `PMT()` function will calculate the consistent monthly payment that is necesary to extinguish a loan in `<n>` periods.
- You can extract parts of dates using the functions `YEAR()`, `MONTH()`, `DAY()`.
- You can then use `DATE()` to convert numbers back into a date format.
- The function `EOMONTH()` takes a date and returns the last day after `<n>` months.
- The function `EDATE()` takes a date and returns the date after `<n>` months.

# Microsoft Excel - Practical Exercise
- To Left Align text using the keyboard press *ALT+H+L*.
- To remove duplicate selections, navigate to *Data > Remove Duplicates*.
- Good formatting allows for users to understand the data faster.
- You can **Paste Special Formatting** using *CTRL+E+S+T*.
- The function `COUNTIF()` is a good way to test your work.
- There is some crazy formula on the screen that I am not going to copy.

# Microsoft Excel - Building Professional Charts
- To add a chart, Select the data then navigate to *Insert > Select Chart Type*.
- Excel 2016 includes a **Recommended Charts** button.
- If you don't like the choice, you can **Right+CLK** and select **Change Chart**.
- When a chart is selected, the **Chart Tools Ribbon** shows up.
- A **Bridge Chart** shows how an initial value is affected by a series of intermediate positive values.
- The **Treemap Chart** helps us to visualize multiple categories against a numeric value.
- The **Sparklines** are miniature charts in a cell that helps you spot trends in data.
- You cannot use the *DLT* key to remove a sparkline and will need to delete the row or clear the cell.

# Microsoft Excel - Working with Pivot Tables
-


# Pivot Tables & Slicers in Practice

# Modeling in Excel - Building a Complete 3-Statement Model

# Modeling in Excel - Let's Build a Flexible Model

# Modeling in Excel - Completing the 3-Statement Model

# Accounting - introduction to Acct. & Bookkeeping

# Accounting - The Three Main Statements in Financial Accounting

# Accounting - Understanding the Big Picture: Why, What, When, How Much.

# Accounting - The Core Principles of Accounting

# Accounting - Practical Exercise

# Accounting - Preparing a Cash Flow Statement: Understanding

# Accounting - The Importance of Timing

# Accounting - Introduction to Financial Statement Analysis

# Accounting - Subtleties of Financial Statement Analysis

# Accounting - Practical Case Study

# Fundamentals of Business & Financial Analysis

# Finance 101 - The Time Value of Money and Interest Rate Components

# Finance 101 - The Value of Cash Flows With Different Timing

# Finance 101 - Loan Calculations

# Capital Budgeting - A Complete Case Study

# Powerpoint - An Introduction

# Powerpoint - Tips and Tricks

# Research:
- Recharges?
- Direct Costs?
- EBITDA?
- EBIT?
-



# Reference:
