Comments:
Both frontend customer purchase and rest api call use the same webapi endpoint.

Report:
Implementation of stock change is done using 2 separate plugins due to lack of common place in magento  core codebase.
The weak spot is another insert to database on very often triggered action which is stock change. It can slow down site under heavy load.
Possible solution is to create and use separate connection pool and/or save data to another database.