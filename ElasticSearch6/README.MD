# Elasticsearch 6 and Elastic Stack
## Frank Kane

# Installing and Understanding Elasticsearch
- Will be doing:
  * Create Indices.
  * Create Mappings
  * Importing Data
  * Aggregating Data.
  * Using Cloud Services.
- Elastic Stack:
  1. Logstack
  2. Beats
  3. X-Pack.
  4. Kibana
- Install Virtualbox.
- Install Ubuntu.
- Add port forwarding:
  * Elastic Search 9200.
  * Kibana 5601.
  * Don't forget ssh 22.
- Install Elastic search
  1. Install Java.
    * `sudo apt-get install default-jdk`
  2. Make sure to update the repos.
  3. ```
      wget -qO - https://artifacts.elasticsearch.co/GPG-KEY-elasticsearch | sudo apt-key add -
      sudo apt-get install apt-transport-https
      echo 'deb https://artifacts.elasticsearch.co/packages/6.x/apt stable main' | sudo tee -a /etc/apt/sources.list.d/elastic-6.x.list
      sudo apt-get update && sudo apt-get install elasticsearch
    ```
  4. Update the configuartion file in `/etc/elasticsearch/elasticsearch.yml`.
    * Update line `network.host: 0.0.0.0`.
  5. Start Elasticsearch:
    * ```
      sudo systemctl daemon-reload
      sudo systemctl enable elasticsearch.service
      sudo systemctl start elasticsearch.service
      ```
- Submit your first job using:
```bash
# put file mappings in elastic search
wget http://media.sundog-soft.com/es6/shakes-mapping.json
curl -H "Content-type: application/json" -XPUT 127.0.0.1:9200/shakespeare --data-binary @shakes-mapping.json

# put data into elastic search
wget http://media.sundog-soft.com/es6/shakespeare_6.0.json
curl -H 'Content-Type: application/json' -XPOST 'localhost:9200/shakespeare/doc/_bulk?pretty' --data-binary @shakespeare_6.0.json

# submit a query
curl -H 'Content-type: application/json' -XGET '127.0.0.1:9200/shakespeare/_search?pretty' -d '\
{ "query":{ \
"match_phrase":{ \
"text_entry" : "to be or not to be"\
}}}'
```
- It's really about responsding to JSON requsts.
- **Kibana**:
  * WebUI for searching and visualizing.
  * Complex aggregations, graphs, charts
  * Often used for log analysis.
- Logstash: Beats:
  * Ways to feed data into Elastic Search.
  * FileBeat can monitor log files, parse them, import.
  * Elasticsearch in near-real-time
  * Logstash also pushes data into Elasticserach from many machines
  * Not just log files.
- X-Pack:
  * Security
  * Alerting
  * Monitoring
  * Reporting
  * MAchine Learning
  * Graph Exploration.
- Three main logical concepts behind Elasticsearch:
  1. Documents. (Target)
  2. Types.     (Layout)
  3. Indices.   (Scope)
- An **Inverted Index** is a strength relationship between a set of documents.
- **Term-Frequency Inverse Document Frequency** measures the relevance of a term in a document.
- Use Indices:
  1. RESTful API.
  2. Client API.
  3. Analytic Tools.
- An index is split into **Shards**.
- The index has, by default, two primary shards and two replicas.
- Writes are forwarded to a Primary, always.
- Reads are sent to either.
- You must decide the number of primary shards on init.
- This cannot be changed later.

# Mapping and Indexing Data
- Extended setup:
  1. Install openssh-server on the server.
  2. Install Putty - if you don't already have an ssh client.
  3. Login.
- A **Mapping** is a schema definition.
- Common *Mapping* uses:
  * Field Types.
  * Field Index.
  * Field Analyzer.
- Analyzers can:
  * do character filters.
  * do tokenizing.
  * do token filtering.
- Typs of Analyzers:
  * standard
  * simple
  * whitespace
  * language
- If you want to check a mapping, then send a query to `server:port/document/_mapping/target`.
- If you want to bulk upload the data, then you'll want to use the `_bulk` interface.
- Elastic Search maintains an `_version` field which will allow you to update the record; the old is marked for deletion.
- It's a new entry since the old entry is copied and then marked to be deleted after.
- To do this, you would use the `_update` interface.
- To delete an item, simply send a `-XDELETE` request along with the document path `/movies/movie/58559`.
- You can request the specific version using `?version=3`.
- You can request that it retry updates on conflicts using `_update?retry_on_conflict=5`.
- In ES6, you'll need to make a decision whether a field should be keyword or text.
- You can submit a search using `_search?pretty` and then a `{ "query": { "match": { <terms in here> }}}`.
- You can set up a relationship using `"film_to_franchise": { "type": "join", "relations": {"franchise" : "film" }}`.

# Searching with Elasticsearch
- There is a "Query Lite" which is a simpler interface to searching as per our earlier examples.
- It would looks something like `/movies/movie/_search?q=title:star`.
- The limitation is that you need to encode the url for the server since it doesn't accept spaces.
- Cons:
  * cryptic to debug.
  * security issue.
  * fragile: one mistake and query fails.
- Officially called **URI Search**.
- You can send either a filter or a query.
- Filters are yes or no questions - and are cacheable.
- Queries return data in terms of relevance.
- Filters have the nested structure: `"query"{ "bool": { "must":{}, "filter":{}}}` for v6.
- Some other kinds of filters:
  * term.
  * terms.
  * range.
  * exists.
  * missing.
  * bool
- Some queries:
  * match_all.
  * match.
  * multi_match.
  * bool  
- **Phrase Match** must find all the terms in the right order.
- **Slop** is where an option to *phrase search* where you can about order, but allow the terms to deviate away.
- You can simulate pagination using `from` and `size` arguments; not that ES is 0 indexed.
- Deep pagination can kill performance.
- You can sort of field using sort.
  * URI version is `sort=<field>`.
- A text field that is analyzed for full-text search can't be used to sort documents.
- If you want to do that, include the request to keep a raw version as per the mappings.
```js
...
"type": "text",
"field": {
    "raw": {
        "type": "keyword"
    }
}
```
- You then can sort on that field using `title.raw`.
- The **Levenshtein Edit Distance** is how it accounts for mispellings and types.
  * Substitutions.
  * Insertions.
  * Deletions.
- You can also set an `auto` so that the allowed *fuzziness* will vary based on length.
- To alter that in a query, change `match` to `fuzzy` and include a `"fuzziness": <n>` inside the target.
```
"fuzzy":{
    "title": {"value": "intersteller", "fuzziness": 1}
}
```
- You can do a prefix search by passing `"prefix"`.
- You can do a wildcard search by passing `"wildcard"`.
- You can do a regexp search by passing `"regexp"`.
- ES allows for search as you type.
- This is done using the `match_phrase_prefix` coin.
- It is computationally safer to use N-grams at index time.
- Look up a custom analyzer since that's how this is implemented; too much code atm.
- You can also upload a list of all possible completions ahead of time using *completion suggesters*.

# Importing Data Into Your Index - Big or Small
- You can import form just about anything at this point.
- Stand-alone scripts can submit bulk documents via REST APIs.
- Logstash and beats can stream data from logs, S3, databases, and more.
- AWS systems can stream in data via lambda or kinesis Firehose.
- Kafka, Spark and more have Elasticsearch integration add-ons.
- Languages with libraries:
  * Java.
  * Python : `elasticsearch`.
  * Ruby: `elasticsearch-ruby`.
  * Scala.
  * Perl: `elasticsearch.pm`.
- At base, **Logstash** is a channel to conform and push textualar data into other data storage solutions.
- It goes beyond just moving data.
- It can also parse, filter, and transform data that passes through it.
- It can derive structure from unstructured data.
- It can anonymize personal data or exclude it entirely.
- It can do geo-location lookups.
- It can scale across many nodes.
- It can guarantees at-least-once delivery.
- It absorbs throughput from load spikes.
- Typical path:
  * Beats/Files -> Logstash -> Elastic Search.
- Installing Logstash:
  1. `sudo apt-get install logstash`.
  2. Config file `/etc/logstash/conf.d/logstash.conf`.
- To run *logstash*, use `sudo /usr/share/bin/logstash -f <path/to/config/file>`.
- You can *cat* with Elasticsearch using the interface `_cat`.
- To have *Logstash* work with MYSQL, you will need a JDBC driver.
- Then, configure *Logstash* to use the driver.
- You can load data locally into a MYSQL database using:
```sql
LOAD DATA LOCAL INFILE '<file_location>'
INTO TABLE <table_name> FIELDS TERMINATED BY '|'
(movieID, title, @var3)
set releaseDate = STR_TO_DATE(@var3, '%d-%M-%Y');
```
- **S3** stands for Simple Storage Solution.
- Hosted by Amazon web services.
- You will need to use the `elasticsearch-spark` library to connect Spark to Elastic Search.

# Aggregation
- Elastic Search is for more than just Searching now.
- Sometimes these aggregations can take the place of Hadoop or even Spark.
- You can even nest aggregations.
- structure:
```js
"aggs":{
    "ratings":{
      "terms": {
        "field": "rating"
      }
    }
}
```
- You can make a query first, and then call an `aggs` to calculate on that subsection.
- You'll need to take on `size=0` if you don't want the results from the query but only the aggregation.
- You can generate a histogram of values.
- Elastic Search already knows about time: i.e. it knows what 'year' and 'month' mean.

# Using Kibana
- **Kibana** is a powerful web ui that sits on top of Elastic Search.
- Intallation:
  1. `sudo apt-get install kibana`
  2. Alter config file at */etc/kibana/kibana.yml* change line to `server.host 0.0.0.0`.
  3. start up and enable services
- Kibana uses port 5601.
- Make sure that your versions match up between ES and Kibana.
- After adding the index you care about, you can use the *Discover* tab to explore the data.
- You can use the form `field:content` to restrict your search to specific fields.

# Analyzing Log Data with the Elastic Stack
- *Filebeats* is a lightweight shipper of logs.
- Filebeats can talk directly to ES.
- It can communicated and slow down sending by communicating with Logstash.
- It maintains a read pointer on the log and treats the file like a queue.
- This is the *ELK Stack*: Elastic Search Logstash, Kibana.
- Also, called the Elastic Stack due to introduction of Filebeats..
- Installing Filebeats:
  1. `sudo apt-get install filebeat`.
  2. ```bash
    cd /usr/share/elasticsearch
    sudo bin/elasticsearch-plugin install ingest-geoip
    sudo bin/elasticsearch-plugin install ingest-user-agent
    ```
  3. Restart the elastic search service.
  4. `sudo vi /etc/filebear/modules.d/apache2.yml`
  5. Alter the configuration to point to a different directory.
  6. Start the filebeat service.
- You can visit the *Dashboard* tab to check and build visualizations.

# Elastic Search Operations
- *how many shards do I need?*
- You can't add more shards later without re-indexing.
- Shards are not free.
- You want to over allocate, but not too much.
- Consider scaling out in phases, so you have time to re-index before you hit the next phase.
- The *right* number of shards depends on your data and your application.
- Stress-test a single shard until it breaks.
- You can add replica shards without re-indexing.
```
PUT /new_index
{
  "settings":{
      "number_of_shards": 10,
      "number_of_replicas": 1
  }
}
```
- You can check your current settings on an index by submitting `GET <index_name>/_settings`.
- You don't only have to add new shards.
- You could create new indices and then spread the requests across them using **Index Aliases**.
- Example of aliasing:
```
POST /_aliases
{
  "actions":[
    {"add": {"alias": "<alias_name>", "index": "<sub_index_name>"}},
    {"remove": {"alias": <alias_name>", "index": "<old_sub_index_name"}},
    ...
  ]
}
```
- RAM is likely the bottleneck.
- You'll want to prefer machines with 64GB of RAM.
- If you exceed 32GB for Elastic Search then you'll force it to deal with large pointers.
- Faster disks are obviously better.
- CPU is not that important.
- Fast network.
- Don't use NAS.
- The Heap Size is supposed to be 1GB.
- You can control it using two possible envir variables:
  1. `export ES_HEAP_SIZE=10g`.
  2. `ES_JAVA_OPTS="-Xms10g -Xmx10g"`; then call ES.
- *X-pack* is an elastic stack extension.
- It mostly manages the integrity of the system.
- Not completely free.
- **Watchers** are always running checking for errors on the clusters.
- You can query them using the interface `.watcher-history*/_search?pretty`.
- Go read the documentation for it since it's quite specific to an individuals uses.
- It is good standard to simulate failure under controlled conditions.
- When creating a cluster, you'll need to create a `cluster.name:` in the configuration file..
- You'll also need to add node names using `node.name:`.
- To gain permission to run multiple nodes on the same machine add `node.max_local_storage_nodes: 2`.
- To run multiple of them, you'll need a second folder with a copy of the files and an updated node name.
- *Don't forget to change the port number!*
- ES will auto copy its shard data to new systems when you spin up the new nodes.
- Snapshots let you backup what has changed since the last version.
- The snapshot uses the terminology of a repo.
- You configure this in the *elasticsearch.yml* file by adding `path.repo: ["/path/to/repo"]`.
- Or, you can submit these settings to the interface `_snapshot/backup-repo`.
```
PUT _snapshot/backup-repo
{
  "type": "fs",
  "settings": {
    "location": "/path/to/repo"
  }
}
```
- To create a new one simply submit to the URL `PUT _snapshot/backup-repo/<name-snapshot>`.
- You can send a GET request to retreive info about the snapshot.
- To restore a snapshot, use:
```
PUT _all/_close # prevents writes
PUT _snapshot/backup-repo/snapshot-1/_restore
```
- When updating the underlying OS, you'll want to stop index reallocation.
- Disable **Shard Allocation**: `_cluster/settings{ "transient": { "cluster.routing.allocation.enable": "none"}}`

# Elasticsearch in the Cloud
- AWS as well as Elastic.co can be paid to host them for you.

# Research:
- Lucene?
- Index Templates?

# Reference:
- [Elastic Search Instructions](www.sundog-education.com/elasticsearch).
- [Data](www.movielens.org)
- [MYSQL Driver](https://dev.mysql.com/downloads/connector/j/)
