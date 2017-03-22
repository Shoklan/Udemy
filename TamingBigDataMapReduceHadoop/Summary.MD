# Taming Big Data With MapReduce and Hadoop

## Prerequisites
- Need an IDE; Enthought IDE [Canopy](https://www.enthought.com).
- Will be using Python 2.7; adjust if necessary.
- Install Python package mrjob; `pip install mrjob`
- Data at [grouplens](www.grouplens.org). Download 100K Dataset [here](https://grouplens.org/datasets/movielens/100k/)
- Run `python RatingCounter.py ../data/ml-100k/u.data`

## How Does MapReduce Work?
- Converts raw source data into Key->Value pairs.
- This is to split the searchable space into managable blocks for analysis.
- The role of the mapper is to extract and organize what we care about among the data.
- It will sort the data by the key and combine all the values automatically.
- Reducer's role is to return the information relevant per key.
- I.e: the length of the values of movies watched.
- The hard part is framing problems into Hadoop problems.


- Code from RatingCounter.py:
```
from mrjob.job import MRJob

class MRRatingCounter(MRJob):
    def mapper(self, key, line):
        (userID, movieID, rating, timestamp) = line.split('\t')
        yield rating, 1

    def reducer(self, rating, occurences):
        yield rating, sum(occurences)

if __name__ == '__main__':
    MRRatingCounter.run()
```
- `yield` is a new keyword for me.
```
At a glance, the yield statement is used to define generators, replacing the return of a function to provide a result to its caller without destroying local variables. Unlike a function, where on each call it starts with new set of variables, a generator will resume the execution where it was left off
```
- Overview of Iterators, Generators, and Yield can be found [here](http://stackoverflow.com/questions/231767/what-does-the-yield-keyword-do-in-python).
- INPUT -> mapper() -> HADOOP -> reducer() -> OUTPUT

- MapReduce is useful becuase it's partitionable and scalable across many PCs.
- MAKE AS CLOSE TO ZERO ASSUMPTIONS AS POSSIBLE.

- Overall
	1. Familiarize with Data.
	2. Question?
	3. Write Mapper.
	4. Write Reducer.
	5. Call 

- Make sure that any functions you need are defined INSIDE of the `MRClassName(MRJob)`
- Python can change the encoding of words using `unicode(word, "utf-8", errors="ignore")`.
- You can add multiple MapReduce levels using a list comprehension to get Hadoop to heavy lifting.
- This is called 'stepping' and requires one to import MRStep from mrjob.step and include a `step()`.
- To ensure all data is sorted uniformly, then you'll want a single Reducer.
- A *Combinor* is where your Mapper has partial reducing function included in the Mapper.
- Don't write essential code in the Combinor since you can't be assured of it's actually running all the time.
- If you're looking for one value, then make the key uniform to combine all the data.

- Files cannot be garunteed to be on the server.
- You must pass the ancillary file along with the call.
- This is done via calling the parent and tell **self** where the file is.
- init functions can be in the reducer or mapper phase.
- mapper_init, reducer_init will run before the mapper, reducer.

## Breadth-First Search
- Convert data into a structure for nodes.
- Feed one interaction into a new one.
- A Counter is used to indicate how many times we hit the cahracter we're looking for.
- Hadoop as counters for just this case; consistent across all nodes.
- mjrob is normally in JSON.
- Assign `INPUT_CONTROL = RawValueProtocol` and `OUTPUT_CONTROL = RawValueProtocol`.
- `add_passthrough_option()` just makes sure all clusters know what information is important.
- `self.increment_counter('Degrees of Separation', counterName, 1)` is how you name and adjust a counter.

- `combinations(values, combinations)` is new and useful.
- 

## Hadoop Fundamentals
- Framework for Distributed computing.
- Offers redundancy and scalability.
- Do not assume anything about the node that you're running on.

### Hadoop File System (HDFS)
- Breaks the blocks of information apart randomly across all nodes.
- Apache YARN is how Hadoop manages resources across a cluster.
- .. is part of Hadoop.
- .. is not limited to MapReduce.
- Spark is now competing with MapReduce; it's winning.
- YARN is the 'API' for all this.
- Written in Java; sad face.
- It works by exchanging data as 'text streams.'

### Getting an Amazon EC2 account
- Visit site at [Amazon Elastic Map Reduce](https://www.aws.amazon.com).
- Sign up for an account; before of paying on accident.
- Connect to mrjob package.
    1. Select your name > Security Credentials
    2. Select Access Keys.
    3. "Create New Access Key"; Confirm.
    4. Copy the Secret Key; also, save the key.
    5. Go to Environmental Variables
    6. New variables: AWS_ACCESS_KEY_ID, Open Key; AWS_SECRET_ACCESS_KEY, Secret Key.
    7. Restart 'cause Windows is stupid.
    8. pass flag `-r emr` when running job.

## Distributed Computing Fundamentals
- Default only runs on 1 cloud box.
- Speed is not multiplicative.
- To add more cloudboxes, use `--num-ec2-instances 4`
- There is a limit of 20 cloudboxes as per Amazon's boundary case.
- Sorts are only done per reducer; therefore, we need to sort after run.

- You have 5 minutes to collect the runlogs after a failure.
- To collect: `python -m mrjob.tools.emr.fetch_logs --find-failure [cloud_job_id]`.
- 



## Research:
*Item-Based Collaborative Filtering*
- *Cosine Similarity*
- *Jaccard Coefficient*
- *Apache YARN*

## Reading List
- mrjob Python documentation.
- 

