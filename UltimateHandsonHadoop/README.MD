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
- 

# Programming Hadoop with Spark

# Using Relational Data Stores with Hadoop

# Using Non-Relational Data Stores with Hadoop

# Querying Your Data Interactively

# Managing Your Cluster

# Feeding Data to your Cluster

# Analyzing Streams of Data

# Designing Real-World Systems

# Learning More

# Research:

# Reference:
- [Hortonworks Site](www.Hortonworks.com/sandbox)
- [Movielens Data](www.movielens.org/datasets/movielens)
