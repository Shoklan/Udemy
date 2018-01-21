# The Ultimate Hands-On Hadoop - Tame Your Big Data
## Frank Kane

# Learn all The Buzzwords and Install Hadoop
- Install Oracle Virtualbox.
- Download an image:
  * Cloudera
  * Hortonworks.
- We'll be using Hortonworks in this course.
- The downloaded file should be an *.ova* which you can simple click on to import the settings.
- Once it is imported, simply start it.
- We will be using the data from movielens.org .
- We'll be using the 100k dataset.
- You can navigate to the UI by typing `127.0.0.1:8888` into your browser and with the image running.
- The username/password is maria_dev/maria_dev.
- You will import the data using the Hive View.
- You can keep the CSV option and just replace the delimiter.
- Name the columns of the uploaded file.
- Then, select *Upload Table*.
- The *Visualization* tabular allows one to create quick and useful visualizations of the data.
- **Hadoop** is an open source software platform for distributed storage and distribution processing of very large data sets on computer clusters built from commodity hardware.
- Data is too big to be handled by a single computer.
- Vertical scaling no longer can handle the problems being dealt with.
- Horizontal Scaling is linear.
- Hadoop is for more than just batch processing anymore.
- Hadoop Technologies:
  * Hadoop Distributed File System: HDFS.
  * Yet Another Resource Negotiator: YARN.
  * MapReduce.
  * Pig: [High Level Programming API]
  * Hive: [SQL query schema builder]
  * Apache Ambari: [ Overview of the full system]
  * Mesos: [Sort of a Resource Negotiator]
  * Spark: [\*/10]
  * Tez: [ Query Optimizer ]
  * Apache HBase: [ NoSQL database ]
  * Apache Storm: [ Processing Streaming Data ]
  * Oozie: [ Task Scheduler Grouper ]
  * Zookeeper: [ Coordinating Clusters ]
  * Sqoop: [SQL Connector ]
  * Flume: [ Transforming Weblogs ]
  * Kafka: [Signal Processor ]
  * MYSQL
  * Cassandra
  * MongoDB
  * Apache Drill
  * Apache Phoenix
  * Presto
  * Apache Zepplin
  * HUE

# Using Hadoop's Core: HDFS and MapReduce
- HDFS is made for very large files across a cluster.
- It breaks them into blocks.
- This allows you to process files in parallel.
- Stores them across multiple servers for redundancy.
- HDFS Architecture:
  * Name Nodes: keeps track of what is on the data nodes.
  * Data Nodes: store the data.
- If the namenode fiales:
  1. Back up the metadata to local file.
  2. Run a secondary Namenode; which is really just an edit log.
- **HDFS Federation** is when each namenode manages a specific namespace volume.
- **HDFS High Availability** is when you have a second Namenode that is in standby until a failure occurs.
  * Zookeeper will detect and load balance requests.
- There are multiple ways to navigate the HDFS:
  1. UI: Ambari.
  2. CMD.
  3. HTTP/HDFS Proxies.
  4. Java Interface.
  5. NFS Gateway.
- You can also access Ambari using port 8080.
- You can select multiple files and then *Concatinate* them to return a single file from the UI.
- The default ssh login for this image is maria_dev@127.0.0.1:2222.
- **MapReduce**:
  * Discributes the processing of data on your cluster.
  * Divides data into partitions that are Map/Reduced.
  * Resilient to failure.
- Mappers are to extract and organize the data we care about.
- The keys are then *Shuffled and Shorted* and then aggregates them together.
- Reducers then aggregate the data to a result.
- MapReduce is written in Java.
- Streaming allows interfacing to other languages.
- To run a MapReduce job in python, you will need:
  1. Python installed.
  2. Python package `mrjob`.
- It's best to test the code locally before send it off to the Cluster.
  * `python <scriptname.py> <data>`
- To run on a cluster:
```python
python RatingsBreakdown.py # use python to run this.
-r hadoop                  # run in hadoop
--hadoop-streaming-jar /usr/hdp/current/hadoop-mapreduce-client/hadoop-streaming.jar # load this jar to use the streaming interface.
u.data
```
- You can nest `MRStrp()` calls within one another.

# Programming Hadoop with Pig
- Ambari can be used to install services.
- The default maria_dev is not actually an admin/root user.
- Steps:
  1. You will ssh to the image
  2. type `ambari-admon-password-reset`
  3. Fill out the prompts
- **Pig** is intended to write code to remove having to write mappers/reducers.
- *Pig* introduces **Pig Latin** which is a SQL-like syntax language to define a map and reduce steps.
- Can be extended with **User Defined Functions** - *UDFs*.
- *Pig* rean on *Tez* will be much faster than *MapReduce*.
- Example:
```
ratings = LOAD '/user/maria_dev/ml-100k/u.data' AS           # read in data
  (userID:int, movieID:int, rating:int, ratingTime:int);     # tab-delimited expected by default
metadata = LOAD '/user/maria_dev/ml-100k/u.item' USING       # read in data
  PigStore('|') AS                                           # alter delim as |
  (movieID:int, movieTitle:chararray, releaseDate:chararray,
  videoRelease:chararray, imdbLink:chararray)                # data

namelookup = FOREACH metadata GENERATE                       # iterate over records
  movieID, movieTitle,
  ToUnixTime(ToDate(releasetDate, 'dd-MMM-yyyy')) AS releaseTime;

ratingsByMovie = GROUP ratings By movieID;                   # group up related data; called a bag.

# reducer:
avgRatings = FOREACH ratingsByMovie GENERATE group AS
  movieID, AVG(ratings.rating) AS avgRating

fiveStarMovies = FILTER avgRatings BY avgRating > 4.0;

# weird join syntax:
fiveStarsWithData = JOIN fiveStarMovies BY movieID, namelookup BY movieID;

# there is a context syntax necessary to access the field.
oldestFiveStarMovies = ORDER fiveStartsWithData BY namelookup::releaseTime;
```
- Use `DUMP` to check the data.
- Use `DESCRIBE <table>` to list the schema of the table created.
- Use `STORE <filename>` to save the results to a file.
  * Example: `STORE ratings INTO 'outRatings' USING PigStore(':');`
- Other Commands:
  * `FILTER` : obv.
  * `DISTINCT` : obv.
  * `FOREACH GENERATE` : obv.
  * ` MAPREDUCE` : Allows you to call explicit mappers/reducers on a relation.
  * `STREAM` : sends to standard I/O
  * `SAMPLE` : obv.
  * `COGROUP` : ?
  * `GROUP` : obv.
  * `CROSS` : Cartesian Product.
  * `CUBE` : ?
  * `ORDER` : obv.
  * `RANK` : similar to order.
  * `LIMIT` : take the first n items.
  * `UNION` : obv.
  * `SPLIT` : obv.
  * `EXPLAIN` : how Pig intends to submit a query.
  * `ILLUSTRATE` : samples and shows what its' going to actually do.
  * `REGISTER` : import my code from a jar file.
  * `DEFINE` : name the code I'm using.
  * `IMPORT` : pull in a written macro.
- Etc...

# Programming Hadoop with Spark
- **Spark** is a general engine for large scale data processing.
- Spark is scalable.
- Contains the information in RAM.
- It is much faster than all other current alternatives.
- Spark optimizes work flows.
- It's being used world wide right now by many companies.
- It's not really that hard to work with.
- There are more components of spark:
  * Streaming.
  * SQL.
  * MLLib.
  * GraphX.
- **RDD** stands for *Resilient Distributed Dataset*.
- See other notes about Spark.

# Using Relational Data Stores with Hadoop
- **Hive** allows you to write SQL queries against Hadoop.
- You would use it when you..:
  * are familiar with SQL.
  * Interactive.
  * Scalable on clusters.
  * Easy OLAP queries; **Online Analytic Processing**.
  * Highly Optimized.
  * Highly extensible.
- **HiveQL** is *pretty much* SQL.
- You can create a view using `CREATE VIEW .. AS`.
- You can also skip creation using `CREATE VIEW IF NOT EXISTS .. AS`.
- You could also drop it using `DROP VIEW <table_name>`.
- Hive is a **Scheme-on-Read** format.
- It uses a created **Metastore** to impose that structure on the data.
- If you mark a table as `EXTERNAL` then Hive will query it but wont manage it.
- You can logically partition the data using `PARTITIONED BY (country STRING);` which will allow you to condition on that column.
- There is a CLI for Hive.
- You can also save the queries to files.
- **MySQL** is a free Relational Database technology.
- **Sqoop** uses MapReduce to import the data specified from the SQL database.
```bash
sqoop import --connect jdbc:mysql://localhost/movielens --driver com.mysql.jdbc.Driver --table movies
```
- You can append `--hive-import` to directly add the data to Hive.
- You can also export instead.
  * make sure to set up the tables in MySQL first before export.

# Using Non-Relational Data Stores with Hadoop
- There are many interpretations of NoSQL but basically it lacks a table structure.
- **HBase** is the built in tool for managing this in the Hadoop ecosystem.
- Scaling MySQL up requires:
  * denormalization
  * Caching layers.
  * Master/slave setups.
  * Sharding
  * Materialized Views.
  * Removing stored procedures
- Sometimes you should ask yourself if you really need SQL.
- Try to use the right tool for the right job.
- **HBase** is a non-relational, scalable database built on HDFS.
- *HBase* is the Open Source version of what Google described as *BigTable*.
- Uses the **CRUD** model:
  * Create.
  * Read.
  * Update.
  * Delete.
- The **HMaster** keeps track of the state of the Shards.
- *HBase* data model:
  * Fast access to any given Row.
  * a row is referenced by a unique key.
  * Each Row has some small number of **COLUMN FAMILIES**.
  * A *Column Family* may contain arbitrary columns.
  * You can have a very large number of columns in a *column family*.
  * Each *cell* can have many versions with given timestamps.
  * Sparse data is ok; missing columns in a row consume no storage.
- Ways to access HBase:
  * HBase shell.
  * Java API.
  * REST service.
  * Thrift Service.
  * Avro service.
- To start the REST service for HBase use `/usr/hdp/current/hbase-master/bin/hbase-daemon.sh start rest -p 8000`.
- *Pig* can actually integrate with HBase.
- *HBase* must be setup first.
- The relation must have a unique key as its first column.
- `USING` clause allows you to `STORE` into an HBase table.
- Can work at scale - HBase is transactional on rows.
- To drop a table in HBase you need to `disable` it first.
- **Cassandra** is a distributed database technology.
- It has no single point of failure.
- Even though it is classified as NoSQL, it has its own query language: CQL.
- **CAP Principle** Consistency, Availability, Partition-Tolerance.
- Can only have two out of three.
- *Cassandra* favors availability over consistency.
- Has something called *eventual consistency* in that eventually you will get a consistent result.
- It uses Peer-to-Peer communication to negotiate and replicate across the tables.
- **Keyspaces** are like databases in a normal solution.
- The image is built on Fedora/Red Hat.
- You can use `scl-utils` to manage different versions of python.
- You can enable it using `scl enable python27 bash`.
- Add the rep file `/etc/yum.repos.d/datastax.repo`:
```bash
[datastax]
name = DataStax Repo for Apache Cassandra
baseurl = http://rpm.datastax.com/community
enabled = 1
gpgcheck = 0
```
- To install run `yum install dsc30`.
- Get the python dependecies using `pip install cqlsh`.
- Start the service using `service cassandra start`.
- To start the shell run `cqlsh`.
  * If you get a version  ereror pass `--cqlversion="<version_to_use>"`.
- To create a *Keyspace* use `CREATE KEYSPACE movielens WITH replication = {'class': 'SimpleStrategy', 'replication_factor':'1'} AND durable_writes = true;`.
```
CREATE TABLE users (user_id int, age int, gender text, occupation text, zip text, PRIMARY KEY (user_id));
```
- Much of the syntax is the same but there are no joins since it's not a real structure.
- You will need to pass the connector to tell it where to find it.
- You do this via `spark-submit --packages datastax:spark-cassandra-connector:2.0.0-Ms-s_2.11 <script>` .
- **MongoDB** is a document based model.
- No schema is enforced.
- There is no single key as with other databases.
- To shard it, you will need a key though.
- The named parts are:
  * Databases.
  * Collections.
  * Documents.
- It has a single master.
- It maintains copies of your primary database.
- It can elect a new primary if the original goes down.
- Quirks:
  * A majority of servers in your set must agree on the primary.
  * If you don't want to spend money on three servers, then you can setup a single 'arbiter' node.
  * Apps must know about enough servers in the replica set to be able to reach one to lean who's primary.
  * Replicas only address durability, not your ability to scale.
  * Delayed secondaries can be set up as insurance against peoople being morons.
- For Sharding, you will need to treat one of the values in the data as a psuedo private key.
- It's not just a NoSQL solution.
- The shell is a full Javascript Interpreter.
- Supports many indices.
- Built-in aggregation capabilities, MapReduce, GridFS.
- A SQL connector exists but it's not designed for that.
- How do you select which database?
  1. Integration considerations.
  2. Scaling requirements.
  3. Support Considerations.
  4. Budget considerations?
  5. CAP Considerations.
  6. Simplicity.

# Querying Your Data Interactively
- **Apache Drill** allows you to issue SQL queries across your entire cluster.
- **Presto** is made by Facebook.
- Drill is an SQL query engine for a variety of non-relational databases and data files.
- It's based on Google Dremel.
- Its not SQL-like but really is SQL.
- It has a ODBC/JDBC driver so it can be treated like SQL database.
- It's internally represented as JSON and has no fixed schema.
- It even allows you to do joins across database technologies; which normally is impossible.
- To start drill run `/bin/drillbit.sh start`.
- If you want to change the access port also pass `-Ddrill.exec.http.port=<port_number>`.
- Apache Drill will use the external facing port and protocol you configure for each tool.
- To stop the service just use `bin/drillbit.sh stop`.
- **Apache Phoenix** is SQL for HBase.
- It's a SQL driver for HBase that supports transactions.
- Fast, low-latency with OLTP support.
- Originally developed by Salesforce but was open sourced.
- Exposes a JDBC connector for HBase.
- Supports secondary indices and user-defined Functions.
- Integrates with MapReduce, Spark, Hive, Pig, Flume.
- Phoenix is exceptionally fast.
- Using Phoenix:
  * Command Line Interface.
  * Phoenix API for Java.
  * JDBC driver; thick client.
  * Phoenix Query Server; intended to allow fro non-JVM access.
  * Jars for MapReduce, Hive, Pig, Flume, Spark.
- Installing phoenix can be done with a simple `yum install phoenix`.
- You can start it using `python sqline.py`.
- You can list all known tables using `!tables`.
- *Phoenix* does not understand `insert` but instead uses `upsert` which will update the contents if they're already there.
- You can quit using `!quit`.
- To combine and use *Phoenix* with *Pig* you'll need to `REGISTER /usr/hdp/current/phoenix-client/phoenix-client.jar`.
- **Pesto** is similar to *Apache Drill*.
- It was developed and is still somewhat maintained by Facebook.
- Exposes JDBC CLI, and Tableau.
- One important reason to use it is the built-in Cassandra connector.
- Facebook uses it and their data stores are well beyond massive.
- It does not come with any configuration files and you will need to create the /etc dir along with the files.
- The command line interface will also need to be downloaded.
- Rename the file to `presto` and run `chmod +x presto` to make it executable.
- Then, start it with `bin/launcher start`.

# Managing Your Cluster
 - 

# Feeding Data to your Cluster

# Analyzing Streams of Data

# Designing Real-World Systems

# Learning More

# Research:
- Datastax?
- scl-utils?
- org.apache.phoenix.jdbc.PhoenixConnection
-


# Reference:
- [Hortonworks Site](www.Hortonworks.com/sandbox)
- [Movielens Data](www.movielens.org/datasets/movielens)
- [Presto](www.prestodb.io)
