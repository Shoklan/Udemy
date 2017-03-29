# Taming Big Data With Apache Spark and Python
## By Frank Kane

## Why Learn Spark?
- Taking over MapReduce Market Space.

## Prerequisites
- Need an IDE; Enthought IDE [Canopy](https://www.enthought.com).
- Will be using Python 2.7; adjust if necessary.
- Download and install [JDK](http://www.oracle.com/technetwork/java/javase/downloads/index-jsp-138363.html).
- Download at least Sparkv2.0 [here](http://spark.apache.org/downloads.html).
- Make sure it's the pre-built version.
- Extract the pre-built structure to a designated folder of your preference.
- Rename **log4j.properties.template** to **log4j.properties**.
- Alter line *log4j.rootCategory=INFO, console* to *log4j.rootCategory=ERROR, console*
- Navigate to [winutils](https://sundog-spark.s3.amazonaws.com/winutils.exe) and download it.
- Create new folder called **winutils\bin** in **C:** directory and copy the file into it.
- Create new Environmental Variables:
	1. SPARK_HOME = C:\SPARK
	2. JAVA_HOME = PATH_TO_JAVA
	3. HADOOP_HOME = C:\winutils
- Adjust PATH to include:
	1. %SPARK_HOME%\bin
	2. %JAVA_HOME%\bin

- Lets play!:
	1. Open cmd.
	2. `pyspark`
	3. `rdd = sc.textfile("README.md")`
	4. `rdd.count()`
	5. Should see numeric return value 99.

- Press `CTRL + D` to drop out of Spark Console.

```python
# Make sure to install via PIP
from pyspark import SparkConf, SparkContext
import collections

# Setup Spark
conf = SparkConf().setMaster("local").setAppName("RatingsHistogram")
sc = SparkContext(conf = conf)

# Target and run against file
lines = sc.textFile("file:///SparkCourse/ml-100k/u.data")
ratings = lines.map(lambda x: x.split()[2])
result = ratings.countByValue()

# Create results
sortedResults = collections.OrderedDict(sorted(result.items()))
for key, value in sortedResults.items():
    print("%s %i" % (key, value))
```

## Under the Hood
- "A Fast and general engine for large-scale data processing"
- Driver Program -> Cluster Manager( Spark, YARN ) -> Distributed Drones.
- Runs faster than MapReduce.
- Directed Acyclic Graph[*DAG*] optimizes workflows.
- Awesome skill for Big Data.
- Flexible across languages.
- Resilient Distributed Dataset [*RDD*]
- Made of ~4 components:
	1. Spark Streaming.
	2. Spark SQL.
	3. MLLib.
	4. GraphX.
	5. Spark Core.
- GraphX is probably only in Scala.

### RDD
- It is an abstraction for a giant set of data.
- Resiliance and Distributed can be treated as a black box.
- A Sparkcontext is what allows you to create a RDD.
- The Spark shell will create one for you.
- sc.textFile(...):
	1. file:///
	2. s3n://
	3. hdfs://
- Can also create an sc from:
	1. Hive
	2. JDBC
	3. Cassandra
	4. HBase
	5. ElasticSearch
	6. JSON, CSV, etc
- Transform RDDs:
	1. map
	2. flatmap. // can produce multiple valaues
	3. filter
	4. distinct
	5. sample
	6. union
	7. intersection
	8. subtract
	9. Cartesian

- Nothing actually happens until you request what you want.
- `spark-submit` allows you to submit pythong scripts to Spark.

- There are many actions you can take:
	1. `reduceByKey()`     : combine values with same key.
	2. `groupByKey()`      : group values with same key.
	3. `sortByKey()`       : Sort RDD by key values.
	4. `keys()`, `values()`: extract only keys,values into an RDD.
- You can do SQL-like joins.
- If your query will not adjust the keys, then use `mapValues()` or `flatmapValues()`.
- This is because it's faster. 

- Filtering removes data that you don't care about.

- Map has a one-to-one relationship, always.
- Flatmap allows you to map from many-to-even-more.

- Regular Expressions in python are quite unique.
```python
# compile the regex
# using at least one word value
	re.compile(r'\W+',
# type.
	re.UNICODE).split(
# convert lower case verions
	text.lower())
```

- Spark auto-forwards objects, but this can be really slow.
- This is called a broadcast object.
- You invoke this using `sc.broadcast()`.
- You use `sc.value()` to get the broadcast object back.


- An Accumulator allows many executions to increment a shared variable. //MapReduce Counter equivalent

- Any time you perform more than one action on an RDD, you must cache it.
- To do this, use `rdd.cache()` or `rdd.persist()`.
- The difference is that *persist* allows one to cache to disk.
- `.setMaster("local[*]")` will tell Spark to use all your computer's cores.
- You can save data to a file using `rdd.saveAsTextTile('name_of_file')
- `rdd.take( count )` will peel of items off the data.

## Elastic MapReduce
- Spark is MUCH more expensive than MapReduce is via the EMR Amazon service.
- When you set up a spark key, then it will download a sparkkey.pem file.
- if you lose that combo, then you'll need to delete it and create a new one.
- If you're on Windows, then you'll need a terminal application: putty?
- Use Putty to import the .PEM file.
- Select `Save Private Key` to save the .PEM file to a .PPK file.
- Turn SSH off *AND* import the .ppk file for usage in putty.

## Actually Running Script
- Spark still isn't magic.
- There is some level of work required to split up the jobs among clusters.
- You can use `rdd.partitionBy()` to break the jobs up for executors.
- **How do you know the *right* number of partitions?**
	1. As many as you have cores.
	2. As many as you have executors.
	3. 100 is a good starting point.

- An **s3n://** just means Amazon services.
- Default memery budget is 512 MB.
- You can pass a memory size request using flag `-executor-memory 1g`; 1 GB.
- You can ask to use YARN using `-master yarn`.
- EMR does this by default though.
- *MAKE SURE YOU TURN THE CLUSTER OFF MANUALLY AFTER A JOB*

## Troubleshooting
- This can be quite challenging.
- Spark runs a local console on port 4040
- If on EMR, then you mind as well throw in the towel since Amazon is locked down.
- In YARN, logs are distributed; which can be annoying.
- Be careful how much you ask of your executors.
- Be careful of dependency issues.
- Absolute vs Relative paths; you can use broadcasts to mitigate.

## Spark SQL
- Extends RDD to a "DataFrame" object
- Dataframes:
	1. Contain Row Objects
	2. Run SQL queries
	3. Has a schema
	4. R/W to JSON, Hive, parquet.
	5. Communicate with JDBC/ODBC, Tableau // Oh?

- To use in python: `from pyspark.sql import SQLContext, Row`.
- 

```python
hiveContext - HiveContext(sc)
inputData = spark.read.json(dataFile)
inputData.createOrReplaceTempView("myStructuresStuff")
myResultsDataFrame = haveContext.sql('""'SELECT foo FROM bar ORDER BY foobar'""')
```
- After Spark 2.0, there are now **DataSets**.
- DataSets can also contain a class type along with the row object.
- Since it more important with respect to Scala, Java.
- DataFrame isa DataSet; not bidirectional.
- Spark SQL allows for shell access via :10000
- Create user defined types.

- Spark 2.0 creates SparkSessions instead.
- `spark.createDataFrame( data )` will convert data into workable DataFrame.
- `df.createOrReplaceTempView( data )` will allow one to run SQL queries against the data.
- Call `spark.sql( "command_string" )
- There are also commands that behave like SQL queries.
	1. `groupBy()`
	2. `count()`
	3. `orderBy()`
	4. `show()`

- Don't forget to stop the connection with `spark.stop()`.

## MlLib
- Feature Extraction
- Basic Statistics
	1. Chi-Squared
	2. Pearson Correlation
	3. Spearman Correlation
	4. Min.
	5. Max.
	6. Mean.
	7. Variance.
- Linear, Logisitc Regression
- Support Vector Machines.
- Naive Bayes.
- Decision Trees.
- K-Means Clustering.
- Principle Component Analysis.
- Singular Value Decomposition.
- Alternating Least Squares? //Netflix Competition winner.

- Spark has a type called **Rating**.



## Research
- Maybe pick up Scala.
- Language processing: NLTK.
- Alternating Least Squares
- *You must explicitely import the ML stuff.*
- The answers are not consistent with ALS.
	* Very sensitive to parameters.
	* I know about train/test.
	* Putting your faith in a Black Box can be 'dodgy.'
	* Small misteps will lead to mass spread issues.

- `from pyspark.ml.regression import <LinearRegression>`
- `from pyspark.ml.linalg import Vectors` to represent Feature data.
- Features go in a **dense vector** using `Vectors.dense( value )`.
- Spark includes a splitting function be default.
	* `df.randomSplit( [.5, .5])`
- SparkStreaming is for live data.
	* process log data from a website.
	* Includes **checkingpointing** in case of HDD failure.
	* Support for Python,R incoming.
	* Includes "Windowed Operations" which combine batches over a set duration.
	* `updateStateByKey()` is saved across many batches globally.
- GraphX is for Networking Models.
	* These are graphs in the Computer Science terminology.
	* 


## Further Reading
- Advanced Analytics with Spark: Patterns for Learning from Data at Scale
	1. [Purchase](https://www.amazon.com/Advanced-Analytics-Spark-Patterns-Learning/dp/1491912766) | [Download](dl.finebook.ir/book/6d/13700.pdf)