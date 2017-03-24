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
- 


## Research
- Maybe pick up Scala.
- 

## Further Reading

00150820