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

## Scaling


## Research:
*Item-Based Collaborative Filtering*
- *Cosine Similarity*
- *Jaccard Coefficient*


## Reading List:

