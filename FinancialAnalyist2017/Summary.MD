# The Complete Financial Analyst Course 2017
## 365 Careers, Org

# Welcome! Course Introduction
- First we'll be working with Microsoft Excel.
- Then, we'll learning about Accounting.
- Then, we'll be going over Finance 101 topics.
- Finally, we'll discuss Powerpoint.
- Prizes, or whatever.

# Microsoft Excel - Quick Introduction
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
- **Text-To-Columns** *Data Tabular > Text To Columns*
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
- The function `COUNT()` counts which cells are numbers.
- The function `COUNTA()` counts which cells have text.
- The function `COUNTIF([range]; condition)` will conditionally count items in the range.
- The function `COUNTIFS()` counts cells that meet conditions where the input is of form `[range]; condition; ...`.
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
- Fill in the hypothetical numbers and then navigate to *Data Tab > "What-If Analysis" > Data Table*.

# Microsoft Excel - Financial Functions
- A Dollar earned now is not the same as a dollar earned in the future.
- The **Net Present Value** is `Present_Value1 + .... Present_ValueN - Initial_Investment`.
- Excel has a function `NPV(interst_rate, [cashflow_range], )` to do this for you.
- Make sure to take the `SUM( init_invest, NPV(..))` to correctly calculate it.
- The **Internal Rate of Return** is a discount rate used for measuring the profitability of a potential investment.
- The acronym for **Internal Rate of Return** is IRR.
- The function `IRR()` is how you would do that.
- The **Future Value** is `Present_Value x (1 + i)`.
- The `PMT()` function will calculate the consistent monthly payment that is necessary to extinguish a loan in `<n>` periods.
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
- **Pivot Tables** are excel's dynamic tables.
- Useful to summarize data.
- They're useful when dealing with data files over 20 MBs.
- The tables will not give acess to the actual formulas.
- They don't update automatically when cell contents change.
- To refresh the Pivot Table after changes, right click and select *Refresh*.
- Excel generates the table using the function `GETPIVOTDATA()`
- You don't have to use hard values in the function; you can use a cell's contents instead.
- **Slicers** are filters than can be applied on top of a pivot table.
- You can use them by navigating to *Insert Ribbon > Slicers*.

# Pivot Tables & Slicers in Practice
- **Enterprise Resource Planning**

# Modeling in Excel - Building a Complete 3-Statement Model
- You should always manually edit the **Conditional Formatting** rules.
- You can hide hilighted columns using *ALt + SHIFT + Right Arrow*.
- **Cost of Goods** is what *cogs* stands for.

# Modeling in Excel - Let's Build a Flexible Model
- The function `choose` will select an index based on the conditional values.
- **Days Sales Outstanding** = DSO
  * The average number of days a company takes to collect revenue after a sale has been made.
  * Trade Receivables / Revenue * 360
- **Days Payable Outstanding** = DPO
  * How long it takes for a company to pay its invoices from trade creditors.
  * Trade Payables / Cogs * 360.
- **Days Inventory Outstanding** = DSO
  * How long it takes for a company to turn its inventory into sales.
  * Inventory / Cogs * 360

# Modeling in Excel - Completing the 3-Statement Model
- **Accounting** is an information science that is used to collect and organize financial data for organizations and individuals.
- Four Main Areas of Accounting:
  1. Bookkeeping: Collection of Information.
  2. Financial Accounting: Prepared for External Stakeholders.
  3. Managerial Accounting: Strategic Information available to insiders.
  4. Tax Accounting: Calculation of Income Taxes.
- Modern society cannot function without Bookkeeping.
- Financial statements are how a bank knows whether to lend money to a company.

# Accounting - introduction to Acct. & Bookkeeping
- The three core statements are:
  1. Income Statement.
  2. Balance Sheet.
  3. Cash Flow.
- **Revenue**, or net sales, is an inflow of economic resources.
- The top line is *Total Revenue*; which is Net Sales + Other revenue.
- Most common expenses are:
  1. Cost of Goods sold.
  2. Selling, General, Administrative.
  3. Depreciation and Amortization.
  4. Interest Expenses.
- **Gross Product** = Total Revenue - Cost of Goods.
- The main balance sheet items:
  1. Assets.
  2. Liabilities.
  3. Equity.
- Assets stand on the left; Liabilities and Equity on the right.

# Accounting - The Three Main Statements in Financial Accounting
- Companies will be expected to report their revenues in an consistent and unbiased manor.
- **Financial Accounting Standards Board** ; *FASB*
- **International Accounting Standards Board** ; *IASB*

# Accounting - Understanding the Big Picture: Why, What, When, How Much.
- The amount of sales a company makes is a measure of how large its business is and how it performed compared to previous periods.
- Questions:
  1. Did the company grow?
  2. Did it grow faster than other competing businesses?
  3. Is the business slowing down?
  - Rules:
    * *Revenue* is recognized in the *Income Statement* when it is realized and earned.
  - There is also a set of rules that govern Expenses Recognition.
  - The **Matching Principle** that expenses incurred to generate revenue are recognized in the same period as the revenue.
  - **Period Costs** are ones that may be excluded.
  - Companies are allowed to choose between historic or current evaluated value; must be consistent though.

# Accounting - The Core Principles of Accounting
- The **Accounting Equation**; Assets = Liabilities + Equity.
- Both sides of this equation must be equal.
- A **General Ledger Account** is an account that allows us to organize the information about a firm's balance sheet or income statemnt items.
- *General Ledgers* usually have subsidiary legders.
- The elements of a **T Account**:
  * The Title at the top.
  * Debit is the left.
  * Credit is the right.
- The portion of an asset per year that is used up is called **Depreciation**.
- It is shown as an expense in the income statment.
- There are two methods of *Depreciation*:
  1. Straight Line.
  2. Depreciation Based on Use.
- *Straight Line*:
  * Collect the Initial Cost, the *Salvage Value*, Amount to be Depreciated.
  * Collect how long the asset will be used for.
  * Divide the Depreciation Amount by the Usage Years.
- *Usage Method*:
  * Collect the Initial Cost, the *Salvage Value*, Amount to be Depreciated.
  * Decide on a metric that can be reasonably measured over the duration of use.
  * Divide the Depreciation Amount by the Metric.
- **Intangible Assets** are assets that are not physical in nature.
- The equivalent to *Depreciation* for them is **Amortization**.
- **Double Entry Bookkeeping**: Every transaction has an equal and opposite effect in at least two accounts.

# Accounting - Practical Exercise
- ...

# Accounting - Preparing a Cash Flow Statement: Understanding
- Cash flow generation and liquidity are vital to all businesses. A company must be able to measure the actual amount of money it makes and estimate its future capital needs.
- The **Cash Flow Statement** indicates whether cash is made to service existing debt.
- It shows the amount of money that is being invested.
- It shows whether the firm can invest in new opportunities when they arise.
- Types of **Cash Flow Activities**:
  1. Operations: affecting the firms Net Income.
  2. Investing: affecting Fixed Assets and long term Investments.
  3. Financing: affecting firms capital structure.
- Two methods of presenting *Net Cash Flow*:
  1. Direct: all cash payments the firm has made in the period.
  2. Indirect: Net Income is converted to cash flow that affect Net income but no immediate cash effect.
- **Earnings Before Interest, Taxes, Depreciation, Amortization** or EBITDA.
- **Capital Expendetures** or *CAPEX*.
- Beginning Cash + Net Cash Flow must be equal to Ending Cash.

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
- SAP?



# Reference:
