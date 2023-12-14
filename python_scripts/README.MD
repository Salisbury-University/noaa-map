# How to use the thread tool
- Have python3 installed 
- have a package manager for python installed (pip or poetry)
- install mysql-connector-python
- download a .mbtiles database from [noaa](https://distribution.charts.noaa.gov/ncds/index.html) 
- put .mbtiles database inside /python_scripts/mbtiles

```
    python3 threads.py
```

```
    Input which grid to translate:
```
| database name | what to enter |
|---------------|----------------|
| ncds_01b.mbtiles | 1b |
| ncds_21b.mbtiles | 21b |
| ncds_10.mbtiles | 10 |

If you are getting time out errors adjust the values 100000 and 3500 down.
```
105    if l % 100000 == 0 and l != 0:
142    if l % 3500 == 0 and l != 0:


```