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
- Add portforwarding:
  * Elastic Search 9200.
  * Kibana 5601.
  * Don't forget ssh 22.
- Install Elasticsearch
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

# Searching with Elasticsearch

# Importing Data Into YOur Index - Big or Small

# Aggregation

# Using Kibana

# Analyzing Log Data with the Elastic Stack

# Elasticsearch in the Cloud

# Research:
- Lucene?


# Reference:
- [Elastic Search Instructions](www.sundog-education.com/elasticsearch).
-
