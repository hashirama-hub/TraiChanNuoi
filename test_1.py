#!/usr/bin/env python
# coding: utf-8

# In[1]:


import pyspark
from pyspark.sql import SparkSession
from pyspark.sql.types import *
import pyspark.sql.functions as func


# In[2]:


spark = SparkSession.builder.appName("LV").getOrCreate()


# In[3]:


data = spark.read.format("csv").option("header","true").option("inferSchema","true").option("path","hdfs:///user/maria_dev/pokemon/pokemon_data.csv").load()


# In[4]:


data.show()


# In[5]:


data.printSchema()


# In[8]:


data_1 = data.select("#", "Name", "Type 1","HP").withColumn("Time", func.current_timestamp()).cache()


# In[10]:


data_1.createOrReplaceTempView("datas")


# In[11]:


spark.sql("SELECT * FROM datas WHERE HP > 20 ORDER BY HP").show()


# In[ ]:


data_1.write.format("json").mode("overwrite").option("path","hdfs:///user/maria_dev/pokemon/ketqua/").partitionBy("Type 1").save()

