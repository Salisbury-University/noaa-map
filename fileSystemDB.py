from PIL import Image
from io import BytesIO
import numpy as np
import os
import sqlite3


# Program that opens the database and 
# reads the number of rows the map table has
conn = sqlite3.connect('./mbtiles/ncds_06.MBTILES')
#c = conn.cursor()
#c.execute('SELECT count(*) FROM map')
#rows = c.fetchall()
#print(rows)
#c.close()
#conn.close()


#conn = sqlite3.connect('./mbtiles/noaaMapDB#2')
c = conn.cursor()


#dir_path ='./mbtiles/ncds_06/'
#dir1 = [i for i in os.listdir(dir_path)]
#dir1.sort(key=int)
#os.chdir(dir_path)
#for z in dir1:
#    os.chdir(z)
#    dir2 = [f for f in os.listdir(os.getcwd())]
#    dir2.sort(key=int)
#    for row in dir2:
#        os.chdir(row)
#        dir3 = [g for g in os.listdir(os.getcwd())]
        #dirs3.sort(key=lambda x: int(x.split('.')[0]))
#        for col in dir3:
#            print(col)
#        os.chdir("..")
#    os.chdir("..")
#c.close()
#conn.close()

c.execute('select zoom_level,tile_column,tile_row,tile_data from map,images where map.tile_id = images.tile_id')
#c.execute('select tile_data from map,images where map.tile_id = images.tile_id and zoom_level = 5 and tile_row = 0 and tile_column = 31')
rows = c.fetchall()

os.chdir("./mbtiles")

for e in rows:
    dirName = str(e[0])
    if os.path.exists(dirName):
        os.chdir(dirName)
    else:
        os.mkdir(dirName)
        os.chdir(dirName)
    dirName = str(e[1])
    if os.path.exists(dirName):
        os.chdir(dirName)
    else:
        os.mkdir(dirName)
        os.chdir(dirName)
    dirName = str(e[2])
    if not os.path.isfile(dirName):
        image = Image.open(BytesIO(e[3]))
        imageo = image
        gray_image = image.convert('L')
        mean_value = np.mean(np.array(gray_image))
        if mean_value < 10:
            newImg = Image.new('RGB', (256,256), color='black')
            title = str(e[2]) + '.PNG'
            newImg.save(title,'PNG')
        else:
            title = str(e[2]) + '.PNG'
            imageo.save(title, 'PNG')
    os.chdir("..")
    os.chdir("..")
